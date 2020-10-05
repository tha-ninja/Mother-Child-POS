<?php
//session_start();
include('../dbcon.php');
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = $_POST['date'];
$d = $_POST['ptype'];
$e = $_POST['amount'];
$z = $_POST['profit'];
$y=$_POST['dis'];
$t=$_POST['color'];
$cname = '0717407062';
$pname = $_POST['name'];
$m=$_POST['code'];

if($d=='cash') {
$f = $_POST['cash'];
$sql = "INSERT INTO sales (invoice_number,cashier,date,type,amount,profit,due_date,name,number,ref,discount,ttype) VALUES (:a,:b,:c,:d,:e,:z,:f,:g,:h,:m,:n,:t)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':z'=>$z,':f'=>$f,':g'=>$cname,':h'=>$pname,':m'=>$m, ':n'=>$y,':t'=>$t));


			if ($f<=$e){
$points=$f/'100';
}
else{
$points=$e/'100';

}

	
	$sql_user_check="SELECT * FROM `customer` WHERE contact='$cname'";
	$sql_user_check_exe=mysqli_query($con, $sql_user_check);
	$user_count=mysqli_num_rows($sql_user_check_exe);
	$poi=$row['points'];
	$point=$poi+$points;
	if($user_count>0){
		
		$update_user="UPDATE `customer` SET `points`='$point' WHERE contact='$cname'";
		$update_user_exe=mysqli_query($con, $update_user);
echo $point;
		
   
			
	}
	else{
		$insert_user="INSERT INTO `customer`(`customer_name`, `contact`, `points`) VALUES ('$pname','$cname',`$points`)";
		$insert_user_exe=mysqli_query($con, $insert_user);
		
	}
		
}
	
	

?>