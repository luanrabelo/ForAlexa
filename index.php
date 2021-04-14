<?php
//session_save_path('/home/luanrabelo2/tmp');
session_start();
// Connection with BD
include("Connection.php");
include("Function.php");
include("Texts.php");
if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['FirstName']) == true) and (!isset ($_SESSION['LastName']) == true) and
(!isset ($_SESSION['Email']) == true) and (!isset ($_SESSION['Birthday']) == true) and (!isset ($_SESSION['KeyUser']) == true)) {   

unset($_SESSION['Login']);
unset($_SESSION['Password']);
header('location:Login.php'); 

}

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
<?php include("Script.php");?>
<style>

</style>	
</head>

<body style="background-color: black;" class="container-fluid mx-auto text-center">
<?php include("Header.php");?>	
	
<main class="mb-3">
<?php
	
$pagina['NewRepository'] 		= "NewRepository.php";
$pagina['CDSNewRepository'] 	= "CDSNewRepository.php";
$pagina['IntentList'] 			= "IntentList.php";	
$pagina['Form']		 			= "Form.php";
$pagina['OpForm']	 			= "OpForm.php";
$pagina['RandomQuotes']	 		= "RandomQuotes.php";
$pagina['Operations']	 		= "Operations.php";	
$pagina['MakeSkill'] 			= "MakeSkill.php";		
$pagina['Logout'] 				= "Logout.php";	
$pagina['Tutorial'] 			= "Tutorial.php";		
$pagina['Donate'] 				= "Donate.php";	
$pagina['CiteForAlexa']			= "Cite.php";	
$pagina['About'] 				= "About.php";
$pagina['CSV'] 					= "CSV.php";	

if (isset($_GET["p"])){

$link = $_GET["p"];

if (file_exists($pagina[$link])){

include_once $pagina[$link];

} else {
die (include_once 'PageNotFound.php');
}} else {
include("Home.php");		
}	
	
?>
</main>	
<?php include("ads.php");?>	
<footer class="text-white mt-5 mb-5 mx-auto">
<div><p><?php echo($LastUpdate);?> | <?php echo($Version);?></p></div>
</footer>	
</body>
</html>