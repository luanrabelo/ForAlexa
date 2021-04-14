<?php
include("Function.php");
include("Texts.php");
?>
<!doctype html>
<html>
<head>	
<meta charset="UTF-8">
<title><?php echo($Title);?></title>
<link rel="icon" type="image/png" href="img/logo.jpg" />	
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>	
<script defer src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"></script>	
<!-- Responsive -->	
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta property="og:title" content="<?php echo($Title);?>" />
<meta property="og:url" content="<?php echo($Link);?>" />
<meta property="og:description" content="<?php echo($Description);?>">
<meta property="og:image" content="img/logo.jpg" />
<meta name="author" content="Luan Rabelo">
<link rel="stylesheet" href="ForAlexa.css">  	
</head>
<body style="background-color: black;" class="text-center">		
<div class="container-fluid mx-auto">
<?php include("Header.php");?>	
<main>
<?php
$pagina['NewUser'] 		= "UserFormCds.php";
$pagina['CdsUser'] 		= "OpUser.php";
$pagina['Recover'] 		= "RecoverPass.php";	
$pagina['NewPassword'] 	= "NewPassword.php";		
$pagina['UpdatePass'] 	= "UpdatePass.php";			
if (isset($_GET["p"])){
$link = $_GET["p"];
if (file_exists($pagina[$link])){
include_once $pagina[$link];
} else {
die (include_once 'PageNotFound.php');
}} else {
include("LoginForm.php");		
}	
?>
<?php //include("ads.php");?>	
</main>	
<footer class="text-white mt-5 mb-5 mx-auto">
<div><p><?php echo($LastUpdate);?> | <?php echo($Version);?></p></div>
</footer>	
</div>	
</body>
</html>