<?php
if(empty($_FILES["file"]["tmp_name"]) || $_FILES["file"]["tmp_name"] == "none"){
   $msg="file size Limit to ".ini_get("post_max_size").". Cannot process your request";
}
else{
   $msg= " File Name: " . $_FILES["file"]["name"] . ", ";
   $msg.= " File Size: " . @filesize($_FILES["file"]["tmp_name"]);
   unlink($_FILES["file"]["tmp_name"]);
}

$arr["message"]=$msg;

echo json_encode($arr);
?>