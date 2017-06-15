<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>/asset/img/favicon.png">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/asset/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/asset/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/asset/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/asset/jquery-ui/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/asset/font-awesome/css/font-awesome.min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>/asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/asset/jquery-ui/jquery-ui.min.js"></script>
    <title>SIMPLE | <?=$this->e($title)?></title>
</head>
	<body>
		<div class="cargando">
			<img src="<?php echo base_url(); ?>/asset/img/cargando.gif">
		</div>
		<div class="container-fluid">
			<?=$this->insert('header') ?>
			<div class="contenido">
				<?=$this->section('contenido')?>
			</div>
			<?=$this->insert('footer') ?>
		</div>
	</body>
	<?=$this->section('scripts')?>
</html>