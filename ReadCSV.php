<?php
include("Connection.php");

//$KeyUser		= $_POST["idRepositoryUpload"];


$idRepository 	= "5";
$KeyUser		= $_POST["KeyUser"];


$file = "Examples/ForAlexa_Example_1_en-US.ForAlexa";

$QData 		= 0;	
$DataInsert = 0;

$fh = fopen($file, 'r');
while (($line = fgetcsv($fh, 0, "\t")) !== false) {

$Intent = $line["0"];

if($Intent == "Questions"){	
	
$search 	= mysqli_query($mysqli, "SELECT * FROM Questions WHERE IntentName = '$Intent' AND KeyUser = '$KeyUser' AND idRepository = '$idRepository'");
$num_rows 	= mysqli_num_rows($search);	
if(!$num_rows > 0){
$sqli		= ("INSERT INTO `Questions` (`IntentName`, `question_1`, `question_2`, `question_3`, `question_4`, `question_5`, `question_6`, `answer`, `option`, `reprompt`, `KeyUser`, `idRepository`) VALUES ('".$line["1"]."', '".$line["2"]."', '".$line["3"]."', '".$line["4"]."', '".$line["5"]."', '".$line["6"]."', '".$line["7"]."', '".$line["8"]."','".$line["9"]."','".$line["10"]."', '$KeyUser', '$idRepository')");
$querry 	= mysqli_query($mysqli, $sqli) or die (mysql_error($mysqli));
sleep(2);
$DataInsert++;	
unset($Intent);	
}
$QData++;	
}
else{
// Random Quotes	
}
unset($Intent);	
}
echo json_encode(array("Intents" => "$QData", "IntentsInsert" => "$DataInsert"));	
?>