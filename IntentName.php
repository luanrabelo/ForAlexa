<?php
$idRepository = $_GET["idRepository"]
?>
<div class="mt-5">
<div class="form-group mr-5 ml-5">

<?php
$input 		= array("Show", "Hide", "Hide", "Hide", "Hide");
$rand_keys 	= array_rand($input, 1);
if($rand_keys == 0)	{
?>
<div class="alert alert-primary alert-dismissible fade show" role="alert">
<div class="mx-auto w-75"><i class="fas fa-lightbulb"></i> Tips: Write the questions you want to ask and the answers you want Alexa to say. When you're ready, ask Alexa your questions exactly as you wrote them.</div>	
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>	
<?php } ?>	

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
} elseif($_GET['Form'] == "QA" and $num_rows > 15) {
	$KeyWords 	= array("EvolutionIntent", "AlleleIntent", "RecessiveIntent", "DominanceIntent");
	$RandKey 	= array_rand($KeyWords, 1);
	$Word 		= $KeyWords[$RandKey];
	}
elseif($_GET['Form'] == "RandomQuotes" and $num_rows > 15) {
	$KeyWords 	= array("RandomEvolution", "RandomGenetics", "RandomQuestions");
	$RandKey 	= array_rand($KeyWords, 1);
	$Word 		= $KeyWords[$RandKey];
	}
?>
	
<label class="text-white h2">Intent Name</label>	
<div class="text-white mb-2">You must give a name to your intent. Intents represent actions that users can do with skill. These intents represent the core functionality of skill. It is a dialog or a conversation with customers in which Alexa asks questions and the user responds with the answers.</div>
<div class="input-group">
<div class="input-group-prepend">
<div class="input-group-text">
<div id="Scroll" style="display:flex" data-toggle="tooltip" data-placement="top" title="Insert a IntentName"><i class="fas fa-2x fa-scroll"></i></div>	
<div id="Success" style="display:none" data-toggle="tooltip" data-placement="top" title="IntentName available"><i class="fas fa-2x fa-check-circle"></i></div>
<div id="Danger" style="display:none" data-toggle="tooltip" data-placement="top" title="IntentName not available"><i class="fas fa-2x fa-times-circle"></i></div>	
</div>
</div>	
<input name="IntentName" type="text" required="required" class="form-control form-control-lg" id="IntentName" placeholder="i.e. <?php echo($Word);?>" onkeyup="verificar()" value="<?php if ($action == "Update") {echo($Intent);}?>" aria-describedby="IntentHelp" oninvalid="this.setCustomValidity('Field IntentName is required with minimum 5 characters')" oninput="setCustomValidity('')" minlength="5" <?php echo($delete);?>>
<?php if($_GET["Action"] != "Update"){ ?>
<div style="cursor: pointer;" class="input-group-append" data-toggle="tooltip" data-placement="top" title="Click to add a Random Intent Name">
<div class="input-group-text">	
<i class="fas fa-2x fa-sync" onClick="getRandomString();"></i>
</div>	
</div>	
<?php } ?>
</div>

<small id="IntentHelp" class="form-text mb-5 text-white"><?php if($_GET["Action"] != "Update" and $_GET["Form"] != "RandomQuotes"){echo('<i style="color: yellow;" class="fas fa-exclamation-triangle mr-1"></i>For instance, '.'"'.$Word.'" or click in <i style="color: white; cursor: pointer;" class="fas fa-sync" onClick="getRandomString();"></i> to add a Random Intent Name<br>');} ?><i style="color: yellow;" class="fas fa-exclamation-triangle mr-1"></i>Note that Intent name can only contain case-insensitive alphabetic characters and underscores. Numbers, spaces, or other special characters are not allowed.<?php if($_GET["Form"] == "RandomQuotes"){ echo("<br>".'<i style="color: yellow;" class="fas fa-exclamation-triangle mr-1"></i>'."This Intent Name cannot be changed.");}?></small>	
</div>
</div>	

<script language="javascript">
var IntentName = $("#IntentName");
if(IntentName.val() != "LaunchRequest"){
IntentName.blur(function() { 	
$.ajax({ 	
url: 'Intent.php', 
type: 'POST', 
data:{"IntentName" : IntentName.val(), "key" : '<?php echo($KeyUser); ?>', "idRepository" : '<?php echo($idRepository); ?>'}, 
success: function(data) { 
console.log(data); 
data = $.parseJSON(data);
$('#IntentName').removeClass('bg-danger').removeClass('bg-success').addClass(data.IntentName);
$('#Scroll').hide();
$('#Success').hide();
$('#Danger').hide();	
$(data.Icon).show();
}});
}); 
}
</script>	