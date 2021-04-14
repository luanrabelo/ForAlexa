<?php
include("Connection.php");
$KeyUser 		= $_GET["KeyUser"];
$idRepository 	= $_GET["idRepository"];

$query 			= "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository'";
$result 		= $mysqli->query($query);
while ($row 	= $result->fetch_assoc()) {	
	
$Intents[] 		= "Questions"."\t".$row["IntentName"]."\t".$row["question_1"]."\t".$row["question_2"]."\t".$row["question_3"]."\t".$row["question_4"]."\t".$row["question_5"]."\t".$row["question_6"]."\t".$row["answer"]."\t".$row["option"]."\t".$row["reprompt"]."\r\n";	
}

$File_Name = "CSV/ForAlexa[".$KeyUser."].ForAlexa";
$texto_arquivo = implode('', $Intents);
if(file_exists("$File_Name")) {
$fp = fopen("$File_Name", "w");
fwrite($fp, "$texto_arquivo");
fclose($fp);
} else {
$fp = fopen("$File_Name", "w");
fwrite($fp, "$texto_arquivo");
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