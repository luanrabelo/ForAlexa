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
<label class="text-white">New Password</label>	
<div class="input-group mb-5">
<div class="input-group-prepend">	
<div class="input-group-text"><i class="fas fa-2x fa-key"></i>
</div>	
</div>
<input name="Password" type="Password" required="required" class="form-control form-control-lg mx-auto" id="Password">	
</div>	
</div>	

	
<button type="submit" class="btn btn-primary btn-lg btn-block">Update Password</button>
<div>
</div>	
</form>
</div>