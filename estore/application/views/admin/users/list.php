<h2>User List</h2>
<?php
//echo "<p>" . anchor('admin/addProduct','Add New') . "</p>";
//echo anchor('admin/addProduct','Add New');
?>
<table class="table table-hover">

<?php  
		//echo "<table>";
		echo "<tr><th>User ID</th><th>First Name</th><th>Last Name</th><th>User Name</th>";
		echo "<th>Password</th><th>Email</th></tr>";
		
		foreach ($users as $user) {
			echo "<tr>";
			echo "<td>" . $user['id'] . "</td>";
 			echo "<td>" . $user['first'] . "</td>";
 			echo "<td>" . $user['last'] . "</td>";
 			echo "<td>" . $user['login'] . "</td>";
 			echo "<td>" . $user['password'] . "</td>";
 			echo "<td>" . $user['email'] . "</td>";
// 			echo "<td>" . $product->name . "</td>";
// 			echo "<td>" . $product->description . "</td>";
// 			echo "<td>" . $product->price . "</td>";
// 			echo "<td><img src='" . base_url() . "images/product/" . $product->photo_url . "' width='100px' /></td>";
				
// 			echo "<td>" . anchor("admin/deleteProduct/$product->id",'Delete',"onClick='return confirm(\"Do you really want to delete this record?\");'") . "</td>";
// 			echo "<td>" . anchor("admin/editSingleProduct/$product->id",'Edit') . "</td>";
// 			echo "<td>" . anchor("admin/viewSingleProduct/$product->id",'View') . "</td>";
				
			echo "</tr>";
		}
?>

</table>