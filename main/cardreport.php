<html>
<?php
  require_once('auth.php');
?>
<head>
<title>
POS
</title>
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
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script language="javascript">
$(document).on('click',"#print",function(){
        var originalContents = $("body").html();
        var printContents = $("#printThisTable").html();
        $("body").html(printContents);
      window.print();
      $("body").html(originalContents);
        return false;
});
</script>


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
</head>

<body>
<?php include('navfixed.php');
$d1=$_GET['d1'];
$d2=$_GET['d2'];

        if($d1 == '0'){
        $d1=date('Y-m-d');
        $d2=date('Y-m-d');
        }else{
          $d1 = date("Y-m-d", strtotime($_GET['d1']) );
          $d2 = date("Y-m-d", strtotime($_GET['d2']) );
          $d3 = $_GET['d3'];
        }
?>
<div class="container-fluid">
      <div class="row-fluid">
  <?php include('sidebar.php');?>
  <div class="span10">
  <div class="contentheader">
      <i class="icon-bar-chart"></i> Sales Report
      </div>
      <ul class="breadcrumb">
      <li><a href="index.php">Dashboard</a></li> /
      <li class="active">Payment Report</li>
      </ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<button  style="float:right;" class="btn btn-success btn-mini"><a href="javascript:print()"> Print</button></a>

</div>
<form action="cardreport.php" method="get">
<center><strong>Payment Method:  <select name="d3" style="width: 223px; height:44px;"> 
<option> <---Select---> </option> 
    <option value="cash">Cash</option> 
    <option value="mpesa">M-pesa</option>
    <option value="visa">Visa</option>
    
  </select>From : <input type="text" style="width: 223px; height:44px;" name="d1" class="tcal" value="" /> To: <input type="text" style="width: 223px; height:44px;" name="d2" class="tcal" value="" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
</strong></center>
</form>
<div id="printThisTable">
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
Payment Report from&nbsp;<?php echo $d1 ?>&nbsp;to&nbsp;<?php echo $d2 ?>
<br><br>
<input type="text" style="height:45px;" name="filter" value="" id="filter" placeholder="Type here to filter..." autocomplete="off" />
</div><br><br>
<div id="printThisTable">
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
  <thead>
    <tr>
      
      <th width="13%"> Transaction Date </th>
      <th width="20%"> Customer Number </th>
      <th width="20%"> Customer Name </th>
      <th width="16%"> Invoice Number </th>
      <th width="16%"> Cashier </th>
      <th width="16%"> Payment Method </th>
      <th width="18%"> Amount </th>
      
    </tr>
  </thead>
  <tbody>
    
      <?php
        include('../connect.php');
       
        $result = $db->prepare("SELECT * FROM sales WHERE DATE(sales.created_at) >= :a AND DATE(sales.created_at) <= :b and ttype=:c ORDER by transaction_id DESC ");
        $result->bindParam(':a', $d1);
        $result->bindParam(':b', $d2);
        $result->bindparam(':c', $d3);
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){
      ?>
      <tr class="record">
      
      <td><?php echo $row['date']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['number']; ?></td>
      <td><?php echo $row['invoice_number']; ?></td>
      <td><?php echo $row['cashier']; ?></td>
      <td><?php echo $row['ttype']; ?></td>
      <td><?php
      $dsdsd=$row['amount'];
      echo formatMoney($dsdsd, true);
      ?></td>
      
      </tr>
      <?php
        }
      ?>
    
  </tbody>
  <thead>
    <tr>
      <th colspan="3" style="border-top:1px solid #999999"> Total: </th>
      <th> </th>
      <th> </th>
      <th> </th>
      <th colspan="1" style="border-top:1px solid #999999"> 
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
        
        $results = $db->prepare("SELECT sum(amount) FROM sales WHERE DATE(sales.created_at) >= :a AND DATE(sales.created_at) <= :b and ttype=:c");
        $results->bindParam(':a', $d1);
        $results->bindParam(':b', $d2);
        $results->bindparam(':c', $d3);
        $results->execute();
        for($i=0; $rows = $results->fetch(); $i++){
        $dsdsd=$rows['sum(amount)'];
        echo formatMoney($dsdsd, true);
        }
        ?>
      </th>
        
    </tr>
  </thead>
</table>
</div>
</div>
<div class="clearfix"></div>
</div>

</div>
</div>

</body>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
      {

 $.ajax({
   type: "GET",
   url: "deletesales.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
    .animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
<?php include('footer.php');?>

</html>