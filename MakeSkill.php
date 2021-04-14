<?php
$KeyUser		= $_GET["KeyUser"];
$idRepository 	= $_GET["idRepository"];

$code	.=	"const Alexa = require('ask-sdk-core');"."\r\n"."\r\n";
$code	.=	"const LaunchRequestHandler = {"."\r\n";
$code	.=	"\t"."canHandle(handlerInput) {"."\r\n";
$code	.=	"\t\t"."return Alexa.getRequestType(handlerInput.requestEnvelope) === 'LaunchRequest';"."\r\n";
$code	.=	"\t"."},"."\r\n";
$code	.=	"\t"."handle(handlerInput) {"."\r\n";

$query 			= "SELECT * FROM `Questions` WHERE `KeyUser` = '$KeyUser' AND `idRepository` = '$idRepository' AND `IntentName` = 'LaunchRequest'";
$result 		= $mysqli->query($query);
while ($row 	= $result->fetch_assoc()) {	

$code	.=	"\t\t"."const speakOutput = '".$row["answer"]."';"."\r\n";	

}

$code	.=	"\t\t"."return handlerInput.responseBuilder"."\r\n";

$code	.=	"\t\t\t".".speak(speakOutput)"."\r\n";

$code	.=	"\t\t\t".".reprompt(speakOutput)"."\r\n";

$code	.=	"\t\t\t".".getResponse();"."\r\n";

$code	.=	"\t\t"."}"."\r\n";

$code	.=	"};"."\r\n"."\r\n";







$code	.=	"const HelloWorldIntentHandler = {"."\r\n";

$code	.=	"\t"."canHandle(handlerInput) {"."\r\n";

$code	.=	"\t\t"."return Alexa.getRequestType(handlerInput.requestEnvelope) === 'LaunchRequest';"."\r\n";

$code	.=	"\t"."},"."\r\n";

$code	.=	"\t"."handle(handlerInput) {"."\r\n";

$query 			= "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' AND idRepository = '$idRepository' AND IntentName = 'HelloWorldIntent'";

$result 		= $mysqli->query($query);

while ($row 	= $result->fetch_assoc()) {	

$code	.=	"\t\t"."const speakOutput = '".$row["answer"]."';"."\r\n";	

}

$code	.=	"\t\t"."return handlerInput.responseBuilder"."\r\n";

$code	.=	"\t\t\t".".speak(speakOutput)"."\r\n";

$code	.=	"\t\t\t".".reprompt(speakOutput)"."\r\n";

$code	.=	"\t\t\t".".getResponse();"."\r\n";

$code	.=	"\t\t"."}"."\r\n";

$code	.=	"};"."\r\n"."\r\n";





$query 			= "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository' and IntentName != 'LaunchRequest' and IntentName != 'HelloWorldIntent' and IntentName != 'HelpIntent' and IntentName != 'CancelAndStopIntent' and IntentName != 'FallbackIntent' and IntentName != 'IntentReflector' and IntentName != 'Error' and IntentName != 'AMAZON.NoIntent' and IntentName != 'AMAZON.YesIntent'";

$result 		= $mysqli->query($query);

while ($row 	= $result->fetch_assoc()) {	

$code	.=	"const ".$row["IntentName"]."Handler"."= {"."\r\n";

$code	.=	"\t"."canHandle(handlerInput) {"."\r\n";

$code	.=	"\t\t"."return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'"."\r\n";

$code	.=	"\t\t\t"."&& Alexa.getIntentName(handlerInput.requestEnvelope) === '".$row["IntentName"]."';"."\r\n";

$code	.=	"\t"."},"."\r\n";

$code	.=	"\t"."handle(handlerInput) {"."\r\n";

$code	.=	"\t\t"."const speakOutput = '".preg_replace( "/\r|\n/", "", $row["answer"])."';"."\r\n";

$code	.=	"\t\t"."return handlerInput.responseBuilder"."\r\n";

$code	.=	"\t\t\t".".speak(speakOutput)"."\r\n";

if ($row["option"] == "reprompt"){

$code	.=	"\t\t\t".".reprompt('".$row["reprompt"]."')"."\r\n";	

}else{

$code	.=	"\t\t\t"."//.reprompt('')"."\r\n";	

}	

$code	.=	"\t\t\t".".getResponse();"."\r\n";

$code	.=	"\t\t"."}"."\r\n";

$code	.=	"};"."\r\n"."\r\n";

}







