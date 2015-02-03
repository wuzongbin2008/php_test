<?php
/**
 * Created by PhpStorm.
 * User: wj
 * Date: 15-2-3
 * Time: ÏÂÎç5:08
 */

class Person {
	protected  $sex = "";
}

class Boy extends person{
	public $sex = "";

	public function __construct(){
		$this->sex = "boy";
	}
}

class Girl extends person{
	public $sex = "";

	public function __construct(){
		$this->sex = "girl";
	}
}


$b = new Boy();

$class = new \ReflectionClass($b);

echo "class name:".$class->getName();