<?php
include("Connection.php");
if(isset($_POST['IntentName'])){
if($_POST['IntentName'] <> "" and strlen($_POST['IntentName']) >= 5){	
$IntentName = $_POST['IntentName'];
$key		= $_POST['key'];
$idRepository = $_POST['idRepository'];	
$sql = mysqli_query($mysqli, "SELECT * FROM Questions WHERE IntentName = '{$IntentName}' and KeyUser = '{$key}' and idRepository = '{$idRepository}'") or print mysql_error();
if(mysqli_num_rows($sql) > 0)
{
echo json_encode(array('IntentName' => 'bg-danger text-white',  'Icon' => '#Danger', 'Toast' => 'show'));
}
else
{
echo json_encode(array('IntentName' => 'bg-success', 'Icon' => '#Success'));	
}}
else
{ 
echo json_encode(array('IntentName' => '', 'Icon' => '#Scroll')); 
}}
?>