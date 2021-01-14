<?php
include("Connection.php");
$Email = $_POST["email"];
	
$search 	= mysqli_query($mysqli, "SELECT * FROM `User` WHERE user = '$Email'");
$num_rows 	= mysqli_num_rows($search);
if($num_rows > 0){ 
?>	
<div class="text-center text-white mt-5 mx-auto">
<div class="mt-3 mb-3"><h4><?php echo($Email);?></h4></div>
<div class="text-center">You have a database</div>
<div class="text-center">Loading, please wait...</div>	
<img src="img/loading.gif" width="35%" height="35%">
</div>
<?php
$result = $mysqli->query("SELECT * FROM `User` WHERE user = '$Email'");
while ($row = $result->fetch_assoc()) {
$key_user = $row["key_user"];
}
print '<meta http-equiv="refresh" content="4;url=index.php?p=StepTree&key='."$key_user".'"/>';	
}


if($num_rows <= 0){ 
?>
<div class="text-center text-white mt-5 mx-auto">
<div class="mt-3 mb-3"><h4><?php echo($Email);?></h4></div>
<div class="text-center">You don't have a database</div>
<div class="text-center">Creating a database, please wait...</div>	
<img src="img/loading.gif" width="25%" height="25%">
</div>
<?php
	
function randString($size){
$basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$return= "";
for($count= 0; $size > $count; $count++){
$return.= $basic[rand(0, strlen($basic) - 1)];
}
return $return;
}
$key_user	= randString(25);	
$now 		= date_create()->format('Y-m-d');	 	
$sqli		= ("INSERT INTO `User` (`user`, `date`, `key_user`) VALUES ('$Email', '$now', '$key_user')");	
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(2);
				   
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `key_user`) VALUES ('LaunchRequest', 'Welcome, you can say Hello or Help. Which would you like to try', '$key_user')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(2);	
				   
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `key_user`) VALUES ('HelpIntent', 'You can say hello to me! How can I help?', '$key_user')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(2);
				   
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `key_user`) VALUES ('CancelAndStopIntent', 'Goodbye!', '$key_user')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(2);
				   
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `key_user`) VALUES ('FallbackIntent', 'Sorry, I don\'t know about that. Please try again.', '$key_user')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(2);
				   
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `key_user`) VALUES ('IntentReflector', 'You just triggered', '$key_user')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(2);
				   
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `key_user`) VALUES ('Error', 'Sorry, I had trouble doing what you asked. Please try again.', '$key_user')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(2);
				   
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `question_1`, `answer`, `key_user`) VALUES ('HelloWorldIntent', 'hello word', 'Welcome, you can say Hello or Help. Which would you like to try', '$key_user')");	
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(2);
				   
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `key_user`) VALUES ('AMAZON.YesIntent', 'Yes?', '$key_user')");	
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(2);	
				   
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `answer`, `key_user`) VALUES ('AMAZON.NoIntent', 'No?', '$key_user')");	
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));		
sleep(2);
				   
print '<meta http-equiv="refresh" content="4;url=index.php?p=StepTree&key='."$key_user".'"/>';				   
}
?>