<?php 
	if($this->session->flashdata('success')){ 
?>
	<div class="alert alert-success" role="alert">
		<strong>Alerta</strong> <?php echo $this->session->flashdata('success');?>
	</div>
<?php 
	}
?>