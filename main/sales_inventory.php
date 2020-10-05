<?php

//sleep(10);
?><html>
<head>
<title>
POS
</title>

<?php 
require_once('auth.php');
?>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>

 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>	

<body>
<?php include('navfixed.php');


				if(!isset($_GET['d1'])){
				$d1=date('Y-m-d');
				$d2=date('Y-m-d');
				}else{
$d1=$_GET['d1'];
$d2=$_GET['d2'];
					$d1 = date("Y-m-d", strtotime($_GET['d1']) );
					$d2 = date("Y-m-d", strtotime($_GET['d2']) );
				}
?>
<div class="container-fluid">
      <div class="row-fluid">
	<?php include('sidebar.php');?>
	<div class="span10">
	<div class="contentheader">
			<i class="icon-bar-chart"></i> Transactions
			</div>
<br>

<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
	<div style="float:right;">		

</div>
<form action="sales_inventory.php" method="get">
<center><strong>From : <input type="text" style="width: 223px; height:44px;" name="d1" class="tcal" value="" /> To: <input type="text" style="width: 223px; height:44px;" name="d2" class="tcal" value="" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
</strong></center>
</form>
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
Sales Report from&nbsp;<?php echo $d1 ?>&nbsp;to&nbsp;<?php echo $d2 ?>
</div><br><br>


<input type="text" style="height:45px;" name="filter" value="" id="filter" placeholder="Search here..." autocomplete="off" />
<div class="content" id="content">
<br><br><br>
<center><strong>Transactions</strong></center>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th> Customer </th>
			<th width="15%"> Invoice </th>
			<th width="9%"> Date </th>
			<th width="14%"> Product Name </th>
			<th width="15%"> Category / Description </th>
			
			<th > Price </th>
			<th width="4%"> QTY </th>
			<th>Discount</th>
			<th width="8%"> Total Amount </th>
			<th>Due</th>
			<th> Balance </th>
			<th > Action </th>
			<th > Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
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
				include('../connect.php');
				$result = $db->prepare("SELECT *, sales_order.amount as amount, sales_order.discount as discount FROM sales_order
					LEFT JOIN sales ON sales.transaction_id = sales_order.sale_id 
					 WHERE DATE(sales_order.created_at) >= :a AND DATE(sales_order.created_at) <= :b AND sales_order.status = '1' ORDER BY sales.transaction_id DESC");
				$result->bindParam(':a', $d1);
				$result->bindParam(':b', $d2);
				$result->execute();
				$total_due = 0;
				$total_amount = 0;
				for($i=0; $row = $result->fetch(); $i++){
					$total_due += $row['balance'];
					$total_amount += $row['amount']-$row['discount'];
			?>
			<tr class="record">
			<td><?php echo $row['number']; ?></td>
			<td><?php echo $row['invoice']; ?></td>
			<td><?php echo date("d-m-Y h:i A", strtotime($row['created_at']) ); ?></td>
			<td><?php echo $row['gen_name']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php
			$price=$row['price'];
			echo formatMoney($price, true);
			?></td>
						<td><?php echo $row['qty']; ?></td>
						<td><?php
			$oprice=$row['discount'];
			echo formatMoney($oprice, true);
			?></td>
			<td><?php
			$price=$row['amount']-$row['discount'];
			echo formatMoney($price, true);
			?></td>
			<td><?php echo $row['balance']; ?></td>	
			<td><?php
			$paid = $row['amount'];
			if($row['paid'] > 0){
				$paid = $row['paid'];
			}
			$price=$paid - ($row['amount']-$row['discount']);
			echo formatMoney($price, true);
			?></td>
			
			<td>
				<?php
				if($row['balance'] > '0'){
					?>
				<a  title="Click To Edit Update" rel="facebox" href="edit_transaction.php?id=<?php echo $row['transaction_id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i></button></a>
				<?php
				}
				?> 				
			</td><td>
			<a href="deletesalesinventory.php?id=<?php echo $row['invoice']; ?>&trans_id=<?php echo $row['transaction_id']; ?>&qty=<?php echo $row['qty'];?>"><button class="btn btn-mini btn-danger"><i class="icon icon-trash"></i> Return</button></a>
			</td>
			</tr>	 				
			
			
			<?php
				}
			?>
		
				
			
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th>Total Amount</th>
				<th>Total Due</th>
				<th></th>
				<th>Gross Total</th>
				<th></th>
			<tr>
				
			<tr>
				<th colspan="8"><strong style="font-size: 20px; color: #222222;">Total:</strong></th>
				<th colspan="1"><strong style="font-size: 13px; color: #222222;">
				<?php
				
				echo formatMoney($total_amount, true);
				
				?>
				</strong></th>
				
					<th><?php
				
				echo formatMoney($total_due, true);
				
				?></th>
				<th></th>

					<th><?php
				
				$fgfg=$total_amount - $total_due;
				echo formatMoney($fgfg, true);
				
				?></th>
				<th></th>
			</tr>
		
		
		
		
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>

<script src="js/jquery.js"></script>
  <script type="text/javascript">






</script>
</body>
<?php include('footer.php');?>

</html>