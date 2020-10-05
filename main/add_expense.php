<?php
  require_once('auth.php');
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveexpense.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Expense</h4></center>
<hr>
<div id="ac">
	
	
<span>Cashier : </span>	
<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='admin') {
	?>
<select name="cashier" style="width:265px; "class="chzn-select" required>
			<option value="" disabled="" selected="">Select User</option>
			<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM user WHERE status = ? ORDER BY id DESC");
				$result->execute(array('1'));
				$row = $result->fetchAll();
				foreach($row as $key => $value){
			?>
			<option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
			<?php
		}
		?>
	
</select>
<?php }else{ ?>
	<input type="text" style="width:265px; height:30px;" name="user" value="<?php echo $_SESSION['SESS_FIRST_NAME']; ?>" disabled>
	<input type="hidden" name="cashier" value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>">
<?php } ?>
<br>
<input type="hidden" name="admin" value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>">
<span>Expense : </span><input type="text" style="width:265px; height:130px;" name="expense" placeholder="Expense"/><br>
<span>Cost : </span><input type="number" style="width:265px; height:30px;" name="cost" placeholder="Cost"/><br>
<br><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>