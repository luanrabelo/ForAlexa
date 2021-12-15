<?php
$KeyUser = $_SESSION['KeyUser'];
?>

<?php
if($_SESSION["Tips"] == "YES"){
include("Tips.php");
include("Modal.php");
}
?>

<style>
.AttentionRepo{
animation: pulse 1.0s infinite;	
}
@keyframes pulse {
10% {
box-shadow: 0 0 0 0 blue;
}
80% {
box-shadow: 0 0 0 25px rgba(204, 169, 44, 0);
}	
100% {
box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
}
}
</style>

<div class="h2 text-white mb-5 mt-5">Hello <?php echo($_SESSION['FirstName']);?> <?php echo($_SESSION['LastName']);?></div>

<div class="card border-0 mb-5">
<?php
$search 	= mysqli_query($mysqli, "SELECT * FROM Repository WHERE KeyUser = '$KeyUser'");
$num_rows 	= mysqli_num_rows($search);	
?>	
<div class="card-header bg-dark text-white">You Have <b><?php echo($num_rows); ?></b> of <b>5</b> Repositories</div>	
<div class="card-body">
<div class="card-title h3"><?php echo($NewRepository);?></div>
<a data-toggle="tooltip" data-placement="top" title="Create a new Repository" href="index.php?p=NewRepository&Action=CDS" class="btn btn-dark btn-lg"><i class="fas fa-1x fa-plus"></i></a>
</div>
</div>	


<?php
if($num_rows == 0 and $_SESSION["Tips"] == "YES"){
?>
<!-- Primeiro Acesso  -->
<div class="modal fade" tabindex="-1" id="RepositoriesStart">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div style="line-height: 2.5;" class="modal-body text-center mt-2 h5">
<p class="text-center"><h5>Welcome to ForAlexa</h5></p>	
<p><?php echo($Repositories);?><br><a href="index.php?p=NewRepository&Action=CDS" class="btn btn-dark btn-lg Repo mt-3"><i class="fas fa-2x fa-plus"></i></a></p>	
</div>
<div class="modal-footer bg-dark"><button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button></div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
setTimeout(function(){
$('#RepositoriesStart').modal('show');
}, 2000);
setTimeout(function(){
$('#RepositoriesStart').modal('hide');
}, 25000);
});
</script>
<?php
}
if($num_rows == 1 and $_SESSION["Tips"] == "YES"){
?>
<!-- Já possuí um repositório criado  -->
<div class="modal fade" tabindex="-1" id="RepositoriesCreated">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div style="line-height: 2.5;" class="modal-body text-center mt-2 h5">Congratulations, you already have a repository registered in ForAlexa.<br>Remember that you can create as many as five repositories by clicking on the icon<br><a href="index.php?p=NewRepository&Action=CDS" class="btn btn-dark btn-lg Repo"><i class="fas fa-2x fa-plus"></i></a><br><i class="fas fa-2x fa-lightbulb mr-2"></i>Please note the expiry date of each repository.<br>Use <button class="btn btn-primary"><i class="fas fa-edit"></i></button> to update the information in your repository.<br>Use <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> to exclude the repository and its contents.<br><i class="fas fa-2x fa-lightbulb mr-2"></i>Remember that excluding a repository cannot be undone. Please use <button type="button" class="btn btn-success" ><i class="fas fa-external-link-alt"></i></button> to access a repository and begin creating your skill, then wait.</p>	
</div>
<div class="modal-footer bg-dark"><button type="button" class="btn btn-success btn-lg" data-dismiss="modal"><i class="fas fa-2x mr-2 fa-thumbs-up"></i>I understood</button></div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
setTimeout(function(){
$('#RepositoriesCreated').modal('show');
}, 2000);
setTimeout(function(){
$('html, body').animate({ scrollTop: 500  }, 1);
$('#RepositoriesCreated').modal('hide');
}, 25000);
});
</script>
<?php } 
if($num_rows == 2 and $_SESSION["Tips"] == "YES"){
?>
<script>
$(document).ready(function(){
setTimeout(function(){
$('#RepositoriesEnd').modal('show');
}, 2000);
setTimeout(function(){
$('#RepositoriesEnd').modal('hide');
}, 5000);
});
</script>
<?php } ?>


