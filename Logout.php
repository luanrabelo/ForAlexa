<?php
session_start();
$Token 	= md5(session_id());

if(isset($_GET['Token']) && $_GET['Token'] === $Token) {
	
unset($_SESSION['id']);
unset($_SESSION['FirstName']);
unset($_SESSION['LastName']);
unset($_SESSION['Email']);
unset($_SESSION['Birthday']);
unset($_SESSION['KeyUser']);
session_destroy();
print("<META HTTP-EQUIV=REFRESH CONTENT= '0;URL=index.php'>");	
}else{	
echo '<a href="index.php?p=Logout&Token='.md5(session_id()).'">Logout</a>';
}
?>