<div class="text-left mx-auto mb-5 container">	
<form action="Login.php?p=CdsUser" method="POST" id="CdsUser">
<div class="text-center text-white mb-3 mt-3"><h2>New User</h2></div>
<div class="form-group">	
<label class="text-white">First Name</label>	
<div class="input-group mb-5">
<div class="input-group-prepend">	
<div class="input-group-text"><i class="fas fa-2x fa-user-circle"></i>
</div>	
</div>
<input name="FirstName" type="text" required="required" class="form-control form-control-lg mx-auto" id="FirstName" maxlength="50">	
</div>	
</div>	
	
<div class="form-group">	
<label class="text-white">Last Name</label>	
<div class="input-group mb-5">
<div class="input-group-prepend">	
<div class="input-group-text"><i class="fas fa-2x fa-user-circle"></i>
</div>	
</div>
<input name="LastName" type="text" required="required" class="form-control form-control-lg mx-auto" id="LastName" maxlength="50">	
</div>	
</div>	
	
<div class="form-group">	
<label class="text-white">Institution</label>	
<div class="input-group mb-5">
<div class="input-group-prepend">	
<div class="input-group-text"><i class="fas fa-2x fa-university"></i>
</div>	
</div>
<input name="Institution" type="text" required="required" class="form-control form-control-lg mx-auto" id="Institution" maxlength="50">	
</div>	
</div>	
	
<div class="form-group">	
<label class="text-white">Birthday</label>	
<div class="input-group mb-5">
<div class="input-group-prepend">	
<div class="input-group-text"><i class="fas fa-2x fa-birthday-cake"></i>
</div>	
</div>
<input name="Birthday" type="date" required="required" class="form-control form-control-lg mx-auto" id="Birthday">
</div>	
</div>
	
<div class="form-group">	
<label class="text-white">Email address</label>	
<div class="input-group mb-5">
<div class="input-group-prepend">	
<div class="input-group-text"><i class="fas fa-2x fa-at"></i>
</div>	
</div>
<input name="Email" type="Email" required="required" class="form-control form-control-lg mx-auto" id="Email">	
</div>	
</div>

<div class="form-group">	
<label class="text-white">Password</label>	
<div class="input-group mb-5">
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

<button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up ForAlexa</button>
<div>
</div>	
</form>
</div>
<script>
$(document).ready(function(){	
$('html, body').animate({ scrollTop: 150  }, 3);
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
