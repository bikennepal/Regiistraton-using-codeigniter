<!DOCTYPE html>
<html>
<head>
	<title>Articles files</title>
	 
	<?= link_tag("assets/css/bootstrap.min.css");?>



</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Admin panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

   <?php 
   if($this->session->userdata('id'))
   { 
   	?>
   	<li><a href="<?= base_url('admin/logout');?>" class="btn btn-danger" style="">Logout</a></li>
   	<?php 
   	} ?>
   
</nav>
 