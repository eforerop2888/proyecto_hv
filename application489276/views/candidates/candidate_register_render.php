		<!-- 
		 *Vista registro de nuevos usuarios
		-->
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php echo form_open_multipart('candidates/candidate_store', array('id' => 'form_store_person')); ?>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<i class="fa fa-pencil" aria-hidden="true"></i> DATOS PERSONALES
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
										<span class="span_errors" id="enombre_candidato"></span>
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
										<span class="span_errors" id="eedad"></span>
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
										<span class="span_errors" id="etipo_documento"></span>
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
										<span class="span_errors" id="enumero_documento"></span>
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
										<span class="span_errors" id="ecorreo_electronico"></span>
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
										<span class="span_errors" id="etelefono"></span>
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
										<span class="span_errors" id="edireccion_residencia"></span>
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
										<span class="span_errors" id="eestado_civil"></span>
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
										<span class="span_errors" id="efecha_nacimiento"></span>
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
										<span class="span_errors" id="elugar_nacimiento"></span>
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
										<span class="span_errors" id="econtrasena"></span>
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
										<span class="span_errors" id="econfirmar_contrasena"></span>
									</div>
								</div>	
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="upload_file">Adjuntar Archivo</label>
										<?php 
											$data = array(
										        'name'          => 'upload_file',
										        'id'            => 'upload_file',
										        ////'required'      => 'required',
											);
											echo form_upload($data)
										?>
										<span class="span_errors" id="eupload_file"></span>
									</div>
								</div>
							</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<i class="fa fa-graduation-cap" aria-hidden="true"></i> FORMACIÓN ACADEMICA
					</div>
					<div class="panel-body">
						<div class="cloned_info_academica"></div>
						<div class="row row_center">
							<div class="col-md-12">
								<bottom id="clone_educacion" class="btn btn-primary">
									<i class="fa fa-plus-circle" aria-hidden="true"></i>
									Agregar
								</bottom>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<i class="fa fa-cogs" aria-hidden="true"></i> EXPERIENCIA LABORAL
					</div>
					<div class="panel-body">
						<div class="cloned_info_laboral"></div>
						<div class="row row_center">
							<div class="col-md-12">
								<bottom id="clone_laboral" class="btn btn-primary">
									<i class="fa fa-plus-circle" aria-hidden="true"></i>
									Agregar
								</bottom>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> DECLARACIÓN PRIVACIDAD
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-1">
								<div class="form-group div_privacidad">
									<?php 
										echo form_checkbox('declaracion_privacidad', 1, FALSE);
									?>
								</div>
							</div>
							<div class="col-md-11">
								<div class="form-group">
									Declaro que la información presentada en esta formato es veraz y autorizo a Simple para que realice la validación, el tratamiento y actualización de los datos contenidos en el presente formato y en la hoja de vida; cumpliendo con la Ley 1581 de 2012, el Decreto 1377 de 2013 y la Política de	tratamiento de datos personales manejada en nuestra organización, la cual esta publicada en la página web www.pagosimple.com.
									<span class="span_errors" id="edeclaracion_privacidad"></span>
								</div>
							</div>
						</div>
						<div class="row row_center">
							<div class="col-md-12">
								<button type="submit" name="enviar_candidato" class="btn btn-primary">
									<i class="fa fa-user-plus" aria-hidden="true"></i>
									Registrar
								</button>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>

				<!-- INICIO div ocultos para generacion de contenido dinamico -->

				<div class="row info_academica border_info">
					<div class="col-md-3">
						<div class="form-group">
							<label for="niveles_educacion">Nivel de educación</label>
							<?php 
								$options = array();
								foreach ($niveles_educacion as $row_niveles_educacion) {
									$options[$row_niveles_educacion->id] = $row_niveles_educacion->tipo_formacion;
								}
								$data = array(
							        'class'         => 'form-control',
							        //'required'      => 'required'
								);
								echo form_dropdown('niveles_educacion[]', $options, set_value('niveles_educacion'), $data);
							?>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="titulo_otorgado">Titulo Otorgado</label>
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
							<label for="institucion">Nombre de la institución</label>
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
							<label for="ano_titulo">Año</label>
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
					<div class="col-md-1 div_borrar">
						<div class="form-group">
							<bottom class="btn btn-danger borrar">
								<i class="fa fa-eraser" aria-hidden="true"></i>
							</bottom>
						</div>
					</div>
				</div>

				<div class="row border_info info_laboral">
					<div class="col-md-4">
						<div class="form-group">
							<label for="cargo">Cargo</label>
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
							<label for="empresa">Empresa</label>
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
							<label for="salario_basico">Salario Basico</label>
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
							<label for="beneficios">Beneficios</label>
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
							<label for="fecha_ingreso">Fecha de ingreso</label>
							<?php 
								$data = array(
									'type'			=> 'text',
							        'name'          => 'fecha_ingreso[]',
							        'class'         => 'form-control fechas fechas_cloned',
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
							<label for="fecha_retiro">fecha de retiro</label>
							<?php 
								$data = array(
									'type'			=> 'text',
							        'name'          => 'fecha_retiro[]',
							        'class'         => 'form-control fechas fechas_cloned',
							        //'required'      => 'required',
							        'placeholder'   => 'Fecha Retiro'
								);
								echo form_input($data);
							?>
							<span class="span_errors"><?php echo form_error('fecha_retiro'); ?></span>
						</div>
					</div>
					<div class="col-md-1 div_borrar">
						<div class="form-group">
							<bottom class="btn btn-danger borrar">
								<i class="fa fa-eraser" aria-hidden="true"></i>
							</bottom>
						</div>
					</div>
					<!--<div class="col-md-12 row_center">
						<bottom class="btn btn-primary clone_logro">
							<i class="fa fa-plus-circle" aria-hidden="true"></i>
							Agregar Logro
						</bottom>
					</div>
					<div class="cloned_info_logros"></div>-->
				</div>

				<div class="row info_logros inputs_logros">
					<div class="col-md-1">
						<strong>Logro</strong>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<?php 
								$data = array(
									'type'			=> 'text',
							        'name'          => 'logros[][]',
							        'class'         => 'form-control',
							        //'required'      => 'required',
							        'placeholder'   => 'Logro'
								);
								echo form_input($data);
							?>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
				<!-- FIN div ocultos para generacion de contenido dinamico -->
			</div>
		</div>