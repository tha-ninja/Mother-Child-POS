<?php
session_start();
include('../connect.php');
$b = $_POST['name'];
$d = $_POST['contact'];
$c = $_POST['location'];
//$a = $_POST['logo'];


// query
$sql = "UPDATE settings 
		SET name=?,location=?,contacts=?";
$q = $db->prepare($sql);
$q->execute(array($b,$c,$d));
header("location: settings.php");


?>