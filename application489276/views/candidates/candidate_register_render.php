<!-- 
 *Vista registro de nuevos usuarios
-->

<?php $this->layout('template', ['title' => 'Crear hoja vida']) ?>

<?php $this->start("contenido") ?>
	<?php echo form_open('candidates/candidate_store', array('id' => 'form_store_person')); ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			1. DATOS PERSONALES
		</div>
		<div class="panel-body">
			
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
							        //'required'      => 'required',
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
							<label for="edad">Edad (Años)</label>
							<?php 
								$data = array(
									'type'			=> 'number',
							        'name'          => 'edad',
							        'id'            => 'edad',
							        'class'         => 'form-control',
							        //'required'      => 'required',
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
							        //'required'      => 'required'
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
							        //'required'      => 'required',
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
									'type'			=> 'mail',
							        'name'          => 'correo_electronico',
							        'id'            => 'correo_electronico',
							        'class'         => 'form-control',
							        //'required'      => 'required',
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
							        //'required'      => 'required',
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
							        //'required'      => 'required',
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
							        //'required'      => 'required'
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
							        'class'         => 'form-control fechas',
							        //'required'      => 'required',
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
							        //'required'      => 'required',
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
							        //'required'      => 'required',
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
							        //'required'      => 'required',
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
			<div class="row">
				<div class="col-md-3"><strong>Nivel de educación</strong></div>
				<div class="col-md-3"><strong>Titulo Otorgado</strong></div>
				<div class="col-md-3"><strong>Nombre de la institución</strong></div>
				<div class="col-md-2"><strong>Año</strong></div>
				<div class="col-md-1"></div>
			</div>
			<div class="row info_academica">
				<div class="col-md-3">
					<div class="form-group">
						<?php 
							$options = array();
							$options = array('0' => '--Seleccionar--');
							foreach ($niveles_educacion as $row_niveles_educacion) {
								$options[$row_niveles_educacion->id] = $row_niveles_educacion->tipo_formacion;
							}
							$data = array(
						        'class'         => 'form-control',
						        //'required'      => 'required'
							);
							echo form_dropdown('niveles_educacion[]', $options, set_value('estado_civil'), $data);
						?>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
					<?php 
						$data = array(
							'type'			=> 'text',
					        'name'          => 'titulo_otorgado[]',
					        'class'         => 'form-control',
					        //'required'      => 'required',
					        'placeholder'   => 'Titulo Otorgado',
						);
						echo form_input($data);
					?>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php 
							$data = array(
								'type'			=> 'text',
						        'name'          => 'institucion[]',
						        'class'         => 'form-control',
						        //'required'      => 'required',
						        'placeholder'   => 'Nombre de la institución',
							);
							echo form_input($data);
						?>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<?php 
							$data = array(
								'type'			=> 'number',
						        'name'          => 'ano_titulo[]',
						        'class'         => 'form-control',
						        //'required'      => 'required',
						        'placeholder'   => 'Año',
							);
							echo form_input($data);
						?>
					</div>
				</div>
				<div class="col-md-1 div_borrar"></div>
			</div>
			<bottom id="clone_educacion" class="btn btn-primary">Agregar</bottom>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			3. EXPERIENCIA LABORAL
		</div>
		<div class="panel-body">
			<div class="row info_laboral">
				<div class="col-md-4">
					<div class="form-group">
						<?php 
							$data = array(
								'type'			=> 'text',
						        'name'          => 'cargo[]',
						        'class'         => 'form-control',
						        //'required'      => 'required',
						        'placeholder'   => 'Cargo',
							);
							echo form_input($data);
						?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<?php 
							$data = array(
								'type'			=> 'text',
						        'name'          => 'empresa[]',
						        'class'         => 'form-control',
						        //'required'      => 'required',
						        'placeholder'   => 'Empresa',
							);
							echo form_input($data);
						?>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php 
							$data = array(
								'type'			=> 'int',
						        'name'          => 'salario_basico[]',
						        'class'         => 'form-control',
						        //'required'      => 'required',
						        'placeholder'   => 'Salario Basico',
							);
							echo form_input($data);
						?>
					</div>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-4">
					<div class="form-group">
						<?php 
							$data = array(
								'type'			=> 'text',
						        'name'          => 'beneficios[]',
						        'class'         => 'form-control',
						        //'required'      => 'required',
						        'placeholder'   => 'Beneficios',
							);
							echo form_input($data);
						?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<?php 
							$data = array(
								'type'			=> 'text',
						        'name'          => 'fecha_ingreso[]',
						        'class'         => 'form-control fechas',
						        //'required'      => 'required',
						        'placeholder'   => 'Fecha Ingreso'
							);
							echo form_input($data);
						?>
						<span class="span_errors"><?php echo form_error('fecha_ingreso'); ?></span>
					</div>
				</div>	
				<div class="col-md-3">
					<div class="form-group">
						<?php 
							$data = array(
								'type'			=> 'text',
						        'name'          => 'fecha_retiro[]',
						        'class'         => 'form-control fechas',
						        //'required'      => 'required',
						        'placeholder'   => 'Fecha Retiro'
							);
							echo form_input($data);
						?>
						<span class="span_errors"><?php echo form_error('fecha_retiro'); ?></span>
					</div>
				</div>
				<div class="col-md-1 div_borrar"></div>
			</div>
			<bottom id="clone_laboral" class="btn btn-primary">Agregar</bottom>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			4. DECLARACIÓN PRIVACIDAD
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-1">
					<?php 
						echo form_checkbox('declaracion_privacidad', 1, FALSE);
					?>
				</div>
				<div class="col-md-11">
					Declaro que la información presentada en esta formato es veraz y autorizo a Simple para que realice la validación, el tratamiento y actualización de los datos contenidos en el presente formato y en la hoja de vida; cumpliendo con la Ley 1581 de 2012, el Decreto 1377 de 2013 y la Política de	tratamiento de datos personales manejada en nuestra organización, la cual esta publicada en la página web www.pagosimple.com.
				</div>
			</div>
			<?php 
				echo form_submit('enviar_candidato', 'Registrar', "class='btn btn-primary'");
			?>	
		</div>
	</div>
	<?php echo form_close(); ?>
<?php $this->stop() ?>
<?php $this->start("scripts") ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$( ".fechas" ).datepicker(
				{
				  changeYear: true,
				  yearRange: "-100:+0"
				}
			);
		})
		$('#clone_educacion').click(function(){
			$('div.info_academica:first').after($( "div.info_academica:first" ).clone().addClass('nuevaEducacion').find("input").val("").end());
			$('div.nuevaEducacion div.div_borrar').empty();
			$('div.nuevaEducacion div.div_borrar').append('<div class="form-group"><bottom class="btn btn-primary borrar"><i class="fa fa-eraser" aria-hidden="true"></i></bottom></div>');
		})
		$('#clone_laboral').click(function(){
			var newRow = $('div.info_laboral:first').after($( "div.info_laboral:first" ).clone().addClass('nuevaLaboral').find("input").val("").end());
			$('div.nuevaLaboral div.div_borrar').empty();
			$('div.nuevaLaboral div.div_borrar').append('<div class="form-group"><bottom class="btn btn-primary borrar"><i class="fa fa-eraser" aria-hidden="true"></i></bottom></div>');
		})
		$(document).on('click', '.borrar', function(){
			$(this).parents(':eq(2)').remove();
		})
	</script>
<?php $this->stop() ?>