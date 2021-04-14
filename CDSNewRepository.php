<meta charset="UTF-8">

<?php
$Action = $_GET["Action"];

if($Action == "CDS"){

$RepositoryName 		= $_POST['RepositoryName'];
$Description 			= $_POST['Description'];
$Date					= date("Y-m-d");
$KeyUser				= $_SESSION['KeyUser'];

$search 	= mysqli_query($mysqli, "SELECT * FROM Repository WHERE KeyUser = '$KeyUser'");
$num_rows 	= mysqli_num_rows($search);
if($num_rows < 5){ 
	
$sqli	=	("INSERT INTO `Repository` (`RepositoryName`, `Description`, `DateCreation`, `KeyUser`) VALUES ('$RepositoryName', '$Description', '$Date', '$KeyUser')");
	
if(mysqli_query($mysqli, $sqli)){
?>

<div class="alert alert-success mt-5" role="alert">
<h4 class="alert-heading"><?php echo($RC);?></h4>
<p><?php echo($TR." ".$RepositoryName." ".$SC);?></p>
<hr>
<p class="mb-0"><?php echo($RR);?></p>
</div>
<?php print("<META HTTP-EQUIV=REFRESH CONTENT= '5;URL=index.php'>"); ?>	
<?php								 
}else{
?>
<div class="alert alert-danger mt-5" role="alert">
<h4 class="alert-heading">Error</h4>
<p>Error to insert data</p>	
<hr>
<p class="mb-0">Redirecting to the repositories page, please wait...</p>
</div>
<?php print("<META HTTP-EQUIV=REFRESH CONTENT= '5;URL=index.php'>"); 
}
?>	

<?php	
}else{
?>	
<div class="alert alert-danger mt-5" role="alert">
<h4 class="alert-heading">Limit of Repositories</h4>
<p>You have reached the limit <b>5</b> registered repositories</p>	
<hr>
<p class="mb-0">Redirecting to the repositories page, please wait...</p>
</div>
<?php print("<META HTTP-EQUIV=REFRESH CONTENT= '5;URL=index.php'>"); 
}}	
?>
<?php
if($Action == "Update"){
$idRepository 	= $_GET["idRepository"];
$KeyUser		= $_GET["KeyUser"];
$RepositoryName = $_POST["RepositoryName"];
$Description 	= $_POST["Description"];
	
$sqli			= ("UPDATE `Repository` SET `RepositoryName` = '$RepositoryName',`Description` = '$Description' WHERE `idRepository` = '$idRepository' and `KeyUser` = '$KeyUser'");	
if(mysqli_query($mysqli, $sqli)){
?>
<div class="alert alert-success mt-5" role="alert">
<h4 class="alert-heading">Repository Update</h4>
<p>The Repository <?php echo($RepositoryName);?> has been successfully updated!</p>
<hr>
<p class="mb-0">Redirecting to the repositories page, please wait...</p>
</div>
<?php print("<META HTTP-EQUIV=REFRESH CONTENT= '5;URL=index.php'>"); ?>	
<?php } else { ?>
<div class="alert alert-danger mt-5" role="alert">
<h4 class="alert-heading">Error updating the repository</h4>
<p>An error occurred while updating, please try again</p>	
<hr>
<p class="mb-0">Redirecting to the edit page, please wait...</p>
</div>
<?php print("<META HTTP-EQUIV=REFRESH CONTENT= '5;URL=index.php?p=NewRepository&Action=Update&idRepository=$idRepository&KeyUser=$KeyUser'>"); 
}}

?>
<?php
if($Action == "Delete"){
$idRepository 		= $_GET["idRepository"];
$KeyUser			= $_GET["KeyUser"];	
$sqli				= ("DELETE FROM `Repository` WHERE idRepository = '$idRepository' and KeyUser = '$KeyUser'");
$sqliQ				= ("DELETE FROM `Questions` WHERE idRepository = '$idRepository' and KeyUser = '$KeyUser'");
$sqliR				= ("DELETE FROM `RandomQuotes` WHERE idRepository = '$idRepository' and KeyUser = '$KeyUser'");	
if((mysqli_query($mysqli, $sqli)) and (mysqli_query($mysqli, $sqliQ)) and (mysqli_query($mysqli, $sqliR))){
?>	
<div class="alert alert-success mt-5" role="alert">
<h4 class="alert-heading">Repository and Content Deleted</h4>
<p>The Repository <?php echo($RepositoryName);?> has been successfully deleted!</p>
<hr>
<p class="mb-0">Redirecting to the Repositories page, please wait...</p>
</div>
<?php print("<META HTTP-EQUIV=REFRESH CONTENT= '5;URL=index.php'>"); ?>		
<?php
}
else{
?>
<div class="alert alert-danger mt-5" role="alert">
<h4 class="alert-heading">Error to Delete</h4>
<p>Error deleting the Repository, try again later.</p>	
<hr>
<p class="mb-0">Redirecting to the Repositories page, please wait...</p>
</div>
<?php print("<META HTTP-EQUIV=REFRESH CONTENT= '5;URL=index.php'>"); 
}
}?>
