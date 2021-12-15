<?php
$KeyUser 		= $_GET["KeyUser"];
$Form			= $_GET["Form"];
$action 		= $_GET["Action"];
$idRepository 	= $_GET["idRepository"];
?>

<?php
$RQ 			= mysqli_query($mysqli, "SELECT * FROM `RandomQuotes` WHERE KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$RQRows 		= mysqli_num_rows($RQ);
if($RQRows == 0){ ?>
<style>
      .circle {
        border-radius: 50%;
        width: 15px;
        height: 15px;
        padding: 10px;
        background: #fff;
        border: 2px solid #000;
        color: #000;
        text-align: center;
        font: 15px Arial, sans-serif;
      }
	
.Attention{
animation: pulse 0.8s infinite;	
height: 125px;
}
@keyframes pulse {
10% {
box-shadow: 0 0 0 0 yellow;
}
80% {
box-shadow: 0 0 0 25px rgba(204, 169, 44, 0);
}	
100% {
box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
}
}
</style>

<!-- After Help Intent -->
<div class="modal fade" tabindex="-1" id="ModalRQOne" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">Random Quotes</h5></div>
<div style="line-height: 2.5;" class="modal-body text-center mt-2 h5">

<div class="mt-2 mb-5">Random Quotes allows you to ask Alexa a question about what exists in your skill, that is, which questions it can be asked. For example, “questions about evolution” is a phrase that you included at the end of the Reprompt options, as well as in the LaunchRequest.</div>
<div class="mb-3">In this case, you can include the question <b>(Utterance)</b> in the Random Quotes form and, as an answer, all the questions that you created in the Q&A form (that is, the two questions you created and the four created automatically).</div>	
	
<div>Click on the button below to begin</div>
	
</div>
<div id="LetsGODiv" class="modal-footer bg-dark"><div><button id="LetsGO" type="button" class="btn btn-lg btn-success" data-dismiss="modal">Lets GO</button></div></div>
</div>
</div>
</div>

<!-- After Help Intent -->
<div class="modal fade" tabindex="-1" id="ModalRQ" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">Random Quotes</h5></div>
<div style="line-height: 2.5;" class="modal-body text-center mt-2 h5">
	
<div id="RQ_1" class="mt-2"><span class="circle">1</span> Let’s now register intents of the Random Quotes type.</div>
	
<div id="RQ_2" class="mt-4"><span class="circle">2</span> Here, the procedure is the same as the Question-and-Answers (Q&A) form, where the developer must first inform an Intent Name as well as an utterance.</div>
	
<div id="RQ_3" class="mt-4"><span class="circle">3</span> To facilitate this procedure, click on  <button id="IntentRQ" type="button" class="btn btn-lg btn-primary">Intent Name</button> to insert an intent name and/or <button id="UtterancesRQ" type="button" class="btn btn-lg btn-primary">Utterances</button> to insert two test utterances.</div>

<div id="RQ_4" class="mt-4"><span class="circle">4</span> <button class="btn btn-dark" role="button"><i style="color: yellow;" class="fas fa-2x fa-exclamation-triangle"></i></button> Remember that, if you wish to add more activation phrases (utterances) to the skill, just click on<br><button class="btn btn-primary" role="button" disabled><i class="fa fa-2x fa-plus mr-2"></i>Add another way to ask this question</button></div>	
	
<div id="RQ_5" class="mt-4"><span class="circle">5</span> The only difference here in comparison with the Q&A form is the type of information that Alexa will present once the intent is activated.</div>
	
<div id="RQ_6" class="mt-4"><span class="circle">6</span> Firstly, you must inform an introductory phrase that will be spoken by Alexa. While this phrase is not required, it permits a greater level of interaction with the user.</div>
	
<div id="RQ_7" class="mt-4"><span class="circle">7</span> Click on <button id="IntroRQ" type="button" class="btn btn-lg btn-primary">Introduction Phrase</button> to insert an introductory phrase.</div> 
	
<div id="RQ_8" class="mt-4"><span class="circle">8</span> You will then need to register the random phrases which Alexa will select to speak to the user. For this, you must click on the form in <button class="btn btn-primary" disabled><i class="fa fa-plus"></i> Add random phrase</button> to add more random phrases.</div>
	
<div id="RQ_9" class="mt-4"><span class="circle">9</span> Click on <button id="RQFrases" type="button" class="btn btn-lg btn-primary">Add Random Phrases</button> to insert examples of random phrases.</div>
	
<div id="RQ_10" class="mt-4"><span class="circle">10</span> After the phrases, Alexa will declare the number of random questions (e.g., "two") chosen by the user. Click on Alexa picks to see an example <button id="RQAP" type="button" class="btn btn-lg btn-primary">Alexa picks</button></div>
	
<div id="RQ_11" class="mt-4"><span class="circle">11</span> We added two random quotes to be drawn. That is, Alexa will pick up two questions from those recorded (6)</div>	
	
<div id="RQ_12" class="mt-4"><span class="circle">12</span> To ensure that Alexa will choose the random questions, we would suggest including an introductory phrase (e.g., you may ask me...), which is not required, but does help clarify what the user should ask. At this point, we would suggest the inclusion of an additional phrase - "If you would like to ask me another question, ask me, questions about evolution", that is, the same question that Alexa asks at the end of Launch.Request. "Click on Afterwards to see an example".</div>
	
<div id="RQ_13" class="mt-4"><span class="circle">13</span> Click on <button id="RQAF" type="button" class="btn btn-lg btn-primary">Afterward</button> to add a test phrase.</div>
	
<div id="RQ_14" class="mt-4"><span class="circle">14</span> You can now save your new intent by clicking on:<br><button class="btn btn-success btn-lg" type="submit"><?php if ($action == "Update") {echo("Update Intent");} else {echo("Save");}?></button></div>
	
</div>
<div id="Footer" class="modal-footer bg-dark"><div class="mx-auto"><h5 class="modal-title text-white mx-auto">ForAlexa</h5></div><div id="FooterOK"><button type="button" class="btn btn-lg btn-success" data-dismiss="modal">OK</button></div></div>
</div>
</div>
</div>

<?php
if($_SESSION["Tips"] == "YES"){
?>
<script>
$(document).ready(function(){
$('#RQ_1').hide();
$('#RQ_2').hide();
$('#RQ_3').hide();	
$('#RQ_4').hide();
$('#RQ_5').hide();
$('#RQ_6').hide();
$('#RQ_7').hide();
$('#RQ_8').hide();
$('#RQ_9').hide();
$('#RQ_10').hide();
$('#RQ_11').hide();
$('#RQ_12').hide();
$('#RQ_13').hide();
$('#RQ_14').hide();
$('#LetsGODiv').hide();
$('#Footer').hide();
	
setTimeout(function(){
$('#LetsGODiv').show();	
$('#ModalRQOne').modal('show');
}, 1000);	

$("#LetsGO").click(function(){
setTimeout(function(){
$('#ModalRQOne').modal('hide');
}, 1000);
setTimeout(function(){
$('#LetsGODiv').hide();
$('#RQ_1').show();
$('#RQ_2').show();
$('#RQ_3').show();
$('#ModalRQ').modal('show');
}, 2000);
});



$("#IntentRQ").click(function(){
$('#ModalRQ').modal('hide');
$('#RQ_1').hide();
setTimeout(function(){
$('#IntentName').addClass('Attention');
}, 1000);
setTimeout(function(){
$("#IntentName").blur();
$("#IntentName").val("Questions");
}, 2500);
setTimeout(function(){
$("#IntentName").blur();
$("#IntentName").val("QuestionsEvolution");
}, 4500);
$("#IntentRQ").prop('disabled', true);
setTimeout(function(){
$('#IntentName').removeClass('Attention');
}, 6500);
setTimeout(function(){
$('#ModalRQ').modal('show');
}, 8500);
});
	
$("#UtterancesRQ").click(function(){
$('#RQ_2').hide();
$('#RQ_3').hide();
$('#ModalRQ').modal('hide');	
setTimeout(function(){
$('#Utterance_1').addClass('Attention');
}, 1500);
setTimeout(function(){
$("#Utterance_1").val("Questions about");
}, 2500);
setTimeout(function(){
$("#Utterance_1").val("Questions about Evolution");
}, 3500);
setTimeout(function(){
$('#Utterance_1').removeClass('Attention');
}, 5000);
$("#UtterancesRQ").prop('disabled', true);
setTimeout(function(){
$('#ModalRQ').modal('show');
$('#RQ_4').show();
$('#RQ_5').show();
$('#RQ_6').show();
$('#RQ_7').show();
}, 6000);
$('html, body').animate({ scrollTop: 500  }, 1);
});

$("#IntroRQ").click(function(){
$('#RQ_4').hide();
$('#RQ_5').hide();
$('#RQ_6').hide();
$('#RQ_7').show();
$('#ModalRQ').modal('hide');
$('html, body').animate({ scrollTop: 700  }, 1);
setTimeout(function(){
$('#Intro').addClass('Attention');
}, 1500);
setTimeout(function(){
$("#Intro").val("You can");
}, 3000);	
setTimeout(function(){
$("#Intro").val("You can ask me");
}, 6000);
setTimeout(function(){
$('#Intro').removeClass('Attention');
}, 8500);
setTimeout(function(){
$('#RQ_7').hide();
$('#RQ_8').show();
$('#RQ_9').show();
$('#ModalRQ').modal('show');
}, 9500);
});

	
$("#RQFrases").click(function(){
$('#ModalRQ').modal('hide');
$('html, body').animate({ scrollTop: 950  }, 1);
setTimeout(function(){
$(".add_field_button").addClass('Attention');
}, 1000);
setTimeout(function(){
$(".add_field_button").click();
$(".add_field_button").click();
}, 2000);
setTimeout(function(){
$(".add_field_button").removeClass('Attention');
$('#RandomQuotes_1').addClass('Attention');
}, 3000);
setTimeout(function(){
$("#RandomQuotes_1").val("what is an allele?");
}, 4000);
setTimeout(function(){
$('#RandomQuotes_1').removeClass('Attention');
}, 5000);	
setTimeout(function(){
$('#RandomQuotes_2').addClass('Attention');
}, 6000);
setTimeout(function(){
$("#RandomQuotes_2").val("what is a dominant allele?");
}, 7000);
setTimeout(function(){
$('#RandomQuotes_2').removeClass('Attention');
}, 8000);
	
setTimeout(function(){
$(".add_field_button").addClass('Attention');
}, 8500);
setTimeout(function(){
$(".add_field_button").click();
$(".add_field_button").click();
}, 10000);
	
setTimeout(function(){
$(".add_field_button").removeClass('Attention');
$('#RandomQuotes_3').addClass('Attention');
}, 11000);
setTimeout(function(){
$("#RandomQuotes_3").val("what is a recessive allele?");
}, 12000);
setTimeout(function(){
$('#RandomQuotes_3').removeClass('Attention');
}, 13000);
	
setTimeout(function(){
$('#RandomQuotes_4').addClass('Attention');
}, 14000);
setTimeout(function(){
$("#RandomQuotes_4").val("what is evolution?");
}, 15000);
setTimeout(function(){
$('#RandomQuotes_4').removeClass('Attention');
}, 16000);
	
	
setTimeout(function(){
$(".add_field_button").addClass('Attention');
}, 17000);
setTimeout(function(){
$(".add_field_button").click();
$(".add_field_button").click();
}, 18000);
setTimeout(function(){
$(".add_field_button").removeClass('Attention');
$('#RandomQuotes_5').addClass('Attention');
}, 19000);
setTimeout(function(){
$("#RandomQuotes_5").val("what is microevolution?");
}, 20000);
setTimeout(function(){
$('#RandomQuotes_5').removeClass('Attention');
}, 21000);
setTimeout(function(){
$('#RandomQuotes_6').addClass('Attention');
}, 22000);
setTimeout(function(){
$("#RandomQuotes_6").val("what is macroevolution?");
}, 23000);
setTimeout(function(){
$('#RandomQuotes_6').removeClass('Attention');
}, 24000);	
	
	
setTimeout(function(){
$('#RQ_8').hide();
$('#RQ_9').hide();
$('#RQ_10').show();
$('#ModalRQ').modal('show');
}, 25000);
});
	
	
$("#RQAP").click(function(){
$('#ModalRQ').modal('hide');
$('#RQ_10').hide();
$('html, body').animate({ scrollTop: 1000  }, 1);
setTimeout(function(){
$('#RandomFacts').addClass('Attention');
}, 1500);
setTimeout(function(){
$("#RandomFacts").val("2");
}, 4000);
$('#RQ_11').show();
$('#RQ_12').show();
$('#RQ_13').show();
setTimeout(function(){
$('#RandomFacts').removeClass('Attention');
}, 7500);
setTimeout(function(){
$('#ModalRQ').modal('show');
}, 10000);
});
	
$("#RQAF").click(function(){
$('html, body').animate({ scrollTop: 1000  }, 1);
$('#ModalRQ').modal('hide');
$('#RQ_11').hide();
$('#RQ_12').hide();
$('#RQ_13').hide();
setTimeout(function(){
$('#End').addClass('Attention');
}, 1500);
setTimeout(function(){
$("#End").val("If you want");
}, 3000);
setTimeout(function(){
$("#End").val("If you want, you can ask me");
}, 4000);
setTimeout(function(){
$("#End").val("If you want, you can ask me another question,");
}, 6000);
setTimeout(function(){
$("#End").val("If you want, you can ask me another question, for example");
}, 7000);
setTimeout(function(){
$("#End").val("If you want, you can ask me another question, for example, ask me, questions about evolution");
}, 9000);
$('#RQ_14').show();
setTimeout(function(){
$('#End').removeClass('Attention');
}, 11000);

setTimeout(function(){
$('#Footer').hide();
$('#FooterOK').show();
$('#ModalRQ').modal('show');
}, 12000);
setTimeout(function(){
$('#Footer').show();
$('#SaveIntent').addClass('Attention');
}, 13500);	
});	
});
</script>
<?php } ?>
<?php	
}else{
	
}
?>	


<div class="mt-2">	
<?php 
if($_GET['Form'] == "RandomQuotes" and $action == "CDS") { ?>	
<div class="text-white h1">Random Quotes</div>
<?php } ?>	
<!-- Form -->		
<form action="index.php?p=OpForm&KeyUser=<?php echo($KeyUser);?>&Action=<?php echo($action);?>&Form=<?php echo($Form);?>&idRepository=<?php echo($idRepository);?>" method="post">
<?php include("IntentName.php");?>		
<?php include("UtteranceName.php");?>

<fieldset class="form-group mx-auto mr-5 ml-5 w-75"><legend class="text-white h2 mb-3">Random Quotes</legend>
	
	
<div class="text-white mb-3 h5">Customize the introduction. When you first open the intent, Alexa says:</div>
<div><div class="input-group mt-3"><input name="Intro" type="text" class="form-control form-control-lg" id="Intro" placeholder="i.e. you can ask me"></div></div>
	
<div class="text-white mt-5 mb-3 h4">After the Introduction, Alexa says:</div>	
<div class="input_fields_wrap mt-2 mb-2">
<button class="btn btn-primary add_field_button mt-3 mb-3"><i class="fa fa-plus"></i> Add random phrase</button>
</div>		
	
<div class="text-white mt-5 mb-3 h4">Alexa picks <input class="text-center" style="width: 50px;" name="RandomFacts" type="number" id="RandomFacts" max="5" min="1" value="1"> random quotes from your list. <button type="button" class="btn btn-lg btn-primary">Quotes <span class="badge badge-light"><div id="luan" name="luan"></div></span></button></div>	
	

<div class="text-white mt-3 mb-3 h4">Afterward, Alexa says:</div>	
<div><div class="input-group mt-3"><input name="End" type="text" class="form-control form-control-lg" id="End" placeholder='i.e. If you want, you can ask me another question, for example, ...'></div></div>
	
<input name="qtde_quotes" type="hidden" id="qtde_quotes">	
	
</fieldset>	
		
	
<div id="SaveIntent" class="mt-5"><button class="btn btn-success btn-lg btn-block w-75 ml-5 mr-5 mx-auto" type="submit"><?php if ($action == "Update") {echo("Update Intent");} else {echo("Save");}?></button></div>
	
</form>	
<!-- End Form -->		
</div>