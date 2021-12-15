<header class="text-truncate text-white">
<div class="mb-0 mx-auto"><img src="img/ForAlexaLogo.png" width="42%" height="42%"></div>
	
<?php
if((!isset ($_SESSION['id']) == false)) {   
?>	
<nav style="background-color: black;" class="navbar navbar-expand-lg navbar-dark bg-dark">
	
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#NavMenu" aria-controls="NavMenu" aria-expanded="false" aria-label="Toggle navigation"><span><i style="color: white;" class="fas fa-2x fa-bars"></i></span></button>
	
<div class="collapse navbar-collapse" id="NavMenu">

	
<ul class="navbar-nav mx-auto">

<li class="nav-item active ml-3 mr-3">
<a id="RepositoriesLink" class="btn btn-block btn-dark nav-link" style="color: white;" href="index.php" target="_self" role="button"><i class="fas fa-home mr-2"></i><?php if($device == "PC") {echo("Repositories");}?></a>	
</li>		
			
<li class="nav-item active ml-3 mr-3">
<a id="ManualLink" class="btn btn-block btn-dark nav-link" style="color: white;" href="Manual/Manual_ForAlexa_English.pdf" target="_blank" role="button"><i class="fas fa-file-pdf mr-2"></i><?php if($device == "PC") {echo("Manual");}?></a>	
</li>		
	
	
<li class="nav-item active ml-3 mr-3">
<a id="GitHubLink" class="btn btn-block btn-dark nav-link" style="color: white;" href="https://github.com/luanrabelo/ForAlexa" target="_blank" role="button"><i class="fab fa-github mr-2"></i><?php if($device == "PC") {echo("GitHub");}?></a>	
</li>	

<li class="nav-item active ml-3 mr-3">
<a id="CiteLink" class="btn btn-block btn-dark nav-link" style="color: white;" href="index.php?p=CiteForAlexa" target="_self" role="button"><i class="fas fa-scroll mr-2"></i><?php if($device == "PC") {echo("How to cite");}?></a>	
</li>	
	
<li class="nav-item active ml-3 mr-3">
<a id="AboutLink" class="btn btn-block btn-dark nav-link" style="color: white;" href="index.php?p=About" target="_self" role="button"><i class="fas fa-address-card mr-2"></i><?php if($device == "PC") {echo("About");}?></a>	
</li>	

<li class="nav-item active ml-3 mr-3">
<a id="DonateLink" class="btn btn-block btn-dark nav-link" style="color: white;" href="index.php?p=Donate" target="_self" role="button"><i class="fas fa-hand-holding-usd mr-2"></i><?php if($device == "PC") {echo("Donate");}?></a>	
</li>			
		
<li class="nav-item active ml-3 mr-3">
<a id="LogoutLink" class="btn btn-block btn-dark nav-link" style="color: white;" href="index.php?p=Logout&Token=<?php echo(md5(session_id()));?>" target="_self" role="button"><i class="fas fa-sign-out-alt mr-2"></i><?php if($device == "PC") {echo("Logout");}?></a>	
</li>
	
	
	
</ul>
	
</div>	
</nav>		
	
<?php	
}	
?>	
	
	
</div>
</header>