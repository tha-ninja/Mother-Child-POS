<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['brand'];
$z = $_POST['gen'];
$b = $_POST['name'];
//$c = $_POST['exdate'];
$d = $_POST['price'];
$e = $_POST['supplier'];
$f = $_POST['qty'];
//$g = $_POST['o_price'];
//$h = $_POST['profit'];
// query
$sql = "UPDATE products 
        SET brand=?, gen_name=?, product_name=?, price=?, supplier=?, qty=?
		WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$z,$b,$d,$e,$f,$id));
header("location: stock.php");

?>