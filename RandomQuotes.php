<?php
$KeyUser 	= $_GET["KeyUser"];
$Form		= $_GET["Form"];
$action 	= $_GET["Action"];
$idRepository 	= $_GET["idRepository"];
?>

<div>	

	
<!-- Form -->		
<form action="index.php?p=OpForm&KeyUser=<?php echo($KeyUser);?>&Action=<?php echo($action);?>&Form=<?php echo($Form);?>&idRepository=<?php echo($idRepository);?>" method="post">
<div class="mt-5">
<div class="text-white"><h2>Random Quotes</h2></div>
</div>	
<?php include("IntentName.php");?>		
<?php include("UtteranceName.php");?>

<fieldset class="form-group mx-auto mr-5 ml-5"><legend class="text-white">Random Quotes</legend>
	
<div class="text-white mb-3">Alexa picks <input class="text-center" style="width: 50px;" name="RandomFacts" type="number" id="RandomFacts" max="5" min="1" value="1"> random quotes from your list. <button type="button" class="btn btn-primary">Quotes <span class="badge badge-light"><div id="luan" name="luan"></div></span></button></div>
	
<div class="text-white mb-3">Customize the introduction. When you first open the intent, Alexa says:</div>
<div><div class="input-group mt-3"><input type="text" name="Intro" class="form-control form-control-lg" id="Intro"></div></div>	
<div class="text-white mt-3 mb-3">After the Introduction, Alexa says:</div>	
<div class="input_fields_wrap mt-2 mb-2">
<button class="btn btn-primary add_field_button mt-3 mb-3"><i class="fa fa-plus"></i> Add random phrase</button>
</div>	
<div class="text-white mt-3 mb-3">Afterward, Alexa says:</div>	
<div><div class="input-group mt-3"><input type="text" name="End" class="form-control form-control-lg" id="End"></div></div>
	
<input name="qtde_quotes" type="hidden" id="qtde_quotes">	
	
</fieldset>	
		
	
<div class="mt-5"><button class="btn btn-success btn-lg btn-block w-75 ml-5 mr-5 mx-auto" type="submit"><?php if ($action == "Update") {echo("Update Intent");} else {echo("Save");}?></button></div>
	
</form>	
<!-- End Form -->		
</div>