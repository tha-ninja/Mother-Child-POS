<?php
session_start();
include('../connect.php');
$a = $_POST['cat'];

// query
$sql = "INSERT INTO cat (cat) VALUES (:a)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a));
header("location: stock.php");


?>