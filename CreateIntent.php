<?php
include("Connection.php");

if(isset($_POST['KeyUser'])){
	
$idRepository 	= $_POST['idRepository'];
$KeyUser		= $_POST['KeyUser'];	


$search 	= mysqli_query($mysqli, "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository' and IntentName = 'Evolution'");
$num_rows 	= mysqli_num_rows($search);
if($num_rows == 0){ 
$sqli	=	("INSERT INTO `Questions` (`IntentName`, `question_1`, `answer`, `KeyUser`, `option`, `reprompt`, `idRepository`) VALUES ('Evolution', 'What is evolution', 'In a broad sense, the origin of entities possessing different states of one or more characteristics and changes in the proportions of these entities over time.', '$KeyUser', 'reprompt0', 'If you want, you can ask me another question, for example, ask me, questions about evolution.', '$idRepository')");
mysqli_query($mysqli, $sqli);
}
sleep(1);

$search 	= mysqli_query($mysqli, "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository' and IntentName = 'Allele'");
$num_rows 	= mysqli_num_rows($search);
if($num_rows == 0){ 
$sqli	=	("INSERT INTO `Questions` (`IntentName`, `question_1`, `answer`, `KeyUser`, `option`, `reprompt`, `idRepository`) VALUES ('Allele', 'What is an allele', 'One of several forms of the same gene, presumably differing by mutation of the DNA sequence', '$KeyUser', 'reprompt0', 'If you want, you can ask me another question, for example, ask me, questions about evolution.', '$idRepository')");
mysqli_query($mysqli, $sqli);
}
sleep(1);
	
$search 	= mysqli_query($mysqli, "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository' and IntentName = 'Dominance'");
$num_rows 	= mysqli_num_rows($search);
if($num_rows == 0){ 
$sqli	=	("INSERT INTO `Questions` (`IntentName`, `question_1`, `answer`, `KeyUser`, `option`, `reprompt`, `idRepository`) VALUES ('Dominance', 'What is a dominant allele', 'The dominance of an allele refers to the extent to which it produces the homozygous phenotype when heterozygous.', '$KeyUser', 'reprompt0', 'If you want, you can ask me another question, for example, ask me, questions about evolution.', '$idRepository')");
mysqli_query($mysqli, $sqli);
}
sleep(1);
	
$search 	= mysqli_query($mysqli, "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository' and IntentName = 'Recessive'");
$num_rows 	= mysqli_num_rows($search);
if($num_rows == 0){ 
$sqli	=	("INSERT INTO `Questions` (`IntentName`, `question_1`, `answer`, `KeyUser`, `option`, `reprompt`, `idRepository`) VALUES ('Recessive', 'What is a recessive allele', 'A recessive allele is one that is detectable in the phenotype only when homozygous.', '$KeyUser', 'reprompt0', 'If you want, you can ask me another question, for example, ask me, questions about evolution.', '$idRepository')");
mysqli_query($mysqli, $sqli);
}
sleep(1);
	
$search 	= mysqli_query($mysqli, "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository' and IntentName = 'Microevolution'");
$num_rows 	= mysqli_num_rows($search);
if($num_rows == 0){ 
$sqli	=	("INSERT INTO `Questions` (`IntentName`, `question_1`, `answer`, `KeyUser`, `option`, `reprompt`, `idRepository`) VALUES ('Microevolution', 'What is microevolution', 'A broad term, which usually refers to slight, short-term evolutionary changes within a species.', '$KeyUser', 'reprompt0', 'If you want, you can ask me another question, for example, ask me, questions about evolution.', '$idRepository')");
mysqli_query($mysqli, $sqli);
}
sleep(1);
	
$search 	= mysqli_query($mysqli, "SELECT * FROM `Questions` WHERE KeyUser = '$KeyUser' and idRepository = '$idRepository' and IntentName = 'Macroevolution'");
$num_rows 	= mysqli_num_rows($search);
if($num_rows == 0){ 
$sqli	=	("INSERT INTO `Questions` (`IntentName`, `question_1`, `answer`, `KeyUser`, `option`, `reprompt`, `idRepository`) VALUES ('Macroevolution', 'What is macroevolution', 'A broad term, which usually refers to the evolution of substantial changes in the phenotype, usually large enough to assign the modified lineage to a distinct genus or higher taxon.', '$KeyUser', 'reprompt0', 'If you want, you can ask me another question, for example, ask me, questions about evolution.', '$idRepository')");
mysqli_query($mysqli, $sqli);
}
sleep(1);	
echo 9;
}
?>