<div>
<div class="h3 text-white mt-2 mb-3">Repository</div>	
<?php
$query = "SELECT * FROM `Repository` WHERE KeyUser = '$KeyUser'";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()){	
?>		

<!-- Confirm Access  -->
<div class="modal fade" tabindex="-1" id="<?php echo("ConfirmAccess_".$row["idRepository"]);?>">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div class="modal-body text-center">
<div id="AccessMsg" class="h5 mt-5 mb-5">Would you like to access the Repository: <b><?php echo($row["RepositoryName"]);?></b></div>
<p>
	<button type="button" id="<?php echo("YES_".$row["idRepository"]);?>" class="btn btn-success btn-lg mt-3 w-25"><i class="fas fa-2x fa-thumbs-up mr-2"></i>YES</button>
	<button type="button" id="<?php echo("NO_".$row["idRepository"]);?>"  class="btn btn-danger btn-lg mt-3 w-25" data-dismiss="modal"><i class="fas fa-2x fa-times-circle mr-2"></i>NO</button>
</p>
</div>
</div>
</div>
</div>	
	
<!-- Confirm Edit  -->
<div class="modal fade" tabindex="-1" id="<?php echo("ConfirmEdit_".$row["idRepository"]);?>">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div class="modal-body text-center">
<div id="AccessMsg" class="h5 mt-5 mb-5">Would you like to edit the Repository: <b><?php echo($row["RepositoryName"]);?></b></div>
<p>
	<button type="button" id="<?php echo("eYES_".$row["idRepository"]);?>" class="btn btn-success btn-lg mt-3 w-25"><i class="fas fa-2x fa-thumbs-up mr-2"></i>YES</button>
	<button type="button" id="<?php echo("eNO_".$row["idRepository"]);?>"  class="btn btn-danger btn-lg mt-3 w-25" data-dismiss="modal"><i class="fas fa-2x fa-times-circle mr-2"></i>NO</button>
</p>
</div>
</div>
</div>
</div>	
	
	
<!-- Confirm Delete  -->
<div class="modal fade" tabindex="-1" id="<?php echo("ConfirmDel_".$row["idRepository"]);?>">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div class="modal-body text-center">
<div id="AccessMsg" class="h5 mt-5 mb-5">Would you like to exclude the Repository: <b><?php echo($row["RepositoryName"]);?></b></div>
<p>
	<div id="del" class="alert alert-danger text-center h5 mt-5 mb-5" role="alert"><i style="color: black;" class="fas fa-2x mr-2 fa-exclamation"></i>Excluding a repository cannot be undone.</div>
	<button type="button" id="<?php echo("dYES_".$row["idRepository"]);?>" class="btn btn-success btn-lg mt-3 w-25"><i class="fas fa-2x fa-thumbs-up mr-2"></i>YES</button>
	<button type="button" id="<?php echo("dNO_".$row["idRepository"]);?>"  class="btn btn-danger btn-lg mt-3 w-25" data-dismiss="modal"><i class="fas fa-2x fa-times-circle mr-2"></i>NO</button>
</p>
</div>
</div>
</div>
</div>	
		
<div class="card mt-2 mb-2 mx-auto border-0">
<div class="card-header bg-dark text-white">Repository: <b><?php echo($row["RepositoryName"]);?></b></div>	
<div class="card-body">
<p class="card-text"><?php echo($row["Description"]);?></p>
	
<button data-toggle="tooltip" data-placement="top" title="Access Repository: <?php echo($row["RepositoryName"]);?>" type="button" class="btn btn-success" id="<?php echo("id_".$row["idRepository"]);?>"><i class="fas fa-external-link-alt"></i></button>

<button data-toggle="tooltip" data-placement="top" title="Update Repository: <?php echo($row["RepositoryName"]);?>" type="button" class="btn btn-primary" id="<?php echo("eid_".$row["idRepository"]);?>"><i class="fas fa-edit"></i></button>
	
<button data-toggle="tooltip" data-placement="top" title="Delete Repository: <?php echo($row["RepositoryName"]);?>" type="button" class="btn btn-danger" id="<?php echo("did_".$row["idRepository"]);?>"><i class="fas fa-trash-alt"></i></button>	
	
</div>
<div class="card-footer text-muted text-center">
<p>Expires on <?php $DateBD = date_create($row["DateCreation"]); date_add($DateBD, date_interval_create_from_date_string('91 days')); $DateFormated = date_format($DateBD, 'Y/m/d'); echo($DateFormated);?></p>
<p><?php						  
$date1 = date_create("now");
$date2 = $DateBD;
$interval = $date1->diff($date2); 
echo $interval->days . " days remaining";									   
?></p>
</div>	
</div>
	
<script>
$(document).ready(function(){
$('#del').hide();
$('#<?php echo("id_".$row["idRepository"]);?>').click(function() { 
$('#<?php echo("ConfirmAccess_".$row["idRepository"]);?>').modal('show');
$('#<?php echo("ConfirmAccess_".$row["idRepository"]);?>').find("<?php echo("#YES_".$row["idRepository"]);?>").click(function() { 
$('#<?php echo("ConfirmAccess_".$row["idRepository"]);?>').modal('hide');
$('#Consult').modal('show');
var KeyUser = '<?php echo($KeyUser); ?>';
$.ajax({    
url: 'Verification.php', 
type: 'POST', 
data:{"KeyUser" : KeyUser, "idRepository" : <?php echo($row['idRepository']);?>}, 
success: function(data) { 
console.log(data); 
if(data == 1){  
location.href = 'index.php?p=IntentList&idRepository='+<?php echo($row['idRepository']);?>+'&KeyUser='+KeyUser;
}}}); 	
});});
	
	
$('#<?php echo("eid_".$row["idRepository"]);?>').click(function() { 
$('#<?php echo("ConfirmEdit_".$row["idRepository"]);?>').modal('show');
$('#<?php echo("ConfirmEdit_".$row["idRepository"]);?>').find("<?php echo("#eYES_".$row["idRepository"]);?>").click(function() { 
$('#<?php echo("ConfirmEdit_".$row["idRepository"]);?>').modal('hide');
location.href = "index.php?p=NewRepository&Action=Update&idRepository=<?php echo($row["idRepository"]);?>&KeyUser=<?php echo($row["KeyUser"]);?>"
});});	
	
	
$('#<?php echo("did_".$row["idRepository"]);?>').click(function() { 
$("#<?php echo("dYES_".$row["idRepository"]);?>").hover(function(){
$('#del').show();
});
$('#<?php echo("ConfirmDel_".$row["idRepository"]);?>').modal('show');
$('#<?php echo("ConfirmDel_".$row["idRepository"]);?>').find("<?php echo("#dYES_".$row["idRepository"]);?>").click(function() { 
$('#<?php echo("ConfirmDel_".$row["idRepository"]);?>').modal('hide');
location.href = "index.php?p=CDSNewRepository&Action=Delete&idRepository=<?php echo($row["idRepository"]);?>&KeyUser=<?php echo($row["KeyUser"]);?>"
});});		
});
	
</script>
<?php } ?>
</div>	