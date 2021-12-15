<?php
include("Connection.php");
$Login			=	$_POST['Login'];
$Password 		= 	hash('sha512', $_POST['Passs']);


//Consulta no banco de dados
$sql			= ("SELECT * FROM `User` WHERE Email = '".$Login."' and Password = '".$Password."'"); 
$resultados 	= mysqli_query($mysqli, $sql) or die (mysql_error());	
$res			= mysqli_fetch_array($resultados); 

if (mysqli_num_rows($resultados) == 0) {
sleep(2);
echo 0;

} else {	
session_start();	
$_SESSION['id']				= $res['id_user']; 		
$_SESSION['FirstName']		= $res['FirstName'];
$_SESSION['LastName']		= $res['LastName'];	
$_SESSION['Email']			= $res['Email'];	
$_SESSION['Birthday']		= $res['Birthday'];	
$_SESSION['KeyUser']		= $res['KeyUser'];
$_SESSION['Tips']			= $_POST['Assistance'];

session_write_close();
	
	
sleep(2);	
echo 1;
exit;	
} 			
?>