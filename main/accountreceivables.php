<?php
include('../connect.php');
$result = $db->prepare("SELECT * FROM sales_order WHERE number='0717407062'");
$result->execute();

 
	for($i=0; $row = $result->fetch(); $i++){

	$cname='0717407062';

$da[]=print_r($row['name']);
$d[]=print_r($row['price']);
$headers = array();
$headers[] = "ApiKey:2f4c5ac298db431e971e5e468fad0fee";
$headers[] = "Content-type:application/json";

$json = '{"message":"'.$da.''.$d.'","recipients":"'.$cname.'"}';



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://api.sematime.com/v1/1463146153915/messages");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
$output = curl_exec($ch);

echo $output;

curl_close($ch);
exit();
}
?>
