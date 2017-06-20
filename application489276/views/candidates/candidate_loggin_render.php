			<!-- 
			 *Vista del loggin de trabaje con nosotros
			-->
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<i class="fa fa-handshake-o" aria-hidden="true"></i> TRABAJE CON NOSOTROS
						</div>
						<div class="panel-body">
							<?php echo form_open('candidates/candidate_validate'); ?>
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
											<label for="numero_documento">Número Documento</label>
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
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
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
											<span class="span_errors"><?php echo form_error('numero_documento'); ?></span>
											<span class="span_errors"><?php echo form_error('contrasena'); ?></span>
										</div>
									</div>
								</div>
								<div class="row row_center">
									<div class="col-md-12 divs_login">
										<button type="submit" name="loggin" class="btn btn-primary">
											<i class="fa fa-user-circle" aria-hidden="true"></i>
											 Ingresar
										</button>
									</div>
									<div class="col-md-12 divs_login">
										<a href="<?php echo site_url('candidatos/contrasena')?>">¿Olvidó su contraseña?</a>	
									</div>
									<div class="col-md-12">
										<a href="<?php echo site_url('candidatos/validar')?>">Registrar hoja de vida</a>	
									</div>
								</div>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>