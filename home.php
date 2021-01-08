<script src="https://www.google.com/recaptcha/api.js?hl=pt-BR"></script>
<div class="mx-auto mt-5 mb-5">	
<form action="index.php?p=StepOne" method="post" class="text-center" id="StepOne">
<?php
//require_once('recaptcha.php');
//$publickey = "6LdZswcaAAAAAFpAMTapSXQLaaMwxT44OE-juuFH";
//echo recaptcha_get_html($publickey);
?>	
<div class="form-group">
<h2 class="mx-auto mb-3 text-white">Login</h2>		
<div class="input-group">
<div class="input-group-prepend"><div class="input-group-text"><i class="fas fa-2x fa-at"></i></div></div>
<input name="email" type="email" autofocus="autofocus" required="required" class="w-75 form-control form-control-lg mx-auto" id="email" placeholder="" autocomplete="off" aria-describedby="emailHelp">
</div>
<div style="vertical-align: middle;">	
<small id="emailHelp" class="text-white mb-5"><i style="color: yellow;" class="fas fa-2x fa-exclamation-triangle mt-2"></i> Email is required!</small>
<!--<div class="text-center w-25 mt-5 mx-auto"><div class="g-recaptcha" data-sitekey="6LdZswcaAAAAAFpAMTapSXQLaaMwxT44OE-juuFH"></div></div>-->
</div>
<button class="btn btn-secondary btn-lg btn-block mt-5 mx-auto mb-5" type="submit">Login</button>
</div>
</form>
<?php include("ads.php");?>	
</div>	
