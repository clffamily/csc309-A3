<div class="jumbotron">
<?php 
if (isset($title)){
?>
<h1><?= $title ?></h1>
<?php
}?>

<?php 
if(isset($description)){
?>
<p><?= $description ?></p>
<?php 
}
?>
</div>

<?php
if(isset($products)){
?>
<p><?php $this->load->view('product/list.php', $products)?></p>
<?php 
}
?>

<?php
if(isset($contents)){
?>
<p><?php $this->load->view($contents)?></p>
<?php 
}
?>