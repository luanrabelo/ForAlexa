	
<div id="ErrorLogin" class="alert alert-danger alert-dismissible w-75 mx-auto" role="alert">
<div class="h5"><?php echo($RecoverPass);?></div>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>


<div class="modal fade" tabindex="-1" id="FormPassword">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header bg-light text-dark">
<h5 class="modal-title mx-auto">Querying Database</h5>
</div>
<div class="modal-body text-center">			
<p>Please wait....</p>			
</div>
</div>
</div>
</div>



<div class="modal fade" tabindex="-1" id="ResetPassModal">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white h4"><div class="modal-title mx-auto">Resetting Password</div></div>
<div style="  line-height: 3.5;" class="modal-body text-center mt-2 h5"><?php echo($ResetPass);?></div>
<div class="modal-footer bg-dark"><button type="button" class="btn btn-success btn-lg" data-dismiss="modal"><i class="fas fa-thumbs-up mr-2"></i>I understood</button></div>
</div>
</div>
</div>

<div class="text-left mx-auto mb-5 container">	
<form method="POST" id="Recover">
<div class="text-center text-white mb-3 mt-3"><h2>Reset Password</h2></div>
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

	
<button type="submit" class="btn btn-primary btn-lg btn-block">Reset Password!</button>
<div>
</div>	
</form>
</div>
<script>

</script>
<script>
$(document).ready(function(){
	
setTimeout(function(){
$('#ResetPassModal').modal('show');
}, 2000);	
	
$('#ErrorLogin').hide();
$('#Recover').submit(function(){
$('#FormPassword').modal('show'); 
	
// Variáveis Login
var FirstName 	=$('#FirstName').val();
var LastName 	=$('#LastName').val();	
var Birthday	=$('#Birthday').val();	
var Email 		=$('#Email').val();		


$.ajax({
url:  "Recover.php",
type: "POST",
data: {"FirstName" : FirstName, "LastName" : LastName, "Birthday" : Birthday, "Email" : Email},
success: function (result) {
console.log(result);

if(result == 0){
$('#FormPassword').modal('hide'); 	
$('#ErrorLogin').show();
} else {
data = $.parseJSON(result);	
location.href = 'Login.php?p=NewPassword&KeyUser='+data.KeyUser;
}}});
return false;
})})
</script>