<!-- 
 *Vista registro de nuevos usuarios
-->

<?php $this->layout('template', ['title' => 'Crear hoja vida']) ?>

<?php $this->start("contenido") ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			1. DATOS PERSONALES
		</div>
		<div class="panel-body">
			<?php echo form_open('candidates/candidate_store', array('id' => 'form_store_person')); ?>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nombre_candidato">Nombre del candidato</label>
							<?php 
								$data = array(
									'type'			=> 'text',
							        'name'          => 'nombre_candidato',
							        'id'            => 'nombre_candidato',
							        'class'         => 'form-control',
							        'required'      => 'required',
							        'placeholder'   => 'Nombre del candidato',
							        'autofocus'     => 'autofocus',
							        'value'			=> set_value('nombre_candidato')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('nombre_candidato'); ?></span>
						</div>
					</div>	
					<div class="col-md-6">
						<div class="form-group">
							<label for="edad">Edad</label>
							<?php 
								$data = array(
									'type'			=> 'number',
							        'name'          => 'edad',
							        'id'            => 'edad',
							        'class'         => 'form-control',
							        'required'      => 'required',
							        'placeholder'   => 'Edad',
							        'value'			=> set_value('edad')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('edad'); ?></span>
						</div>
					</div>	
				</div>
				<div class="row">
					<div class="col-md-6">
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
							        'required'      => 'required'
								);
								echo form_dropdown('tipo_documento', $options, set_value('tipo_documento'), $data);
							?>
							<span class="span_errors"><?php echo form_error('tipo_documento'); ?></span>
						</div>
					</div>	
					<div class="col-md-6">
						<div class="form-group">
							<label for="numero_documento">Número de documento</label>
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
					<div class="col-md-6">
						<div class="form-group">
							<label for="correo_electronico">Correo Electronico</label>
							<?php 
								$data = array(
									'type'			=> 'text',
							        'name'          => 'correo_electronico',
							        'id'            => 'correo_electronico',
							        'class'         => 'form-control',
							        'required'      => 'required',
							        'placeholder'   => 'Correo Electronico',
							        'value'			=> set_value('correo_electronico')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('correo_electronico'); ?></span>
						</div>
					</div>	
					<div class="col-md-6">
						<div class="form-group">
							<label for="telefono">Teléfono Movil y/o Fijo</label>
							<?php 
								$data = array(
									'type'			=> 'number',
							        'name'          => 'telefono',
							        'id'            => 'telefono',
							        'class'         => 'form-control',
							        'required'      => 'required',
							        'placeholder'   => 'Teléfono Movil y/o Fijo',
							        'value'			=> set_value('telefono')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('telefono'); ?></span>
						</div>
					</div>	
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="direccion_residencia">Dirección residencia actual</label>
							<?php 
								$data = array(
									'type'			=> 'text',
							        'name'          => 'direccion_residencia',
							        'id'            => 'direccion_residencia',
							        'class'         => 'form-control',
							        'required'      => 'required',
							        'placeholder'   => 'Direcciòn residencia actual',
									'value'			=> set_value('direccion_residencia')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('direccion_residencia'); ?></span>
						</div>
					</div>	
					<div class="col-md-6">
						<div class="form-group">
							<label for="estado_civil">Estado Civil</label>
							<?php 
								$options = array();
								$options = array('0' => '--Seleccionar--');
								foreach ($estados_civiles as $row_nacionalidades) {
									$options[$row_nacionalidades->id] = $row_nacionalidades->estado_civil;
								}
								$data = array(
							        'id'            => 'estado_civil',
							        'class'         => 'form-control',
							        'required'      => 'required'
								);
								echo form_dropdown('estado_civil', $options, set_value('estado_civil'), $data);
							?>
							<span class="span_errors"><?php echo form_error('estado_civil'); ?></span>
						</div>
					</div>	
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="fecha_nacimiento">Fecha Nacimiento</label>
							<?php 
								$data = array(
									'type'			=> 'text',
							        'name'          => 'fecha_nacimiento',
							        'id'            => 'fecha_nacimiento',
							        'class'         => 'form-control',
							        'required'      => 'required',
							        'placeholder'   => 'Fecha Nacimiento',
							        'value'			=> set_value('fecha_nacimiento')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('fecha_nacimiento'); ?></span>
						</div>
					</div>	
					<div class="col-md-6">
						<div class="form-group">
							<label for="lugar_nacimiento">Lugar Nacimiento</label>
							<?php 
								$data = array(
									'type'			=> 'text',
							        'name'          => 'lugar_nacimiento',
							        'id'            => 'lugar_nacimiento',
							        'class'         => 'form-control',
							        'required'      => 'required',
							        'placeholder'   => 'Lugar Nacimiento',
							        'value'			=> set_value('lugar_nacimiento')
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('lugar_nacimiento'); ?></span>
						</div>
					</div>	
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="contrasena">Contraseña</label>
							<?php 
								$data = array(
									'type'			=> 'password',
							        'name'          => 'contrasena',
							        'id'            => 'contrasena',
							        'class'         => 'form-control',
							        'required'      => 'required',
							        'placeholder'   => 'Contraseña',
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('contrasena'); ?></span>
						</div>
					</div>	
					<div class="col-md-6">
						<div class="form-group">
							<label for="confirmar_contrasena">Confirmar Contraseña</label>
							<?php 
								$data = array(
									'type'			=> 'password',
							        'name'          => 'confirmar_contrasena',
							        'id'            => 'confirmar_contrasena',
							        'class'         => 'form-control',
							        'required'      => 'required',
							        'placeholder'   => 'Confirmar Contraseña'
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('confirmar_contrasena'); ?></span>
						</div>
					</div>	
				</div>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			2. INFORMACIÓN ACADEMICA
		</div>
		<div class="panel-body">
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			3. EXPERIENCIA LABORAL
		</div>
		<div class="panel-body">
			<?php 
				echo form_submit('enviar_candidato', 'Registrar', "class='btn btn-primary'");
				echo form_close();
			?>
		</div>
	</div>
<?php $this->stop() ?>