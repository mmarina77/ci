<?php
// upload.php
$vers = rand(1,1000);
// http://tutsme-webdesign.info/jquery-tutorials/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$page_title?></title>
	<link rel="stylesheet" href="<?php echo base_url()?>libs/bootstrap/css/bootstrap-responsive.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>libs/bootstrap/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>libs/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>libs/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>libs/bootstrap/css/theme.blue.css" />
	
	<link rel="stylesheet" href="<?php echo base_url() ?>css/style.css" type="text/css">
    <!-- script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="<?php echo base_url()?>js/upload.js?<?=$vers?>"></script>
    <script src="<?php echo base_url()?>js/ajaxfileupload.js?<?=$vers?>"></script>
    <link href="<?php echo base_url()?>css/upload.css?<?=$vers?>" rel="stylesheet" />
	<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="navbar">
  <div class="navbar-inner">
    <ul class="nav">
      <li class="<?php echo $main_content == 'home' ? 'active' :'' ?>"><a href="<?php echo base_url()?>">Home</a></li>
      <li class="<?php echo $main_content == 'upload' ? 'active' :'' ?>"><a href="<?php echo base_url()?>upload">Upload</a></li>
	  <?php if($main_content == 'csv_grid') { ?>
		<li class=""><a href="<?php echo $export_file_url?>">Export</a></li>
	  <?php } ?>
    </ul>
  </div>
</div>

<div id="container">