$code	.=	"const HelpIntentHandler = {"."\r\n";

$code	.=	"\t"."canHandle(handlerInput) {"."\r\n";

$code	.=	"\t\t"."return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'"."\r\n";

$code	.=	"\t\t\t"."&& Alexa.getIntentName(handlerInput.requestEnvelope) === 'AMAZON.HelpIntent';"."\r\n";

$code	.=	"\t"."},"."\r\n";

$code	.=	"\t"."handle(handlerInput) {"."\r\n";

$query 			= "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' AND idRepository = '$idRepository' AND IntentName = 'HelpIntent'";

$result 		= $mysqli->query($query);

while ($row 	= $result->fetch_assoc()) {	

$code	.=	"\t\t"."const speakOutput = '".$row["answer"]."';"."\r\n";	

}

$code	.=	"\t\t"."return handlerInput.responseBuilder"."\r\n";

$code	.=	"\t\t\t".".speak(speakOutput)"."\r\n";

$code	.=	"\t\t\t".".reprompt(speakOutput)"."\r\n";

$code	.=	"\t\t\t".".getResponse();"."\r\n";

$code	.=	"\t\t"."}"."\r\n";

$code	.=	"};"."\r\n"."\r\n";



$code	.=	"const CancelAndStopIntentHandler = {"."\r\n";

$code	.=	"\t"."canHandle(handlerInput) {"."\r\n";

$code	.=	"\t\t"."return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'"."\r\n";

$code	.=	"\t\t\t"."&& (Alexa.getIntentName(handlerInput.requestEnvelope) === 'AMAZON.CancelIntent'"."\r\n";

$code	.=	"\t\t\t\t"."|| Alexa.getIntentName(handlerInput.requestEnvelope) === 'AMAZON.StopIntent');"."\r\n";

$code	.=	"\t"."},"."\r\n";

$code	.=	"\t"."handle(handlerInput) {"."\r\n";

$query 			= "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' AND idRepository = '$idRepository' AND IntentName = 'CancelAndStopIntent'";

$result 		= $mysqli->query($query);

while ($row 	= $result->fetch_assoc()) {	

$code	.=	"\t\t"."const speakOutput = '".$row["answer"]."';"."\r\n";	

}

$code	.=	"\t\t"."return handlerInput.responseBuilder"."\r\n";

$code	.=	"\t\t\t".".speak(speakOutput)"."\r\n";

$code	.=	"\t\t\t".".getResponse();"."\r\n";

$code	.=	"\t\t"."}"."\r\n";

$code	.=	"};"."\r\n"."\r\n";



$code	.=	"const FallbackIntentHandler = {"."\r\n";

$code	.=	"\t"."canHandle(handlerInput) {"."\r\n";

$code	.=	"\t\t"."return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'"."\r\n";

$code	.=	"\t\t\t"."&& Alexa.getIntentName(handlerInput.requestEnvelope) === 'AMAZON.FallbackIntent';"."\r\n";

$code	.=	"\t"."},"."\r\n";

$code	.=	"\t"."handle(handlerInput) {"."\r\n";

$query 			= "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' AND idRepository = '$idRepository' AND IntentName = 'FallbackIntent'";

$result 		= $mysqli->query($query);

while ($row 	= $result->fetch_assoc()) {	

$code	.=	"\t\t"."const speakOutput = '".str_replace("'", "", $row["answer"])."';"."\r\n";	

}

$code	.=	"\t\t"."return handlerInput.responseBuilder"."\r\n";

$code	.=	"\t\t\t".".speak(speakOutput)"."\r\n";

$code	.=	"\t\t\t".".reprompt(speakOutput)"."\r\n";

$code	.=	"\t\t\t".".getResponse();"."\r\n";

$code	.=	"\t\t"."}"."\r\n";

