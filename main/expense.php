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
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
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


        if(!isset($d1)){
        $d1=date('Y-m-d');
        $d2=date('Y-m-d');
        }else{
          $d1 = date("Y-m-d", strtotime($_GET['d1']) );
          $d2 = date("Y-m-d", strtotime($_GET['d2']) );
         
        }
?>
<div class="container-fluid">
      <div class="row-fluid">
  <?php include('sidebar.php'); ?>
  <div class="span10">
  <div class="contentheader">
      <i class="icon-bar-chart"></i> Expense Report
      </div>
      <ul class="breadcrumb">
      <li><a href="index.php">Dashboard</a></li> /
      <li class="active">Expense Report</li>
      </ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>


</div>
<form action="expense.php" method="get">
From : <input type="text" style="width: 223px; height:44px;" name="d1" class="tcal" value="" /> To: <input type="text" style="width: 223px; height:44px;" name="d2" class="tcal" value="" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
</form>

<div id="printThisTable">
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
Expense Report from&nbsp;<?php echo $d1 ?>&nbsp;to&nbsp;<?php echo $d2 ?>
<br><br>
<input type="text" style="height:45px;" name="filter" value="" id="filter" placeholder="Type here to filter..." autocomplete="off" />
<a rel="facebox" href="add_expense.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Expense</button></a>
</div><br><br>
<div id="printThisTable">
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
  <thead>
    <tr>
      
      <th width="13%"> Admin </th>
      <th width="20%"> Cashier </th>
      <th width="20%"> Expense </th>
      <th width="16%"> Cost </th>
      <th width="16%"> Date </th>
    
      
    </tr>
  </thead>
  <tbody>
    
      <?php
        include('../connect.php');
       
        $result = $db->prepare("SELECT * FROM expense
        LEFT JOIN user ON expense.user_id = user.id
       
          WHERE DATE(expense.created_at) >= :a AND DATE(expense.created_at) <= :b ORDER by expense.id DESC ");
        $result->bindParam(':a', $d1);
        $result->bindParam(':b', $d2);
        
        $result->execute();
        $cost = 0;
        for($i=0; $row = $result->fetch(); $i++){
          $cost += $row['cost'];
  $query = $db->prepare("SELECT * FROM user WHERE id =  ?");
  $query->execute(array($row['cashier_id']));
  $value = $query->fetch();
      ?>
      <tr class="record">
      
    
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $value['name']; ?></td>
      <td><?php echo $row['expense']; ?></td>
     
      <td><?php
      $dsdsd=$row['cost'];
      echo formatMoney($dsdsd, true);
      ?></td>
      <td><?= date("d-M-Y h:i A", strtotime($row['created_at'])) ?></td>
      
      </tr>
      <?php
        }
      ?>
    
  </tbody>
  <thead>
    <tr>
      <th colspan="4" style="border-top:1px solid #999999"> Total: </th>
     
      
      <th colspan="2" style="border-top:1px solid #999999"> 
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
        
        
        echo formatMoney($cost, true);
       
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
  
<?php include('footer.php');?>

</html>