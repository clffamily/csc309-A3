
<h2>Order Confirmation</h2>
<?php
?>
<table border="8" class="table table-hover">

<?php  
		echo "<tr><th>Order ID</th><th>Customer ID</th><th>Order Date</th><th>Order Time</th>";
		echo "<th>Total</th><th>Credit Card No.</th><th>CC Month</th><th>CC Year</th></tr>";
		
		foreach ($contentsdata as $order) {
			echo "<tr>";
			echo "<td>" . $order['id'] . "</td>";
 			echo "<td>" . $order['customer_id'] . "</td>";
 			echo "<td>" . $order['order_date'] . "</td>";
 			echo "<td>" . $order['order_time'] . "</td>";
 			echo "<td>" . $order['total'] . "</td>";
 			echo "<td>" . $order['creditcard_number'] . "</td>";
 			echo "<td>" . $order['creditcard_month'] . "</td>";
 			echo "<td>" . $order['creditcard_year'] . "</td>";				
			echo "</tr>";
		}
?>
</table>