$code	.=	"};"."\r\n"."\r\n";



$code	.=	"const SessionEndedRequestHandler = {"."\r\n";

$code	.=	"\t"."canHandle(handlerInput) {"."\r\n";

$code	.=	"\t\t"."return Alexa.getRequestType(handlerInput.requestEnvelope) === 'SessionEndedRequest';"."\r\n";

$code	.=	"\t"."},"."\r\n";

$code	.=	"\t"."handle(handlerInput) {"."\r\n";

$code	.=	"\t\t".'console.log(`~~~~ Session ended: ${JSON.stringify(handlerInput.requestEnvelope)}`);'."\r\n";

$code	.=	"\t\t"."return handlerInput.responseBuilder.getResponse(); // notice we send an empty response"."\r\n";

$code	.=	"\t\t"."}"."\r\n";

$code	.=	"};"."\r\n"."\r\n";



$code	.=	"const IntentReflectorHandler = {"."\r\n";

$code	.=	"\t"."canHandle(handlerInput) {"."\r\n";

$code	.=	"\t\t"."return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest';"."\r\n";

$code	.=	"\t"."},"."\r\n";

$code	.=	"\t"."handle(handlerInput) {"."\r\n";

$code	.=	"\t\t"."const intentName = Alexa.getIntentName(handlerInput.requestEnvelope);"."\r\n";

$query 			= "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' AND idRepository = '$idRepository' AND IntentName = 'IntentReflector'";

$result 		= $mysqli->query($query);

while ($row 	= $result->fetch_assoc()) {	

$code	.=	"\t\t"."const speakOutput = '".$row["answer"]."';"."\r\n";	

}

$code	.=	"\t\t"."return handlerInput.responseBuilder"."\r\n";

$code	.=	"\t\t\t".".speak(speakOutput)"."\r\n";

$code	.=	"\t\t\t".".getResponse();"."\r\n";

$code	.=	"}"."\r\n";

$code	.=	"};"."\r\n"."\r\n";





$code	.=	"const ErrorHandler = {"."\r\n";

$code	.=	"\t"."canHandle() {"."\r\n";

$code	.=	"\t\t"."return true;"."\r\n";

$code	.=	"\t"."},"."\r\n";

$code	.=	"\t"."handle(handlerInput, error) {"."\r\n";

$query 			= "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' AND idRepository = '$idRepository' AND IntentName = 'Error'";

$result 		= $mysqli->query($query);

while ($row 	= $result->fetch_assoc()) {	

$code	.=	"\t\t"."const speakOutput = '".$row["answer"]."';"."\r\n";	

}

$code	.=	"\t\t".'console.log(`~~~~ Error handled: ${JSON.stringify(error)}`);'."\r\n";

$code	.=	"\t\t"."return handlerInput.responseBuilder"."\r\n";

$code	.=	"\t\t\t".".speak(speakOutput)"."\r\n";

$code	.=	"\t\t\t".".reprompt(speakOutput)"."\r\n";

$code	.=	"\t\t\t".".getResponse();"."\r\n";

$code	.=	"\t"."}"."\r\n";

$code	.=	"};"."\r\n";





$query 			= "SELECT * FROM `RandomQuotes` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository' and RandomFacts != ''";

$result 		= $mysqli->query($query);

