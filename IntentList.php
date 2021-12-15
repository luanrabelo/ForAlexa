<style>
.tooltip-inner {
background-color: #0275d8;
color: white;
font-weight: bold;
width: auto;
}
.tooltip.show {
opacity: 10;
}	
.tooltip.arrow::before {
border-bottom-color: #0275d8;
color: #0275d8;
  /* Red */
}
.tooltip>.tooltip.arrow {
background-color: #0275d8 !important;
}
	
.AttentionL{
animation: pulseCat 0.8s infinite;	
}
@keyframes pulseCat {
10% {
box-shadow: 0 0 0 0 orange;
}
80% {
box-shadow: 0 0 0 25px rgba(204, 169, 44, 0);
}	
100% {
box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
}
}
	
.Repo{
animation: pulseCat 0.8s infinite;	
}
@keyframes pulseCat {
10% {
box-shadow: 0 0 0 0 grey;
}
80% {
box-shadow: 0 0 0 25px rgba(204, 169, 44, 0);
}	
100% {
box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
}
}
	
	
	
@keyframes ldio-entgl9wkzda-1 {
    0% { transform: rotate(0deg) }
   50% { transform: rotate(-45deg) }
  100% { transform: rotate(0deg) }
}
@keyframes ldio-entgl9wkzda-2 {
    0% { transform: rotate(180deg) }
   50% { transform: rotate(225deg) }
  100% { transform: rotate(180deg) }
}
.ldio-entgl9wkzda > div:nth-child(2) {
  transform: translate(-15px,0);
}
.ldio-entgl9wkzda > div:nth-child(2) div {
  position: absolute;
  top: 40px;
  left: 40px;
  width: 120px;
  height: 60px;
  border-radius: 120px 120px 0 0;
  background: #eeb440;
  animation: ldio-entgl9wkzda-1 1s linear infinite;
  transform-origin: 60px 60px
}
.ldio-entgl9wkzda > div:nth-child(2) div:nth-child(2) {
  animation: ldio-entgl9wkzda-2 1s linear infinite
}
.ldio-entgl9wkzda > div:nth-child(2) div:nth-child(3) {
  transform: rotate(-90deg);
  animation: none;
}@keyframes ldio-entgl9wkzda-3 {
    0% { transform: translate(190px,0); opacity: 0 }
   20% { opacity: 1 }
  100% { transform: translate(70px,0); opacity: 1 }
}
.ldio-entgl9wkzda > div:nth-child(1) {
  display: block;
}
.ldio-entgl9wkzda > div:nth-child(1) div {
  position: absolute;
  top: 92px;
  left: -8px;
  width: 16px;
  height: 16px;
  border-radius: 50%;
  background: #290908;
  animation: ldio-entgl9wkzda-3 1s linear infinite
}
.ldio-entgl9wkzda > div:nth-child(1) div:nth-child(1) { animation-delay: -0.67s }
.ldio-entgl9wkzda > div:nth-child(1) div:nth-child(2) { animation-delay: -0.33s }
.ldio-entgl9wkzda > div:nth-child(1) div:nth-child(3) { animation-delay: 0s }
.loadingio-spinner-bean-eater-rmydrbgmg5 {
  width: 200px;
  height: 200px;
  display: inline-block;
  overflow: hidden;
  background: none;
}
.ldio-entgl9wkzda {
  width: 100%;
  height: 100%;
  position: relative;
  transform: translateZ(0) scale(1);
  backface-visibility: hidden;
  transform-origin: 0 0; /* see note above */
}
.ldio-entgl9wkzda div { box-sizing: content-box; }
</style>
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
if($_SESSION["Tips"] == "YES" and $num_rows > 17 and $_SESSION["Tips"] == "YES"){
include("Tips.php");
}
if($_SESSION["Tips"] == "YES"){
include("Modal.php");
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
<td>Sample Utterances: </td>
<td><b><?php echo($row["question_1"]);?></b></td>	
</tr>
<?php if ($row["question_2"] <> "") {echo("<tr><td>Another Sample Utterances: </td><td><b>".$row["question_2"]."</b></td></tr>");};?>
<?php if ($row["question_3"] <> "") {echo("<tr><td>Another Sample Utterances: </td><td><b>".$row["question_3"]."</b></td></tr>");};?>
<?php if ($row["question_4"] <> "") {echo("<tr><td>Another Sample Utterances: </td><td><b>".$row["question_4"]."</b></td></tr>");};?>
<?php if ($row["question_5"] <> "") {echo("<tr><td>Another Sample Utterances: </td><td><b>".$row["question_5"]."</b></td></tr>");};?>
<?php if ($row["question_6"] <> "") {echo("<tr><td>Another Sample Utterances: </td><td><b>".$row["question_6"]."</b></td></tr>");};?>	
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
<td>Sample Utterances: </td>
<td><b><?php echo($row["Utterances_1"]);?></b></td>	
</tr>
<?php if ($row["Utterances_2"] <> "") {echo("<tr><td>Another Utterances: </td><td><b>".$row["Utterances_2"]."</b></td></tr>");};?>
<?php if ($row["Utterances_3"] <> "") {echo("<tr><td>Another Utterances: </td><td><b>".$row["Utterances_3"]."</b></td></tr>");};?>
<?php if ($row["Utterances_4"] <> "") {echo("<tr><td>Another Utterances: </td><td><b>".$row["Utterances_4"]."</b></td></tr>");};?>
<?php if ($row["Utterances_5"] <> "") {echo("<tr><td>Another Utterances: </td><td><b>".$row["Utterances_5"]."</b></td></tr>");};?>
<?php if ($row["Utterances_6"] <> "") {echo("<tr><td>Another Utterances: </td><td><b>".$row["Utterances_6"]."</b></td></tr>");};?>	
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
	
<?php
if($_SESSION["Tips"] == "NO" or $num_rows >= 16){
?>

<div class="row text-center mb-5 mt-5 text-white">
<div class="col">
<div class="btn-group dropright">
<button class="btn btn-lg btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btn" name="btn">New Intent</button>
  <div class="dropdown-menu">
    <a id="LinkQA" style="color: black;" class="dropdown-item" href="index.php?p=Form&KeyUser=<?php echo($KeyUser);?>&Action=CDS&Form=QA&idRepository=<?php echo($idRepository);?>">Questions and Answers</a>
    <a id="LinkRC" style="color: black;" class="dropdown-item" href="index.php?p=RandomQuotes&KeyUser=<?php echo($KeyUser);?>&Action=CDS&Form=RandomQuotes&idRepository=<?php echo($idRepository);?>">Random Quotes</a>
  </div>
</div>	
</div>	
<div class="col"><a class="btn btn-lg btn-primary text-white" href="JsonFile.php?KeyUser=<?php echo($KeyUser);?>&idRepository=<?php echo($idRepository);?>" role="button">json File</a></div>
<div class="col"><a class="btn btn-lg btn-primary text-white" href="index.php?p=MakeSkill&KeyUser=<?php echo($KeyUser);?>&idRepository=<?php echo($idRepository);?>" role="button">Alexa code</a></div>	
</div>
<?php } ?>

<div class="text-center mb-3 mt-3 text-white">
<div>You have <button id="NumTooltip" data-toggle="tooltip" data-placement="top" title="Aqui é mostrado a quantidade de intents cadastrada pelo usuário." type="button" class="btn btn-primary"><span class="badge badge-light"><?php echo($num_rows); ?></span></button> Intents registered</div>	

<div class="form-group mt-2">
<div style="vertical-align: middle;" class="input-group mb-1">	
<div id="AssistanceP" class="custom-control custom-switch custom-switch-lg mx-auto text-white" data-toggle="tooltip" data-placement="top" title="Assistente Tutorial">
<input name="Assistance" type="checkbox" class="custom-control-input" id="Assistance" value="">
<label class="custom-control-label" for="Assistance"><div id="ON">Assistant ON</div><div id="OFF">Assistant OFF</div></label>
</div>		
</div>
</div>
	
</div>

<?php
if($_SESSION["Tips"] == "YES"){
?>
<!-- Acesso Repositório -->
<div class="modal fade" tabindex="-1" id="RepositoriesAccess">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div style="line-height: 3.5;" class="modal-body text-center mt-2 h5">
<p class="text-center"><h5>Welcome to the List of ForAlexa intents.</h5></p>	
<p>Before continuing, would you like to watch a short tutorial about this page?</p>	
<div class="row row-cols-2"><div class="col"><button id="YesTutorial" type="button" class="btn btn-lg btn-block btn-success"><i style="color: black" class="fas fa-2x fa-thumbs-up mr-2"></i>Yes</button></div>
<div class="col"><button id="NoTutorial" type="button" class="btn btn-block btn-lg btn-danger"><i style="color: black" class="fas fa-2x fa-times-circle mr-2"></i>No</button></div>	
	</div>
</div>
</div>
</div>
</div>

<!-- Dicas  -->
<!-- Intent  -->
<div id="IntentNameModal" class="alert alert-warning fade show mx-auto w-100 ml-1 mr-1 mt-2" role="alert">
<div class="mx-auto w-100 h6 text-black">	
<i style="color: black;" class="fas fa-2x fa-lightbulb mr-1"></i>
You can visualize your intents here. An intent is the representation of an action which responds to a request (utterance) spoken by the user.
<button id="NextIntentName" type="button" class="ml-1 btn btn-outline-dark Attention" data-toggle="tooltip" data-placement="top" title="Click here">
<i class="fas fa-chevron-right"></i>
</button>	
</div>	
</div>	

<!-- Status  -->
<div id="StatusModal" class="alert alert-warning fade show mx-auto w-100 ml-1 mr-1 mt-2" role="alert">
<div class="mx-auto w-100 h6 text-black">
<button id="PreviousStatus" type="button" class="mr-1 btn btn-outline-dark" data-toggle="tooltip" data-placement="top" title="Previous Tips">
<i class="fas fa-chevron-left"></i>
</button>	
<i style="color: black;" class="fas fa-2x fa-lightbulb mr-1"></i>
Here you can verify the status of your intent, whether it was not edited <button type="button" class="btn btn-sm btn-dark"><i style="color: red;" class="fas fa-times-circle"></i></button> if it requires attention <button type="button" class="btn btn-sm btn-dark"><i style="color: yellow;" class="fas fa-exclamation-triangle"></i></button> or if it is OK <button type="button" class="btn btn-sm btn-dark"><i style="color: green;" class="fas fa-check-circle"></i></button>
<button id="NextStatus" type="button" class="ml-1 btn btn-outline-dark Attention" data-toggle="tooltip" data-placement="top" title="Click here">
<i class="fas fa-chevron-right"></i>
</button>
</div>	
</div>	

<!-- Type  -->
<div id="TypeModal" class="alert alert-warning fade show mx-auto w-100 ml-1 mr-1 mt-2" role="alert">
<div class="mx-auto w-100 h6 text-black">
<button id="PreviousType" type="button" class="mr-1 btn btn-outline-dark" data-toggle="tooltip" data-placement="top" title="Previous Tips">
<i class="fas fa-chevron-left"></i>
</button>	
<i style="color: black;" class="fas fa-2x fa-lightbulb mr-1"></i>
Here you can verify the type of intent, that is, whether it is Required, Q&A or a Random Quote.
<button id="NextType" type="button" class="ml-1 btn btn-outline-dark Attention" data-toggle="tooltip" data-placement="top" title="Click here">
<i class="fas fa-chevron-right"></i>
</button>
</div>	
</div>

<!-- Utterances  -->
<div id="UtterancesModal" class="alert alert-warning fade show mx-auto w-100 ml-1 mr-1 mt-2" role="alert">
<div class="mx-auto w-100 h6 text-black">
<button id="PreviousUtterances" type="button" class="mr-1 btn btn-outline-dark" data-toggle="tooltip" data-placement="top" title="Previous Tips">
<i class="fas fa-chevron-left"></i>
</button>	
<i style="color: black;" class="fas fa-2x fa-lightbulb mr-1"></i>You can access the list of utterances for a given intent by clicking here. Utterances are the phrases that will probably be spoken by the user of a given intent. The list should include the largest possible number of phrases likely to be spoken by the user.
<button id="NextUtterances" type="button" class="ml-1 btn btn-outline-dark Attention" data-toggle="tooltip" data-placement="top" title="Click here">
<i class="fas fa-chevron-right"></i>
</button>
</div>	
</div>

<!-- Answer  -->
<div id="AnswerModal" class="alert alert-warning fade show mx-auto w-100 ml-1 mr-1 mt-2" role="alert">
<div class="mx-auto w-100 h6 text-black">
<button id="PreviousAnswer" type="button" class="mr-1 btn btn-outline-dark" data-toggle="tooltip" data-placement="top" title="Previous Tips">
<i class="fas fa-chevron-left"></i>
</button>	
<i style="color: black;" class="fas fa-2x fa-lightbulb mr-1"></i>
You can access the answer to a given intent by clicking here. When the utterances associated with an intent are invoked, the user receives the answer.
<button id="NextAnswer" type="button" class="ml-1 btn btn-outline-dark Attention" data-toggle="tooltip" data-placement="top" title="Click here">
<i class="fas fa-chevron-right"></i>
</button>
</div>	
</div>

<!-- After  -->
<div id="AfterModal" class="alert alert-warning fade show mx-auto w-100 ml-1 mr-1 mt-2" role="alert">
<div class="mx-auto w-100 h6 text-black">
<button id="PreviousAfter" type="button" class="mr-1 btn btn-outline-dark" data-toggle="tooltip" data-placement="top" title="Previous Tips">
<i class="fas fa-chevron-left"></i>
</button>	
<i style="color: black;" class="fas fa-2x fa-lightbulb mr-1"></i>
This shows the actions following the provision of an answer to the user. The action may be the Finish, which indicates that the intent is finalized following the answer or a Reprompt, which means that the skill will say a phrase at the end of the principal text and await a new interaction with the user.
<button id="NextAfter" type="button" class="ml-1 btn btn-outline-dark Attention" data-toggle="tooltip" data-placement="top" title="Click here">
<i class="fas fa-chevron-right"></i>
</button>
</div>	
</div>

<!-- Options  -->
<div id="OptionsModal" class="alert alert-warning fade show mx-auto w-100 ml-3 mr-3 mt-2" role="alert">
<div class="mx-auto w-100 h6 text-black">
<button id="PreviousOptions" type="button" class="mr-1 btn btn-outline-dark" data-toggle="tooltip" data-placement="top" title="Previous Tips">
<i class="fas fa-chevron-left"></i>
</button>	
<i style="color: black;" class="fas fa-2x fa-lightbulb mr-2"></i>Here, you have the option of either editing or excluding an intent. Remember that required intents cannot be deleted.
<button id="NextOptions" type="button" class="ml-1 btn btn-outline-dark Attention" data-toggle="tooltip" data-placement="top" title="Click here">
<i class="fas fa-times-circle"></i>
</button>
</div>	
</div>	
	

<!-- Help Intent -->
<div class="modal fade" tabindex="-1" id="AfterLR" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div style="line-height: 2.5;" class="modal-body text-center mt-2 h5">
	<p>The LaunchRequest intent has been updated.</p>
	<p>The correct function of a skill depends on the required intents.</p>
	<p>I will add them to your list.</p>	
</div>
<div class="modal-footer bg-dark"><button id="AfterLRBtn" type="button" class="btn btn-success btn-lg" data-dismiss="modal"><i class="fas fa-2x mr-2 fa-thumbs-up"></i>OK</button></div>
</div>
</div>
</div>
</div>

<!-- After Help Intent -->
<div class="modal fade" tabindex="-1" id="AfterIntents" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div style="line-height: 2.5;" class="modal-body text-center mt-2 h5">
<p>As the edition of these intents is not required, I will add a <button type="button" class="btn btn-sm btn-warning"><i style="color: black;" class="fas fa-exclamation-triangle"></i></button> for you.</p>	
</div>
<div class="modal-footer bg-dark"><button id="btnAfterIntents" type="button" class="btn btn-success btn-lg" data-dismiss="modal"><i class="fas fa-2x mr-2 fa-thumbs-up"></i>OK</button></div>
</div>
</div>
</div>
</div>

<!-- Help Intent -->
<div class="modal fade" tabindex="-1" id="CIntent" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div style="line-height: 2.5;" class="modal-body text-center mt-2 h5">
	<p>We can now create your first intent.</p>
	<p>Let me show you how.</p>
	<p>Let’s first create an intent of the <b>Q&A</b> type.</p>
	<p>This type of intent allows us to create an answer to a specific question.</p>
	<p>Click on the button below to begin</p>
	<p><a class="btn btn-primary AttentionL" href="index.php?p=Form&KeyUser=<?php echo($KeyUser);?>&Action=CDS&Form=QA&idRepository=<?php echo($idRepository);?>" role="button">Questions and Answers</a></p>
</div>
</div>
</div>
</div>
</div>

<!-- RandomQuotesTips -->
<div class="modal fade" tabindex="-1" id="QA" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div style="line-height: 3.5;" class="modal-body text-center mt-2 h5">
<div>Register a Questions-and-Answers Intent.</div>
<div>If you need to update or exclude an intent, click in the appropriate button.</div>
<div>Let’s now register a different <b>Q&A</b> intent.</div>
<div>Remember that this type of intent allows us to create an answer to a specific question.</div>
<div><a class="btn btn-primary AttentionL" href="index.php?p=Form&KeyUser=<?php echo($KeyUser);?>&Action=CDS&Form=QA&idRepository=<?php echo($idRepository);?>" role="button">Questions and Answers</a></div>
</div>
</div>
</div>
</div>

<!-- RandomQuotesTips -->
<div class="modal fade" tabindex="-1" id="QA2" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div style="line-height: 3.5;" class="modal-body text-center mt-2 h5">
<div>We have now registered two <b>Q&A</b> intents</div>
<div>It is important to remember here that a skill is composed of a number of different intents, but to simplify the learning process, let’s just create another four <b>Q&A</b> intents.</div>
<div>Click on the button below to create the intents automatically.</div>
<div><button id="CreateQA" type="button" class="btn btn-lg btn-primary AttentionL">Create Questions and Answers Intents</button></div>
</div>
</div>
</div>
</div>

<!-- RandomQuotesTips -->
<div class="modal fade" tabindex="-1" id="QAC" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div style="line-height: 3.5;" class="modal-body text-center mt-2 h5">

<div id="Evolution" class="mt-1 mb-1"><i style="color: black;" class="fas fa-2x fa-check-circle"></i>The Intent <b>Evolution</b> has been successfully registered.</div>
	
<div id="Allele" class="mt-1 mb-1"><i style="color: black;" class="fas fa-2x fa-check-circle"></i>The Intent <b>Allele</b> has been successfully registered.</div>
	
<div id="Dominance" class="mt-1 mb-1"><i style="color: black;" class="fas fa-2x fa-check-circle"></i>The Intent <b>Dominance</b> has been successfully registered.</div>
	
<div id="Recessive" class="mt-1 mb-1"><i style="color: black;" class="fas fa-2x fa-check-circle"></i>The Intent <b>Recessive</b> has been successfully registered.</div>
	
<div id="Microevolution" class="mt-1 mb-1"><i style="color: black;" class="fas fa-2x fa-check-circle"></i>The Intent <b>Microevolution</b> has been successfully registered.</div>
	
<div id="Macroevolution" class="mt-1 mb-1"><i style="color: black;" class="fas fa-2x fa-check-circle"></i>The Intent <b>Macroevolution</b> has been successfully registered.</div>
	
<div id="All1" class="mt-1 mb-1">Creating Intents. Please wait...</div>
	
<div id="All" class="mt-1 mb-1"><i style="color: black;" class="fas fa-2x fa-check-circle mr-2"></i>The Intents has been successfully registered. Please wait...</div>
	
</div>
</div>
</div>
</div>

<!-- RandomQuotesTips -->
<div class="modal fade" tabindex="-1" id="RandomQuotesTips" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div style="line-height: 3.5;" class="modal-body text-center mt-2 h5">
<div>We have now registered a number of different <b>Q&A</b> intents.</div>
	<div>To further develop our interaction with the user we now need to create an intent of the <b>Random Quotes</b> type.</div>
	<div>This type of intent permits a greater level of interaction with the user, providing phrases/questions, which may be either random or refer specifically to the content of a skill selected by Alexa.</div>
	<div>To register an intent of the <b>Random Quotes</b> type, click on the <b>Random Quotes</b> button.</div>
<div><a class="btn mt-3 btn-lg btn-success AttentionL" href="index.php?p=RandomQuotes&KeyUser=<?php echo($KeyUser);?>&Action=CDS&Form=RandomQuotes&idRepository=<?php echo($idRepository);?>" role="button" role="button">Random Quotes</a></div>
<div></div>
</div>
</div>
</div>
</div>


<!-- Code Modal -->
<div class="modal fade" tabindex="-1" id="NoTutorialModal" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white text-center"><h5 class="modal-title">ForAlexa</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i style="color: white;" class="fas fa-1x fa-times"></i></button>
</div>
<div style="line-height: 2.5;" class="modal-body text-center mt-1 h5">
Consult <a style="color: white;" class="btn btn-dark btn-lg" href="index.php?p=Manual" role="button"><i class="fas fa-2x fa-file-pdf mr-2"></i><?php if($device == "PC") {echo("Manual");}?></a> for further details on how to submit your skill to Amazon. 
</div>
<div class="modal-footer bg-dark">
<button type="button" class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
</div>	
</div>	
</div>	
</div>

<!-- Code Modal -->
<div class="modal fade" tabindex="-1" id="CodeModal" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white text-center"><h5 class="modal-title">ForAlexa</h5>
<button id="btnF" type="button" class="close" data-dismiss="modal" aria-label="Close"><i style="color: white;" class="fas fa-1x fa-times"></i></button>
</div>
<div style="line-height: 2.5;" class="modal-body text-center mt-1 h5">

<div id="ZeroStep">
<div>Our test intent has been created. New intents of the <b>Q&A</b> or <b>RQ</b> types can be created by clicking on the button <button type="button" class="btn btn-lg btn-primary AttentionL">New Intent</button> <b>(Fig.1)</b>, which will be disabled during this tutorial.</div>

<div class="mt-4 mb-2">
<figure><img src="gif/ButtonForm.gif" width="50%" height="50%"><figcaption><b>Fig. 1</b></figcaption></figure>
</div>
<div>We can now generate the data for a skill using ForAlexa.</div>
<div><button id="NextZeroStep" type="button" class="btn btn-lg btn-secondary AttentionL" data-toggle="tooltip" data-placement="top" title="Click here"><i class="fas fa-2x fa-hand-point-right mr-2"></i>Let's Go</button></div>
</div>
	
<div id="OneStep">
<div>Step <b>1</b> of <b>2</b></div>
<div>The first step is to obtain the “.json” file that contains the list of your intents created by ForAlexa.</div>
<div class="mt-4 mb-4">For this, locate and click on the button <a data-toggle="tooltip" data-placement="top" title="Download json File" class="btn btn-lg btn-primary text-white AttentionL" href="JsonFile.php?KeyUser=<?php echo($KeyUser);?>&idRepository=<?php echo($idRepository);?>" role="button">json File</a> <b>(Fig. 2)</b> behind this box, and <b>save the file to your computer, where it can be accessed easily.</b></div>
<div class="mt-2 mb-2">
<figure><img src="gif/JsonFile.gif" width="50%" height="50%"><figcaption><b>Fig. 2</b></figcaption></figure></div>
<div><button data-toggle="tooltip" data-placement="top" title="Click here" id="DoneStep1" class="btn btn-lg btn-success AttentionL"><i class="fas fa-2x fa-thumbs-up mr-2"></i>Go to Step 2</button></div>	
</div>	
	
<div id="TwoStep">
<div>Step <b>2</b> of <b>2</b></div>
<div>With the json file saved on your computer, we need the source code of your skill, for which, you need to locate and click on the button <a data-toggle="tooltip" data-placement="top" title="Source-code Skill" class="btn btn-lg btn-primary text-white AttentionL" href="index.php?p=MakeSkill&KeyUser=<?php echo($KeyUser);?>&idRepository=<?php echo($idRepository);?>" role="button" target="_blank">Alexa code</a></div>
<div>Clicking on this button will open a new tab on your navigator. Access this tab and click on <i>“Copy to clipboard”</i> <b>(Fig. 3)</b> to store the source code of your skill on the clipboard, that is, CTRL+C the content. Return here to click on the button for the next step. You can do this at any moment by clicking on this button (Alexa Code).</div>
<div class="mt-1"><figure><img src="gif/AlexaCode.gif" width="50%" height="50%"><figcaption><b>Fig. 3</b></figcaption></figure></div>
<div class="mt-2 row row-cols-2">
<div class="col">
  <button data-toggle="tooltip" data-placement="top" title="Click here to back Step" id="BackStep1" class="btn btn-lg btn-success"><i class="fas fa-2x fa-undo-alt mr-2"></i>Back to Step 1</button></div>
<div class="col">
  <button data-toggle="tooltip" data-placement="top" title="Click here to next Step" id="DoneStep2" class="btn btn-lg btn-success AttentionL"><i class="fas fa-2x fa-thumbs-up mr-2"></i>Go to Step 3</button></div>	
</div>
</div>	

<div id="TreeStep">
<div class="h2 mt-1 mb-3">Congratulations, you have completed your first skill using ForAlexa.</div>
<div><figure><img src="https://media.tenor.com/images/2a8c16ba3bac31f0e39648de78e14406/tenor.gif" width="80%" height="80%"></figure></div>
<div class="mt-2 mb-3">We now need to submit your skill to Amazon. Would you like to continue to the <b>submission tutorial?</b></div>
<div class="mt-2 row row-cols-2">
<div class="col">
  <button data-toggle="tooltip" data-placement="top" title="Cancel Tutorial" id="CancelTutorial" class="btn btn-lg btn-danger btn-block"><i class="fas fa-2x mr-2 fa-times-circle"></i>NO</button></div>
<div class="col">
  <button data-toggle="tooltip" data-placement="top" title="Click here to Continue" id="DoneStep3" class="btn btn-lg btn-success btn-block"><i class="fas fa-2x fa-thumbs-up mr-2"></i>Yes</button></div>
</div>	
</div>	
	
<div id="FourStep">
<div>Skill Submission</div>
<div>Step <b>1</b> of <b>7</b></div>
<div>
To submit your skill, we will need to access the development area of Alexa, register and login. To do this, click on <a class="btn btn-lg btn-success AttentionL" href="https://developer.amazon.com/alexa/console/ask?" target="_blank" role="button" role="button">Alexa Developer Console</a> which will open a new tab for your login <b>(Fig. 4)</b>. If you have not registered, this can be done by clicking on "Create your Amazon account" and following the instructions <b>(Fig. 5)</b>. Once logged in, return to the page to click on the button for the next step.
</div>
<div class="mt-1 row row-cols-2">
<div class="col">
  <figure><img src="gif/Login.gif" with="50%"><figcaption><b>Fig. 4</b></figcaption></figure></div>
<div class="col">
  <figure><img src="gif/CreateAccount.gif" with="50%"><figcaption><b>Fig. 5</b></figcaption></figure></div>	
</div>
<button id="DoneStep4" class="btn btn-lg btn-success AttentionL"><i class="fas fa-2x fa-thumbs-up mr-2"></i>Go to Step 2</button>	
</div>
	
<div id="FiveStep">
<div>Step <b>2</b> of <b>7</b></div>
<div>Once logged in, locate the <button class="btn btn-lg btn-primary" disabled>Create Skill</button> button in your development area and click on it.</div>
	<div>Inform the <b>Name of the skill</b>, choose your <b>Language</b>, and in <b>“Choose a model to add to your skill”</b>, select <b>Custom</b>, while in <b>“Choose a method to host your skill’s backend resources”</b>, select <b>Alexa-hosted (Node.js)</b>. Finally, click on <b>Create Skill</b> and wait.(Fig. 6)</b>.</div>

<div class="mt-2">
<figure><img src="gif/CreateSkill.gif"><figcaption><b>Fig. 6</b></figcaption></figure>
</div>

<div>
<div class="mt-2 row row-cols-2">
<div class="col">
  <button data-toggle="tooltip" data-placement="top" title="Click here to back Step" id="BackTStep1" class="btn btn-lg btn-success"><i class="fas fa-2x fa-undo-alt mr-2"></i>Back to Step 1</button></div>
<div class="col">
  <button data-toggle="tooltip" data-placement="top" title="Click here to next Step" id="DoneTStep2" class="btn btn-lg btn-success AttentionL"><i class="fas fa-2x fa-thumbs-up mr-2"></i>Go to Step 3</button></div>	
</div>	
</div>	
</div>	

<div id="SixStep">
<div>Step <b>3</b> of <b>7</b></div>
<div>In <i>"Choose a template to add to your skill"</i>, select <b>Start from Scratch</b> and then click on <button class="btn btn-lg btn-primary" disabled>Continue with template</button> and wait for your skill to be created. <b>(Fig. 7)</b>.</div>
<div class="mt-2">
<figure><img src="gif/Template.gif"><figcaption><b>Fig. 7</b></figcaption></figure>
</div>
<div>
<div class="mt-2 row row-cols-2">
<div class="col">
  <button data-toggle="tooltip" data-placement="top" title="Click here to back Step" id="BackTStep2" class="btn btn-lg btn-success"><i class="fas fa-2x fa-undo-alt mr-2"></i>Back to Step 2</button></div>
<div class="col">
  <button data-toggle="tooltip" data-placement="top" title="Click here to next Step" id="DoneTStep3" class="btn btn-lg btn-success AttentionL"><i class="fas fa-2x fa-thumbs-up mr-2"></i>Go to Step 4</button></div>	
</div>	
</div>	
</div>

<div id="SevenStep">
<div>Step <b>4</b> of <b>7</b></div>
<div>We now need to import our json File. Locate the JSON Editor at Amazon and import the file, click on Save and then on Build Model <b>(Fig. 8)</b>.</div>
<div class="mt-2">
<figure><img src="gif/Json.gif"><figcaption><b>Fig. 8</b></figcaption></figure>
</div>
<div>
<div class="mt-2 row row-cols-2">
<div class="col">
  <button data-toggle="tooltip" data-placement="top" title="Click here to back Step" id="BackTStep3" class="btn btn-lg btn-success"><i class="fas fa-2x fa-undo-alt mr-2"></i>Back to Step 3</button></div>
<div class="col">
  <button data-toggle="tooltip" data-placement="top" title="Click here to next Step" id="DoneTStep4" class="btn btn-lg btn-success AttentionL"><i class="fas fa-2x fa-thumbs-up mr-2"></i>Go to Step 5</button></div>	
</div>	
</div>	
</div>
	
<div id="EightStep">
<div>Step <b>5</b> of <b>7</b></div>
<div>We now need to insert the source code generated by ForAlexa. To do this, locate the Code tab on the Amazon page and click on it. Select all your content and substitute it with the content generated by ForAlexa, then click on Save and Deploy <b>(Fig. 9)</b>.</div>
<div class="mt-2">
<figure><img src="gif/AmazonCode.gif"><figcaption><b>Fig. 9</b></figcaption></figure>
</div>
<div>
<div class="mt-2 row row-cols-2">
<div class="col">
  <button data-toggle="tooltip" data-placement="top" title="Click here to back Step" id="BackTStep4" class="btn btn-lg btn-success"><i class="fas fa-2x fa-undo-alt mr-2"></i>Back to Step 4</button></div>
<div class="col">
  <button data-toggle="tooltip" data-placement="top" title="Click here to next Step" id="DoneTStep5" class="btn btn-lg btn-success AttentionL"><i class="fas fa-2x fa-thumbs-up mr-2"></i>Go to Step 6</button></div>	
</div>	
</div>	
</div>		

<div id="NineStep">
<div>Step <b>6</b> of <b>7</b></div>
<div>We must now test the skill. For this, locate and click on the “Test” tab, located on the Amazon Developer Console page <b>(Fig. 10)</b>.</div>
<div>In "Skill testing is enabled in" select "Development" <b>(Fig. 10)</b>.</div>
<div>Here you can open and test your skill, using open + LaunchRequest (which we will standardize here as “professor of evolution”). You can type or speak this command.</div>
<div>You can (and should) also test your utterances. For this, use “ask the professor of evolution” + utterance.</div>
<div class="mt-2">
<figure><img src="gif/Test.gif"><figcaption><b>Fig. 10</b></figcaption></figure>
</div>
<div>
<div class="mt-2 row row-cols-2">
<div class="col">
  <button data-toggle="tooltip" data-placement="top" title="Click here to back Step" id="BackTStep5" class="btn btn-lg btn-success"><i class="fas fa-2x fa-undo-alt mr-2"></i>Back to Step 5</button></div>
<div class="col">
  <button data-toggle="tooltip" data-placement="top" title="Click here to next Step" id="DoneTStep6" class="btn btn-lg btn-success AttentionL"><i class="fas fa-2x fa-thumbs-up mr-2"></i>Go to Step 7</button></div>	
</div>	
</div>	
</div>
	
<div id="TeenStep">
<div>Step <b>7</b> of <b>7</b></div>
<div>After testing your skill (not this exercise skill, but a new one that you will create), you can submit it for publication in the Amazon Skill Store.</div>
<div>Locate and click on the “Distribution” tab, which can be found on the Amazon Developer Console page.</div>
<div>You should insert the information on your skill here. Remember that some fields are required <b>(Fig. 11)</b>.</div>
<div>You can also activate a beta test in your skill, which will share your skill so that other people can also test it <b>(Fig. 12)</b>.</div>
<div>At the end, you can submit your skill for publication.</div>
<div class="mt-1 row row-cols-1">
<div class="col">
  <figure><img src="gif/Info.gif" with="50%"><figcaption><b>Fig. 11</b></figcaption></figure></div>
<div class="col">
  <figure><img src="gif/Beta.gif" with="50%"><figcaption><b>Fig. 12</b></figcaption></figure></div>	
</div>

<div>
<div class="mt-2 row row-cols-2">
<div class="col mt-2">
  <button data-toggle="tooltip" data-placement="top" title="Click here to back Step" id="BackTStep6" class="btn btn-lg btn-success"><i class="fas fa-2x fa-undo-alt mr-2"></i>Back to Step 6</button></div>
<div class="col mt-2">
  <button data-toggle="tooltip" data-placement="top" title="Click here to finish" id="DoneTStep7" class="btn btn-lg btn-success AttentionL"><i class="fas fa-2x fa-thumbs-up mr-2"></i>Done Tutorial</button></div>	
</div>	
</div>	
</div>	
</div>
<div class="modal-footer bg-dark"><button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button></div>
	


	

	
	

	
</div>
</div>
</div>
<?php } ?>
<table class="table text-center table-dark table-striped table-hover table-sm mx-auto ml-5 mr-5">
<tbody>
<thead class="thead-light">	
<tr>
<th id="IntentTooltip">Intent name</th>
<th id="StatusTooltip">Status</th>	
<th id="TypeTooltip">Type</th>
<th id="UtteracesTooltip">Sample Utterances</th>	
<th id="AnswerTooltip">Answer</th>
<th id="AfterTooltip">After</th>
<th id="OptionsTooltip" colspan="2">Options</th>	
</tr>
</thead>	

<?php
$query = ("SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository'");
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {	
?>
	
<!-- Acesso Repositório -->
<div class="modal fade" tabindex="-1" id="RepositoriesEdit">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div style="line-height: 2.5;" class="modal-body text-center mt-2 h5">
<p>The first intent that must be edited is the LaunchRequest.</p>
<p>The LaunchRequest is the intent responsible for the presentation of your skill when it is activated.</p>	
<p>Click on the button below to edit the LaunchRequest</p>
<p><a class="btn btn-lg btn-success" href="index.php?p=Form&Action=Update&KeyUser=<?php echo($KeyUser);?>&id=<?php echo($row["id_question"]);?>&Form=QA&idRepository=<?php echo($idRepository);?>" role="button"><i style="color: black;" class="fas fa-edit fa-2x AttentionL"></i></a></p>
</div>
</div>
</div>
</div>

<tr id="<?php if($row["IntentName"] == "AMAZON.YesIntent") {echo("AMAZONYesIntent");} elseif ($row["IntentName"] == "AMAZON.NoIntent") {echo("AMAZONNoIntent");} else {echo($row["IntentName"]);}?>">	
	
<td id="IntentTooltipL"><?php echo($row["IntentName"]);?></td>
	
<td id="StatusTooltipL">
	<?php if($row["IntentName"] == "LaunchRequest" and $row["answer"] == "Welcome, you can say Hello or Help. Which would you like to try") {echo('<button type="button" class="btn btn-sm btn-light"><i style="color: red;" class="fas fa-times-circle"></i></button>');} 
	elseif($row["IntentName"] == "LaunchRequest" and $row["answer"] != "Welcome, you can say Hello or Help. Which would you like to try") {echo('<button type="button" class="btn btn-sm btn-light"><i style="color: green;" class="fas fa-check-circle"></i></button>');}
	
	elseif($row["IntentName"] == "HelpIntent" and $row["answer"] == "You can say hello to me! How can I help?") {echo('<button type="button" class="btn btn-sm btn-warning"><i style="color: black;" class="fas fa-exclamation-triangle"></i></button>');} 
	elseif($row["IntentName"] == "HelpIntent" and $row["answer"] != "You can say hello to me! How can I help?") {echo('<button type="button" class="btn btn-sm btn-success"><i style="color: green;" class="fas fa-check-circle"></i></button>');}
	
	// CancelAndStopIntent
	elseif($row["IntentName"] == "CancelAndStopIntent" and $row["answer"] == "So long and thanks for all the fish") {echo('<button type="button" class="btn btn-sm btn-warning"><i style="color: black;" class="fas fa-exclamation-triangle"></i></button>');} 
	elseif($row["IntentName"] == "CancelAndStopIntent" and $row["answer"] != "So long and thanks for all the fish") {echo('<button type="button" class="btn btn-sm btn-success"><i style="color: green;" class="fas fa-check-circle"></i></button>');}
	// FallbackIntent
	elseif($row["IntentName"] == "FallbackIntent" and $row["answer"] == "Sorry, I dont know about that. Please try again.") {echo('<button type="button" class="btn btn-sm btn-warning"><i style="color: black;" class="fas fa-exclamation-triangle"></i></button>');} 
	elseif($row["IntentName"] == "FallbackIntent" and $row["answer"] != "Sorry, I dont know about that. Please try again.") {echo('<button type="button" class="btn btn-sm btn-success"><i style="color: green;" class="fas fa-check-circle"></i></button>');}
	// IntentReflector
	elseif($row["IntentName"] == "IntentReflector" and $row["answer"] == "You just triggered") {echo('<button type="button" class="btn btn-sm btn-warning"><i style="color: black;" class="fas fa-exclamation-triangle"></i></button>');} 
	elseif($row["IntentName"] == "IntentReflector" and $row["answer"] != "You just triggered") {echo('<button type="button" class="btn btn-sm btn-success"><i style="color: green;" class="fas fa-check-circle"></i></button>');}
	// Error
	elseif($row["IntentName"] == "Error" and $row["answer"] == "Sorry, I had trouble doing what you asked. Please try again.") {echo('<button type="button" class="btn btn-sm btn-warning"><i style="color: black;" class="fas fa-exclamation-triangle"></i></button>');} 
	elseif($row["IntentName"] == "Error" and $row["answer"] != "Sorry, I had trouble doing what you asked. Please try again.") {echo('<button type="button" class="btn btn-sm btn-success"><i style="color: green;" class="fas fa-check-circle"></i></button>');}
	// HelloWorldIntent
	elseif($row["IntentName"] == "HelloWorldIntent" and $row["answer"] == "Welcome, you can say Hello or Help. Which would you like to try") {echo('<button type="button" class="btn btn-sm btn-warning"><i style="color: black;" class="fas fa-exclamation-triangle"></i></button>');} 
	elseif($row["IntentName"] == "HelloWorldIntent" and $row["answer"] != "Welcome, you can say Hello or Help. Which would you like to try") {echo('<button type="button" class="btn btn-sm btn-success"><i style="color: green;" class="fas fa-check-circle"></i></button>');}
	// AMAZON.YesIntent	
	elseif($row["IntentName"] == "AMAZON.YesIntent" and $row["answer"] == "Customize Yes Intent") {echo('<button type="button" class="btn btn-sm btn-warning"><i style="color: black;" class="fas fa-exclamation-triangle"></i></button>');} 
	elseif($row["IntentName"] == "AMAZON.YesIntent" and $row["answer"] != "Customize Yes Intent") {echo('<button type="button" class="btn btn-sm btn-success"><i style="color: green;" class="fas fa-check-circle"></i></button>');}
	// AMAZON.NoIntent	
	elseif($row["IntentName"] == "AMAZON.NoIntent" and $row["answer"] == "Customize No Intent") {echo('<button type="button" class="btn btn-sm btn-warning"><i style="color: black;" class="fas fa-exclamation-triangle"></i></button>');} 
	elseif($row["IntentName"] == "AMAZON.NoIntent" and $row["answer"] != "Customize No Intent") {echo('<button type="button" class="btn btn-sm btn-success"><i style="color: green;" class="fas fa-check-circle"></i></button>');}
	else{
	echo('<button type="button" class="btn btn-sm btn-light"><i style="color: green;" class="fas fa-check-circle"></i></button>');
	}
	
	?>
	
</td>	
	
<td id="TypeTooltipL"><?php if($row["IntentName"] == "LaunchRequest" or $row["IntentName"] == "HelpIntent" or $row["IntentName"] == "CancelAndStopIntent" or $row["IntentName"] == "FallbackIntent" or $row["IntentName"] == "IntentReflector" or $row["IntentName"] == "Error" or $row["IntentName"] == "HelloWorldIntent" or $row["IntentName"] == "AMAZON.YesIntent" or $row["IntentName"] == "AMAZON.NoIntent"){echo("Required");}else{echo("Questions & Answers");} ?></td>	
	
<td id="UtteracesTooltipL"><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#<?php echo("utteraces_".$row["id_question"]); ?>"><i class="fas fa-head-side-cough"></i></button></td>
	
<td id="AnswerTooltipL"><button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#<?php echo("answer_".$row["id_question"]); ?>"><i class="fas fa-volume-up"></i></button></td>
	
<td id="AfterTooltipL"><?php if($row["option"] == "reprompt0") {
?>
<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#<?php echo("reprompt_".$row["id_question"]); ?>"><i class="fas fa-1x fa-info-circle"></i></button>
<?php } elseif($row["IntentName"] == "LaunchRequest" or $row["IntentName"] == "HelpIntent" or $row["IntentName"] == "CancelAndStopIntent" or $row["IntentName"] == "FallbackIntent" or $row["IntentName"] == "IntentReflector" or $row["IntentName"] == "Error" or $row["IntentName"] == "HelloWorldIntent" or $row["IntentName"] == "AMAZON.YesIntent" or $row["IntentName"] == "AMAZON.NoIntent"){echo('<i style="color: white;" class="fas fa-window-minimize"></i>');} ?>	
<?php if ($row["option"] == "end") {echo("Finish");};?></td>	
	
<td id="OptionsTooltipL" data-toggle="tooltip" data-placement="top" title="Edit Intent: <?php echo($row["IntentName"]);?>"><a style="color: black;" class="btn btn-sm btn-success" href="index.php?p=Form&Action=Update&KeyUser=<?php echo($KeyUser);?>&id=<?php echo($row["id_question"]);?>&Form=QA&idRepository=<?php echo($idRepository);?>" role="button" onClick="return confirm('Edit Intent <?php echo($row["IntentName"]);?> ?');"><i class="fas fa-edit fa-1x"></i></a></td>

<td id="OptionsTooltipLL" data-toggle="tooltip" data-placement="top" title="<?php if((Utterances($row["IntentName"])) == "disabled") {echo("This Intent cannot be deleted");}?>"><a style="color: black;" class="btn btn-sm btn-danger <?php echo(Utterances($row["IntentName"]));?>" href="index.php?p=Operations&Action=Delete&KeyUser=<?php echo($KeyUser);?>&id=<?php echo($row["id_question"]);?>&idRepository=<?php echo($idRepository);?>" role="button" onClick="return confirm('Delete Intent <?php echo($row["IntentName"]);?> ?');"><i class="fas fa-1x fa-trash-alt"></i></a></td>		
</tr>	
		
<?php } ?>

<?php
$query = ("SELECT * FROM `RandomQuotes` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository'");
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
?>		
<tr>
<td><?php echo($row["IntentName"]);?></td>
<td><button type="button" class="btn btn-sm btn-light"><i style="color: green;" class="fas fa-check-circle"></i></button></td>
<td>Random Quotes</td>	
<td><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#<?php echo("RandomUtteraces_".$row["id_quotes"]); ?>"><i class="fas fa-head-side-cough"></i></button></td>
<td><button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#<?php echo("Script_".$row["id_quotes"]); ?>"><i class="fas fa-volume-up"></i></button></td>
<td><i style="color: white;" class="fas fa-window-minimize"></i></td>
<td data-toggle="tooltip" data-placement="top" title="Random Quotes cannot be edited"><a style="color: black;" class="btn btn-sm btn-success disabled" href="" role="button"><i class="fas fa-edit fa-1x"></i></a></td>	
<td><a style="color: black;" class="btn btn-sm btn-danger" href="index.php?p=Operations&Action=DeleteRandom&KeyUser=<?php echo($KeyUser);?>&id=<?php echo($row["id_quotes"]);?>&idRepository=<?php echo($idRepository);?>" role="button" onClick="return confirm('Delete Intent <?php echo($row["IntentName"]);?> ?');"><i class="fas fa-1x fa-trash-alt"></i></a></td>	
</tr>	
<?php } ?>	
</tbody>
</table>
<script>
$(document).ready(function(){
<?php
if($_SESSION["Tips"] == "YES"){
echo('$("#Assistance").checked=true;');
echo('$("#OFF").hide();');
echo('$("#ON").show();');
	
} else {
echo('$("#Assistance").checked=false;');
echo('$("#OFF").show();');
echo('$("#ON").hide();');		
}	
?>
$("#Assistance").change(function() {
if ($("#Assistance").is(":checked")) {
$("#Assistance").checked=true;
$.ajax({    
url: 'Assistance.php', 
type: 'POST', 
data:{"Assistance" : "YES"}, 
success: function(data) { 
console.log(data); 
if(data == 666){  
setTimeout(function () {
location.reload()
}, 100);
$("#OFF").hide();
$("#ON").show();
$("#Assistance").checked=false;
}}});	
		
} else {
$("#Assistance").checked=false;
$.ajax({    
url: 'Assistance.php', 
type: 'POST', 
data:{"Assistance" : "NO"}, 
success: function(data) { 
console.log(data); 
if(data == 33){  
setTimeout(function () {
location.reload()
}, 100);
$("#ON").hide();
$("#OFF").show();
$("#Assistance").checked=true;
}}});
}
})	
})
</script>
<?php
if($_SESSION["Tips"] == "YES"){
?>
<script>
$(document).ready(function(){
$('#IntentNameModal').hide();
$('#OptionsModal').hide();	
$('#StatusModal').hide();	
		
$('[data-toggle="tooltip"]').tooltip(); 

<?php
$Trigger_LR 	= mysqli_query($mysqli, "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository' and IntentName = 'LaunchRequest' and question_1 is null");

$Trigger_RQ 	= mysqli_query($mysqli, "SELECT * FROM `RandomQuotes` WHERE KeyUser = '$KeyUser' AND idRepository = '$idRepository'");

	
$Count = mysqli_num_rows($Trigger_LR) + mysqli_num_rows($Trigger_RQ);	
	
if($Count == 1){
$Trigger = "LR";	
}else{
$Trigger = "LROK";	
}

if($num_rows == 10){
$Trigger = "QA1";
}elseif($num_rows == 11){
$Trigger = "QA2";}
elseif($num_rows == 16){
$Trigger = "OK";}
elseif($num_rows == 15){
$Trigger = "QA";}
	
	
?>
var Tutorial = "<?php echo($Trigger);?>";
console.log(Tutorial);
$('#ManualModal').hide();
$('#TutorialModal').hide();
$('#TypeModal').hide();	
$('#UtterancesModal').hide();
$('#AnswerModal').hide();
$('#AfterModal').hide();	
$('#OptionsModal').hide();

// Primeiro Acesso
if(Tutorial == "LR"){
console.log(Tutorial);
// Elementos da Tabela		
$('#HelpIntent').hide();
$('#CancelAndStopIntent').hide();
$('#FallbackIntent').hide();
$('#IntentReflector').hide();
$('#Error').hide();
$('#HelloWorldIntent').hide();
$('#AMAZONYesIntent').hide();
$('#AMAZONNoIntent').hide();
// Elementos do Tutorial	
$('#ManualModal').hide();
$('#TutorialModal').hide();
$('#TypeModal').hide();	
$('#UtterancesModal').hide();
$('#AnswerModal').hide();
$('#AfterModal').hide();	
$('#OptionsModal').hide();
	
setTimeout(function(){
$('#RepositoriesAccess').modal('show');
}, 1000);

//Clicar em YES
$("#YesTutorial").click(function(){
setTimeout(function(){
$('#RepositoriesAccess').modal('hide');	
}, 1000);	
setTimeout(function(){
$('#IntentNameModal').show();
$('#IntentTooltip').addClass('AttentionL');	
$('#IntentTooltipL').addClass('AttentionL');
}, 1500);
setTimeout(function(){
$('#NextIntentName').tooltip('show');	
}, 5000);

// Start Tips
$("#NextIntentName").click(function(){
$('[data-toggle="tooltip"]').tooltip('hide'); 
$('#IntentNameModal').hide();
$("#IntentTooltip").removeClass("AttentionL");
$("#IntentTooltipL").removeClass("AttentionL");
$('#StatusModal').show();	
$("#StatusTooltip").addClass("AttentionL");
$("#StatusTooltipL").addClass("AttentionL");
setTimeout(function(){
$('#PreviousStatus').tooltip('show');	
$('#NextStatus').tooltip('show');	
}, 5000);	
});	
	
// Status	
$("#PreviousStatus").click(function(){
$('[data-toggle="tooltip"]').tooltip('hide'); 
$('#StatusModal').hide();
$("#StatusTooltip").removeClass("AttentionL");
$("#StatusTooltipL").removeClass("AttentionL");
$('#IntentNameModal').show();	
$("#IntentTooltip").addClass("AttentionL");
$("#IntentTooltipL").addClass("AttentionL");
setTimeout(function(){
$('#NextIntentName').tooltip('show');		
}, 5000);	
});	
	
$("#NextStatus").click(function(){
$('[data-toggle="tooltip"]').tooltip('hide'); 
$('#NextStatus').tooltip('hide');	
$('#StatusModal').hide();
$("#StatusTooltip").removeClass("AttentionL");
$("#StatusTooltipL").removeClass("AttentionL");
$('#TypeModal').show();	
$("#TypeTooltip").addClass("AttentionL");
$("#TypeTooltipL").addClass("AttentionL");
setTimeout(function(){
$('#PreviousType').tooltip('show');	
$('#NextType').tooltip('show');	
}, 5000);	
});	
	
// Type
$("#PreviousType").click(function(){
$('[data-toggle="tooltip"]').tooltip('hide'); 
$('#TypeModal').hide();
$("#TypeTooltip").removeClass("AttentionL");
$("#TypeTooltipL").removeClass("AttentionL");
$('#StatusModal').show();	
$("#StatusTooltip").addClass("AttentionL");
$("#StatusTooltipL").addClass("AttentionL");
setTimeout(function(){
$('#PreviousStatus').tooltip('show');	
$('#NextStatus').tooltip('show');	
}, 5000);	
});
	
$("#NextType").click(function(){
$('[data-toggle="tooltip"]').tooltip('hide'); 
$('#TypeModal').hide();
$("#TypeTooltip").removeClass("AttentionL");
$("#TypeTooltipL").removeClass("AttentionL");
$('#UtterancesModal').show();	
$("#UtteracesTooltip").addClass("AttentionL");
$("#UtteracesTooltipL").addClass("AttentionL");
setTimeout(function(){
$('#PreviousUtterances').tooltip('show');	
$('#NextUtterances').tooltip('show');	
}, 5000);	
});

// Utterances	
$("#PreviousUtterances").click(function(){
$('[data-toggle="tooltip"]').tooltip('hide'); 
$('#UtterancesModal').hide();
$("#UtteracesTooltip").removeClass("AttentionL");
$("#UtteracesTooltipL").removeClass("AttentionL");
$('#TypeModal').show();	
$("#TypeTooltip").addClass("AttentionL");
$("#TypeTooltipL").addClass("AttentionL");
setTimeout(function(){
$('#PreviousType').tooltip('show');	
$('#NextType').tooltip('show');	
}, 5000);	
});
	
$("#NextUtterances").click(function(){
$('[data-toggle="tooltip"]').tooltip('hide'); 
$('#UtterancesModal').hide();
$("#UtteracesTooltip").removeClass("AttentionL");
$("#UtteracesTooltipL").removeClass("AttentionL");
$('#AnswerModal').show();	
$("#AnswerTooltip").addClass("AttentionL");
$("#AnswerTooltipL").addClass("AttentionL");
setTimeout(function(){
$('#PreviousAnswer').tooltip('show');	
$('#NextAnswer').tooltip('show');	
}, 5000);	
});	
	
// Answer
$("#PreviousAnswer").click(function(){
$('[data-toggle="tooltip"]').tooltip('hide'); 
$('#AnswerModal').hide();
$("#AnswerTooltip").removeClass("AttentionL");
$("#AnswerTooltipL").removeClass("AttentionL");
$('#UtterancesModal').show();	
$("#UtteracesTooltip").addClass("AttentionL");
$("#UtteracesTooltipL").addClass("AttentionL");
setTimeout(function(){
$('#PreviousUtterances').tooltip('show');	
$('#NextUtterances').tooltip('show');	
}, 5000);	
});		
	
$("#NextAnswer").click(function(){
$('[data-toggle="tooltip"]').tooltip('hide'); 
$('#AnswerModal').hide();
$("#AnswerTooltip").removeClass("AttentionL");
$("#AnswerTooltipL").removeClass("AttentionL");
$('#AfterModal').show();	
$("#AfterTooltip").addClass("AttentionL");
$("#AfterTooltipL").addClass("AttentionL");
setTimeout(function(){
$('#PreviousAfter').tooltip('show');	
$('#NextAfter').tooltip('show');	
}, 5000);	
});	
	
// After
$("#PreviousAfter").click(function(){
$('[data-toggle="tooltip"]').tooltip('hide'); 
$('#AfterModal').hide();
$("#AfterTooltip").removeClass("AttentionL");
$("#AfterTooltipL").removeClass("AttentionL");
$('#AnswerModal').show();	
$("#AnswerTooltip").addClass("AttentionL");
$("#AnswerTooltipL").addClass("AttentionL");
setTimeout(function(){
$('#PreviousAnswer').tooltip('show');		
$('#NextAnswer').tooltip('show');		
}, 5000);	
});		
	
$("#NextAfter").click(function(){
$('[data-toggle="tooltip"]').tooltip('hide'); 
$('#AfterModal').hide();
$("#AfterTooltip").removeClass("AttentionL");
$("#AfterTooltipL").removeClass("AttentionL");
$('#OptionsModal').show();	
$("#OptionsTooltipL").addClass("AttentionL");
$("#OptionsTooltipLL").addClass("AttentionL");
setTimeout(function(){
$('#NextOptions').tooltip('show');		
}, 5000);	
});	
	
// Options
$("#PreviousOptions").click(function(){
$('[data-toggle="tooltip"]').tooltip('hide'); 
$('#OptionsModal').hide();
$("#OptionsTooltipL").removeClass("AttentionL");
$("#OptionsTooltipLL").removeClass("AttentionL");
$('#AfterModal').show();	
$("#AfterTooltip").addClass("AttentionL");
$("#AfterTooltipL").addClass("AttentionL");
setTimeout(function(){
$('#PreviousAfter').tooltip('show');		
$('#NextAfter').tooltip('show');		
}, 5000);	
});		
	
$("#NextOptions").click(function(){
// Remove Tooltip
$('[data-toggle="tooltip"]').tooltip('hide'); 
	
$('#OptionsModal').hide();
$("#OptionsTooltipL").removeClass("AttentionL");
$("#OptionsTooltipLL").removeClass("AttentionL");
setTimeout(function(){
$('#RepositoriesEdit').modal('show');	
}, 2000);	

	
});
});

$("#NoTutorial").click(function(){
setTimeout(function(){
$('#RepositoriesAccess').modal('hide');	
}, 500);
setTimeout(function(){
$('#RepositoriesEdit').modal('show');	
}, 1000);
})
}
if(Tutorial == "LROK"){
console.log(Tutorial);
// Elementos da Tabela		
$('#HelpIntent').hide();
$('#CancelAndStopIntent').hide();
$('#FallbackIntent').hide();
$('#IntentReflector').hide();
$('#Error').hide();
$('#HelloWorldIntent').hide();
$('#AMAZONYesIntent').hide();
$('#AMAZONNoIntent').hide();
// Elementos do Tutorial	
$('#IntentNameModal').hide();	
$('#ManualModal').hide();
$('#TutorialModal').hide();
$('#TypeModal').hide();	
$('#UtterancesModal').hide();
$('#AnswerModal').hide();
$('#AfterModal').hide();	
$('#OptionsModal').hide();

	
setTimeout(function(){
$('#AfterLR').modal('show');	
}, 3000);
	
$("#AfterLRBtn").click(function(){
$('#AfterLR').modal('hide');
setTimeout(function(){
$('#HelpIntent').show();	
}, 1000);
setTimeout(function(){
$('#CancelAndStopIntent').show();	
}, 2000);
setTimeout(function(){
$('#FallbackIntent').show();	
}, 3000);
setTimeout(function(){
$('#IntentReflector').show();	
}, 4000);
setTimeout(function(){
$('#Error').show();	
}, 5000);
setTimeout(function(){
$('#HelloWorldIntent').show();	
}, 6000);
setTimeout(function(){
$('#AMAZONYesIntent').show();	
}, 7000);
setTimeout(function(){
$('#AMAZONNoIntent').show();	
}, 8000);	
setTimeout(function(){
$('#AfterIntents').modal('show');	
}, 10000);	

$("#btnAfterIntents").click(function(){
$('#AfterIntents').modal('hide');
$('#CIntent').modal('show');	
	

$("#AfterLRBtn").click(function(){

});
	
	
	
});

	
});
		
	
	
}
if(Tutorial == "QA"){
console.log(Tutorial);
// Elementos do Tutorial	
$('#IntentNameModal').hide();	
$('#ManualModal').hide();
$('#TutorialModal').hide();
$('#TypeModal').hide();	
$('#UtterancesModal').hide();
$('#AnswerModal').hide();
$('#AfterModal').hide();	
$('#OptionsModal').hide();
// Modal Random Quotes
setTimeout(function(){
$('#RandomQuotesTips').modal('show');
}, 1000);
}

if(Tutorial == "QA1"){
console.log(Tutorial);
// Elementos do Tutorial	
$('#IntentNameModal').hide();	
$('#ManualModal').hide();
$('#TutorialModal').hide();
$('#TypeModal').hide();	
$('#UtterancesModal').hide();
$('#AnswerModal').hide();
$('#AfterModal').hide();	
$('#OptionsModal').hide();
// Modal Random Quotes
setTimeout(function(){
$('#QA').modal('show');
}, 1000);
}	
if(Tutorial == "QA2"){
console.log(Tutorial);
// Elementos do Tutorial	
$('#IntentNameModal').hide();	
$('#ManualModal').hide();
$('#TutorialModal').hide();
$('#TypeModal').hide();	
$('#UtterancesModal').hide();
$('#AnswerModal').hide();
$('#AfterModal').hide();	
$('#OptionsModal').hide();
// Modal Random Quotes
setTimeout(function(){
$('#QA2').modal('show');
}, 1000);
}		
if(Tutorial == "OK"){
console.log(Tutorial);
$('#LinkQA').addClass("disabled");
$('#LinkRC').addClass("disabled");
$('#ZeroStep').hide();
$('#OneStep').hide();
$('#TwoStep').hide();
$('#TreeStep').hide();
$('#FourStep').hide();
$('#FiveStep').hide();
$('#SixStep').hide();
$('#SevenStep').hide();
$('#EightStep').hide();
$('#NineStep').hide();
$('#TeenStep').hide();
$('#btnF').hide();
// Elementos do Tutorial	
$('#IntentNameModal').hide();	
$('#ManualModal').hide();
$('#TutorialModal').hide();
$('#TypeModal').hide();	
$('#UtterancesModal').hide();
$('#AnswerModal').hide();
$('#AfterModal').hide();	
$('#OptionsModal').hide();
setTimeout(function(){
$('#ZeroStep').show();
$('#CodeModal').modal('show');
}, 1000);
$("#NextZeroStep").click(function(){
setTimeout(function(){
$('#ZeroStep').hide();	
}, 500);
setTimeout(function(){
$('#OneStep').show();	
}, 500);
});
$("#DoneStep1").click(function(){
setTimeout(function(){
$('#OneStep').hide();
}, 500);
setTimeout(function(){
$('#TwoStep').show();
}, 700);	
});	
$("#BackStep1").click(function(){
setTimeout(function(){
$('#TwoStep').hide();
}, 500);
setTimeout(function(){
$('#OneStep').show();
}, 700);	
});	
$("#DoneStep2").click(function(){
setTimeout(function(){
$('#TwoStep').hide();
}, 500);
setTimeout(function(){
$('#TreeStep').show();
}, 700);	
});	
$("#CancelTutorial").click(function(){
$('#LinkQA').removeClass("disabled");
$('#LinkRC').removeClass("disabled");
setTimeout(function(){
$('#CodeModal').modal('hide');
}, 500);	
setTimeout(function(){
$('#NoTutorialModal').modal('show');
}, 1000);	
});
$("#DoneStep3").click(function(){
$('#btnF').show();
$('#LinkQA').removeClass("disabled");
$('#LinkRC').removeClass("disabled");
setTimeout(function(){
$('#TreeStep').hide();
}, 500);
setTimeout(function(){
$('#FourStep').show();
}, 700);	
});	
$("#DoneStep4").click(function(){
setTimeout(function(){
$('#FourStep').hide();
}, 500);
setTimeout(function(){
$('#FiveStep').show();
}, 700);	
});	
$("#BackTStep1").click(function(){
setTimeout(function(){
$('#FiveStep').hide();
}, 500);
setTimeout(function(){
$('#FourStep').show();
}, 700);	
});
$("#DoneTStep2").click(function(){
setTimeout(function(){
$('#FiveStep').hide();
}, 500);
setTimeout(function(){
$('#SixStep').show();
}, 700);	
});
$("#BackTStep2").click(function(){
setTimeout(function(){
$('#SixStep').hide();
}, 500);
setTimeout(function(){
$('#FiveStep').show();
}, 700);	
});	
$("#DoneTStep3").click(function(){
setTimeout(function(){
$('#SixStep').hide();
}, 500);
setTimeout(function(){
$('#SevenStep').show();
}, 700);	
});	
$("#BackTStep3").click(function(){
setTimeout(function(){
$('#SevenStep').hide();
}, 500);
setTimeout(function(){
$('#SixStep').show();
}, 700);	
});	
$("#DoneTStep4").click(function(){
setTimeout(function(){
$('#SevenStep').hide();
}, 500);
setTimeout(function(){
$('#EightStep').show();
}, 700);	
});	
$("#BackTStep4").click(function(){
setTimeout(function(){
$('#EightStep').hide();
}, 500);
setTimeout(function(){
$('#SevenStep').show();
}, 700);	
});		
$("#DoneTStep5").click(function(){
setTimeout(function(){
$('#EightStep').hide();
}, 500);
setTimeout(function(){
$('#NineStep').show();
}, 700);	
});
$("#BackTStep5").click(function(){
setTimeout(function(){
$('#NineStep').hide();
}, 500);
setTimeout(function(){
$('#EightStep').show();
}, 700);	
});
$("#DoneTStep6").click(function(){
setTimeout(function(){
$('#NineStep').hide();
}, 500);
setTimeout(function(){
$('#TeenStep').show();
}, 700);	
});	
$("#BackTStep6").click(function(){
setTimeout(function(){
$('#TeenStep').hide();
}, 500);
setTimeout(function(){
$('#NineStep').show();
}, 700);	
});	
$("#DoneTStep7").click(function(){
setTimeout(function(){
$('#LinkQA').removeClass("disabled");
$('#LinkRC').removeClass("disabled");	
$('#CodeModal').modal('hide');
}, 500);
setTimeout(function(){
$('#NoTutorialModal').modal('show');
}, 700);
});
}
	
$("#CreateQA").click(function(){
$('#Evolution').hide();
$('#Allele').hide();
$('#Dominance').hide();
$('#Recessive').hide();
$('#Microevolution').hide();
$('#Macroevolution').hide();
$('#All').hide();
$('#All1').hide();
$('#QA2').modal('hide');
$('#QAC').modal('show');
$('#All1').show();
$.ajax({ 	
url: 'CreateIntent.php', 
type: 'POST', 
data:{"idRepository" : '<?php echo($idRepository); ?>', "KeyUser" : '<?php echo($KeyUser); ?>'}, 
success: function(data) { 
console.log(data);
if(data == 1){		
$('#Evolution').show();
}
if(data == 2){		
$('#Allele').show();
}
if(data == 3){		
$('#Dominance').show();
}
if(data == 4){		
$('#Recessive').show();
}
if(data == 5){		
$('#Microevolution').show();
}
if(data == 6){		
$('#Macroevolution').show();
}
if(data == 9){	
$('#All1').hide();
$('#All').show();
setTimeout(function(){
location.href = 'index.php?p=IntentList&idRepository=<?php echo($idRepository); ?>&KeyUser=<?php echo($KeyUser); ?>'
}, 3000);
}
	
}});
});
	
	
});	
</script>
<?php
}?>
</body>
</html>