<?php 
if(!defined('IN_LYNO')) {
	exit('Access Denied');
}
if($act == 'save'){
		require LYNO_ROOT.'./include/uploadfiles.php';
	}else{
		@require LYNO_ROOT.'./include/catch.php';
		$province = array();
		$query = $db->query("SELECT * FROM {$tablepre}province ORDER BY `id` ASC");
		while($row = $db->fetch_array($query)){
			$province[$row[provinceID]] = $row[province];
		}
}

if(!isset($item)){
$channel = isset($channel)?$channel:'';
$assigstrWhere = '';
$assignstrWhere = '';
if($_DCOOKIE['adminid'] == 'p2'){
	$assiguidp2 = $_DCOOKIE['uid'];
	$assignusernamep2 = $_DCOOKIE['admin_username'];
	$query = $db->query("SELECT * FROM {$tablepre}admin	WHERE parentuid ='$assiguidp2'");
	while($row = $db->fetch_array($query)){
		$assiguidp3 .= ','.$row[uid];
		$assignusernamep3 .= ",'$row[username]'";
	}
	$query = $db->query("SELECT * FROM {$tablepre}admin	WHERE parentuid IN ($assiguidp3) ");
	while($row = $db->fetch_array($query)){
		$assiguidp4 .= ','.$row[uid];
		$assignusernamep4 .= ",'$row[username]'";
	}
	$assignusername = $assignusernamep2.$assignusernamep3.$assignusernamep4;
	$assignstrWhere = " AND assign IN ($assignusername)";
}elseif($_DCOOKIE['adminid'] == 'p3'){
	$assiguidp3 = $_DCOOKIE['uid'];
	$assignusernamep3 = $_DCOOKIE['admin_username'];
	$query = $db->query("SELECT * FROM {$tablepre}admin	WHERE parentuid ='$assiguidp3'");
	while($row = $db->fetch_array($query)){
		$assiguidp4 .= ','.$row[uid];
		$assignusernamep4 .= ",'$row[username]'";
	}
	$assignusername = $assignusernamep3.$assignusernamep4;
	$assignstrWhere = " AND assign IN ($assignusername)";
}elseif($_DCOOKIE['adminid'] == 'p4'){
	$assignusername = $_DCOOKIE['admin_username'];
	$assignstrWhere = " AND assign = '$assignusername'";
}
//$assignstrWhere = ($assignstrWhere) ? "$assignstrWhere AND operatetype != '4'":'';
if( $channel == 'need' ){//客户管理
	require LYNO_ROOT.'./include/page.inc.php';
	$PageObj= new Page();
	$strWhere = 'AND bargain = 0 AND (regtype = 1 OR regtype = 3)'.$assignstrWhere;
	$query = $db->query("SELECT COUNT(*) FROM {$tablepre}house WHERE 1 $strWhere");
	$PageObj->pageRow = 10;
	$PageObj->recordNum = $db->result($query, 0);
	//取值
	$query = $db->query("SELECT 
		h.*,p.province AS provincename, c.city AS cityname,a.area AS areaname
		FROM {$tablepre}house h
		LEFT JOIN {$tablepre}province p ON p.provinceID = h.province
		LEFT JOIN {$tablepre}city c ON c.cityID = h.city
		LEFT JOIN {$tablepre}area a ON a.areaID = h.area
		WHERE 1 $strWhere ORDER BY hid DESC LIMIT  ". ($PageObj->currPage-1)  * 10 .", 10");
	$house_list = array();
	while($row = $db->fetch_array($query)){
		$house_list[] = $row;
	}

}elseif( $channel == 'new' ){//最新房源
	$strWhere = 'AND bargain = 0 AND( regtype = 2 OR regtype = 4 OR regtype = 5 )';//.$assignstrWhere;
	$query = $db->query("SELECT 
		h.*,p.province AS provincename, c.city AS cityname,a.area AS areaname
		FROM {$tablepre}house h
		LEFT JOIN {$tablepre}province p ON p.provinceID = h.province
		LEFT JOIN {$tablepre}city c ON c.cityID = h.city
		LEFT JOIN {$tablepre}area a ON a.areaID = h.area
		WHERE 1 $strWhere ORDER BY createdate DESC LIMIT  0, 10");
	$house_list = array();
	while($row = $db->fetch_array($query)){
		$house_list[] = $row;
	}

}elseif( $channel == 'ok' ){//成交列表
	require LYNO_ROOT.'./include/page.inc.php';
	$PageObj= new Page();
	$strWhere = 'AND bargain = 1 AND( regtype = 2 OR regtype = 4 OR regtype = 5 )'.$assignstrWhere;
	$query = $db->query("SELECT COUNT(*) FROM {$tablepre}house WHERE 1 $strWhere");
	$PageObj->pageRow = 10;
	$PageObj->recordNum = $db->result($query, 0);
	$query = $db->query("SELECT 
		h.*,p.province AS provincename, c.city AS cityname,a.area AS areaname
		FROM {$tablepre}house h
		LEFT JOIN {$tablepre}province p ON p.provinceID = h.province
		LEFT JOIN {$tablepre}city c ON c.cityID = h.city
		LEFT JOIN {$tablepre}area a ON a.areaID = h.area
		WHERE 1 $strWhere ORDER BY hid DESC LIMIT  ". ($PageObj->currPage-1)  * 10 .", 10");
	$house_list = array();
	while($row = $db->fetch_array($query)){
		$house_list[] = $row;
	}

}elseif( $channel == 'my' ){//我的房源信箱
	require LYNO_ROOT.'./include/page.inc.php';
	$PageObj= new Page();
	$strWhere = "AND bargain = 0 AND( regtype = 2 OR regtype = 4 OR regtype = 5 ) AND assign = '$_DCOOKIE[admin_username]' AND `check`='0' and operateuid!='$_DCOOKIE[uid]' ";
	$query = $db->query("SELECT COUNT(*) FROM {$tablepre}house WHERE 1 $strWhere");
	$PageObj->pageRow = 10;
	$PageObj->recordNum = $db->result($query, 0);
	$query = $db->query("SELECT 
		h.*,p.province AS provincename, c.city AS cityname,a.area AS areaname
		FROM {$tablepre}house h
		LEFT JOIN {$tablepre}province p ON p.provinceID = h.province
		LEFT JOIN {$tablepre}city c ON c.cityID = h.city
		LEFT JOIN {$tablepre}area a ON a.areaID = h.area
		WHERE 1 $strWhere ORDER BY hid DESC LIMIT  ". ($PageObj->currPage-1)  * 10 .", 10");
	$house_list = array();
	while($row = $db->fetch_array($query)){
		$house_list[] = $row;
	}

}else{
	//分页
	require LYNO_ROOT.'./include/page.inc.php';
	$PageObj= new Page();
	$strWhere = 'AND bargain = 0 AND( regtype = 2 OR regtype = 4 OR regtype = 5 ) '.$assignstrWhere;
	$query = $db->query("SELECT COUNT(*) FROM {$tablepre}house WHERE 1 $strWhere");
	$PageObj->pageRow = 10;
	$PageObj->recordNum = $db->result($query, 0);
	//取值
	$query = $db->query("SELECT 
		h.*,p.province AS provincename, c.city AS cityname,a.area AS areaname
		FROM {$tablepre}house h
		LEFT JOIN {$tablepre}province p ON p.provinceID = h.province
		LEFT JOIN {$tablepre}city c ON c.cityID = h.city
		LEFT JOIN {$tablepre}area a ON a.areaID = h.area
		WHERE 1 $strWhere ORDER BY hid DESC LIMIT  ". ($PageObj->currPage-1)  * 10 .", 10");
	$house_list = array();
	while($row = $db->fetch_array($query)){
		$house_list[] = $row;
	}

}	
}elseif($item == 'add'){
	$flag=1;
	if($act == 'save'){
		$arr = daddslashes($_POST);
		@$arr[facility] = join(',',$arr[facility]);
		@$arr[familytype] = $arr[familytype_1].','.$arr[familytype_2].','.$arr[familytype_3].','.$arr[familytype_4].','.$arr[familytype_5];
		
		$arr[createuser] = $arr[operateuid] = $_DCOOKIE['uid'];
		$arr[createdate] = $arr[operatedate] = date('Y-m-d H-i-s');
		$arr[floor] = $arr[floor_1].'/'.$arr[floor_2];
		
		$arr[operatetype] = 4;//操作類型为审核
		$arr[assign] = $_DCOOKIE['admin_username'];//已經分配
		$arr[check] = 0;//審核狀態
		if($_DCOOKIE['adminid'] =='p1' )$arr[check] = 1;
		$arr[status] = 0;//上下架狀態
		$arr[isfirst] = 0;//首頁顯示
		$arr[isfirstchk] = 0;//首頁審核狀態
		$arr[bargain] = 0;//是否已經成交
		$arr[createusertype] = 1;
		$db->query("INSERT INTO {$tablepre}house
		( `hcode`, `createusertype`, `createuser`, `createdate`, `operateuid`, `operatetype`, `opercause`, `operatedate`, `assign`, `check`, `status`, `isfirst`, `isfirstchk`, `bargain`, `province`, `city`, `area`, `holderman`, `hdidnum`, `hdsex`, `hdtel`, `hdmobile`, `hdemail`, `hdaddress`, `linkman`, `lkidnum`, `lksex`, `Lktel`, `lkmobile`, `lkemail`, `lkaddress`, `hnumber`, `htype`, `familytype`, `floor`, `buildarea`, `builddate`, `direction`, `repair`, `facility`, `parkcost`, `managecost`, `regtype`, `price`, `deposit`, `paytype`, `description`)
		VALUES
		( '$arr[hcode]', '$arr[createusertype]', '$arr[createuser]', '$arr[createdate]', '$arr[operateuid]', '$arr[operatetype]', '$arr[opercause]', '$arr[operatedate]', '$arr[assign]', '$arr[check]', '$arr[status]', '$arr[isfirst]', '$arr[isfirstchk]', '$arr[bargain]', '$arr[province]', '$arr[city]', '$arr[area]', '$arr[holderman]', '$arr[hdidnum]', '$arr[hdsex]', '$arr[hdtel]', '$arr[hdmobile]', '$arr[hdemail]', '$arr[hdaddress]', '$arr[linkman]', '$arr[lkidnum]', '$arr[lksex]', '$arr[Lktel]', '$arr[lkmobile]', '$arr[lkemail]', '$arr[lkaddress]', '$arr[hnumber]', '$arr[htype]', '$arr[familytype]', '$arr[floor]', '$arr[buildarea]', '$arr[builddate]', '$arr[direction]', '$arr[repair]', '$arr[facility]', '$arr[parkcost]', '$arr[managecost]', '$arr[regtype]', '$arr[price]', '$arr[deposit]', '$arr[paytype]', '$arr[description]')");
		//有上传图档
		$hid = $arr[hid] = $db->insert_id();
		$uptypes=array('image/jpg','image/jpeg','image/pjpeg','image/gif'); 
		$FileObj = new UploadFile('housefile/');
		$commo='';
		$uploadfiles = array('pic1', 'pic2', 'pic3', 'pic4');
		foreach($uploadfiles as $key=>$value){
			$tmp_name = $_FILES[$value]['tmp_name'];
			if($tmp_name)
			{
				if(!in_array($_FILES[$value]['type'], $uptypes)){
					$Msg .= "您只能上传gif或jpg格式图档!";
				}else{
					if($FileName = $FileObj->Upload($_FILES[$value],'house'.$hid.$value)){
						$imagestring .= "{$commo} `$value`='$FileName'";
						$commo=',';
					}
				}
			}
		}
		if($imagestring){$imagestring = ', '.$imagestring;}
		$arr[hcode] = $Y_CATCH[houseRegTypeCode][$arr[regtype]].str_pad($arr[hid],8,'0',STR_PAD_LEFT );
		$sql = "UPDATE {$tablepre}house SET	`hcode`='$arr[hcode]' $imagestring WHERE hid=$hid ";
		$db->query($sql);
		$Msg = $Msg?$Msg:'资料送出成功!';
		gopage($Msg, 'admin.php?action=house&channel='.$channel);
	}
}elseif($item == 'edit'){
	if($act == 'save'){
		$arr = daddslashes($_POST);
		@$arr[facility] = join(',',$arr[facility]);
		$arr[floor] = $arr[floor_1].'/'.$arr[floor_2];
		@$arr[familytype] = $arr[familytype_1].','.$arr[familytype_2].','.$arr[familytype_3].','.$arr[familytype_4].','.$arr[familytype_5];
		$imagestring = '';
		//有上传图档
		$hid = $arr[hid]?$arr[hid]:$db->insert_id();
		$uptypes=array('image/jpg','image/jpeg','image/pjpeg','image/gif'); 
		$FileObj = new UploadFile('housefile/');
		$commo='';
		$uploadfiles = array('pic1', 'pic2', 'pic3', 'pic4');
		foreach($uploadfiles as $key=>$value){
			$tmp_name = $_FILES[$value]['tmp_name'];
			$arr[$value] = '';
			if($tmp_name)
			{
				if(!in_array($_FILES[$value]['type'], $uptypes)){
					$Msg .= "您只能上传gif或jpg格式图档!";
				}else{
					if($FileName = $FileObj->Upload($_FILES[$value],'house'.$hid.$value)){
						$imagestring .= "{$commo} `$value`='$FileName'";
						$arr[$value] = $FileName;
						$commo=',';
					}
				}
			}
		}
		$editfield = array('province', 'city', 'area', 'holderman', 'hdidnum', 'hdsex', 'hdtel', 'hdmobile', 'hdemail', 'hdaddress', 'linkman', 'lkidnum', 'lksex', 'Lktel', 'lkmobile', 'lkemail', 'lkaddress', 'hnumber', 'htype', 'familytype', 'floor', 'buildarea', 'builddate', 'direction', 'repair', 'facility', 'parkcost', 'managecost', 'regtype', 'price', 'deposit', 'paytype', 'description');
		$editpicfield =array('pic1', 'pic2', 'pic3', 'pic4');
		$query = $db->query("SELECT * FROM {$tablepre}house WHERE hid='$arr[hid]'");
		$house = $db->fetch_array($query);
		$changed = false;
		$changecontent = '';
		foreach($editfield as $value){
			if($house[$value] != $arr[$value])$changed = true;
		}
		if($imagestring){
			$changed = true;
			$imagestring = ', '.$imagestring; 
		}
		if($changed == true){
		//房屋的资料有更新则写入追踪表
			$sql = "INSERT INTO {$tablepre}housetrace SET
				`hid`='$house[hid]', `hcode`='$house[hcode]',  `province`='$house[province]', `city`='$house[city]', `area`='$house[area]', `holderman`='$house[holderman]', `hdidnum`='$house[hdidnum]', `hdsex`='$house[hdsex]', `hdtel`='$house[hdtel]', `hdmobile`='$house[hdmobile]', `hdemail`='$house[hdemail]', `hdaddress`='$house[hdaddress]', `linkman`='$house[linkman]', `lkidnum`='$house[lkidnum]', `lksex`='$house[lksex]', `Lktel`='$house[Lktel]', `lkmobile`='$house[lkmobile]', `lkemail`='$house[lkemail]', `lkaddress`='$house[lkaddress]', `hnumber`='$house[hnumber]', `htype`='$house[htype]', `familytype`='$house[familytype]', `floor`='$house[floor]', `buildarea`='$house[buildarea]', `builddate`='$house[builddate]', `direction`='$house[direction]', `repair`='$house[repair]', `facility`='$house[facility]', `parkcost`='$house[parkcost]', `managecost`='$house[managecost]', `regtype`='$house[regtype]', `price`='$house[price]', `deposit`='$house[deposit]', `paytype`='$house[paytype]', `description`='$house[description]', `pic1`='$house[pic1]', `pic2`='$house[pic2]', `pic3`='$house[pic3]', `pic4`='$house[pic4]'  ";
			$db->query($sql);
		}
		$arr[operateuid] = $_DCOOKIE['uid'];
		$arr[operatetype] = 1;
		$arr[operatedate] = date('Y-m-d H-i-s');
		
		$sql = "UPDATE {$tablepre}house SET
				 `operateuid`='$arr[operateuid]', `operatetype`='$arr[operatetype]', `opercause`='$arr[opercause]', `operatedate`='$arr[operatedate]', `operatetype`='$arr[operatetype]', `province`='$arr[province]', `city`='$arr[city]', `area`='$arr[area]', `holderman`='$arr[holderman]', `hdidnum`='$arr[hdidnum]', `hdsex`='$arr[hdsex]', `hdtel`='$arr[hdtel]', `hdmobile`='$arr[hdmobile]', `hdemail`='$arr[hdemail]', `hdaddress`='$arr[hdaddress]', `linkman`='$arr[linkman]', `lkidnum`='$arr[lkidnum]', `lksex`='$arr[lksex]', `Lktel`='$arr[Lktel]', `lkmobile`='$arr[lkmobile]', `lkemail`='$arr[lkemail]', `lkaddress`='$arr[lkaddress]', `hnumber`='$arr[hnumber]', `htype`='$arr[htype]', `familytype`='$arr[familytype]', `floor`='$arr[floor]', `buildarea`='$arr[buildarea]', `builddate`='$arr[builddate]', `direction`='$arr[direction]', `repair`='$arr[repair]', `facility`='$arr[facility]', `parkcost`='$arr[parkcost]', `managecost`='$arr[managecost]', `regtype`='$arr[regtype]', `price`='$arr[price]', `deposit`='$arr[deposit]', `paytype`='$arr[paytype]', `description`='$arr[description]' $imagestring
				WHERE hid='$arr[hid]'";
		$db->query($sql);		
		$Msg = $Msg?$Msg:'资料送出成功!';
		gopage($Msg, 'admin.php?action=house&channel='.$channel);
	}else{
		$flag=2;
		$query = $db->query("SELECT * FROM {$tablepre}house WHERE hid= $hid");
		$house = array();
		if($row = $db->fetch_array($query)){
			$house = $row;
		}
		
		$city = array();
		$query = $db->query("SELECT * FROM {$tablepre}city WHERE father = '$house[province]' ORDER BY `id` ASC");
		while($row = $db->fetch_array($query)){
			$city[$row[cityID]] = $row[city];
		}
		$area = array();
		$query = $db->query("SELECT * FROM {$tablepre}area  WHERE father = '$house[city]' ORDER BY `id` ASC");
		while($row = $db->fetch_array($query)){
			$area[$row[areaID]] = $row[area];
		}
	}
}elseif($item == 'check'){
	$arr = daddslashes($_GET);
	$arr[operateuid] = $_DCOOKIE['uid'];
	$arr[operatetype] = 4;
	$arr[operatedate] = date('Y-m-d H-i-s');
	$sql = "UPDATE {$tablepre}house SET
			`operateuid`='$arr[operateuid]', `operatetype`='$arr[operatetype]', `operatedate`='$arr[operatedate]', `check`='1'
			WHERE hid='$arr[hid]'";
	$db->query($sql);		
	$Msg = '审核通过！';
	gopage($Msg, 'admin.php?action=house&channel='.$channel);
}elseif($item == 'isfirst'){
	$arr = daddslashes($_GET);
	$arr[operateuid] = $_DCOOKIE['uid'];
	$arr[operatetype] = 3;
	$arr[isfirstchk] = 0;
	$msg = '您已申请首页显示，等待管理者审核';
	if($_DCOOKIE['adminid'] == 'p1'){
		$arr[operatetype] = 4;
		$arr[isfirstchk] = 1;
		$msg = '您已成功设置为首页显示';
	}
	$arr[operatedate] = date('Y-m-d H-i-s');
	$sql = "UPDATE {$tablepre}house SET
			`operateuid`='$arr[operateuid]', `operatetype`='$arr[operatetype]', `operatedate`='$arr[operatedate]', `isfirst`='1', `isfirstchk`='$arr[isfirstchk]'
			WHERE hid='$arr[hid]'";
	$db->query($sql);		
	$Msg = $msg.'！';
	gopage($Msg, 'admin.php?action=house&channel='.$channel);
}elseif($item == 'isfirstchk'){
	$arr = daddslashes($_GET);
	$arr[operateuid] = $_DCOOKIE['uid'];
	$arr[operatetype] = 4;
	$sqlstring = '';
	if($arr[isfirstchk] == '0'){
		$sqlstring = ", `isfirst`='0' ";
		$msg = '您已取消首页显示';
	}else{
		$sqlstring = ", `isfirstchk`='1' ";
		$msg = '您已设置为首页显示';
	}

	$arr[operatedate] = date('Y-m-d H-i-s');
	$sql = "UPDATE {$tablepre}house SET
			`operateuid`='$arr[operateuid]', `operatetype`='$arr[operatetype]', `operatedate`='$arr[operatedate]' $sqlstring
			WHERE hid='$arr[hid]'";
	$db->query($sql);		
	$Msg = $msg.'！';
	gopage($Msg, 'admin.php?action=house&channel='.$channel);
}elseif($item == 'operatetype'){
	$arr = daddslashes($_GET);
	$arr[operateuid] = $_DCOOKIE['uid'];
	$arr[operatetype] = 4;
	$arr[operatedate] = date('Y-m-d H-i-s');
	$sql = "UPDATE {$tablepre}house SET
			`operateuid`='$arr[operateuid]', `operatetype`='$arr[operatetype]', `operatedate`='$arr[operatedate]'
			WHERE hid='$arr[hid]'";
	$db->query($sql);		
	$Msg = $msg.'审核成功！';
	gopage($Msg, 'admin.php?action=house&channel='.$channel);
}elseif($item == 'bargain'){
	$arr = daddslashes($_GET);
	$arr[operateuid] = $_DCOOKIE['uid'];
	$arr[operatetype] = 4;
	$arr[operatedate] = date('Y-m-d H-i-s');
	$sql = "UPDATE {$tablepre}house SET
			`operateuid`='$arr[operateuid]', `operatetype`='$arr[operatetype]', `operatedate`='$arr[operatedate]' , `bargain`='1'
			WHERE hid='$arr[hid]'";
	$db->query($sql);		
	$Msg = '您已设置为成功状态！';
	gopage($Msg, 'admin.php?action=house&channel='.$channel);
}elseif($item == 'confirm'){
	if($act == 'save'){
		$arr = daddslashes($_POST);
		$arr[operateuid] = $_DCOOKIE['uid'];
		//, 
		$arr[operatetype] = 4;
		$arr[operatedate] = date('Y-m-d H-i-s');
		$sql = "UPDATE {$tablepre}house SET
				`operateuid`='$arr[operateuid]', `operatetype`='$arr[operatetype]',  `operatedate`='$arr[operatedate]'
				WHERE hid='$arr[hid]'";
		$db->query($sql);		
		$Msg = '您已审核通过，等待管理者审核！';
		gopage($Msg, 'admin.php?action=house&channel='.$channel);
	}else{
		$flag=2;
		$query = $db->query("SELECT 
		h.*,p.province AS provincename, c.city AS cityname,a.area AS areaname
		FROM {$tablepre}house h
		LEFT JOIN {$tablepre}province p ON p.provinceID = h.province
		LEFT JOIN {$tablepre}city c ON c.cityID = h.city
		LEFT JOIN {$tablepre}area a ON a.areaID = h.area
		WHERE hid= $hid");
		$house = array();
		if($row = $db->fetch_array($query)){
			$house = $row;
		}
	}
}elseif($item == 'change'){
	if($act == 'save'){
		$arr = daddslashes($_POST);
		$arr[operateuid] = $_DCOOKIE['uid'];
		//, 
		$arr[operatetype] = 1;
		$arr[operatedate] = date('Y-m-d H-i-s');
		$sql = "UPDATE {$tablepre}house SET
				 `operateuid`='$arr[operateuid]', `operatetype`='$arr[operatetype]', `opercause`='$arr[opercause]', `operatedate`='$arr[operatedate]', `assign`='$arr[assign]', `check`='$arr[check]', `status`='$arr[status]', `isfirst`='$arr[isfirst]', `isfirstchk`='$arr[isfirstchk]', `bargain`='$arr[bargain]'
				WHERE hid='$arr[hid]'";
		$db->query($sql);		
		$Msg = $Msg?$Msg:'资料送出成功!';
		gopage($Msg, 'admin.php?action=house&channel='.$channel);
	}else{
		$flag=2;
		$query = $db->query("SELECT * FROM {$tablepre}house WHERE hid= $hid");
		$house = array();
		if($row = $db->fetch_array($query)){
			$house = $row;
		}
	}
}elseif($item == 'del'){
	$query = $db->query("SELECT pic1, pic2, pic3, pic4 FROM {$tablepre}house WHERE hid= $hid");
		if($row = $db->fetch_array($query)){
			foreach($row as $val){
				if($val){@unlink("housefile/$val");}		
			}
		}
		
	$db->query("DELETE FROM {$tablepre}house WHERE hid='$hid'");
	//gopage('数据删除成功!', 'admin.php?action=house');
	$Result	= 1;
	$ErrMsg = "成功删除数据";			
	echo '|'.$Result.'|'.$ErrMsg;
	exit();	
}elseif($item == 'delone'){
	$result	= 0;
	$errmsg = "删除数据失败！";
	if($field){
		$query = $db->query("SELECT `$field` FROM {$tablepre}house WHERE hid='$hid'");
		if($row = $db->fetch_array($query)){
			@unlink('house/'.$row[$field]);
			$db->query("UPDATE {$tablepre}house SET $field = '' WHERE hid='$hid'");		
			$result	= 1;
			$errmsg = "成功删除数据！";	
		}
	}
	echo '|'.$result.'|'.$errmsg;
	exit();
}

?>