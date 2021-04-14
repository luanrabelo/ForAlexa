<header class="text-truncate text-white">
<div class="mb-5 mx-auto"><img src="img/ForAlexaLogo.png" width="50%" height="50%"></div>
	
<?php
if((!isset ($_SESSION['id']) == false)) {   
?>	
<nav style="background-color: black;" class="navbar navbar-expand-xl navbar-dark bg-dark">
<a class="navbar-brand" href="index.php"><img src="img/ForAlexaLogo.png" width="90" class="d-inline-block align-top" alt=""></a>	
	
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#NavMenu" aria-controls="NavMenu" aria-expanded="false" aria-label="Toggle navigation"><span><i style="color: white;" class="fas fa-2x fa-bars"></i></span></button>
	
<div class="collapse navbar-collapse" id="NavMenu">

	
<ul class="navbar-nav mx-auto">

<li class="nav-item active ml-5 mr-5">
<a class="btn btn-block btn-dark nav-link" style="color: white;" href="index.php" target="_self" role="button"><i class="fas fa-3x fa-home mr-2"></i><?php if($device == "PC") {echo("Home");}?></a>	
</li>		
			
	
<li class="nav-item active ml-5 mr-5">
<a class="btn btn-block btn-dark nav-link" style="color: white;" href="index.php?p=Tutorial" target="_self" role="button"><i class="fas fa-3x fa-chalkboard-teacher mr-2"></i><?php if($device == "PC") {echo("Tutorial");}?></a>	
</li>	
	
<li class="nav-item active ml-5 mr-5">
<a class="btn btn-block btn-dark nav-link" style="color: white;" href="https://github.com/luanrabelo/ForAlexa" target="_blank" role="button"><i class="fab fa-3x fa-github mr-2"></i><?php if($device == "PC") {echo("GitHub");}?></a>	
</li>	

<li class="nav-item active ml-5 mr-5">
<a class="btn btn-block btn-dark nav-link" style="color: white;" href="index.php?p=CiteForAlexa" target="_self" role="button"><i class="fas fa-3x fa-scroll mr-2"></i><?php if($device == "PC") {echo("How to cite");}?></a>	
</li>	
	
<li class="nav-item active ml-5 mr-5">
<a class="btn btn-block btn-dark nav-link" style="color: white;" href="index.php?p=About" target="_self" role="button"><i class="fas fa-3x fa-address-card mr-2"></i><?php if($device == "PC") {echo("About");}?></a>	
</li>	

<li class="nav-item active ml-5 mr-5">
<a class="btn btn-block btn-dark nav-link" style="color: white;" href="index.php?p=Donate" target="_self" role="button"><i class="fas fa-3x fa-hand-holding-usd mr-2"></i><?php if($device == "PC") {echo("Donate");}?></a>	
</li>			
		
<li class="nav-item active ml-5 mr-5">
<a class="btn btn-block btn-dark nav-link" style="color: white;" href="index.php?p=Logout&Token=<?php echo(md5(session_id()));?>" target="_self" role="button"><i class="fas fa-3x fa-sign-out-alt mr-2"></i><?php if($device == "PC") {echo("Logout");}?></a>	
</li>
	
	
</ul>
	
</div>	
</nav>		
	
<?php	
}	
?>	
	
	
</div>
</header>