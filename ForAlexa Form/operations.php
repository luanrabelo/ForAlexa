<?php
$action 	= $_GET["action"];

if ($action == "Delete") {
$key      	= $_GET["key"];
$id			= $_GET["id"];	
	
$sqli	=	("DELETE FROM `Questions` WHERE `id_question` = '$id' and `key_user` = '$key'");
$querry = mysqli_query($mysqli, $sqli) or die ("<META HTTP-EQUIV=REFRESH CONTENT= '0;URL=index.php?p=StepTree&key=$key'>
	<script type \"text/JavaScript\">
	alert(\"Error\");
	</script>");
	print "<META HTTP-EQUIV=REFRESH CONTENT= '0;URL=index.php?p=StepTree&key=$key'>
	<script type \"text/JavaScript\">
	alert(\"Intent Deleted!\");
	</script>";}

if ($action == "DeleteRandom") {
$key      	= $_GET["key"];
$id			= $_GET["id"];	
	
$sqli	=	("DELETE FROM `RandomQuotes` WHERE `id_quotes` = '$id' and `key_user` = '$key'");
$querry = mysqli_query($mysqli, $sqli) or die ("<META HTTP-EQUIV=REFRESH CONTENT= '0;URL=index.php?p=StepTree&key=$key'>
	<script type \"text/JavaScript\">
	alert(\"Error\");
	</script>");
	print "<META HTTP-EQUIV=REFRESH CONTENT= '0;URL=index.php?p=StepTree&key=$key'>
	<script type \"text/JavaScript\">
	alert(\"Intent Deleted!\");
	</script>";}
?>