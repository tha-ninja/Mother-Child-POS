<?php
session_start();
include('../connect.php');
$id = '0716221490';

$y='njeri';
$sql = "UPDATE customer 
        SET customer_name=?
    WHERE contact=?";
    $q = $db->prepare($sql);
$q->execute(array($y,$id));
?>