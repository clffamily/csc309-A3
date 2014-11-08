<!-- <h2>Edit Product</h2> -->

<style>
	input { display: block;}
	
</style>

<?php 
	echo "<p>" . anchor('admin/editProduct','Back') . "</p>";
	
	echo form_open("store/update/$product->id");
	
	echo form_label('Name'); 
	echo form_error('name');
	echo form_input('name',$product->name,"required");

	echo form_label('Description');
	echo form_error('description');
	echo form_input('description',$product->description,"required");
	
	echo form_label('Price');
	echo form_error('price');
	echo form_input('price',$product->price,"required");
	
	$attributes = array(
			'name' => 'submit',
			'class' => 'btn btn-default',
			'value' => 'Save'
	);
	
	//echo form_submit('submit', 'Save');
	echo form_submit($attributes);
	echo form_close();
?>	

