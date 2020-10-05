<?php
	include('../connect.php');

	$result = $db->prepare("SELECT * FROM sales WHERE invoice_number='RS-223922'");
		$result->bindParam(':userid', $cas);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	echo $row['name'];

	
	
	
	//edit qty
	

	
	}
?>