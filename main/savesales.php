<?php
include('../connect.php');
include('auth.php');
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = $_POST['date'];
$d = $_POST['ptype'];
$e = $_POST['amount'];
$z = $_POST['profit'];
$y=$_POST['dis'];
$t=$_POST['color'];
$cname = $_POST['cname'];
$pname = $_POST['name'];
$m=$_POST['code'];



if($d=='credit') {
$f = $_POST['due'];
$sql = "INSERT INTO sales (invoice_number,cashier,date,type,amount,profit,due_date,name,number) VALUES (:a,:b,:c,:d,:e,:z,:f,:g,:h)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':z'=>$z,':f'=>$f,':g'=>$cname,':h'=>$pname));
header("location: preview.php?invoice=$a");



exit();
}
if($d=='cash') {
$f = $_POST['cash'];
$sql = "INSERT INTO sales (invoice_number,cashier,date,type,amount,profit,due_date,name,number,ref,discount,ttype) VALUES (:a,:b,:c,:d,:e,:z,:f,:g,:h,:m,:n,:t)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':z'=>$z,':f'=>$f,':g'=>$cname,':h'=>$pname,':m'=>$m, ':n'=>$y,':t'=>$t));
$last_id = $db->lastInsertId();



			if ($f<=$e){
$points=(round($f/'100'));
}
else{
$points=(round($e/'100'));

}
if($f<=$e) {
$pay=$f;
$balance = ($e - $y)-$f;
$sql = "UPDATE sales_order 
        SET balance=?, discount=?, number=?,paid=?,status=?,sale_id=?
		WHERE invoice=?";
$q = $db->prepare($sql);
$q->execute(array($balance,$y,$cname,$_POST['cash'],'1',$last_id,$a));
}else{
$pay=$e;
	$balance = '0';
	$sql = "UPDATE sales_order 
        SET balance=?, discount=?, number=?,paid=?,status=?,sale_id=?
		WHERE invoice=?";
$q = $db->prepare($sql);
$q->execute(array($balance,$y,$cname,$_POST['cash'],'1',$last_id,$a));
}



$sql = "INSERT INTO ledger (user_id,invoice_no,amount,paid,balance,arrear,trans_id,customer_name,customer_phone) VALUES (?,?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($_SESSION['SESS_MEMBER_ID'],$a,$e,$_POST['cash'],($_POST['cash'] - $e),$balance,$m,$pname,$cname));


$sql = "INSERT INTO customer (customer_name, contact, points) VALUES (:h,:g,:i)";
$q = $db->prepare($sql);
$q->execute(array(':h'=>$pname,':g'=>$cname,':i'=>$points));



function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}

				$results = $db->prepare("SELECT sum(points) FROM customer WHERE contact = :a");
				$results->bindParam(':a', $cname);
				
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$gg=(round($rows['sum(points)']));
				echo formatMoney($gg, true);

			





$cha= $f - ($e - $y);
$tt=$e - $y;

//$shop ='Virtual Studios Photography: 0721 879663';

$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
$result->bindParam(':userid', $a);
$result->execute();

 
	for($i=0; $row = $result->fetch(); $i++){

	

$pc=$row['product_code'];
$pame=$row['name'];
$p=$row['price'];


//include('../connect.php');



}
// query
}
}
header("location: preview.php?invoice=$a");
exit();

?>