<?php
$action 	= $_GET["Action"];

if ($action == "Delete") {
$KeyUser      	= $_GET["KeyUser"];
$id				= $_GET["id"];	
$idRepository   = $_GET["idRepository"];
	
$sqli	=	("DELETE FROM `Questions` WHERE `id_question` = '$id' and `KeyUser` = '$KeyUser' and idRepository = '$idRepository'");
$querry = mysqli_query($mysqli, $sqli) or die ("<META HTTP-EQUIV=REFRESH CONTENT= '0;URL=index.php?p=IntentList&idRepository=$idRepository&KeyUser=$KeyUser'>
	<script type \"text/JavaScript\">
	alert(\"Error\");
	</script>");
	print "<META HTTP-EQUIV=REFRESH CONTENT= '0;URL=index.php?p=IntentList&idRepository=$idRepository&KeyUser=$KeyUser'>
	<script type \"text/JavaScript\">
	alert(\"Intent Deleted!\");
	</script>";}

if ($action == "DeleteRandom") {
$KeyUser      	= $_GET["KeyUser"];
$id				= $_GET["id"];	
$idRepository   = $_GET["idRepository"];
	
$sqli	= ("DELETE FROM `RandomQuotes` WHERE `id_quotes` = '$id' and `KeyUser` = '$KeyUser' and idRepository = '$idRepository'");
$querry = mysqli_query($mysqli, $sqli) or die ("<META HTTP-EQUIV=REFRESH CONTENT= '0;URL=index.php?p=IntentList&idRepository=$idRepository&KeyUser=$KeyUser'>
	<script type \"text/JavaScript\">
	alert(\"Error\");
	</script>");
	print "<META HTTP-EQUIV=REFRESH CONTENT= '0;URL=index.php?p=IntentList&idRepository=$idRepository&KeyUser=$KeyUser'>
	<script type \"text/JavaScript\">
	alert(\"Intent Deleted!\");
	</script>";}
?>