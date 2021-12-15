<?php
$query = ("SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository' and IntentName = 'LaunchRequest'");
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$InvocationName = $row["question_1"];	
$IntentModal = $row["IntentName"];
}
?>
<div class="mt-5">
<div class="form-group mr-5 ml-5">
	
<div class="text-white h2">Utterance</div>	
	
<?php 
if($_GET['Form'] == "RandomQuotes" and $action == "CDS") { ?>	
<div class="mt-2 mb-4 text-white">If you want to ask "what questions on chapter one" (utterance) for a skill called <b>"<?php echo($InvocationName); ?>"</b> (Invocation Name), you must write this question below, however, the whole sentence to ask will be: Alexa, ask to <b>"<?php echo($InvocationName); ?>"</b>, <i> what questions on chapter one?</i></div>
<?php } else { ?>		
	
<div class="mt-2 mb-4 text-white">If you want to ask "what is <?php echo($Word);?>" (utterance) for a skill called <b>"<?php echo($InvocationName); ?>"</b> (Invocation Name), you must write this question below, however, the whole sentence to ask will be: Alexa, ask to <b>"<?php echo($InvocationName); ?>"</b>, <i>what is <?php echo($Word);?>?</i></div>	
<?php } ?>	
	
<div class="input-group mt-2">
<div class="input-group-prepend">
<div class="input-group-text">
<div id="Scroll_Utterance_1" style="display:flex" data-toggle="tooltip" data-placement="top" title="Insert a Utterance"><i class="fas fa-2x fa-scroll"></i></div>	
<div id="Success_Utterance_1" style="display:none" data-toggle="tooltip" data-placement="top" title="Utterance available"><i class="fas fa-2x fa-check-circle"></i></div>
<div id="Danger_Utterance_1" style="display:none" data-toggle="tooltip" data-placement="top" title="Utterance not available"><i class="fas fa-2x fa-times-circle"></i></div>	
</div>
</div>	
<input name="Utterance_1" type="text" required="required" class="form-control form-control-lg" id="Utterance_1" value="<?php if ($action == "Update") {echo($Utterances_1);}?>" placeholder="i.e. <?php if($_GET['Form'] == "RandomQuotes" and $action == "CDS"){ echo("questions about evolution");} elseif($_GET['Form'] == "QA" and $action == "CDS" and $num_rows > 15) {echo("what is ...");} else { echo("what is ".$Word);}?>" oninvalid="this.setCustomValidity('This Field is required')" oninput="setCustomValidity('')">
</div>

	
<div class="mt-3 mb-3 text-white">or</div>	

	
<div class="input-group">
<div class="input-group-prepend">
<div class="input-group-text">
<div id="Scroll_Utterance_2" style="display:flex" data-toggle="tooltip" data-placement="top" title="Insert a Utterance"><i class="fas fa-2x fa-scroll"></i></div>	
<div id="Success_Utterance_2" style="display:none" data-toggle="tooltip" data-placement="top" title="Utterance available"><i class="fas fa-2x fa-check-circle"></i></div>
<div id="Danger_Utterance_2" style="display:none" data-toggle="tooltip" data-placement="top" title="Utterance not available"><i class="fas fa-2x fa-times-circle"></i></div>	
</div>
</div>	
<input name="Utterance_2" type="text" class="form-control form-control-lg" id="Utterance_2" onKeyUp="" value="<?php if ($action == "Update") {echo($Utterances_2);}?>" placeholder="Add another way to ask this question (i.e. tell me about <?php if($_GET['Form'] == "RandomQuotes" and $action == "CDS"){ echo("questions about evolution");} elseif($_GET['Form'] == "QA" and $action == "CDS" and $num_rows > 15) {echo("what is ...");} else { echo("what is ".$Word);}?>)" oninvalid="this.setCustomValidity('This Field is required')" oninput="setCustomValidity('')">
</div>	
	
	
<small id="FormQA" class="text-white mb-5 mt-3 h6"><i style="color: yellow;" class="fas fa-exclamation-triangle mr-2"></i>Samples utterance cannot contain numeric and special characters</small>
	
<div class="mx-auto"><button id="AddFieldQA" class="btn btn-lg btn-primary mt-5 mb-5" role="button"><i class="fa fa-2x fa-plus mr-2"></i>Add another way to ask this question</button></div>	

		
	
