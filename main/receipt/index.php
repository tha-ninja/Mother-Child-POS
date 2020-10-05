<?php


  $invoice = $_GET['invoice'];
  
   include'../connect.php';
                                      
?>

 <div class=""  id="invoice-POS">
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sales Receipt</title>
  
  
  
      <link rel="stylesheet" href="receipt/css/style.css">

  
</head>
<?php
$invoice=$_GET['invoice'];
include('../connect.php');
$result = $db->prepare("SELECT * FROM sales WHERE invoice_number= :userid");
$result->bindParam(':userid', $invoice);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$cname=$row['name'];
$invoice=$row['invoice_number'];
$date=$row['date'];
$cash=$row['due_date'];
$cashier=$row['cashier'];

$pt=$row['type'];
$am=$row['amount'];
$dis=$row['discount'];
if($pt=='cash'){
$cash=$row['due_date'];
$amount=$cash-($am-$dis);
}
}
?>
<body>
  
 
    
    <center id="top">

      <div class="info"> 
        <h5>Print Pro<br>
       0726-636-285<br>
       P.O Box 13986-00400<br>
       http://print-prosystems.co.ke<br>
         info@print-prosystems.co.ke<br>
      <!--End Info-->
      <?php if(isset($_GET['cid'])){
        $fname= $_GET['fname'];
        echo "Invoice No:$invoice<br>";
        echo "Name:$fname<br>";
      }
      ?></h5>
      </div>
    </center><!--End InvoiceTop-->
    
    
    
    <div id="bot">

          <div id="table">
            <table id="table2" class="">
              <tr class="tabletitle">
                <td class="item"><p>Item</p></td>
                <td class="Hours"><p>Qty</p></td>
                <td class="Rate"><p>Sub Total</p></td>
              </tr>
            <?php
          $id=$_GET['invoice'];
          $result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
          $result->bindParam(':userid', $id);
          $result->execute();
          for($i=0; $row = $result->fetch(); $i++){
        ?>
              <tr class="service">
                <td class="tableitem"><p class="itemtext"><?php echo $row['gen_name']; ?></p></td>
                <td class="tableitem"><p class="itemtext"><?php echo $row['qty']; ?></p></td>
                <td class="tableitem"><p class="itemtext"><?php echo number_format($row['amount'],2); ?></p></td>
              </tr>

              <?php } ?>


              <?php
          $sdsd=$_GET['invoice'];
          $resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
          $resultas->bindParam(':a', $sdsd);
          $resultas->execute();
          for($i=0; $rowas = $resultas->fetch(); $i++){
          $fgfg=$rowas['sum(amount)']-$dis;
          $ttotal = $fgfg;
          }
          ?>

              <tr class="tabletitle">
                <td></td>
                <td class="Rate"><h2>Total</h2></td>
                <td class="payment"><h2><?php echo $ttotal; ?></h2></td>
              </tr>

            </table>
          </div><!--End Table-->

          <div align="center" id="legalcopy">
            <p ><strong>Thank you for shopping with us!<br>Powered by Alltime Technologies 0707-739-013</strong>  
            </p>
          </div>

        </div><!--End InvoiceBot-->
  </div><!--End Invoice-->
  
  <script type="text/javascript">
 function printData()
{
   var divToPrint=document.getElementById("invoice-POS");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
}) 

      </script>
        <script>
        function myFunction() {
          window.print();
        }
      </script>
      <script type="text/javascript" src="../js/jquery-1.7.1.min.js" ></script>
</body>

</html>
