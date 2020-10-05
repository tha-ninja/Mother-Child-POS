<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveuser.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add User</h4></center>
<hr>
<div id="ac">
<span>Full Name : </span><input type="text" style="width:265px; height:30px;" name="name" placeholder="Full Name" Required/><br>

<span>Contact : </span><input type="text" style="width:265px; height:30px;" name="contact" placeholder="Contact"/><br>
<span>Username : </span><input type="text" style="width:265px; height:30px;" name="uname" placeholder="Username"/><br>
<span>Password : </span><input type="text" style="width:265px; height:30px;" name="pword" placeholder="Password"/><br>
<span>Position : </span><select name="position" style="width:265px; "class="chzn-select" required>
<option></option>
			<option value="admin">Admin</option>
			<option Value="manager">Manager</option>
			<option value="cashier">Cashier</option>
			<option value="finance">Accounts/audit</option>
	
</select>
<br><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>