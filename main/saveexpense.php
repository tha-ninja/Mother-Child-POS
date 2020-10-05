<?php
session_start();
include('../connect.php');
$a = $_POST['admin'];
$b = $_POST['cashier'];
$c = $_POST['expense'];
$d = $_POST['cost'];


// query
$sql = "INSERT INTO expense (user_id,cashier_id,expense,cost) VALUES (?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d));
header("location: expense.php");