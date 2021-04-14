<?php
$KeyUser 		= $_GET["KeyUser"];
$idRepository 	= $_GET["idRepository"];
$QA 			= mysqli_query($mysqli, "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$num_rows_QA 	= mysqli_num_rows($QA);
$RQ 			= mysqli_query($mysqli, "SELECT * FROM `RandomQuotes` WHERE KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$num_rows_RQ 	= mysqli_num_rows($RQ);
$num_rows 		= $num_rows_QA + $num_rows_RQ;

function Utterances($string) {  
if($string == "LaunchRequest" or $string == "HelpIntent" or $string == "CancelAndStopIntent" or $string == "FallbackIntent" or $string == "IntentReflector" or $string == "Error" or $string == "HelloWorldIntent" or $string == "AMAZON.YesIntent" or $string == "AMAZON.NoIntent"){
$delete = "disabled";	
}
else{
$delete = "";	
}
return $delete;	
} 
?>



<?php
$query 			= "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository'";
$result 		= $mysqli->query($query);
while ($row 	= $result->fetch_assoc()) {	
?>
<div class="modal fade" id="<?php echo("answer_".$row["id_question"]); ?>" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content">
<div style="letter-spacing: 1px" class="modal-header text-white text-monospace bg-dark">
<div class="modal-title">Answer <?php echo('"'.$row["IntentName"].'"');?></div>
<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">	
<div class="text-justify">
<?php echo($row["answer"]);?>	
</div>
</div>
<div class="modal-footer bg-dark">
<button type="button" class="btn btn-danger btn-lg text-monospace" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
	
	
<div class="modal fade" id="<?php echo("utteraces_".$row["id_question"]); ?>" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content">
<div style="letter-spacing: 1px" class="modal-header text-white text-monospace bg-dark">
<div class="modal-title">Utterances <?php echo('"'.$row["IntentName"].'"');?></div>
<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">	
<div class="text-justify">
<table class="table table-dark table-striped mx-auto ml-5 mr-5 w-50">
<tr>
<td>Sample Utterances</td>
<td><b><?php echo($row["question_1"]);?></b></td>	
</tr>
<?php if ($row["question_2"] <> "") {echo("<tr><td>Another Sample Utterances</td><td><b>".$row["question_2"]."</b></td></tr>");};?>
<?php if ($row["question_3"] <> "") {echo("<tr><td>Another Sample Utterances</td><td><b>".$row["question_3"]."</b></td></tr>");};?>
<?php if ($row["question_4"] <> "") {echo("<tr><td>Another Sample Utterances</td><td><b>".$row["question_4"]."</b></td></tr>");};?>
<?php if ($row["question_5"] <> "") {echo("<tr><td>Another Sample Utterances</td><td><b>".$row["question_5"]."</b></td></tr>");};?>
<?php if ($row["question_6"] <> "") {echo("<tr><td>Another Sample Utterances</td><td><b>".$row["question_6"]."</b></td></tr>");};?>	
</table>
	
</div>
</div>
<div class="modal-footer bg-dark">
<button type="button" class="btn btn-danger btn-lg text-monospace" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>	
	
<div class="modal fade" id="<?php echo("reprompt_".$row["id_question"]); ?>" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content">
<div style="letter-spacing: 1px" class="modal-header text-white text-monospace bg-dark">
<div class="modal-title">Reprompt <?php echo('"'.$row["IntentName"].'"');?></div>
<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">	
<div class="text-justify">	
<div><?php echo($row["reprompt"]); ?></div>	
</div>
</div>
<div class="modal-footer bg-dark">
<button type="button" class="btn btn-danger btn-lg text-monospace" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>		
<?php }?>	


<?php
$query 			= "SELECT * FROM `RandomQuotes` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository'";
$result 		= $mysqli->query($query);
while ($row 	= $result->fetch_assoc()) {	
?>
<div class="modal fade" id="<?php echo("Script_".$row["id_quotes"]); ?>" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content">
<div style="letter-spacing: 1px" class="modal-header text-white text-monospace bg-dark">
<div class="modal-title">Answer <?php echo('"'.$row["IntentName"].'"');?></div>
<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">	
<div class="text-justify">
<?php echo($row["Intro"]." ".$row["Random"]." ".$row["End"]);?>	
</div>
</div>
<div class="modal-footer bg-dark">
<button type="button" class="btn btn-danger btn-lg text-monospace" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
	
	
<div class="modal fade" id="<?php echo("RandomUtteraces_".$row["id_quotes"]); ?>" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content">
<div style="letter-spacing: 1px" class="modal-header text-white text-monospace bg-dark">
<div class="modal-title">Utterances <?php echo('"'.$row["IntentName"].'"');?></div>
<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">	
<div class="text-justify">
<table class="table table-dark table-striped mx-auto ml-5 mr-5 w-50">
<tr>
<td>Sample Utterances</td>
<td><b><?php echo($row["Utterances_1"]);?></b></td>	
</tr>
<?php if ($row["Utterances_2"] <> "") {echo("<tr><td>Another Utterances</td><td><b>".$row["Utterances_2"]."</b></td></tr>");};?>
<?php if ($row["Utterances_3"] <> "") {echo("<tr><td>Another Utterances</td><td><b>".$row["Utterances_3"]."</b></td></tr>");};?>
<?php if ($row["Utterances_4"] <> "") {echo("<tr><td>Another Utterances</td><td><b>".$row["Utterances_4"]."</b></td></tr>");};?>
<?php if ($row["Utterances_5"] <> "") {echo("<tr><td>Another Utterances</td><td><b>".$row["Utterances_5"]."</b></td></tr>");};?>
<?php if ($row["Utterances_6"] <> "") {echo("<tr><td>Another Utterances</td><td><b>".$row["Utterances_6"]."</b></td></tr>");};?>	
</table>
	
</div>
</div>
<div class="modal-footer bg-dark">
<button type="button" class="btn btn-danger btn-lg text-monospace" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>	
			
<?php }?>
	
<div class="row text-center mb-5 mt-5 text-white">
<div class="col">
<div class="btn-group dropright">
<button class="btn btn-lg btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btn" name="btn">New Intent</button>
  <div class="dropdown-menu">
    <a style="color: black;" class="dropdown-item" href="index.php?p=Form&KeyUser=<?php echo($KeyUser);?>&Action=CDS&Form=QA&idRepository=<?php echo($idRepository);?>">Questions and Answers</a>
    <a style="color: black;" class="dropdown-item" href="index.php?p=RandomQuotes&KeyUser=<?php echo($KeyUser);?>&Action=CDS&Form=RandomQuotes&idRepository=<?php echo($idRepository);?>">Random Quotes</a>
  </div>
</div>	
</div>	
<div class="col"><a class="btn btn-lg btn-primary text-white" href="JsonFile.php?KeyUser=<?php echo($KeyUser);?>&idRepository=<?php echo($idRepository);?>" role="button">json File</a></div>
<div class="col"><a class="btn btn-lg btn-primary text-white" href="index.php?p=MakeSkill&KeyUser=<?php echo($KeyUser);?>&idRepository=<?php echo($idRepository);?>" role="button">Alexa code</a></div>	
</div>
<div class="text-center mb-5 text-white">
<div>You have <button type="button" class="btn btn-primary"><span class="badge badge-light"><?php echo($num_rows); ?></span></button> Intents registered</div>	
</div>

<table class="table text-center table-dark table-striped table-hover table-sm mx-auto ml-5 mr-5">
<tbody>
<thead class="thead-light">	
<tr>
<th>Intent name</td>
<th>Type</td>
<th>Sample Utterances</td>	
<th>Answer</td>
<th>After</td>
<th colspan="2">Options</td>	
</tr>
</thead>	
<?php
$query = ("SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository'");
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
?>	  
<tr>	
<td><?php echo($row["IntentName"]);?></td>
	
<td><?php if($row["IntentName"] == "LaunchRequest" or $row["IntentName"] == "HelpIntent" or $row["IntentName"] == "CancelAndStopIntent" or $row["IntentName"] == "FallbackIntent" or $row["IntentName"] == "IntentReflector" or $row["IntentName"] == "Error" or $row["IntentName"] == "HelloWorldIntent" or $row["IntentName"] == "AMAZON.YesIntent" or $row["IntentName"] == "AMAZON.NoIntent"){echo("Required");}else{echo("Questions & Answers");} ?></td>	
	
<td><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#<?php echo("utteraces_".$row["id_question"]); ?>"><i class="fas fa-head-side-cough"></i></button></td>
<td><button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#<?php echo("answer_".$row["id_question"]); ?>"><i class="fas fa-volume-up"></i></button></td>
<td><?php if($row["option"] == "reprompt") {
?>
<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#<?php echo("reprompt_".$row["id_question"]); ?>"><i class="fas fa-1x fa-info-circle"></i></button>
<?php } ?>	
<?php if ($row["option"] == "end") {echo("Finish");};?></td>	
<td><a style="color: black;" class="btn btn-sm btn-success" href="index.php?p=Form&Action=Update&KeyUser=<?php echo($KeyUser);?>&id=<?php echo($row["id_question"]);?>&Form=QA&idRepository=<?php echo($idRepository);?>" role="button" onClick="return confirm('Edit Intent <?php echo($row["IntentName"]);?> ?');"><i class="fas fa-edit fa-1x"></i></a></td>

<td data-toggle="tooltip" data-placement="top" title="<?php if((Utterances($row["IntentName"])) == "disabled") {echo("This Intent cannot be deleted");}?>"><a style="color: black;" class="btn btn-sm btn-danger <?php echo(Utterances($row["IntentName"]));?>" href="index.php?p=Operations&Action=Delete&KeyUser=<?php echo($KeyUser);?>&id=<?php echo($row["id_question"]);?>&idRepository=<?php echo($idRepository);?>" role="button" onClick="return confirm('Delete Intent <?php echo($row["IntentName"]);?> ?');"><i class="fas fa-1x fa-trash-alt"></i></a></td>		
</tr>	
<?php } ?>

<?php
$query = ("SELECT * FROM `RandomQuotes` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository'");
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
?>		
<tr>
<td><?php echo($row["IntentName"]);?></td>
<td>Random Quotes</td>	
<td><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#<?php echo("RandomUtteraces_".$row["id_quotes"]); ?>"><i class="fas fa-head-side-cough"></i></button></td>
<td><button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#<?php echo("Script_".$row["id_quotes"]); ?>"><i class="fas fa-volume-up"></i></button></td>
<td></td>
<td data-toggle="tooltip" data-placement="top" title="Random Quotes cannot be edited"><a style="color: black;" class="btn btn-sm btn-success disabled" href="" role="button"><i class="fas fa-edit fa-1x"></i></a></td>	
<td><a style="color: black;" class="btn btn-sm btn-danger" href="index.php?p=Operations&Action=DeleteRandom&KeyUser=<?php echo($KeyUser);?>&id=<?php echo($row["id_quotes"]);?>&idRepository=<?php echo($idRepository);?>" role="button" onClick="return confirm('Delete Intent <?php echo($row["IntentName"]);?> ?');"><i class="fas fa-1x fa-trash-alt"></i></a></td>	
</tr>	
<?php } ?>	
</tbody>
</table>
<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
</script>	
	
</body>
</html>