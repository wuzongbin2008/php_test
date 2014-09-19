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
?>
<head>
	<title>Tree Class</title>
	<!-- Ajax class -->
	<script type="text/javascript" src="javascript/ajax.js"></script>
	<!-- Javascript class -->
	<script type="text/javascript" src="javascript/tree.js"></script>
	<!-- Style sheet -->
	<link rel="stylesheet" type="text/css" href="style/tree.css" media="screen" />
</head>
<body>
	<?
	$tree=new Tree($_GET["id"]);    // or $_POST["id"] numeric value of the root folder/category/directory to create the tree
	$tree->display();
	?>
</body>
</html>