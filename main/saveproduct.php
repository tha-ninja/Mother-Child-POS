<?php
session_start();
include('../connect.php');
$a = $_POST['code'];
$b = $_POST['name'];
//$c = $_POST['exdate'];
$d = $_POST['price'];
//$e = $_POST['supplier'];
//$f = $_POST['qty'];
//$g = $_POST['o_price'];
//$i = $_POST['gen'];
//$j = $_POST['date_arrival'];
$k = 'service';
// query
$sql = "INSERT INTO products (product_code,product_name,price,type) VALUES (:a,:b,:d,:k)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':d'=>$d,':k'=>$k));
header("location: products.php");


?>