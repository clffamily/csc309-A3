<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Baseball Cards Store</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<link rel = "stylesheet" href="<?= base_url();?>css/template.css">


</head>
<body>

	
	<?php $this->load->view($taskbar)?>
	<div class="container-all">
	<?php 
	if ($message) { 
	?>
	<div class="alert alert-warning" role="alert"><?= $message ?></div>
	<?php
	} 
	?>
	</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>

</html>