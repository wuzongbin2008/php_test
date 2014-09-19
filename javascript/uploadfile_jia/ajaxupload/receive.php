<?php
if($_FILES['myfile'])
{
  $up=new UploadFile("uploadfile/");	
  $img_name=$up->Upload($_FILES['myfile']);
  header('Content-Type','text/plain');
  echo $img_name;
  exit;
}

if($_POST['action']=='ajax' && $_POST['imgName'])
{
	header('Content-Type','text/plain');
	echo unlink("uploadfile/$_POST[imgName]");
	exit;
}
			   
			   
class UploadFile{
	var $file_link	= UPLOAD_DIR;
	var $file_add	= UPLOAD_DIR;
	var $file_err;//error message
	
	function UploadFile($dir)
	{
		$this->file_add = $dir;
	}
	
	function Upload($userfile="",$file_name_f="")
	{
		$file = $userfile; 
		$uptypes=array(
		'image/jpg',  //
		'image/jpeg', 
		'image/png', 
		'image/pjpeg', 
		'image/gif', 
		'image/bmp', 
		'image/x-png'
		); 
		if (!file_exists($this->file_add)){
			$f = mkdir($this->file_add);
			if (!$f){
				$this->file_err="cant create dir";
				return;
			}
		}
		if (!is_uploaded_file ( $file["tmp_name"] ) ){
			$this->file_err="file is not existes";
			return;
		} 
		$file_name	= $file_name_f
						? $file_name_f.strrchr($file["name"],'.')
						: time().strrchr($file["name"],'.');
		$target		= $this->file_add.$file_name;
		$f 			= move_uploaded_file ($file["tmp_name"],$target);
		if ( $f ){
			return $file_name;
		}else
		{
			$this->file_err = "faile";
			return;
		}
	}
	
	function DeleteFile($file_name){
		return @ unlink($this->file_add.$file_name);
	}
}
?>