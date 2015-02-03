<?php
/*
* -------------------------------------------------------
* CLASSNAME:        Tree
* GENERATION DATE:  02.09.2007
* FOR MYSQL TABLE:  Defined by user
* DESCRIPTION:		This class generate a dynamic tree ajax directory of items retrieved from MySQL dabatase tables.
*					Could be used to load folders/categories/directories.
* -------------------------------------------------------
*/

include_once("class.database.php");

// ********************** DECLARACION DE LA CLASE

class Tree { // clase : inicio

// ********************** DECLARACION DE ATRIBUTOS

	var $id = 1;

	var $database; // Instancia de la base de datos

	var $table = "carpetas";
	var $fieldId = "idCarpeta";
	var $fieldFrom = "intDeCarpeta";
	var $fieldView = "chrNombre";

// ********************** METODO CONSTRUCTOR

	function Tree($id) {
		$this->id = $id;
		$this->database = new Database();
		if(!isset($this->id))
			$this->id = 0;
	}


// ********************** METODO LIST

	function countSub($id) {
		$sql =  "SELECT COUNT($this->fieldId) AS subOptions FROM $this->table";
		$sql.= " WHERE $this->fieldFrom = $id;";
		//echo $sql;
		$this->database->rows = $this->database->getResult($this->database->query($sql),"subOptions");
	}

	function listSub($id) {
		$sql =  "SELECT $this->fieldId,$this->fieldView FROM $this->table";
		$sql.= " WHERE $this->fieldFrom = $id;";
		//echo $sql;
		return $this->database->query($sql);
	}

	function display() {
		$this->listSub($this->id);
		if($this->database->getNumRows() > 0) {
			while($row=$this->database->fetchRow()) {

				$tree_sub=new Tree($row[$this->fieldId]);
				$tree_sub->countSub($row[$this->fieldId]);

				echo "<div class=\"fld_ln\">";
				echo (($tree_sub->database->getNumRows() > 0)?"<a href=\"Javascript:loadTree(".$row[$this->fieldId].")\">[+]</a>":"[-]");
				echo "&nbsp;".$row[$this->fieldView]."\n";
				echo "<div id=\"c".$row[$this->fieldId]."\" class=\"fld_ln\" style=\"display:none;\"></div>";
				echo "</div><br style=\"clear:both\">";
			}
		}
	}

} // clase : fin

?>