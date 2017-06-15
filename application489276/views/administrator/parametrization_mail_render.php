<!-- 
 *Vista hojas de vida registradas
-->

<?php $this->layout('template', ['title' => 'Parametrizaciòn correos']) ?>

<?php $this->start("contenido") ?>
	<?php echo form_open('administrator/mail_store', array('id' => 'form_mail_store')); ?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<i class="fa fa-paper-plane" aria-hidden="true"></i> PARAMETRIZACION CORREOS ELECTRONICOS
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="proceso">Proceso</label>
							<?php 
								$options = array();
								$options = array('0' => '--Seleccionar--');
								foreach ($procesos as $row_procesos) {
									$options[$row_procesos->id] = $row_procesos->proceso;
								}
								$data = array(
							        'class'         => 'form-control',
							        'id' 			=> 'proceso',
							        'required'      => 'required'
								);
								echo form_dropdown('proceso', $options, set_value('proceso'), $data);
							?>
							<span class="span_errors"><?php echo form_error('proceso'); ?></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="protocolo">Protocolo</label>
							<?php 
								$data = array(
									'type'			=> 'text',
							        'name'          => 'protocolo',
							        'id'            => 'protocolo',
							        'class'         => 'form-control text_clean',
							        'required'      => 'required',
							        'placeholder'   => 'Protocolo',
							        'value'			=> set_value('protocolo')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('protocolo'); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="host">Host</label>
							<?php 
								$data = array(
									'type'			=> 'text',
							        'name'          => 'host',
							        'id'            => 'host',
							        'class'         => 'form-control text_clean',
							        'required'      => 'required',
							        'placeholder'   => 'Host',
							        'value'			=> set_value('host')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('host'); ?></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="puerto">Puerto</label>
							<?php 
								$data = array(
									'type'			=> 'number',
							        'name'          => 'puerto',
							        'id'            => 'puerto',
							        'class'         => 'form-control text_clean',
							        'required'      => 'required',
							        'placeholder'   => 'Puerto',
							        'value'			=> set_value('puerto')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('puerto'); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="correo_remitente">Correo Remitente</label>
							<?php 
								$data = array(
									'type'			=> 'email',
							        'name'          => 'correo_remitente',
							        'id'            => 'correo_remitente',
							        'class'         => 'form-control text_clean',
							        'required'      => 'required',
							        'placeholder'   => 'Correo Remitente',
							        'value'			=> set_value('correo_remitente')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('correo_remitente'); ?></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nombre_remitente">Nombre Remitente</label>
							<?php 
								$data = array(
									'type'			=> 'text',
							        'name'          => 'nombre_remitente',
							        'id'            => 'nombre_remitente',
							        'class'         => 'form-control text_clean',
							        'required'      => 'required',
							        'placeholder'   => 'Nombre Remitente',
							        'value'			=> set_value('nombre_remitente')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('nombre_remitente'); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="correo_receptor">Correo destinatario</label>
							<?php 
								$data = array(
									'type'			=> 'email',
							        'name'          => 'correo_receptor',
							        'id'            => 'correo_receptor',
							        'class'         => 'form-control text_clean',
							        'required'      => 'required',
							        'placeholder'   => 'Correo destinatario',
							        'value'			=> set_value('correo_receptor')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('correo_receptor'); ?></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="copia_receptor">Copia correo destinatario</label>
							<?php 
								$data = array(
									'type'			=> 'email',
							        'name'          => 'copia_receptor',
							        'id'            => 'copia_receptor',
							        'class'         => 'form-control text_clean',
							        'required'      => 'required',
							        'placeholder'   => 'Copia correo destinatario',
							        'value'			=> set_value('copia_receptor')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('copia_receptor'); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="asunto">Asunto</label>
							<?php 
								$data = array(
									'type'			=> 'text',
							        'name'          => 'asunto',
							        'id'            => 'asunto',
							        'class'         => 'form-control text_clean',
							        'required'      => 'required',
							        'placeholder'   => 'Asunto',
							        'value'			=> set_value('asunto')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('asunto'); ?></span>
						</div>
					</div>
				</div>
				<button type="submit" name="guardar_configuracion" class="btn btn-primary">
					<i class="fa fa-floppy-o" aria-hidden="true"></i>
					 Guardar
				</button>
			</div>
		</div>
	<?php echo form_close(); ?>
<?php $this->stop() ?>
<?php $this->start("scripts") ?>
	<script type="text/javascript">
		/*
		 * Función Para cargar la información de la configuración de los correos de manera dinamica con ajax
		*/
		$( "#proceso" ).change(function() {
	      	var proceso = $('#proceso').val();
	        $.ajax({
                type: 'POST',
                url: '<?php echo site_url('parametrizacion/select'); ?>',
                data:{'proceso':proceso},
                dataType: 'json',
                success:function(result){
                	if (!result) {
                		$('.text_clean').val('');
                		}else{
	 						$.each(result, function(key, value){
	 							$('#'+key).val(value)
    						});
                		}
                }
            });
	    });
	</script>
<?php $this->stop() ?>

