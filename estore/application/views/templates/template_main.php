<div class="jumbotron">
<h1><?= $title?></h1>
<?php 
if(isset($description)){
?>
<p><?= $description ?></p>
<?php 
}
?>
</div>
<?php
if(isset($contents)){
?>
<p><?php $this->load->view($contents)?></p>
<?php 
}
?>