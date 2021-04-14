<meta charset="UTF-8">

<?php
include("Connection.php");

function randString($size){
$basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$return= "";
for($count= 0; $size > $count; $count++){
$return.= $basic[rand(0, strlen($basic) - 1)];
}
return $return;
}


$FirstName 		= $_POST['FirstName'];
$LastName 		= $_POST['LastName'];
$Institution 	= $_POST['Institution'];
$Birthday 		= $_POST['Birthday'];
$Email	 		= $_POST['Email'];
$Password 		= hash('sha512', $_POST['Password']);
$Date			= date("Y-m-d");
$KeyUser		= randString(50);

$search 	= mysqli_query($mysqli, "SELECT * FROM User WHERE Email = '$Email' or KeyUser = '$KeyUser'");
$num_rows 	= mysqli_num_rows($search);
if(!$num_rows > 0){ 
	
$sqli	=	("INSERT INTO `User` (`FirstName`, `LastName`, `Institution`, `Birthday`, `Email`, `Password`, `DateCreation`, `KeyUser`) VALUES ('$FirstName', '$LastName', '$Institution', '$Birthday', '$Email', '$Password', '$Date', '$KeyUser')");
	
if(mysqli_query($mysqli, $sqli)){
?>

<div class="alert alert-success" role="alert">
<h4 class="alert-heading">Well done!</h4>
<p>The User <?php echo($Email);?> has been successfully registered!</p>
<hr>
<p class="mb-0">Redirecting to Login page, please wait ...</p>
</div>
<?php print("<META HTTP-EQUIV=REFRESH CONTENT= '5;URL=index.php'>"); ?>	
<?php								 
}else{
?>
<div class="alert alert-danger" role="alert">
<h4 class="alert-heading">Error</h4>
<p>Error to insert data</p>	
<hr>
<p class="mb-0">Redirecting to the registration page, please wait ...</p>
</div>
<?php print("<META HTTP-EQUIV=REFRESH CONTENT= '5;URL=index.php?p=NewUser'>"); 
}
?>	

<?php	
}else{
?>	
<div class="alert alert-danger" role="alert">
<h4 class="alert-heading">Data Error</h4>
<p>The User <?php echo($Email);?> is already registered in ForAlexa.</p>	
<hr>
<p class="mb-0">Redirecting to Forget Password page, please wait ...</p>
</div>
<?php print("<META HTTP-EQUIV=REFRESH CONTENT= '5;URL=index.php?p=ForgetPassword'>"); 
}		
?>

