<?
/*
Class: Tree Class
Developed by: Roberto Morales Olivares | roberto@formatodigital.com
Creation date: 2 / Septiembre / 2007
Funtion(es) realizada(s): Demo tree.
Comments: This class generate a dynamic tree ajax directory of items retrieved from MySQL dabatase tables.
*/
?>
<?
	include("classes/class.tree.php");

	$tree=new Tree($_POST["id"]);
	$tree->display();
?>