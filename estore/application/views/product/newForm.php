<h2>New Product</h2>

<style>
	input { display: block;}
	
</style>

<?php 
	echo "<p>" . anchor('admin/editProduct','Back') . "</p>";
	
	echo form_open_multipart('store/create');
	
	echo form_label('Name'); 
	echo form_error('name');
	echo form_input('name',set_value('name'),"required");

	echo form_label('Description');
	echo form_error('description');
	echo form_input('description',set_value('description'),"required");
	
	echo form_label('Price');
	echo form_error('price');
	echo form_input('price',set_value('price'),"required");
	
	echo form_label('Photo');
	
	if(isset($fileerror))
		echo $fileerror;	
?>	
	<input type="file" name="userfile" size="20" />
	
<?php 

$attributes = array(
		'name' => 'submit',
		'class' => 'btn btn-default',
		'value' => 'Create'
);

	//$attributes = array('class' => 'btn btn-default', 'id' => 'myform');
	//echo form_submit('submit', 'Create', $attributes);
	echo form_submit($attributes);
	echo form_close();
?>	

