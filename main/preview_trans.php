<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
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
				$id=$_GET['inv'];
				$result = $db->prepare("SELECT *, sales_order.amount as amount, sales_order.discount as discount FROM sales_order
					LEFT JOIN sales ON sales.transaction_id = sales_order.sale_id 
					 WHERE sales_order.invoice = ? AND sales_order.status = ? ORDER BY sales.transaction_id DESC");
				
				$result->execute(array($id,'1'));
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