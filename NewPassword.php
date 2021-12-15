<?php
include("Connection.php");
$KeyUser 	= $_GET["KeyUser"];
$query 		= "SELECT * FROM User WHERE KeyUser = '$KeyUser'";
$result 	= $mysqli->query($query);
while ($row = $result->fetch_assoc()){	
$FirstName 		= $row["FirstName"];
$LastName 		= $row["LastName"];
$Institution	= $row["Institution"];
$Birthday		= $row["Birthday"];
$Email			= $row["Email"];	
}
?>

<style>
.Recover{
animation: pulseCat 0.7s infinite;	
}
@keyframes pulseCat {
10% {
box-shadow: 0 0 0 0 white;
}
80% {
box-shadow: 0 0 0 25px rgba(204, 169, 44, 0);
}	
100% {
box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
}
}	
</style>

<div class="modal fade" tabindex="-1" id="ResetPassModal">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white h4"><div class="modal-title mx-auto">Resetting Password</div></div>
<div style="  line-height: 3.5;" class="modal-body text-center mt-2 h5">Insert a new password in the “New Password” field.</div>
<div class="modal-footer bg-dark"><button id="OK" type="button" class="btn btn-success btn-lg" data-dismiss="modal"><i class="fas fa-thumbs-up mr-2"></i>Entendi</button></div>
</div>
</div>
</div>


<div class="text-left mx-auto mb-5 container">	
<form action="Login.php?p=UpdatePass&KeyUser=<?php echo($KeyUser);?>" method="POST">
<div class="text-center text-white mb-3 mt-3"><h2>Update Password</h2></div>
<div class="form-group">	
<label class="text-white">First Name</label>	
<div class="input-group mb-5">
<div class="input-group-prepend">	
<div class="input-group-text"><i class="fas fa-2x fa-user-circle"></i>
</div>	
</div>
<input name="FirstName" type="text" disabled="disabled" required="required" class="form-control form-control-lg mx-auto" id="FirstName" value="<?php echo($FirstName);?>" maxlength="50">	
</div>	
</div>	
	
<div class="form-group">	
<label class="text-white">Last Name</label>	
<div class="input-group mb-5">
<div class="input-group-prepend">	
<div class="input-group-text"><i class="fas fa-2x fa-user-circle"></i>
</div>	
</div>
<input name="LastName" type="text" disabled="disabled" required="required" class="form-control form-control-lg mx-auto" id="LastName" value="<?php echo($LastName);?>" maxlength="50">	
</div>	
</div>	
	
<div class="form-group">	
<label class="text-white">Institution</label>	
<div class="input-group mb-5">
<div class="input-group-prepend">	
<div class="input-group-text"><i class="fas fa-2x fa-university"></i>
</div>	
</div>
<input name="Institution" type="text" disabled="disabled" required="required" class="form-control form-control-lg mx-auto" id="Institution" value="<?php echo($Institution);?>" maxlength="50">	
</div>	
</div>	
	
<div class="form-group">	
<label class="text-white">Birthday</label>	
<div class="input-group mb-5">
<div class="input-group-prepend">	
<div class="input-group-text"><i class="fas fa-2x fa-birthday-cake"></i>
</div>	
</div>
<input name="Birthday" type="date" disabled="disabled" required="required" class="form-control form-control-lg mx-auto" id="Birthday" value="<?php echo($Birthday);?>">
</div>	
</div>
	
<div class="form-group">	
<label class="text-white">Email address</label>	
<div class="input-group mb-5">
<div class="input-group-prepend">	
<div class="input-group-text"><i class="fas fa-2x fa-at"></i>
</div>	
</div>
<input name="Email" type="Email" disabled="disabled" required="required" class="form-control form-control-lg mx-auto" id="Email" value="<?php echo($Email);?>">	
</div>	
</div>

<div class="form-group">	
<label class="text-white h2">New Password</label>	
<div class="input-group mb-5 Recover">
<div class="input-group-prepend">	
<div class="input-group-text"><i class="fas fa-2x fa-key"></i>
</div>	
</div>
<input name="Password" type="Password" required="required" class="form-control form-control-lg mx-auto" id="Password">	
<div class="input-group-append">
<div class="input-group-text">	
<i id="Eye" class="fas fa-2x fa-eye" onClick="PassShow()"></i>
</div>	
</div>
</div>	
</div>	

	
<button type="submit" class="btn btn-primary btn-lg btn-block">Update Password</button>
<div>
</div>	
</form>
</div>
<script>
$(document).ready(function(){
	
setTimeout(function(){
$('#ResetPassModal').modal('show');
}, 2000);
$("#OK").click(function(){
$('html, body').animate({ scrollTop: 500  }, 1);
});	
});
</script>
<script>
function PassShow() {
var x = document.getElementById("Password");
if (x.type === "password") {
x.type = "text";
$("#Eye").removeClass("fa-eye");
$("#Eye").addClass("fa-eye-slash");
} else {
x.type = "password";
$("#Eye").removeClass("fa-eye-slash");
$("#Eye").addClass("fa-eye");
}
} 
</script>