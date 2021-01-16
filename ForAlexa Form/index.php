<?php
// Connection with BD
include("Connection.php");

$iphone 		= strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipad 			= strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$android 		= strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre		= strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry 			= strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod			= strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$symbian 		= strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
$windowsphone 	= strpos($_SERVER['HTTP_USER_AGENT'],"Windows Phone");
 
if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian || $windowsphone == true) 
{$device = "Mobile";} else { $device = "PC";}
?>
<!doctype html>
<html>
<head>	
<meta charset="UTF-8">
<title>ForAlexa - Skill Building</title>
<link rel="icon" type="image/png" href="img/logo.jpg" />	
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>	
<script defer src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"></script>	
<!-- Responsive -->	
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta property="og:title" content="ForAlexa - Skill Building" />
<meta property="og:url" content="https://luanrabelo.bio.br/ForAlexa/index.php" />
<meta property="og:description" content="ForAlexa is a online Form to building Skills. Created by Rabelo et al (2021)">
<meta property="og:image" content="img/logo.jpg" />
<meta name="author" content="Luan Rabelo">
<?php include("script.php");?>
<style>
a{
color: grey;
}	
a:link {
color: gray;
text-decoration: none;	
}
a:hover {
color: white;
text-decoration: none;	
}	
.fa-3x {
vertical-align: middle;
}	
.fa-2x {
vertical-align: middle;
}	
body { 
font-family: Segoe UI;
letter-spacing: 1.5px;
}
</style>	
</head>

<body class="text-center w-100 bg-dark h-100">	
<div class="container mx-auto">	
<header class="mt-2 text-white">
<div class="mb-5"><img src="img/ForAlexaLogo.png" width="50%" height="50%"></div>	
<div class="row text-truncate text-center mx-auto">
<div class="col-2"><a href="index.php"><i class="fas fa-3x fa-home"></i><?php if($device == "PC") {echo(" Home");}?></a></div>
<div class="col-2"><a href="index.php?p=Tutorial"><i class="fas fa-3x fa-chalkboard-teacher"></i><?php if($device == "PC") {echo(" Tutorial");}?></a></div>
<div class="col-2"><a href="https://github.com/luanrabelo/ForAlexa" target="_blank"><i class="fab fa-3x fa-github"></i><?php if($device == "PC") {echo(" GitHub");}?></a></div>
<div class="col-2"><a href="index.php?p=CiteForAlexa"><i class="fas fa-3x fa-scroll"></i><?php if($device == "PC") {echo(" How to cite");}?></a></div>
<div class="col-2"><a href="index.php?p=About"><i class="fas fa-3x fa-address-card"></i><?php if($device == "PC") {echo(" About");}?></a></div>
<div class="col-2"><a href="index.php?p=Donate"><i class="fas fa-3x fa-hand-holding-usd"></i><?php if($device == "PC") {echo(" Donate");}?></a></div>	
</div>
</header>	

<main>
<?php
$pagina['StepOne']		= "StepOne.php";
$pagina['StepTwo'] 		= "StepTwo.php";
$pagina['StepTree']		= "StepTree.php";
$pagina['Form']			= "form.php";
$pagina['OpForm']		= "op_form.php";
$pagina['JsonFile']		= "json.php";
$pagina['Operations']	= "operations.php";	
$pagina['MakeSkill']	= "MakeSkill.php";		
$pagina['About']		= "about.php";			
$pagina['CiteForAlexa']	= "cite.php";
$pagina['Tutorial']		= "tutorial.php";
$pagina['RandomQuotes']	= "RandomQuotes.php";	
$pagina['Donate']		= "donate.php";		

if (isset($_GET["p"])){
$link = $_GET["p"];
if (file_exists($pagina[$link])){
include_once $pagina[$link];
} else {
include("PageNotFound.php");
}}
else 
{
include("home.php");
}	
?>	
</main>	
	
<footer class="text-white mt-5 mb-5 mx-auto">
<div><p>Last Update: 14/01/2021 | Version 0.8.4 beta</p></div>
</footer>	
</div>	
</body>
</html>