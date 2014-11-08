<div class="jumbotron"> 
<?php 
if (isset($title)){
?>
<h1><?= $title ?></h1>
<?php
}?>

<?php 
if (isset($description)){
	if($description != ""){
?>
<p><?= $description ?></p>
<?php 
} }
?>


<?php
if(isset($product) && isset($editsingleproduct)){
?>
<p><?php $this->load->view('product/editForm.php', $product)?></p>
<?php 
}
?>

<?php
if(isset($product) && isset($viewsingleproduct)){
?>
<p><?php $this->load->view('product/read.php', $product)?></p>
<?php 
}
?>

<?php
if(isset($contents)){
	if($contents != ""){
?>
<p><?php $this->load->view($contents)?></p>
<?php 
}}
?>

</div>
