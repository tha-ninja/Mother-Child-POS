<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['id'];

// query
$sql = "UPDATE user 
        SET status=?, password=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array('0',md5(rand(10,99)),$id));


?>