<?php
session_start();
include('../connect.php');
$code = substr(time(), 3);
$product_name = $_POST['gen'];
$level = $_POST['level'];
$price = $_POST['price'];
$supplier = $_POST['supplier'];
$qty = $_POST['qty'];
$cost = $_POST['cost'];
$type = 'product';
$gen = $_POST['gen'];
$time = time();
$brand = $_POST['brand'];
// query
$sql = "INSERT INTO products (product_code,brand,product_name,price,supplier,qty,stock_level,gen_name,type,cost) VALUES (?,?,?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($code,$brand,$product_name,$price,$supplier,$qty,$level,$gen,$type,$cost));
header("location: stock.php");


?>