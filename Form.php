<?php

$KeyUser 		= $_GET["KeyUser"];
$action 		= $_GET["Action"];
$Form			= $_GET["Form"];
$idRepository	= $_GET["idRepository"];

if ($action == "Update") {
$id 			= $_GET["id"];
$query 			= "SELECT * FROM `Questions` WHERE `id_question` = '$id' AND `KeyUser` = '$KeyUser' AND `idRepository` = '$idRepository'";
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
<?php 
$QA 			= mysqli_query($mysqli, "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$num_rows_QA 	= mysqli_num_rows($QA);
$RQ 			= mysqli_query($mysqli, "SELECT * FROM `RandomQuotes` WHERE KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$num_rows_RQ 	= mysqli_num_rows($RQ);
$num_rows 		= $num_rows_QA + $num_rows_RQ;

if($_GET['Form'] == "QA" and $num_rows < 16){
$KeyWords 	= array("Evolution", "Allele", "Dominance", "Recessive", "Microevolution", "Macroevolution");
$query = ("SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository'");
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
foreach ($KeyWords as $key => $val){
if ($val == $row["IntentName"]){
unset($KeyWords[$key]);
}
}
}	
$RandKey 	= array_rand($KeyWords, 1);
$Word 		= $KeyWords[$RandKey];
} elseif($_GET['Form'] == "QA" and $num_rows > 16) {
	$KeyWords 	= array("QuestionsEvolution", "QuestionsEvolution", "QuestionsEvolution");
	$RandKey 	= array_rand($KeyWords, 1);
	$Word 		= $KeyWords[$RandKey];
	}
elseif($_GET['Form'] == "RandomQuotes" and $num_rows > 15) {
	$KeyWords 	= array("QuestionsEvolution", "QuestionsEvolution", "QuestionsEvolution");
	$RandKey 	= array_rand($KeyWords, 1);
	$Word 		= $KeyWords[$RandKey];
	}
?>


<form action="index.php?p=OpForm&KeyUser=<?php echo($KeyUser);?>&Action=<?php echo($action);?><?php if ($action == 'Update') {echo('&id='.$id);}?>&Form=<?php echo($Form);?>&idRepository=<?php echo($idRepository);?>" method="post">	
<div class="mt-2">
<?php 
if($Intent == "LaunchRequest"){
echo('<div class="text-white h1">Launch Request</div>');	
}
elseif($_GET['Form'] == "QA" and $Intent != "LaunchRequest" and $action == "CDS" or $action == "Update") { ?>
<div class="text-white h1">Questions and Answers</div>
<?php } 
if($_GET['Form'] == "RandomQuotes" and $action == "CDS") { ?>	
<div class="text-white h1">Random Quotes</div>
<?php } ?>
<?php
$QA 			= mysqli_query($mysqli, "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$num_rows 		= mysqli_num_rows($QA);
if($num_rows <= 10){
?>	

<div class="modal fade" tabindex="-1" id="FirstIntent" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div style="line-height: 2.5;" class="modal-body text-center h5 mt-1">
<div id="FA0">
<p>Let’s create our first Questions and Answers (Q&A) type of intent</p>
<?php 
$query = ("SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository' and IntentName = 'LaunchRequest'");
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$InvocationName = $row["question_1"];
}
?>
<p>This is the question you may ask Alexa to answer.</p>
<p>For instance, if you want to ask <b>"what is Evolution"</b> for a skill called <b>"evolution professor"</b>, you must write this question below, however, the whole sentence to ask will be:</p>
<p>Alexa, ask to "<b><?php echo($InvocationName);?></b>", <i>"what is Evolution"</i></p>
</div>
<div id="FA1">
<p>You can add examples by clicking on Intent, Name, Utterances, Answer, and Reprompt.</p>
<button id="btn_IntentName" type="button" class="btn btn-lg btn-danger mr-2 ml-2"><i id="FaIntentName" class="fas fa-2x fa-plus-circle mr-2"></i>Intent Name</button>
<button id="btn_utterance" type="button" class="btn btn-lg btn-danger mr-2 ml-2"><i id="FaUtterance" class="fas fa-2x fa-plus-circle mr-2"></i>Utterances</button>
<button id="btn_Answer" type="button" class="btn btn-lg btn-danger mr-2 ml-2"><i id="FaAnswer" class="fas fa-2x fa-plus-circle mr-2"></i>Answer</button>
<button id="btn_reprompt" type="button" class="btn btn-lg btn-danger mr-2 ml-2"><i id="FaReprompt" class="fas fa-2x fa-plus-circle mr-2"></i>reprompt</button>
</div>
<div id="FA2">Once you have done this, click on <button class="btn btn-success btn-lg btn-block" type="submit"><?php if ($action == "Update") {echo("Update Intent");} else {echo("Save");}?></button> to save your new intent.</div>
</div>
<div class="modal-footer bg-dark"><button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button></div>
</div>
</div>
</div>	
	
	
<?php
if($_SESSION["Tips"] == "YES" and $Invocation != "Yes"){
?>
<script>
$(document).ready(function(){
setTimeout(function(){
$('#FirstIntent').modal('show');
}, 1000);
$('#FA2').hide();

var Intents = "<?php echo($Word);?>"; 	
	
$("#btn_IntentName").click(function(){
$('#FirstIntent').modal('hide');
setTimeout(function(){
$('#IntentName').addClass('Attention');
}, 1000);
setTimeout(function(){
$("#IntentName").val(Intents);
$("#IntentName").blur();
}, 2500);
setTimeout(function(){
$("#IntentName").removeClass("Attention");
$("#btn_IntentName").removeClass("btn-danger");
$("#btn_IntentName").addClass("btn-success");
$("#btn_IntentName").addClass("disabled");
$("#FaIntentName").removeClass("fa-plus-circle");
$("#FaIntentName").addClass("fa-check-circle");
}, 3000);
$("#IntentName").focusin();
$("#IntentName").blur();
setTimeout(function(){
$('#FirstIntent').modal('show');
$("#IntentName").blur();
}, 3500);
});	
	
	
$("#btn_utterance").click(function(){
$('#FirstIntent').modal('hide');
setTimeout(function(){
$("#Utterance_1").addClass("Attention");
}, 1000);
if(Intents == "Macroevolution"){
	var utter = "what is macroevolution";
}
if (Intents == "Microevolution"){
	var utter = "what is microevolution";
}
if (Intents == "Evolution"){
	var utter = "what is evolution";
}
if (Intents == "Recessive"){
	var utter = "what is a recessive allele";
}
if (Intents == "Dominance"){
	var utter = "what is a dominant allele";
}
if (Intents == "Allele"){
	var utter = "what is an allele";
}
setTimeout(function(){
$("#Utterance_1").val(utter);
$("#Utterance_1").blur();
}, 2500);
setTimeout(function(){
$("#btn_utterance").removeClass("btn-danger");
$("#btn_utterance").addClass("btn-success");
$("#btn_utterance").addClass("disabled");
$("#FaUtterance").removeClass("fa-plus-circle");
$("#FaUtterance").addClass("fa-check-circle");
$("#Utterance_1").removeClass("Attention");
$("#Utterance_1").blur();
}, 3000);	
setTimeout(function(){
$('#FirstIntent').modal('show');
}, 3500);
});
	
	
$("#btn_Answer").click(function(){
$('html, body').animate({scrollTop: 750}, 1);	
$('#FirstIntent').modal('hide');
setTimeout(function(){
$("#speakOutput").addClass("Attention");
}, 1000);
if(Intents == "Macroevolution"){
	var speakOutput = "A broad term, which usually refers to the evolution of substantial changes in the phenotype, usually large enough to assign the modified lineage to a distinct genus or higher taxon.";
}
if (Intents == "Microevolution"){
	var speakOutput = "A broad term, which usually refers to slight, short-term evolutionary changes within a species.";
}
if (Intents == "Evolution"){
	var speakOutput = "In a broad sense, the origin of entities possessing different states of one or more characteristics and changes in the proportions of these entities over time.";
}
if (Intents == "Recessive"){
	var speakOutput = "A recessive allele is one that is detectable in the phenotype only when homozygous.";
}
if (Intents == "Dominance"){
	var speakOutput = "The dominance of an allele refers to the extent to which it produces the homozygous phenotype when heterozygous.";
}
if (Intents == "Allele"){
	var speakOutput = "One of several forms of the same gene, presumably differing by mutation of the DNA sequence.";
}
setTimeout(function(){
$("#speakOutput").val(speakOutput);
}, 2000);
setTimeout(function(){
$("#btn_Answer").removeClass("btn-danger");
$("#btn_Answer").addClass("btn-success");
$("#btn_Answer").addClass("disabled");
$("#FaAnswer").removeClass("fa-plus-circle");
$("#FaAnswer").addClass("fa-check-circle");
$("#speakOutput").removeClass("Attention");
}, 4000);
setTimeout(function(){
$('#FirstIntent').modal('show');
}, 4500);
});
	
$("#btn_reprompt").click(function(){
$('html, body').animate({ scrollTop: 1000  }, 1);
$('#FirstIntent').modal('hide');
setTimeout(function(){
$('#reprompt').addClass('Attention');
}, 1000);
setTimeout(function(){
$("#reprompt").val("If you want");
}, 1500);
setTimeout(function(){
$("#reprompt").val("If you want, you can ask me");
}, 2000);
setTimeout(function(){
$("#reprompt").val("If you want, you can ask me another question,");
}, 3000);
setTimeout(function(){
$("#reprompt").val("If you want, you can ask me another question, for example");
}, 3500);
setTimeout(function(){
$("#reprompt").val("If you want, you can ask me another question, for example, ask me, questions about evolution");
}, 4000);
$('#RQ_14').show();
setTimeout(function(){
$('#reprompt').removeClass('Attention');
}, 5000);
setTimeout(function(){
$("#btn_reprompt").removeClass("btn-danger");
$("#btn_reprompt").addClass("btn-success");
$("#btn_reprompt").addClass("disabled");
$("#FaReprompt").removeClass("fa-plus-circle");
$("#FaReprompt").addClass("fa-check-circle");
$("#reprompt").removeClass("Attention");
}, 5500);
setTimeout(function(){
$('#FirstIntent').modal('show');
}, 6000);
$('#FA0').hide();	
$('#FA1').hide();	
$('#FA2').show();
});
});	
</script>
<?php } ?>	
<?php } ?>	
	
<?php include("IntentName.php");?>

	
<?php  if ($Invocation == "Yes") { ?>  
	
<!-- LaunchRequest  -->
<div class="modal fade" tabindex="-1" id="LaunchRequestModal">
<div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div style="line-height: 2.5;" class="modal-body text-justify h5 mt-1">
<p id="LC0">Let’s edit the LaunchRequest intent.</p>
<p id="LC1">The LaunchRequest is your skill’s principal intent. When you activate your skill (for example, evolution professor), LaunchRequest will be the intent responsible for the presentation of its content.</p>
<p id="LC2">You can use the example invocation name <button type="button" id="InvocationNameBtn" class="btn-primary btn"><i class="fas fa-2x fa-edit mr-2"></i>Click here</button> or insert a name in the “Skill Invocation Name” field.</p>
<p id="LC3">Remember that the Invocation Name cannot contain upper case letters, special characters or numbers.</p>	
<p id="LC4">You must also define what Alexa will say to the user when the LaunchRequest is invoked. For this, use the field “Alexa will say:” to insert a personalized phrase or <button type="button" id="InvocationSayBtn" class="btn-primary btn"><i class="fas fa-2x fa-edit mr-2"></i>Click here</button> to insert an example phrase.</p>
<p id="LC5" class="text-center">Remember that you must click on <button class="btn btn-success btn-lg" type="submit"><?php if ($action == "Update") {echo("Update Intent");} else {echo("Save");}?></button> to save your edit.</p>
</div>
<div class="modal-footer bg-dark"><button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button></div>
</div>
</div>
</div>
	
<?php
if($_SESSION["Tips"] == "YES" and $Invocation == "Yes"){
?>
<script>
$(document).ready(function(){
$('#LC0').hide();
$('#LC1').hide();
$('#LC2').hide();
$('#LC3').hide();
$('#LC4').hide();
$('#LC5').hide();
setTimeout(function(){
$('#LC0').show();
$('#LC1').show();
$('#LC2').show();
$('#LC3').show();
$('#LaunchRequestModal').modal('show');
}, 2000);

$("#InvocationNameBtn").click(function(){
$('#LaunchRequestModal').modal('hide');
$('#LC0').hide();
$('#LC1').hide();
$('#LC2').hide();
$('#LC3').hide();
$('#LC4').show();
$('html, body').animate({ scrollTop: 300  }, 1);
$("#Utterance_1").addClass("Attention");
	
setTimeout(function(){
$("#Utterance_1").val("evo");
}, 1000);
setTimeout(function(){
$("#Utterance_1").val("evolu");
}, 2000);
setTimeout(function(){
$("#Utterance_1").val("evoluti");
}, 3000);	
setTimeout(function(){
$("#Utterance_1").val("evolution");
}, 4000);	
setTimeout(function(){
$("#Utterance_1").val("evolution pro");
}, 5000);
setTimeout(function(){
$("#Utterance_1").val("evolution profe");
}, 6000);	
setTimeout(function(){
$("#Utterance_1").val("evolution profes");
}, 7000);
setTimeout(function(){
$("#Utterance_1").val("evolution professor");	
}, 8000);
setTimeout(function(){
$('#say').appendTo("evolution professor");	
}, 9000);
setTimeout(function(){
$("#Utterance_1").removeClass("Attention");
}, 10000);
$("#InvocationNameBtn").addClass("disabled");
setTimeout(function(){
$('#LaunchRequestModal').modal('show');
}, 11000);

$("#InvocationSayBtn").click(function(){
$('#LC4').hide();
$('#LaunchRequestModal').modal('hide');
$("#speakOutput").addClass("Attention");	
$('html, body').animate({ scrollTop: 500  }, 1);
setTimeout(function(){
$("#speakOutput").val("Hello, Welcome to the evolution professor skill.");
}, 1000);
setTimeout(function(){
$("#speakOutput").val("Hello, Welcome to the evolution professor skill. My name is Alexa and I will guide");
}, 2000);
setTimeout(function(){
$("#speakOutput").val("Hello, Welcome to the evolution professor skill. My name is Alexa and I will guide you through the questions in this skill.");
}, 3000);	
setTimeout(function(){
$("#speakOutput").val("Hello, Welcome to the evolution professor skill. My name is Alexa and I will guide you through the questions in this skill. If you would like to know what questions");
}, 4000);	
setTimeout(function(){
$("#speakOutput").val("Hello, Welcome to the evolution professor skill. My name is Alexa and I will guide you through the questions in this skill. If you would like to know what questions do I have to tell you, ask me, questions about evolution?");
}, 5000);
$('#LC5').show();	
setTimeout(function(){
$("#speakOutput").removeClass("Attention");
}, 10000);
$("#InvocationSayBtn").addClass("disabled");
setTimeout(function(){
$('#LaunchRequestModal').modal('show');
}, 11000);	
});	
	
});

$("#Utterance_1").blur(function() {
if ($("Utterance_1").val() != ""){
$('#LC0').hide();
$('#LC1').hide();
$('#LC2').hide();
$('#LC3').hide();
$('#LC4').show();
setTimeout(function(){
$('#LaunchRequestModal').modal('show');
}, 1000);
}
$("#InvocationSayBtn").click(function(){
$('#LC4').hide();
$('#LaunchRequestModal').modal('hide');
$("#speakOutput").addClass("Attention");	
$('html, body').animate({ scrollTop: 500  }, 1);
setTimeout(function(){
$("#speakOutput").val("Hello, welcome to ");
}, 1000);
setTimeout(function(){
$("#speakOutput").val("Hello, welcome to the Evolution Course.");
}, 2000);
setTimeout(function(){
$("#speakOutput").val("Hello, welcome to the Evolution Course. My name is Alexa and will guide");
}, 3000);	
setTimeout(function(){
$("#speakOutput").val("Hello, welcome to the Evolution Course. My name is Alexa and will guide you through the course. ");
}, 4000);	
setTimeout(function(){
$("#speakOutput").val("Hello, welcome to the Evolution Course. My name is Alexa and will guide you through the course. If you would like to know what classes ");
}, 5000);
setTimeout(function(){
$("#speakOutput").val("Hello, welcome to the Evolution Course. My name is Alexa and will guide you through the course. If you would like to know what classes are included in this course, ");
}, 6000);	
setTimeout(function(){
$("#speakOutput").val("Hello, welcome to the Evolution Course. My name is Alexa and will guide you through the course. If you would like to know what classes are included in this course, ask me, ");
}, 7000);
setTimeout(function(){
$("#speakOutput").val("Hello, welcome to the Evolution Course. My name is Alexa and will guide you through the course. If you would like to know what classes are included in this course, ask me, what classes are taught in the evolution course?");	
}, 8000);	
$('#LC5').show();	
setTimeout(function(){
$("#speakOutput").removeClass("Attention");
}, 10000);
$("#InvocationSayBtn").addClass("disabled");
setTimeout(function(){
$('#LaunchRequestModal').modal('show');
}, 11000);	
});	

});	
$("#speakOutput").blur(function() {
if ($("speakOutput").val() != ""){
$('#LC0').hide();
$('#LC1').hide();
$('#LC2').hide();
$('#LC3').hide();
$('#LC4').hide();
$('#LC5').show();
setTimeout(function(){
$('#LaunchRequestModal').modal('show');
}, 1000);
}});

	

	

});
</script>	
<?php } ?>	
	
<small id="Invocation" class="form-text mb-3 text-white"><h2>Skill Invocation Name</h2></small>		
<small class="text-white">Users say a skill's invocation name to begin an interaction with a particular custom skill. For example, if the invocation name is "evolution professor", users can say: <i><b>Alexa, open evolution professor</b></i></small>
<input name="Utterance_1" type="text" required="required" class="form-control form-control-lg w-75 mx-auto" id="Utterance_1" placeholder="i.e. evolution professor" value="<?php if ($action == "Update") {echo($Utterances_1);}?>" aria-describedby="Invocation" oninvalid="this.setCustomValidity('Field Invocation Name is required with minimum 5 characters')" oninput="setCustomValidity('')" minlength="5">

<small class="text-white h6"><i style="color: yellow;" class="fas fa-exclamation-triangle mr-2"></i>Brand names are only allowed if you provide proof of rights in the testing instructions or if you use the brand name in a referential manner that doesn’t imply ownership<br>(examples of terms that can be added to a brand name for referential usage: unofficial, unauthorized, fan, fandom, for, about).</small>
	
<?php } else { ?>	
	
<?php include("UtteranceName.php");?>
	
<?php } ?>	
	
<?php 
if($action == "Update" and $Intent == "LaunchRequest") { ?>
<div class="mt-5 text-white">If you say: "Alexa, open <b><?php echo($InvocationName);?></b>, Alexa will say:</div>
<?php } else { ?>
<div class="mt-5 text-white">If you say: "Alexa, ask to <b><?php echo($InvocationName);?></b>, <i id="say"></i>?", Alexa will say:</div>
<?php } ?>
<div><textarea name="speakOutput" rows="10" required="required" class="form-control form-control-lg ml-5 mr-5 mx-auto w-75" id="speakOutput" placeholder="<?php if ($Invocation == "Yes"){echo("i.e. Hello, welcome to the Evolution Course. My name is Alexa and will guide you through the course. If you would like to know what classes are included in this course, ask me, what classes are taught in the evolution course?");} ?>"><?php if ($action == "Update") {echo($Answer);}?>
</textarea> 
</div>	
<small class="text-white"><i style="color: yellow;" class="fas fa-2x fa-exclamation-triangle"></i> Do not use line break</small>	

<?php  if ($Invocation != "Yes") { ?>	
<div class="mt-5">
<div class="form-group">
<label class="text-white h2">After Answer</label>
<div class="text-white mb-2 h6">There are two options, Finish and Reprompt. Finish ends the Intent, while use Reprompt if you want that Alexa asks if you want to continue the interaction.</div>
	
<script>
$(document).ready(function(){
$("#end").hide();
$("#reprompt0").show();
$('#option').on('change', function(){
var demovalue = $('#option').val(); 
$("#end").hide();
$("#reprompt0").hide();
$("#"+demovalue).show();
});
});
</script>	
<select class="form-control form-control-lg w-75 ml-5 mr-5 mx-auto" name="option" id="option">
      <option value="end">Finish</option>
      <option value="reprompt0" selected="selected">Another Question (reprompt)</option>
</select>
	
<div class="mt-5 end text-white h3" id="end">Skill will be terminated after the response</div>		
<div class="mt-5 reprompt text-white h3" id="reprompt0">reprompt<br><input name="reprompt" type="text" class="form-group form-control form-control-lg w-75 ml-5 mr-5 mx-auto" id="reprompt" placeholder="i.e. If you want, you can ask me another question, for example, ask me, questions about evolution." value="<?php if ($action == "Update") {echo($Reprompt);} else {echo("");}?>"></div>	
  </div>	
</div>
<?php } ?>	
</div>
<div class="mt-5"><button class="btn btn-success btn-lg btn-block w-75 ml-5 mr-5 mx-auto" type="submit"><?php if ($action == "Update") {echo("Update Intent");} else {echo("Save");}?></button></div>		
</form>	

<script>
$(document).ready(function(){
$('#Utterance_1').blur("input", function() {
$('#say').text($('#Utterance_1').val());
});
});
</script>