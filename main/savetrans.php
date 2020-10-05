<?php
session_start();
include('../connect.php');
$id = $_POST['memi'];


$d = $_POST['cash'];



$result = $db->prepare("SELECT * FROM sales_order WHERE transaction_id= :userid");
$result->bindParam(':userid', $id);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$c = $row['balance'];
$cname= $row['number'];

if($c>=$d){
$f = $c - $d;
$y = $f/'100';
$sql = "UPDATE sales_order 
        SET balance=?
		WHERE transaction_id=?";
$q = $db->prepare($sql);
$q->execute(array($f,$id));
}
else if($c<$d)
{
$f = $c - $c;
$y = $c/'100';
$sql = "UPDATE sales_order 
        SET balance=?
		WHERE transaction_id=?";
$q = $db->prepare($sql);
$q->execute(array($f,$id));	
}
}
// query


/*$sql = "UPDATE customer 
        SET points=?
		WHERE contact=?";
$q = $db->prepare($sql);
$q->execute(array($points,$cname));
*/

$result = $db->prepare("SELECT * FROM sales WHERE invoice_number= :userid");
$result->bindParam(':userid', $id);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$me = $row['number'];
//$cname= $row['number'];
}
$sql = "INSERT INTO customer (customer_name, contact, points) VALUES (:h,:g,:i)";
$q = $db->prepare($sql);
$q->execute(array(':h'=>$me,':g'=>$cname,':i'=>$y));





header("location: sales_inventory.php");




?>