<?php
$Action = $_GET["Action"];
$KeyUser 		= $_SESSION['KeyUser']; 
if ($Action == "Update") {
$id 			= $_GET["idRepository"];
$KeyUser 		= $_SESSION['KeyUser']; 	
$query 			= "SELECT * FROM `Repository` WHERE `idRepository` = '$id' AND `KeyUser` = '$KeyUser'";
$result 		= $mysqli->query($query);
while ($row 	= $result->fetch_assoc()) {
$idRepository			= $row["idRepository"];
$RepositoryName			= $row["RepositoryName"];
$Description			= $row["Description"];
}}
?>

<div class="modal fade" tabindex="-1" id="Repositories">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white">
<div class="modal-title mx-auto h5">ForAlexa</div>
</div>
<div style="line-height: 3.5;" class="modal-body text-center mt-2 h5">This is your first repository, here you must inform a name and a description, and accept the terms. Don’t worry about making a mistake here, because you can always edit the content later.</div>
<div class="modal-footer bg-dark"><button type="button" class="btn btn-success btn-lg" data-dismiss="modal"><i class="fas fa-2x fa-thumbs-up mr-2"></i>I understood</button></div>
</div>
</div>
</div>

<div class="modal fade" tabindex="-1" id="RepositoriesTwo">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white">
<h5 class="modal-title mx-auto h5">ForAlexa</h5>
</div>
<div style="line-height: 3.5;" class="modal-body text-center mt-2 h5">This is your second repository, so you are getting the hang of things, but I will still help you this one last time. Remember that here, you must inform a name and a description, and accept the terms.</div>
<div class="modal-footer bg-dark"><button type="button" class="btn btn-success btn-lg" data-dismiss="modal"><i class="fas fa-2x fa-thumbs-up mr-2"></i>I understood</button></div>
</div>
</div>
</div>

<div class="modal fade" tabindex="-1" id="NewRepositoryModal">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white">
<h5 class="modal-title mx-auto h5">ForAlexa</h5>
</div>
<div style="line-height: 3.5;" class="modal-body text-center mt-2 h5">Here is the form used to register the repositories. Remember that a repository is used to store the intents necessary for the creation of a skill. Here you need only to provide a name for your repository and a description, and accept the terms. Remember that each repository is valid for <b>90</b> days, and that, after the <b>90</b> days, your repository and its intents will be deleted.</div>
<div class="modal-footer bg-dark"><button type="button" class="btn btn-success btn-lg" data-dismiss="modal"><i class="fas fa-2x fa-thumbs-up mr-2"></i>I understood</button></div>
</div>
</div>
</div>

<?php
$search 	= mysqli_query($mysqli, "SELECT * FROM Repository WHERE KeyUser = '$KeyUser'");
$num_rows 	= mysqli_num_rows($search);	
if($num_rows == 0 and $_SESSION["Tips"] == "YES"){
?>
<script>
$(document).ready(function(){
setTimeout(function(){
$('#Repositories').modal('show');
}, 2000);
});
</script>
<?php
}
if($num_rows == 1 and $_SESSION["Tips"] == "YES"){
?>
<script>
$(document).ready(function(){
setTimeout(function(){
$('#RepositoriesTwo').modal('show');
}, 2000);
});
</script>
<?php
}
?>


<div class="text-left mx-auto mb-5 container">	
<form action="index.php?p=CDSNewRepository&Action=<?php if($Action == "Update") {echo("Update&idRepository=$idRepository&KeyUser=".$KeyUser);} else {echo("CDS");};?>" method="POST">
<div class="text-center text-white mb-3 mt-3"><h2>New Repository</h2></div>
<div class="form-group">	
<label class="text-white">Repository Name</label>	
<div class="input-group mb-5">
<div class="input-group-prepend">	
<div class="input-group-text"><i class="fas fa-2x fa-scroll"></i>
</div>	
</div>
<input name="RepositoryName" type="text" required="required" class="form-control form-control-lg mx-auto" id="RepositoryName" placeholder="i.e. Evolution Skill" value="<?php if ($Action == "Update") {echo($RepositoryName);} else {echo("");}?>" maxlength="50">	
</div>	
</div>	
	
<div class="form-group">	
<label class="text-white">Description</label>	
<div class="input-group mb-5">
<div class="input-group-prepend">	
<div class="input-group-text"><i class="far fa-2x fa-comment"></i>
</div>	
</div>
<textarea name="Description" rows="10" maxlength="200"  class="form-control form-control-lg mx-auto" id="Description" placeholder="i.e. Evolution Skill created for the Evolution discipline."><?php 
if ($Action == "Update") {echo($Description);} else {echo("");}?>
</textarea>		
</div>	
</div>	
	
<div class="card bg-light text-center">
<p class="mt-3">Each user can create up to <strong>5</strong> repositories on the ForAlexa server.</p>	
<p>Each repository is available on the ForAlexa server for a maximum of <strong> 90 </strong> days.<br>After  <strong> 90 </strong> days, the repository is deleted automatically.</p>
	
<div class="form-group form-check">
<input name="Term" type="checkbox" class="form-check-input" id="Term" onchange="isChecked(this, 'SubmitRepository')" <?php 
if ($Action == "Update") {echo('checked="checked"');}?>>
<label class="form-check-label" for="Term"><b>I accept the terms</b></label>
</div>	
</div>
	
<button id="SubmitRepository" type="submit" class="btn btn-success btn-lg btn-block mt-5" <?php if ($Action == "CDS") {echo('disabled="disabled"');}?>>
<?php if ($Action == "CDS") {echo("Create Repository");} else {echo("Update Repository");}?></button>
<div>
</div>	
</form>
<script>
function isChecked(checkbox, SubmitRepository) {
document.getElementById(SubmitRepository).disabled = !checkbox.checked;
}	
</script>	
<script>
$(document).ready(function(){
$("#NewRepository").click(function(){
$('#NewRepositoryModal').modal('show');
});
});
</script>
</div>