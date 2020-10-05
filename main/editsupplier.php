<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditsupplier.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Supplier</h4></center>
<hr>
<div id="ac">
	<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM supliers WHERE suplier_id = ? ORDER BY suplier_id DESC");
				$result->execute(array($_GET['id']));
				$row = $result->fetch();
			?>
			<input type="hidden" name="memi" value="<?= $row['suplier_id'] ?>">
<span>Supplier Name : </span><input type="text" value="<?= $row['suplier_name'] ?>" style="width:265px; height:30px;" name="name" required/><br>
<span>Address : </span><input type="text" value="<?= $row['suplier_address'] ?>" style="width:265px; height:30px;" name="address" /><br>
<span>Contact Person : </span><input type="text" value="<?= $row['contact_person'] ?>" style="width:265px; height:30px;" name="cperson" /><br>
<span>Contact No. : </span><input type="text" value="<?= $row['suplier_contact'] ?>" style="width:265px; height:30px;" name="contact" /><br>
<span>Note : </span><textarea style="width:265px; height:80px;" value="<?= $row['note'] ?>" name="note" /></textarea><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>