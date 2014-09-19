<?php
class Common
{
	/*
	*/
	var $version = '1.1';
	var $db;
	var $recordNum;
	var $tableFields;
	var $fieldsCache = './tablefields.tmp';
	var $tableName;
	var $tableField;
	function Common($tableName = '')
	{
		global $db;
		if (!isset($db))
			return false;
		$this->db = $db;
		$this->setTableFields();
		if ($tableName)
			$this->setTable($tableName);
	}
	
	function setTable($tableName)
	{
		if (!is_array($this->tableField = $this->tableFields[$this->tableName = $tableName]))
			die('Wrong Table Name');
	}
	
	function setTableFields()
	{
		if (file_exists($this->fieldsCache))
			$this->tableFields = unserialize(file_get_contents($this->fieldsCache));
		else
		{
			$_tableModel = array();
			foreach($this->db->get_results("SHOW TABLES",ARRAY_N) as $_table)
			{
				foreach($this->db->get_results("DESC $_table[0]",ARRAY_A) as $_field)
				{
					$_tmpField[] = $_field['Field'];
					if ($_field['Key'] == 'PRI')
						$_PK = $_field['Field'];
				}
				$_tableModel[$_table[0]] = array('PK'=>$_PK,'Fields'=>$_tmpField);
				unset($_PK,$_tmpField);
			}
			error_log ( serialize($this->tableFields = $_tableModel), 3, $this->fieldsCache);
		}
		return true;
	}
	
	function update($vars,$key = NULL)
	{
		if ($key == NULL)
			$key = $this->tableField['PK'];
		foreach($vars as $k => $value)
			if($k != $key && in_array($k,$this->tableField['Fields']))
				$_f[] = " `$k` = '$value' ";
		$sql = "UPDATE `".$this->tableName."` SET ".implode(',',$_f)." WHERE `$key` = '$vars[$key]'";
		return $this->db->query($sql);
	}
	
	function insert($vars,$PK = false)
	{
		$_f = array();
		$_v = array();
		if ($PK)
		{
			$_f[] = " `".$this->tableField['PK']."` ";
			$_v[] = " '".$vars[$this->tableField['PK']]."' ";
		}
		foreach($vars as $k => $value)
			if($k != $this->tableField['PK'] && in_array($k,$this->tableField['Fields']))
			{
				$_f[] = " `$k` ";
				$_v[] = " '$value' ";
			}
		$sql = "INSERT INTO 
				`".$this->tableName."` 
				(".implode(',',$_f).")
				VALUES
				(".implode(',',$_v).")";
		//die($sql);
		if ($this->db->query($sql))
			return $this->db->insert_id;
		else
			die('Wrong:'.$sql);
	}
	
	function getList($str = NULL,$page_size = 0,$page = 0,$selects = "*")
	{
		$this->recordNum = $this->db->get_var("SELECT COUNT(".$this->tableField['PK'].") AS n FROM `".$this->tableName."` WHERE 1 $str");
		if (1 > $this->recordNum)
			return NULL;
		$sql = "SELECT ".$selects." FROM `".$this->tableName."` WHERE 1 $str ";
		if (1 < $page_size && 0 < $page)
			$sql .= 'LIMIT '.($page-1)*$page_size.','.$page_size;
		return $this->db->get_results($sql,ARRAY_A);		
	}
	
	function getSign($str,$selects = "*")
	{
		return $this->db->get_row("SELECT ".$selects." FROM `".$this->tableName."` WHERE 1 $str",ARRAY_A);
	}
	
	function del($str)
	{
		return $this->db->query("DELETE FROM `".$this->tableName."` WHERE $str");
	}
	
	function sQuery($selects,$str)
	{
		return $this->db->get_var("SELECT $selects AS n FROM `".$this->tableName."` WHERE $str");
	}
	
		
	function query($str)
	{
		return $this->db->query($str);
	}
	
	function getOne($str)
	{
	    return $this->db->get_row($str,ARRAY_A);
	}
	
	/**
	* =====================
	*/
	
	function _testFields()
	{
		print "<pre>";
		print_r($this->tableFields);
		print "</pre>";
	}
	
	function _testField()
	{
		print "<pre>";
		print_r($this->tableField);
		print "</pre>";
	}
	
	function debug()
	{
		$this->db->debug();
	}
}
?>