while ($row 	= $result->fetch_assoc()) {	





//Random Quotes

	

$code	.= "const ".$row["IntentName"]."Rand"." = [";

$codeR   = str_replace(' ,', ', ', $row["Random"]);	

$codeR2  = $codeR."];";

$codeR3  = str_replace(', ];', '];', $codeR2);	

$code	.= $codeR3;

$code	.= "\r\n";

$code	.= "";

$code	.= "";

$code	.= "";

$code	.=	"const ".$row["IntentName"]."Handler"."= {"."\r\n";

$code	.=	"\t"."canHandle(handlerInput) {"."\r\n";

$code	.=	"\t\t"."return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'"."\r\n";

$code	.=	"\t\t\t"."&& Alexa.getIntentName(handlerInput.requestEnvelope) === '".$row["IntentName"]."';"."\r\n";

$code	.=	"\t"."},"."\r\n";

$code	.=	"\t"."handle(handlerInput) {"."\r\n";

$code	.=  "const a = ".$row["IntentName"]."Rand;"."\r\n";

	

$RandomQ = $row["IntentName"];	

$queryq			= "SELECT * FROM `RandomQuotes` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository' and IntentName = '$RandomQ'";

$resultq 		= $mysqli->query($queryq);

while ($rowq 	= $resultq->fetch_assoc()) {	

$codeRQ	=	$rowq["RandomFacts"];	

for ($i = 1; $i <= $codeRQ; $i++) {

$rd		.= "const a".$i." = a[Math.floor(Math.random() * a.length)];"."\r\n";

$sp 	.= "a".$i." + "."'".'<break time="0.5s" />'."'"." + ";

}}

$code	.= $rd;	

unset($rd);	





$codeSPO	=	"\t\t"."const speakOutput = '".$row["Intro"]."'+".$sp."'".$row["End"]."';"."\r\n";

$code		.= str_replace("'", "'", $codeSPO);	

unset($sp);	

$code	.=	"\t\t"."return handlerInput.responseBuilder"."\r\n";

$code	.=	"\t\t\t".".speak(speakOutput)"."\r\n";

$code	.=	"\t\t\t".".getResponse();"."\r\n";

$code	.=	"\t\t"."}"."\r\n";

$code	.=	"};"."\r\n"."\r\n";

}	





$code	.=	"exports.handler = Alexa.SkillBuilders.custom()"."\r\n";

$code	.=	"\t".".addRequestHandlers("."\r\n";

$code	.=	"\t\t"."LaunchRequestHandler,"."\r\n";

$code	.=	"\t\t"."HelloWorldIntentHandler,"."\r\n";

$query 			= "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository' and IntentName != 'AMAZON.YesIntent' and IntentName != 'AMAZON.NoIntent' and IntentName != 'LaunchRequest' and IntentName != 'HelloWorldIntent' and IntentName != 'HelpIntent' and IntentName != 'CancelAndStopIntent' and IntentName != 'FallbackIntent' and IntentName != 'IntentReflector' and IntentName != 'Error'";

$result 		= $mysqli->query($query);

while ($row 	= $result->fetch_assoc()) {	

$code	.=	"\t\t".$row["IntentName"]."Handler,"."\r\n";		

}

$query 			= "SELECT * FROM `RandomQuotes` WHERE KeyUser = '$KeyUser' AND idRepository = '$idRepository'";

$result 		= $mysqli->query($query);

while ($row 	= $result->fetch_assoc()) {	

$code	.=	"\t\t".$row["IntentName"]."Handler,"."\r\n";		

}

$code	.=	"\t\t"."HelpIntentHandler,"."\r\n";

$code	.=	"\t\t"."CancelAndStopIntentHandler,"."\r\n";

$code	.=	"\t\t"."FallbackIntentHandler,"."\r\n";

$code	.=	"\t\t"."SessionEndedRequestHandler,"."\r\n";

$code	.=	"\t\t"."IntentReflectorHandler)"."\r\n";

$code	.=	"\t".".addErrorHandlers("."\r\n";

$code	.=	"\t\t"."ErrorHandler)"."\r\n";

$code	.=	"\t".".withCustomUserAgent('sample/hello-world/v1.2')"."\r\n";

$code	.=	"\t".".lambda();"."\r\n";



?>


<div class="text-white mt-5 mb-3">
  <h2>Alexa code</h2></div>

<small class="text-center text-white mt-3 mb-5">Copy source code and past in Amazon Developer Console</small>

<script>

function copy() {

  let textarea = document.getElementById("txtarea");

  textarea.select();

  document.execCommand("copy");

}

</script>

<button class="btn btn-primary btn-lg btn-block w-75 mx-auto ml-5 mr-5 mt-5" onclick="copy()"><i class="fas fa-copy"></i> Copy to clipboard</button><br>

<textarea rows="25" id="txtarea" class="form-control form-control-lg ml-5 mr-5 mx-auto w-75"><?php echo($code); ?></textarea>

