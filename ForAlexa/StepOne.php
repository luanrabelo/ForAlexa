<?php
$Email = $_POST["email"];
?>

<div class="mt-5 text-white">
<div class="mb-2"><h2>Welcome</h2></div>
<div class="mb-5"><h4><?php echo($Email);?></h4></div>	
<div>
<p>Before proceeding, see the tutorials page.</p>	
<p class="w-25 mx-auto"><div><a class="btn btn-warning w-50" href="index.php?p=Tutorial" target="_blank"><i class="fas fa-2x fa-chalkboard-teacher"></i> Tutorial</a></div></p>	
</div>	
<div class="mt-2 mb-3">or</div>	
<form action="index.php?p=StepTwo" method="post" class="text-center" id="StepTwo">
<input name="email" type="hidden" id="email" value="<?php echo($Email);?>">
<button class="btn btn-success btn-lg btn-block mt-2 mx-auto" type="submit">Continue</button>	
</form>	
</div>