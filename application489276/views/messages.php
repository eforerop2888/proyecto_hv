<?php 
	if($this->session->flashdata('success')){ 
?>
	<div class="alert alert-success" role="alert">
		<strong>Perfecto</strong> <?php $this->session->flashdata('success');?>
	</div>
<?php 
	}
?>