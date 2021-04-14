<?php
include("Connection.php");
$KeyUser 		= $_GET["KeyUser"];
$Password 		= hash('sha512', $_POST['Password']);

$Update = ("UPDATE `User` SET `Password` = '$Password' WHERE KeyUser = '$KeyUser'");

if(mysqli_query($mysqli, $Update)){
?>
<div class="alert alert-success" role="alert">
<h4 class="alert-heading"><?php echo($PasswordUpdate);?></h4>
<p><?php echo($PassMsg);?></p>
<hr>
<p class="mb-0"><?php echo($LoginPage);?></p>
</div>
<?php print("<META HTTP-EQUIV=REFRESH CONTENT= '5;URL=Login.php'>"); ?>
<?php
}else{
?>
<div class="alert alert-danger" role="alert">
<h4 class="alert-heading"><?php echo($PasswordNotUpdate);?></h4>
<p><?php echo($PasswordNotUpdate);?></p>
<hr>
<p class="mb-0"><?php echo($PassPage);?></p>
</div>
<?php print("<META HTTP-EQUIV=REFRESH CONTENT= '5;URL=Login.php?p=NewPassword&KeyUser=$KeyUser'>"); ?>
<?php
}
?>