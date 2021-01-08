<?php
$bd			= "alexaform";
$user 		= "alexaform";
$pass	 	= "luan481516";
$host 		= "alexaform.mysql.dbaas.com.br";

$mysqli = @mysqli_connect($host, $user, $pass, $bd);
if (mysqli_connect_error()) {
    printf('Erro de conexão: %s', mysqli_connect_error());
    exit;
}

if (!mysqli_set_charset($mysqli, 'utf8')) {
    printf('Error ao usar utf8: %s', mysqli_error($mysqli));
    exit;
}


if(isset($_POST['IntentName'])){
	
if($_POST['IntentName'] <> "" and strlen($_POST['IntentName']) >= 5){	
	
$IntentName = $_POST['IntentName'];
$key		= $_POST['key'];	
	
$sql = mysqli_query($mysqli, "SELECT * FROM Questions WHERE IntentName = '{$IntentName}' and key_user = '{$key}'") or print mysql_error();
	
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