<?php 
	if($this->session->flashdata('success')){ 
?>
	<div class="alert alert-success" role="alert">
		<strong>Alerta</strong> <?php echo $this->session->flashdata('success');?>
	</div>
<?php 
	}
	if($this->session->flashdata('danger')){ 
?>
	<div class="alert alert-danger" role="alert">
		<strong>Alerta</strong> <?php echo $this->session->flashdata('danger');?>
	</div>
<?php 
	}
?>