<!-- This file displays the order list of admin -->
<!-- Admin user can delete orders from this page -->

<h2>Order List</h2>
<?php
?>
<table class="table table-hover">

<?php  
		echo "<tr><th>Order ID</th><th>Customer ID</th><th>Order Date</th><th>Order Time</th>";
		echo "<th>Total</th><th>Credit Card No.</th><th>CC Month</th><th>CC Year</th><th>Delete</th></tr>";
		
		foreach ($orders as $order) {
			echo "<tr>";
			echo "<td>" . $order['id'] . "</td>";
 			echo "<td>" . $order['customer_id'] . "</td>";
 			echo "<td>" . $order['order_date'] . "</td>";
 			echo "<td>" . $order['order_time'] . "</td>";
 			echo "<td>" . $order['total'] . "</td>";
 			echo "<td>" . $order['creditcard_number'] . "</td>";
 			echo "<td>" . $order['creditcard_month'] . "</td>";
 			echo "<td>" . $order['creditcard_year'] . "</td>";

 			$id = $order['id'];
 			echo "<td>" . anchor("admin/deleteOrder/$id",'Delete',"onClick='return confirm(\"Do you really want to delete this record?\");'") . "</td>";
				
			echo "</tr>";
		}
?>

</table>