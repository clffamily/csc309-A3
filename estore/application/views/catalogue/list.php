<div class="row">


<?php  		
		foreach ($contentsdata as $product) {
	?>	
			
			<div class="col-xs-6 col-md-4">
			<div class="panel panel-default">
  			<div class="panel-body">
			<a href="#" class="thumbnail">
	<?php 
 			echo "<img src='" . base_url() . "images/product/" . $product->photo_url . "' width='300px' />";
 	?>
			</a>
			
    		<div class="caption">
	    		<p> Name: <?= $product->name?> <p>
	    		<p> Description:<?= $product->description?> <p>
	    		<p> Price:<?= $product->price?> <p>
		     
		        <p><a href="#" class="btn btn-primary" role="button">View</a> 
		        <a href="#" class="btn btn-default" role="button">Buy</a></p>
		     </div>
		  </div>
		  </div>
	</div>
	<?php 
				
// 			echo "<td>" . anchor("admin/deleteProduct/$product->id",'Delete',"onClick='return confirm(\"Do you really want to delete this record?\");'") . "</td>";
// 			echo "<td>" . anchor("admin/editSingleProduct/$product->id",'Edit') . "</td>";
// 			echo "<td>" . anchor("admin/viewSingleProduct/$product->id",'View') . "</td>";

		}
?>
 

<!--   <div class="col-xs-6 col-md-3"> -->
<!--     <a href="#" class="thumbnail"> -->
<!--       <img data-src="holder.js/100%x180" alt="..."> -->
<!--     </a> -->
<!--     <div class="caption"> -->
<!--         <h3>Description</h3> -->
<!--         <p>...</p> -->
<!--         <p><a href="#" class="btn btn-primary" role="button">Button</a>  -->
<!--         <a href="#" class="btn btn-default" role="button">Button</a></p> -->
<!--      </div> -->
<!--   </div> -->
  
 
  
	
</div>