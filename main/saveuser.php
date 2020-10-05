<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['contact'];
$c = $_POST['uname'];
$d = $_POST['pword'];
$e = $_POST['position'];

// query
$sql = "INSERT INTO user (username,password,name,position,contact) VALUES (:c,:d,:a,:e,:b)";
$q = $db->prepare($sql);
$q->execute(array(':c'=>$c,':d'=>$d,':a'=>$a,':e'=>$e,':b'=>$b));
header("location: users.php");


?>