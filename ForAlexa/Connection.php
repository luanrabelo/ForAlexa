<?php
$bd			= ""; 	// BD Name
$user 		= ""; 	// User
$pass	 	= ""; 	// Pass
$host 		= "";	// Host

$mysqli = @mysqli_connect($host, $user, $pass, $bd);
if (mysqli_connect_error()) {
    printf('Erro de conexão: %s', mysqli_connect_error());
    exit;
}

if (!mysqli_set_charset($mysqli, 'utf8')) {
    printf('Error ao usar utf8: %s', mysqli_error($mysqli));
    exit;
}
?>