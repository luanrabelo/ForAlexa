<?php
session_start();
if(isset($_POST['Assistance'])){
	if($_POST['Assistance'] == "YES"){
		$_SESSION["Tips"] = "YES";
		echo(666);
	} if($_POST['Assistance'] == "NO"){
		$_SESSION["Tips"] = "NO";
		echo(33);
	}
}
?>