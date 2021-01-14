<?php
$bd			= ""; // BD Name
$user 		= ""; // Username
$pass	 	= ""; // Password
$host 		= ""; // Host BD

$mysqli = @mysqli_connect($host, $user, $pass, $bd);
if (mysqli_connect_error()) {
    printf('Error Connection: %s', mysqli_connect_error());
    exit;
}

if (!mysqli_set_charset($mysqli, 'utf8')) {
    printf('Error set utf8: %s', mysqli_error($mysqli));
    exit;
}
?>