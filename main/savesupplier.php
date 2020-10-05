<?php
session_start();
include('../connect.php');

$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];
$e = $_POST['note'];

// query
$sql = "INSERT INTO supliers (suplier_name,suplier_address,suplier_contact,contact_person,note) VALUES (?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e));
header("location: supplier.php");


?>