<script>
$(document).ready(function(){
var x = 2; //initlal text box count
$('#AddFieldQA').click(function(e) {
e.preventDefault();
if (x < 6) {
x++;
$('#FormQA').prepend('<div class="mt-3 mb-3 text-white">or</div><div class="input-group"><div class="input-group-prepend"><div class="input-group-text"><div id="Scroll_Utterance_'+(x)+'" style="display:flex"><i data-toggle="tooltip" data-placement="top" title="Insert a Utterance" class="fas fa-2x fa-scroll"></i></div><div id="Success_Utterance_'+(x)+'" style="display:none"><i data-toggle="tooltip" data-placement="top" title="Utterance available" class="fas fa-2x fa-check-circle"></i></div><div id="Danger_Utterance_'+(x)+'" style="display:none"><i data-toggle="tooltip" data-placement="top" title="Utterance not available" class="fas fa-2x fa-times-circle"></i></div></div></div><input name="Utterance_'+(x)+'" type="text" class="form-control form-control-lg" id="Utterance_'+(x)+'" placeholder="Add another way to ask this question"></div>');	


}
else{
alert('Only 6 Fields!');
}
});});	
</script>
	
	
	
	
	
</div>
</div>	
<script language="javascript">
var Utterance_1 = $("#Utterance_1");
Utterance_1.blur(function() { 	
$.ajax({ 	
url: 'Utterance.php', 
type: 'POST', 
data:{"Utterance_1" : Utterance_1.val(), "key" : '<?php echo($key); ?>'}, 
success: function(data) { 
console.log(data); 
data = $.parseJSON(data);
$('#Utterance_1').removeClass('bg-danger').removeClass('bg-success').addClass(data.Utterance_1);
$('#Scroll_Utterance_1').hide();
$('#Success_Utterance_1').hide();
$('#Danger_Utterance_1').hide();	
$(data.Icon_Utterance_1).show();
}});
}); 
	
var Utterance_2 = $("#Utterance_2");
Utterance_2.blur(function() { 	
$.ajax({ 	
url: 'Utterance.php', 
type: 'POST', 
data:{"Utterance_2" : Utterance_2.val(), "key" : '<?php echo($key); ?>'}, 
success: function(data) { 
console.log(data); 
data = $.parseJSON(data);
$('#Utterance_2').removeClass('bg-danger').removeClass('bg-success').addClass(data.Utterance_2);
$('#Scroll_Utterance_2').hide();
$('#Success_Utterance_2').hide();
$('#Danger_Utterance_2').hide();	
$(data.Icon_Utterance_2).show();
}});
}); 
	
/*
var Utterance_3 = $("#Utterance_3");
Utterance_3.blur(function() { 	
$.ajax({ 	
url: 'Utterance.php', 
type: 'POST', 
data:{"Utterance_3" : Utterance_3.val(), "key" : '<?php //echo($key); ?>'}, 
success: function(data) { 
console.log(data); 
data = $.parseJSON(data);
$('#Utterance_3').removeClass('bg-danger').removeClass('bg-success').addClass(data.Utterance_3);
$('#Scroll_Utterance_3').hide();
$('#Success_Utterance_3').hide();
$('#Danger_Utterance_3').hide();	
$(data.Icon_Utterance_3).show();
}});
}); 
	
var Utterance_4 = $("#Utterance_4");
Utterance_4.blur(function() { 	
$.ajax({ 	
url: 'Utterance.php', 
type: 'POST', 
data:{"Utterance_4" : Utterance_4.val(), "key" : '<?php //echo($key); ?>'}, 
success: function(data) { 
console.log(data); 
data = $.parseJSON(data);
$('#Utterance_4').removeClass('bg-danger').removeClass('bg-success').addClass(data.Utterance_4);
$('#Scroll_Utterance_4').hide();
$('#Success_Utterance_4').hide();
$('#Danger_Utterance_4').hide();	
$(data.Icon_Utterance_4).show();
}});
}); 
	
var Utterance_5 = $("#Utterance_5");
Utterance_5.blur(function() { 	
$.ajax({ 	
url: 'Utterance.php', 
type: 'POST', 
data:{"Utterance_5" : Utterance_5.val(), "key" : '<?php //echo($key); ?>'}, 
success: function(data) { 
console.log(data); 
data = $.parseJSON(data);
$('#Utterance_5').removeClass('bg-danger').removeClass('bg-success').addClass(data.Utterance_5);
$('#Scroll_Utterance_5').hide();
$('#Success_Utterance_5').hide();
$('#Danger_Utterance_5').hide();	
$(data.Icon_Utterance_5).show();
}});
}); 	
	
var Utterance_6 = $("#Utterance_6");
Utterance_6.blur(function() { 	
$.ajax({ 	
url: 'Utterance.php', 
type: 'POST', 
data:{"Utterance_6" : Utterance_6.val(), "key" : '<?php //echo($key); ?>'}, 
success: function(data) { 
console.log(data); 
data = $.parseJSON(data);
$('#Utterance_6').removeClass('bg-danger').removeClass('bg-success').addClass(data.Utterance_6);
$('#Scroll_Utterance_6').hide();
$('#Success_Utterance_6').hide();
$('#Danger_Utterance_6').hide();	
$(data.Icon_Utterance_6).show();
}});
}); */	
</script>	