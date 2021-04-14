<?php
// Utterance 1
if(isset($_POST['Utterance_1'])){
if($_POST['Utterance_1'] <> ""){	
$Utterance_1 	= $_POST['Utterance_1'];
$key			= $_POST['key'];	
$sql = mysqli_query($mysqli, "SELECT question_1, question_2, question_3, question_4, question_5, question_6 FROM Questions WHERE question_1 = '{$Utterance_1}' or question_2 = '{$Utterance_1}' or question_3 = '{$Utterance_1}' or question_4 = '{$Utterance_1}' or question_5 = '{$Utterance_1}' or question_6 = '{$Utterance_1}' and KeyUser = '{$key}' UNION SELECT Utterances_1, Utterances_2, Utterances_3, Utterances_4, Utterances_5, Utterances_6 FROM RandomQuotes WHERE Utterances_1 = '{$Utterance_1}' or Utterances_2 = '{$Utterance_1}' or Utterances_3 = '{$Utterance_1}' or Utterances_4 = '{$Utterance_1}' or Utterances_5 = '{$Utterance_1}' or Utterances_6 = '{$Utterance_1}' and KeyUser = '{$key}'" ) or print mysql_error();
if(mysqli_num_rows($sql) > 0)
{
echo json_encode(array('Utterance_1' => 'bg-danger text-white', 'Icon_Utterance_1' => '#Danger_Utterance_1'));
}
else
{
echo json_encode(array('Utterance_1' => 'bg-success', 'Icon_Utterance_1' => '#Success_Utterance_1'));	
}}}

// Utterance 2
if(isset($_POST['Utterance_2'])){
if($_POST['Utterance_2'] <> ""){	
$Utterance_2 	= $_POST['Utterance_2'];
$key			= $_POST['key'];	
$sql = mysqli_query($mysqli, "SELECT question_1, question_2, question_3, question_4, question_5, question_6 FROM Questions WHERE question_1 = '{$Utterance_2}' or question_2 = '{$Utterance_2}' or question_3 = '{$Utterance_2}' or question_4 = '{$Utterance_2}' or question_5 = '{$Utterance_2}' or question_6 = '{$Utterance_2}' and KeyUser = '{$key}' UNION SELECT Utterances_1, Utterances_2, Utterances_3, Utterances_4, Utterances_5, Utterances_6 FROM RandomQuotes WHERE Utterances_1 = '{$Utterance_2}' or Utterances_2 = '{$Utterance_2}' or Utterances_3 = '{$Utterance_2}' or Utterances_4 = '{$Utterance_2}' or Utterances_5 = '{$Utterance_2}' or Utterances_6 = '{$Utterance_2}' and KeyUser = '{$key}'") or print mysql_error();
if(mysqli_num_rows($sql) > 0)
{
echo json_encode(array('Utterance_2' => 'bg-danger text-white', 'Icon_Utterance_2' => '#Danger_Utterance_2'));
}
else
{
echo json_encode(array('Utterance_2' => 'bg-success', 'Icon_Utterance_2' => '#Success_Utterance_2'));	
}}}

// Utterance 3
if(isset($_POST['Utterance_3'])){
if($_POST['Utterance_3'] <> ""){	
$Utterance_3 	= $_POST['Utterance_3'];
$key			= $_POST['key'];	
$sql = mysqli_query($mysqli, "SELECT question_1, question_2, question_3, question_4, question_5, question_6 FROM Questions WHERE question_1 = '{$Utterance_3}' or question_2 = '{$Utterance_3}' or question_3 = '{$Utterance_3}' or question_4 = '{$Utterance_3}' or question_5 = '{$Utterance_3}' or question_6 = '{$Utterance_3}' and KeyUser = '{$key}' UNION SELECT Utterances_1, Utterances_2, Utterances_3, Utterances_4, Utterances_5, Utterances_6 FROM RandomQuotes WHERE Utterances_1 = '{$Utterance_3}' or Utterances_2 = '{$Utterance_3}' or Utterances_3 = '{$Utterance_3}' or Utterances_4 = '{$Utterance_3}' or Utterances_5 = '{$Utterance_3}' or Utterances_6 = '{$Utterance_3}' and KeyUser = '{$key}'") or print mysql_error();
if(mysqli_num_rows($sql) > 0)
{
echo json_encode(array('Utterance_3' => 'bg-danger text-white', 'Icon_Utterance_3' => '#Danger_Utterance_3'));
}
else
{
echo json_encode(array('Utterance_3' => 'bg-success', 'Icon_Utterance_3' => '#Success_Utterance_3'));	
}}}

