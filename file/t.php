<?php
/**
 * Created by PhpStorm.
 * User: wj
 * Date: 15-2-12
 * Time: обнГ5:50
 */
error_reporting(-1);

var_dump(rename_t());


function rename_t()
{
	if (file_put_contents("1.txt", "r") === false )
	{
		print "open 1.txt\n";
		return false;
	}
	if (rename("2.txt", "22.txt") === false )
	{
		print "rename\n";
		return false;
	}
	exit;
}