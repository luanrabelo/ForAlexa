<div class="mx-auto mt-5 mb-5">	
<form action="index.php?p=StepOne" method="post" class="text-center" id="StepOne">
<div class="form-group">
<h2 class="mx-auto mb-3 text-white">Login</h2>		
<div class="input-group">
<div class="input-group-prepend"><div class="input-group-text"><i class="fas fa-2x fa-at"></i></div></div>
<input name="email" type="email" autofocus="autofocus" required="required" class="w-75 form-control form-control-lg mx-auto" id="email" placeholder="" autocomplete="off" aria-describedby="emailHelp">
</div>
<div class="mt-3">	
<small id="emailHelp" class="text-white mb-5"><i style="color: yellow;" class="fas fa-2x fa-exclamation-triangle"></i> Email is required!</small>
</div>
<button class="btn btn-success btn-lg btn-block mt-5 mx-auto mb-5" type="submit">Login</button>
</div>
</form>
<?php include("ads.php");?>	
</div>	
