<?php
session_start();
// Connection with BD
include("Connection.php");
include("Function.php");
include("Texts.php");
if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['FirstName']) == true) and (!isset ($_SESSION['LastName']) == true) and
(!isset ($_SESSION['Email']) == true) and (!isset ($_SESSION['Birthday']) == true) and (!isset ($_SESSION['KeyUser']) == true) and (!isset ($_SESSION['Tips']) == true)) {   

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
.float{
right:30px; 
position:fixed; 
width:60px; 
height:60px; 
bottom:30px; 
background-color:yellow; 
color:black;
border-radius:50px; 
text-align:center;
font-size:20px; 
box-shadow: 2px 2px 3px #000000; 
z-index:100;
animation: pulse 1s infinite;	
}
@keyframes pulse {
10% {
box-shadow: 0 0 0 0 #4dc247;
}
80% {
box-shadow: 0 0 0 15px rgba(204, 169, 44, 0);
}	
100% {
box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
}
}
.my-float{margin-top:5px;}
.Attention{
animation: pulseCat 0.8s infinite;	
}
@keyframes pulseCat {
10% {
box-shadow: 0 0 0 0 green;
}
80% {
box-shadow: 0 0 0 25px rgba(204, 169, 44, 0);
}	
100% {
box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
}
}
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
$pagina['Manual'] 				= "Manual.php";	

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
	
	
<?php
if ($_SESSION["Tips"] == "YES"){
	if($link != "About" or $link != "Donate"){
?>
<button type="button" id="<?php if(isset($link)){echo($link);} else {echo("Helper");};?>" class="float">
<i style="color: black;" class="fas fa-2x fa-question my-float"></i>
</button>

<?php }} ?>
	
<footer class="text-white mt-5 mb-5 mx-auto">
<div><p><?php echo($LastUpdate);?> | <?php echo($Version);?></p></div>
</footer>	
	
<script>
// Adicionar o HELP aos demais
$(document).ready(function(){
$("#Helper").click(function(){
$('#HelperModal').modal('show');
});
});
</script>	
	
</body>
</html>