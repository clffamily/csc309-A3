<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Baseball Cards Store</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<link rel = "stylesheet" href="<?= base_url()?>css/template.css">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

</head>
<body>
<h2>Order Confirmation</h2>
<?php
?>
<table border="8" class="table table-hover">

<?php  
		echo "<tr><th>Order ID</th><th>Customer ID</th><th>Order Date</th><th>Order Time</th>";
		echo "<th>Total</th><th>Credit Card No.</th><th>CC Month</th><th>CC Year</th></tr>";
		
		foreach ($orders as $order) {
			echo "<tr>";
			echo "<td>" . $order['id'] . "</td>";
 			echo "<td>" . $order['customer_id'] . "</td>";
 			echo "<td>" . $order['order_date'] . "</td>";
 			echo "<td>" . $order['order_time'] . "</td>";
 			echo "<td>$" . number_format($order['total'],2) . "</td>";
 			echo "<td>" . $order['creditcard_number'] . "</td>";
 			echo "<td>" . $order['creditcard_month'] . "</td>";
 			echo "<td>" . $order['creditcard_year'] . "</td>";				
			echo "</tr>";
		}
?>
</table>
<p>
<table border="8" class="table table-hover">

<?php  
		echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th></tr>";
		
		foreach ($allproducts as $product) {
			echo "<tr>";
			echo "<td>" . $product['name'] . "</td>";
 			echo "<td>$" . number_format($product['price'],2) . "</td>";
 			echo "<td>" . $product['quantity'] . "</td>";			
			echo "</tr>";
		}
?>
</table>
</body>
</html>