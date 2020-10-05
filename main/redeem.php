<?php
session_start();
include('../connect.php');
$a = $_GET['id'];
$b = $_GET['total'];
$qq='0';


$result = $db->prepare("SELECT * FROM redeem");
		
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			$number=$row['number'];
			$tot=$row['cash'];
			}
if($number != $a)
{
$sql = "INSERT INTO redeem (number,cash) VALUES (:a,:b)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b));
$sql = "UPDATE customer 
        SET points=?
		WHERE contact=?";
$q = $db->prepare($sql);
$q->execute(array($qq,$a));

echo 'shit';

}
else if($number == $a){
			
$pp=$b + $tot;
$sql = "UPDATE redeem 
        SET cash=?
		WHERE number=?";
$q = $db->prepare($sql);
$q->execute(array($pp,$a));
$sql = "UPDATE customer 
        SET points=?
		WHERE contact=?";
$q = $db->prepare($sql);
$q->execute(array($qq,$a));
echo 'shit';
}


?>