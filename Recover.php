<?php
include("Connection.php");
$FirstName 		= $_POST['FirstName'];
$LastName 		= $_POST['LastName'];
$Birthday 		= $_POST['Birthday'];
$Email	 		= $_POST['Email'];

$search 	= mysqli_query($mysqli, "SELECT * FROM User WHERE FirstName = '$FirstName' and LastName = '$LastName' and Birthday = '$Birthday' and Email = '$Email'") or die (mysql_error());	
sleep(3);
if (mysqli_num_rows($search) == 0) {
echo 0;
}else{
while ($row = $search->fetch_assoc()){	
$KeyUser = $row["KeyUser"];
}
echo json_encode(array('KeyUser' => "$KeyUser"));	
}
?>	