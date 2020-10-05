<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savestock.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Product</h4></center>
<hr>
<div id="ac">
<span>Brand Name : </span><input type="text" style="width:265px; height:30px;" name="brand" required /><br>
<span>Product Name : </span><input type="text" style="width:265px; height:30px;" name="gen" required /><br>
<span>Buying Price : </span><input type="number" id="txt2" style="width:265px; height:30px;" required name="cost" onkeyup="sum();" /><br>
<span>Selling Price : </span><input type="number" id="txt1" style="width:265px; height:30px;" required name="price" onkeyup="sum();" /><br>
<span>Category : </span>
<select name="name" style="width:265px; height:30px;" required>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM cat");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	<option value="" selected disabled>Select Category </option>
		<option><?php echo $row['cat']; ?></option>
	<?php
	}
	?>
</select><br>

<span>Supplier : </span>
<select name="supplier" style="width:265px; height:30px;" >
<option value="none">Select</option>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM supliers");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['suplier_name']; ?></option>
	<?php
	}
	?>
</select><br>
<span>Quantity : </span><input type="number" style="width:265px; height:30px;"  id="txt4" name=" qty" onkeyup="sum();" /><br>
<span>Low Stock : </span><input type="number" style="width:265px; height:30px;"  id="txt5" name=" level" onkeyup="sum();" /><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>
