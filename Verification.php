<?php
include("Connection.php");
if(isset($_POST['KeyUser'])){
if($_POST['KeyUser'] <> ""){


$KeyUser 		= $_POST['KeyUser'];
$idRepository 	= $_POST['idRepository'];;

$search 	= mysqli_query($mysqli, "SELECT * FROM Questions WHERE KeyUser = '$KeyUser' AND idRepository = '$idRepository' AND (IntentName = 'LaunchRequest' or IntentName = 'HelpIntent' or IntentName = 'CancelAndStopIntent' or IntentName = 'FallbackIntent' or IntentName = 'IntentReflector' or IntentName = 'Error' or IntentName = 'HelloWorldIntent' or IntentName = 'AMAZON.YesIntent' or IntentName = 'AMAZON.NoIntent')");
$num_rows 	= mysqli_num_rows($search);
if($num_rows < 9){ 

// LaunchRequest
$search 	= mysqli_query($mysqli, "SELECT * FROM Questions WHERE IntentName = 'LaunchRequest' AND KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$num_rows 	= mysqli_num_rows($search);
if(!$num_rows > 0){
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `KeyUser`, `idRepository`) VALUES ('LaunchRequest', 'Welcome, you can say Hello or Help. Which would you like to try', '$KeyUser', '$idRepository')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(1);
}
	
// HelpIntent	
$search 	= mysqli_query($mysqli, "SELECT * FROM Questions WHERE IntentName = 'HelpIntent' AND KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$num_rows 	= mysqli_num_rows($search);
if(!$num_rows > 0){
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `KeyUser`, `idRepository`) VALUES ('HelpIntent', 'You can say hello to me! How can I help?', '$KeyUser', '$idRepository')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(1);
}	

// CancelAndStopIntent	
$search 	= mysqli_query($mysqli, "SELECT * FROM Questions WHERE IntentName = 'CancelAndStopIntent' AND KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$num_rows 	= mysqli_num_rows($search);
if(!$num_rows > 0){
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `KeyUser`, `idRepository`) VALUES ('CancelAndStopIntent', 'So long and thanks for all the fish', '$KeyUser', '$idRepository')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(1);
}	
	
// FallbackIntent	
$search 	= mysqli_query($mysqli, "SELECT * FROM Questions WHERE IntentName = 'FallbackIntent' AND KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$num_rows 	= mysqli_num_rows($search);
if(!$num_rows > 0){
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `KeyUser`, `idRepository`) VALUES ('FallbackIntent', 'Sorry, I dont know about that. Please try again.', '$KeyUser', '$idRepository')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(1);
}
	
// IntentReflector	
$search 	= mysqli_query($mysqli, "SELECT * FROM Questions WHERE IntentName = 'IntentReflector' AND KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$num_rows 	= mysqli_num_rows($search);
if(!$num_rows > 0){
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `KeyUser`, `idRepository`) VALUES ('IntentReflector', 'You just triggered', '$KeyUser', '$idRepository')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(1);
}

// Error	
$search 	= mysqli_query($mysqli, "SELECT * FROM Questions WHERE IntentName = 'Error' AND KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$num_rows 	= mysqli_num_rows($search);
if(!$num_rows > 0){
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `KeyUser`, `idRepository`) VALUES ('Error', 'Sorry, I had trouble doing what you asked. Please try again.', '$KeyUser', '$idRepository')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(1);
}	

// HelloWorldIntent	
$search 	= mysqli_query($mysqli, "SELECT * FROM Questions WHERE IntentName = 'HelloWorldIntent' AND KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$num_rows 	= mysqli_num_rows($search);
if(!$num_rows > 0){
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `question_1`, `answer`, `KeyUser`, `idRepository`) VALUES ('HelloWorldIntent', 'hello word', 'Welcome, you can say Hello or Help. Which would you like to try', '$KeyUser', '$idRepository')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(1);
}
	
// AMAZON.YesIntent	
$search 	= mysqli_query($mysqli, "SELECT * FROM Questions WHERE IntentName = 'AMAZON.YesIntent' AND KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$num_rows 	= mysqli_num_rows($search);
if(!$num_rows > 0){
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `KeyUser`, `idRepository`) VALUES ('AMAZON.YesIntent', 'Customize Yes Intent', '$KeyUser', '$idRepository')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(1);
}

// AMAZON.NoIntent	
$search 	= mysqli_query($mysqli, "SELECT * FROM Questions WHERE IntentName = 'AMAZON.NoIntent' AND KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$num_rows 	= mysqli_num_rows($search);
if(!$num_rows > 0){
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `KeyUser`, `idRepository`) VALUES ('AMAZON.NoIntent', 'Customize No Intent', '$KeyUser', '$idRepository')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(1);
}	
echo 1;		
}else{
echo 1;	
}}else{
echo 0;	
}
}else{
echo 0;		
}
?>