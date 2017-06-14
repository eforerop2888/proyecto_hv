<!-- 
 * Vista detalle hoja de vida registrada
-->

<?php $this->layout('template', ['title' => 'Ver hoja vida']) ?>

<?php $this->start("contenido") ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<i class="fa fa-key" aria-hidden="true"></i> Recuperar contraseña
		</div>
		<div class="panel-body">
			<?php echo form_open('candidates/send_mail_recover'); ?>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="tipo_documento">Tipo de documento</label>
							<?php 
								$options = array('0' => '--Seleccionar--');
								foreach ($tipos_documentos as $row_tipos_documentos) {
									$options[$row_tipos_documentos->id] = $row_tipos_documentos->tipo_documento;
								}
								$data = array(
							        'id'            => 'tipo_documento',
							        'class'         => 'form-control',
							        //'required'      => 'required'
								);
								echo form_dropdown('tipo_documento', $options, set_value('tipo_documento'), $data);
							?>
							<span class="span_errors"><?php echo form_error('tipo_documento'); ?></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="numero_documento">Número documento</label>
							<?php 
								$data = array(
									'type'			=> 'number',
							        'name'          => 'numero_documento',
							        'id'            => 'numero_documento',
							        'class'         => 'form-control',
							        'required'      => 'required',
							        'placeholder'   => 'Número de documento',
							        'value'			=> set_value('numero_documento')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('numero_documento'); ?></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p>Si se encuentra creado en el sistema, un correo electronico será enviado al email registrado para completar la recuperación de su contraseña</p>
					</div>
				</div>
				<div class="row row_center">
					<div class="col-md-12">
						<button type="submit" name="validar" class="btn btn-primary">
							<i class="fa fa-paper-plane" aria-hidden="true"></i>
							 Enviar
						</button>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>

<?php $this->stop() ?>