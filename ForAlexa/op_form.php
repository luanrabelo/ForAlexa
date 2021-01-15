<?php
// Connection MySQL
include("Connection.php");


$Action = $_GET["action"];
$Form	= $_GET["Form"];

if($Form == "RandomQuotes"){
if($Action == "cds"){	
$IntentName   	= str_replace(" ", "", $_POST["IntentName"]);	
$Utterances_1 	= $_POST["Utterance_1"];
$Utterances_2 	= $_POST["Utterance_2"];
$Utterances_3 	= $_POST["Utterance_3"];
$Utterances_4 	= $_POST["Utterance_4"];
$Utterances_5 	= $_POST["Utterance_5"];
$Utterances_6 	= $_POST["Utterance_6"];
$RandomFacts	= $_POST["RandomFacts"]; 	
$Intro			= $_POST["Intro"];
$qtde_quotes	= $_POST["qtde_quotes"]; // Quantidade de perguntas aleatórias
for ($i = 1; $i <= $qtde_quotes; $i++) {
$RandomQuotes 	.= "`".$_POST["RandomQuotes_$i"]."` ,";
}	
$End			= $_POST["End"];	
$Key			= $_GET["key"];	
$script			 = "const ".$IntentName."Rand"." = [ ";
$script			.= $RandomQuotes.", ];";	


// MySQL Random Quotes
$sqli	=	("INSERT INTO `RandomQuotes` (`IntentName`, `Utterances_1`, `Utterances_2`, `Utterances_3`, `Utterances_4`, `Utterances_5`, `Utterances_6`, `RandomFacts`, `Intro`, `Random`, `End`, `key_user`) VALUES ('$IntentName', '$Utterances_1', '$Utterances_2', '$Utterances_3', '$Utterances_4', '$Utterances_5', '$Utterances_6', '$RandomFacts', '$Intro', '$RandomQuotes', '$End', '$Key')");
if(mysqli_query($mysqli, $sqli)){
echo("<div class='jumbotron jumbotron-fluid bg-success mt-5'><div class='container'><h1 class='display-4 text-center'>The Intent ".$IntentName." has been successfully registered</h1></div></div>");	
print "<meta http-equiv='refresh' content='3;url=index.php?p=StepTree&key=$Key'/>";	
}}
}
if($Action == "Update"){
if ($Form == "QA"){
$IntentName   = $_POST["IntentName"];
$Utterances_1 = $_POST["Utterance_1"];
$Utterances_2 = $_POST["Utterance_2"];
$Utterances_3 = $_POST["Utterance_3"];
$Utterances_4 = $_POST["Utterance_4"];
$Utterances_5 = $_POST["Utterance_5"];
$Utterances_6 = $_POST["Utterance_6"];
$speakOutput  = $_POST["speakOutput"];
$option		  = $_POST["option"];	
$reprompt	  = $_POST["reprompt"];
$key			= $_GET["key"];	
$id				= $_GET["id"];	
	
$sqli	=	("UPDATE `Questions` SET `IntentName`= '$IntentName',`question_1`= '$Utterances_1',`question_2`= '$Utterances_2',`question_3`= '$Utterances_3',`question_4`= '$Utterances_4',`question_5`= '$Utterances_5',`question_6`= '$Utterances_6',`answer`= '$speakOutput',`option`= '$option',`reprompt`= '$reprompt' WHERE id_question = '$id' and key_user = '$key'");
if(mysqli_query($mysqli, $sqli)){
echo("<div class='jumbotron jumbotron-fluid bg-success mt-5'><div class='container'><h1 class='display-4 text-center'>The Intent ".$IntentName." updated successfully</h1></div></div>");	
print "<meta http-equiv='refresh' content='3;url=index.php?p=StepTree&key=$key'/>";	
}	
}}
if($Action == "cds"){
if ($Form == "QA"){	
$IntentName   = $_POST["IntentName"];
$Utterances_1 = $_POST["Utterance_1"];
$Utterances_2 = $_POST["Utterance_2"];
$Utterances_3 = $_POST["Utterance_3"];
$Utterances_4 = $_POST["Utterance_4"];
$Utterances_5 = $_POST["Utterance_5"];
$Utterances_6 = $_POST["Utterance_6"];
$speakOutput  = $_POST["speakOutput"];
$option		  = $_POST["option"];	
$reprompt	  = $_POST["reprompt"];
$key			= $_GET["key"];

$sqli	=	("INSERT INTO `Questions` (`IntentName`, `question_1`, `question_2`, `question_3`, `question_4`, `question_5`, `question_6`, `answer`, `key_user`, `option`, `reprompt`) VALUES ('$IntentName', '$Utterances_1', '$Utterances_2', '$Utterances_3', '$Utterances_4', '$Utterances_5', '$Utterances_6', '$speakOutput', '$key', '$option', '$reprompt')");
if(mysqli_query($mysqli, $sqli)){
echo("<div class='jumbotron jumbotron-fluid bg-success mt-5'><div class='container'><h1 class='display-4 text-center'>The Intent ".$IntentName." has been successfully registered</h1></div></div>");	
print "<meta http-equiv='refresh' content='3;url=index.php?p=StepTree&key=$key'/>";	
}
}}
?>