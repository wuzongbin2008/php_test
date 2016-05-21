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

	public function display(){
		printf("Boy.sex: %s\n", $this->sex);
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

printf("\nclass name: %s\n", $class->getName());
printf("constant: %s\n", var_export($class->getConstant("v"), true));
//printf("properties: %s\n", var_export(), true));

$props = $class->getProperties();
foreach ($props as $k => $prop) {
	printf("property(%d): %s\n", $k, $prop->getName());
}