<?php
$Action = $_GET["Action"];
if ($Action == "Update") {
$id 			= $_GET["idRepository"];
$KeyUser 		= $_GET['KeyUser']; 	
$query 			= "SELECT * FROM `Repository` WHERE `idRepository` = '$id' AND `KeyUser` = '$KeyUser'";
$result 		= $mysqli->query($query);
while ($row 	= $result->fetch_assoc()) {
$idRepository			= $row["idRepository"];
$RepositoryName			= $row["RepositoryName"];
$Description			= $row["Description"];
}}
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
<input name="RepositoryName" type="text" required="required" class="form-control form-control-lg mx-auto" id="RepositoryName" value="<?php 
if ($Action == "Update") {echo($RepositoryName);} else {echo("");}?>" maxlength="50">	
</div>	
</div>	
	
<div class="form-group">	
<label class="text-white">Description</label>	
<div class="input-group mb-5">
<div class="input-group-prepend">	
<div class="input-group-text"><i class="far fa-2x fa-comment"></i>
</div>	
</div>
<textarea name="Description" rows="10" maxlength="200"  class="form-control form-control-lg mx-auto" id="Description"><?php 
if ($Action == "Update") {echo($Description);} else {echo("");}?>
</textarea>		
</div>	
</div>	
	
<div class="card bg-light text-center">
<p>Hello <?php echo($_SESSION['FirstName']);?></p>
<p>Each user can create up to <strong>5</strong> repositories on the ForAlexa server.</p>	
<p>Each repository is available on the ForAlexa server for a maximum of <strong> 90 </strong> days.<br>After  <strong> 90 </strong> days, the repository is deleted automatically.</p>
	
<div class="form-group form-check">
<input name="Term" type="checkbox" class="form-check-input" id="Term" onchange="isChecked(this, 'SubmitRepository')" <?php 
if ($Action == "Update") {echo('checked="checked"');}?>>
<label class="form-check-label" for="Term">I accept the terms</label>
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
</div>