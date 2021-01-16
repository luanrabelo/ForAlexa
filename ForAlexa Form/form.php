<?php
$key 	= $_GET["key"];
$action = $_GET["action"];
$Form	= $_GET["Form"];
if ($action == "Update") {
$id 			= $_GET["id"];
$query 			= "SELECT * FROM `Questions` WHERE `id_question` = '$id' AND `key_user` = '$key'";
$result 		= $mysqli->query($query);
while ($row 	= $result->fetch_assoc()) {
$Intent			= $row["IntentName"];
$Utterances_1	= $row["question_1"];
$Utterances_2	= $row["question_2"];
$Utterances_3	= $row["question_3"];
$Utterances_4	= $row["question_4"];
$Utterances_5	= $row["question_5"];
$Utterances_6	= $row["question_6"];	
$Answer			= $row["answer"];
$Option			= $row["option"];	
$Reprompt		= $row["reprompt"];	
if				($row["IntentName"] == "LaunchRequest"){$delete = "readonly='readonly'"; $Invocation = "Yes"; $InvocationName = $Utterances_1;}
if ($row["IntentName"] == "HelpIntent")				{$delete = "readonly='readonly'";} 
if ($row["IntentName"] == "CancelAndStopIntent") 	{$delete = "readonly='readonly'";} 
if ($row["IntentName"] == "FallbackIntent")			{$delete = "readonly='readonly'";} 
if ($row["IntentName"] == "IntentReflector")		{$delete = "readonly='readonly'";} 
if ($row["IntentName"] == "Error")					{$delete = "readonly='readonly'";} 
if ($row["IntentName"] == "HelloWorldIntent")		{$delete = "readonly='readonly'";} 
if ($row["IntentName"] == "AMAZON.YesIntent")		{$delete = "readonly='readonly'";} 
if ($row["IntentName"] == "AMAZON.NoIntent")		{$delete = "readonly='readonly'";}	
}}
?>
<!doctype html>
<div class="mt-5 mx-auto text-black ml-5 mr-5">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<?php
$query = ("SELECT * FROM `User` WHERE key_user = '$key'");
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
?>		
<li class="breadcrumb-item"><?php echo($row["user"]);?></li>
<?php } ?>	
    <li class="breadcrumb-item"><a href="index.php?p=StepTree&key=<?php echo($key);?>"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item">New Intent </li>
</ol>
</nav>	
</div>
<form action="index.php?p=OpForm&key=<?php echo($key);?>&action=<?php echo($action);?>&id=<?php echo($id);?>&Form=<?php echo($Form);?>" method="post">	
<div class="mt-5">
<div class="bg-dark text-white"><h2>Questions and Answers</h2></div>
<?php include("IntentName.php");?>

	
<?php  if ($Invocation == "Yes") { ?>  
<small id="Invocation" class="form-text mb-3 text-white"><h2>Skill Invocation Name.</h2><br> Brand names are only allowed if you provide proof of rights in the testing instructions or if you use the brand name in a referential manner that doesn’t imply ownership (examples of terms that can be added to a brand name for referential usage: unofficial, unauthorized, fan, fandom, for, about).</small>		
<input name="Utterance_1" type="text" required="required" class="form-control form-control-lg" id="Utterance_1" value="<?php if ($action == "Update") {echo($Utterances_1);}?>" aria-describedby="Invocation" oninvalid="this.setCustomValidity('Field Invocation Name is required with minimum 5 characters')" oninput="setCustomValidity('')" minlength="5">
	
<?php } else { ?>	
	
<?php include("UtteranceName.php");?>
	
<?php } ?>	
	
<div class="mt-5 text-white">Alexa will say:</div>
<div><textarea name="speakOutput" rows="10" required="required" class="form-control form-control-lg ml-5 mr-5 mx-auto w-75" id="speakOutput"><?php if ($action == "Update") {echo($Answer);}?>
</textarea> 
</div>	
<small class="text-white"><i style="color: yellow;" class="fas fa-2x fa-exclamation-triangle mt-2"></i> Do not use line break</small>	

<?php  if ($Invocation != "Yes") { ?>	
<div class="mt-5">
<div class="form-group">
<label class="text-white">After Answer</label>
	
<script>
$(function() {
$('#option').change(function(){
<?php 
if ($action == "Update" and $Option == "reprompt") {echo("$('.reprompt').show();");} else {echo("$('.reprompt').hide();");}?>	
$('.reprompt').hide();
$('.end').hide();
$('#' + $(this).val()).show();
});
});	
</script>	
<select class="form-control form-control-lg w-75 ml-5 mr-5 mx-auto" name="option" id="option">
      <option value="end" <?php if ($action == "Update" and $Option == "end") {echo("selected='selected'");}?>>Finish</option>
      <option value="reprompt" <?php if ($action == "Update" and $Option == "reprompt") {echo("selected='selected'");}?>>Another Question (reprompt)</option>
</select>
	
<div class="mt-5 end text-white" style="display:none" id="end">A Skill será finalizada após a resposta</div>		
<div class="mt-5 reprompt text-white" style="<?php if ($action == "Update" and $Option == "reprompt") {echo("");} else {echo("display:none");}?>" id="reprompt" >reprompt<br><input name="reprompt" type="text" class="form-group form-control form-control-lg w-75 ml-5 mr-5 mx-auto" id="reprompt" value="<?php if ($action == "Update") {echo($Reprompt);}?>"></div>	
  </div>	
</div>
<?php } ?>	
</div>
<div class="mt-5"><button class="btn btn-success btn-lg btn-block w-75 ml-5 mr-5 mx-auto" type="submit"><?php if ($action == "Update") {echo("Update Intent");} else {echo("Save");}?></button></div>		
</form>	