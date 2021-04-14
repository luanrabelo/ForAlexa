<?php
include("Connection.php");
$KeyUser	 =	$_GET["KeyUser"];
$idRepository	 =	$_GET["idRepository"];

$query = ("SELECT * FROM `Questions` WHERE IntentName = 'LaunchRequest' and KeyUser = '$KeyUser' and idRepository = '$idRepository'");
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$NameInvocation = $row["question_1"];	
}
$Invocation	= $NameInvocation;
$json	 =	"{"."\r\n";
$json	.=	"\t".'"interactionModel": {'."\r\n";
$json	.=	"\t\t".'"languageModel": {'."\r\n";
$json	.=	"\t\t\t".'"invocationName": "'.$Invocation.'",'."\r\n";
$json	.=	"\t\t\t\t".'"intents": ['."\r\n";


$query = ("SELECT * FROM `Questions` WHERE idRepository = '$idRepository' and KeyUser = '$KeyUser' and IntentName != 'LaunchRequest' and IntentName != 'IntentReflector' and IntentName != 'Error'");
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$samples  = '[';
if($row["question_1"] <> "") {$samples .= '"'.$row["question_1"].'"';}; 	
if($row["question_2"] <> "") {$samples .= ', "'.$row["question_2"].'"';};
if($row["question_3"] <> "") {$samples .= ', "'.$row["question_3"].'"';};	
if($row["question_4"] <> "") {$samples .= ', "'.$row["question_4"].'"';};	
if($row["question_5"] <> "") {$samples .= ', "'.$row["question_5"].'"';};	
if($row["question_6"] <> "") {$samples .= ', "'.$row["question_6"].'"';};		
$samples .= "]";
$json	.=	"\t\t\t\t\t"."{"."\r\n";			
	
if($row["IntentName"] == "CancelAndStopIntent"){ 
$Intent = "AMAZON.StopIntent";
}	
elseif($row["IntentName"] == "HelpIntent"){ 
$Intent = "AMAZON.HelpIntent";
}
elseif($row["IntentName"] == "FallbackIntent"){ 
$Intent = "AMAZON.FallbackIntent";
} else {
$Intent = $row["IntentName"];
}

	
$json	.=	"\t\t\t\t\t\t".'"name": "'.$Intent.'",'."\r\n";
$json	.=	"\t\t\t\t\t\t".'"samples": '.$samples.''."\r\n";
$json	.=	"\t\t\t\t\t"."},"."\r\n";	
}

$query = ("SELECT * FROM `RandomQuotes` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository'");
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$samples  = '[';
$samples .= '"'.$row["Utterances_1"].'"';	
if($row["Utterances_2"] <> "") {$samples .= ', "'.$row["Utterances_2"].'"';};
if($row["Utterances_3"] <> "") {$samples .= ', "'.$row["Utterances_3"].'"';};	
if($row["Utterances_4"] <> "") {$samples .= ', "'.$row["Utterances_4"].'"';};	
if($row["Utterances_5"] <> "") {$samples .= ', "'.$row["Utterances_5"].'"';};	
if($row["Utterances_6"] <> "") {$samples .= ', "'.$row["Utterances_6"].'"';};		
$samples .= "]";
$json	.=	"\t\t\t\t\t"."{"."\r\n";
$json	.=	"\t\t\t\t\t\t".'"name": "'.$row["IntentName"].'",'."\r\n";
$json	.=	"\t\t\t\t\t\t".'"samples": '.$samples.''."\r\n";
$json	.=	"\t\t\t\t\t"."},"."\r\n";	
}
$json	.=	"\t\t\t\t\t"."{"."\r\n";
$json	.=	"\t\t\t\t\t\t".'"name": "AMAZON.NavigateHomeIntent",'."\r\n";
$json	.=	"\t\t\t\t\t\t".'"samples": '.'[]'.''."\r\n";
$json	.=	"\t\t\t\t\t"."},"."\r\n";

$json	.=	"\t\t\t\t\t"."{"."\r\n";
$json	.=	"\t\t\t\t\t\t".'"name": "AMAZON.CancelIntent",'."\r\n";
$json	.=	"\t\t\t\t\t\t".'"samples": '.'[]'.''."\r\n";
$json	.=	"\t\t\t\t\t"."}"."\r\n";

$json	.=	"\t\t\t"." ],"."\r\n";
$json	.=	"\t\t\t".'"types": []'."\r\n";
$json	.=	"\t\t"."}"."\r\n";
$json	.=	"\t"."}"."\r\n";
$json	.=	"}";


//Create File Fasta
$File_Name = "jsonFiles/ForAlexa[".$KeyUser."].json";

if(file_exists("$File_Name")) {
$fp = fopen("$File_Name", "w");
fwrite($fp, "$json");
fclose($fp);
} else {
$fp = fopen("$File_Name", "w");
fwrite($fp, "$json");
fclose($fp);
}
$filename = $File_Name;
if(ini_get('zlib.output_compression'))
ini_set('zlib.output_compression', 'Off');
$file_extension = strtolower(substr(strrchr($filename,"."),1));
if($filename=="") {
echo "nenhum arquivo foi especificado para download";
exit;
}elseif(!file_exists($filename)) {
echo "<h1 align='center'>Json File not Found!</h1>";
exit;
};
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename="'.$filename.'"');
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($filename));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Expires: 0');
// Envia o arquivo para o cliente
readfile($filename);
?>
