<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveproduct.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Service</h4></center>
<hr>
<div id="ac">
<span>Service Name : </span><input type="text" style="width:265px; height:30px;" name="code" ><br>

<span>Category : </span>
<select name="name" style="width:265px; height:30px;" required>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM cat");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	<option> </option>
		<option><?php echo $row['cat']; ?></option>
	<?php
	}
	?>
</select><br>

<span>Selling Price : </span><input type="text" id="txt1" style="width:265px; height:30px;" name="price" onkeyup="sum();" Required><br>


<span></span><input type="hidden" style="width:265px; height:30px;" id="txt22" name="qty_sold" Required ><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>