// Utterance 4
if(isset($_POST['Utterance_4'])){
if($_POST['Utterance_4'] <> ""){	
$Utterance_4 	= $_POST['Utterance_4'];
$key			= $_POST['key'];	
$sql = mysqli_query($mysqli, "SELECT question_1, question_2, question_3, question_4, question_5, question_6 FROM Questions WHERE question_1 = '{$Utterance_4}' or question_2 = '{$Utterance_4}' or question_3 = '{$Utterance_4}' or question_4 = '{$Utterance_4}' or question_5 = '{$Utterance_4}' or question_6 = '{$Utterance_4}' and KeyUser = '{$key}' UNION SELECT Utterances_1, Utterances_2, Utterances_3, Utterances_4, Utterances_5, Utterances_6 FROM RandomQuotes WHERE Utterances_1 = '{$Utterance_4}' or Utterances_2 = '{$Utterance_4}' or Utterances_3 = '{$Utterance_4}' or Utterances_4 = '{$Utterance_4}' or Utterances_5 = '{$Utterance_4}' or Utterances_6 = '{$Utterance_4}' and KeyUser = '{$key}'") or print mysql_error();
if(mysqli_num_rows($sql) > 0)
{
echo json_encode(array('Utterance_4' => 'bg-danger text-white', 'Icon_Utterance_4' => '#Danger_Utterance_4'));
}
else
{
echo json_encode(array('Utterance_4' => 'bg-success', 'Icon_Utterance_4' => '#Success_Utterance_4'));	
}}}

// Utterance 5
if(isset($_POST['Utterance_5'])){
if($_POST['Utterance_5'] <> ""){	
$Utterance_5 	= $_POST['Utterance_5'];
$key			= $_POST['key'];	
$sql = mysqli_query($mysqli, "SELECT question_1, question_2, question_3, question_4, question_5, question_6 FROM Questions WHERE question_1 = '{$Utterance_5}' or question_2 = '{$Utterance_5}' or question_3 = '{$Utterance_5}' or question_4 = '{$Utterance_5}' or question_5 = '{$Utterance_5}' or question_6 = '{$Utterance_5}' and KeyUser = '{$key}' UNION SELECT Utterances_1, Utterances_2, Utterances_3, Utterances_4, Utterances_5, Utterances_6 FROM RandomQuotes WHERE Utterances_1 = '{$Utterance_5}' or Utterances_2 = '{$Utterance_5}' or Utterances_3 = '{$Utterance_5}' or Utterances_4 = '{$Utterance_5}' or Utterances_5 = '{$Utterance_5}' or Utterances_6 = '{$Utterance_5}' and KeyUser = '{$key}'") or print mysql_error();
if(mysqli_num_rows($sql) > 0)
{
echo json_encode(array('Utterance_5' => 'bg-danger text-white', 'Icon_Utterance_5' => '#Danger_Utterance_5'));
}
else
{
echo json_encode(array('Utterance_5' => 'bg-success', 'Icon_Utterance_5' => '#Success_Utterance_5'));	
}}}

// Utterance 6
if(isset($_POST['Utterance_6'])){
if($_POST['Utterance_6'] <> ""){	
$Utterance_6 	= $_POST['Utterance_6'];
$key			= $_POST['key'];	
$sql = mysqli_query($mysqli, "SELECT question_1, question_2, question_3, question_4, question_5, question_6 FROM Questions WHERE question_1 = '{$Utterance_6}' or question_2 = '{$Utterance_6}' or question_3 = '{$Utterance_6}' or question_4 = '{$Utterance_6}' or question_5 = '{$Utterance_6}' or question_6 = '{$Utterance_6}' and KeyUser = '{$key}' UNION SELECT Utterances_1, Utterances_2, Utterances_3, Utterances_4, Utterances_5, Utterances_6 FROM RandomQuotes WHERE Utterances_1 = '{$Utterance_6}' or Utterances_2 = '{$Utterance_6}' or Utterances_3 = '{$Utterance_6}' or Utterances_4 = '{$Utterance_6}' or Utterances_5 = '{$Utterance_6}' or Utterances_6 = '{$Utterance_6}' and KeyUser = '{$key}'") or print mysql_error();
if(mysqli_num_rows($sql) > 0)
{
echo json_encode(array('Utterance_6' => 'bg-danger text-white', 'Icon_Utterance_6' => '#Danger_Utterance_6'));
}
else
{
echo json_encode(array('Utterance_6' => 'bg-success', 'Icon_Utterance_6' => '#Success_Utterance_6'));	
}}}
?>