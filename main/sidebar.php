<?php
function createRandomPassword() {
	$pass = rand(0,99).substr(time(),4).rand(10,99);
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>
<div class="span2">
          <div class="well sidebar-nav">
              <ul class="nav nav-list">
              	<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='cashier') {
?>
<li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-dashboard icon-2x"></i> POS</a></li>

<li><a href="../index.php"><font color="red"><i class="icon-off icon-2x"></i></font> Logout</a></li>
<?php
}
if($position=='admin') {
?>
              <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
			<li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> POS</a>  </li>             
			<li><a href="stock.php"><i class="icon-list-alt icon-2x"></i> Products</a>
			 <li><a href="purchaseslist.php"><i class="icon-refresh icon-2x"></i> Purchase </a>                                    </li>
			<li><a href="customer.php"><i class="icon-group icon-2x"></i> Customers</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a>                                    </li>
			<li class=""><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a>                </li>
			<li><a href="creport.php?d1=0&d2=0&d3=0"><i class="icon-bar-chart icon-2x"></i> Cashier Report</a>                </li>
			<li><a href="sales_inventory.php"><i class="icon-group icon-2x"></i> Transactions</a>  </li>
			<li><a href="daily_report.php"><i class="icon-book icon-2x"></i> Ledger</a>  </li>   
<?php
}
?>
<li><a href="expense.php"><i class="icon-money icon-2x"></i> Expenses</a>  </li>
					<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
				
				</ul>     
          </div><!--/.well -->
        </div><!--/span-->