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

	
<label class="text-white">Intent Name</label>	
<div class="input-group">
<div class="input-group-prepend">
<div class="input-group-text">
<div id="Scroll"  style="display:flex"><i data-toggle="tooltip" data-placement="top" title="Insert a IntentName" 		class="fas fa-2x fa-scroll">		</i></div>	
<div id="Success" style="display:none"><i data-toggle="tooltip" data-placement="top" title="IntentName available" 		class="fas fa-2x fa-check-circle">	</i></div>
<div id="Danger"  style="display:none"><i data-toggle="tooltip" data-placement="top" title="IntentName not available" 	class="fas fa-2x fa-times-circle">	</i></div>	
</div>
</div>	
<input name="IntentName" type="text" required="required" class="form-control form-control-lg" id="IntentName" onkeyup="verificar()" value="<?php if ($action == "Update") {echo($Intent);}?>" aria-describedby="IntentHelp" oninvalid="this.setCustomValidity('Field IntentName is required with minimum 5 characters')" oninput="setCustomValidity('')" minlength="5" <?php echo($delete);?>>
<div class="input-group-append">
<div class="input-group-text">	
<i class="fas fa-2x fa-sync" onClick="getRandomString();"></i>
</div>	
</div>	
</div>
<small id="IntentHelp" class="form-text mb-5 text-white"><i style="color: yellow;" class="fas fa-2x fa-exclamation-triangle mt-2"></i> Intent name can only contain case-insensitive alphabetic characters and underscores. Numbers, spaces, or other special characters are not allowed.</small>	
</div>
</div>	

<script language="javascript">
var IntentName = $("#IntentName");	
IntentName.blur(function() { 	
$.ajax({ 	
url: 'Intent.php', 
type: 'POST', 
data:{"IntentName" : IntentName.val(), "key" : '<?php echo($key); ?>'}, 
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
</script>	