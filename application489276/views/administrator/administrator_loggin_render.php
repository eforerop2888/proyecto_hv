			<!-- 
			 *Vista del loggin de los administradores del sistema
			-->
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<i class="fa fa-handshake-o" aria-hidden="true"></i> Acceso administrador
						</div>
						<div class="panel-body">
							<?php echo form_open('administrator/administrator_validate'); ?>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="usuario">Usuario</label>
											<?php 
												$data = array(
													'type'			=> 'text',
											        'name'          => 'usuario',
											        'id'            => 'usuario',
											        'class'         => 'form-control',
											        //'required'      => 'required',
											        'placeholder'   => 'Usuario',
											        'value'			=> set_value('usuario')
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
											        //'required'      => 'required',
											        'placeholder'   => 'Contraseña',
												);
												echo form_input($data);
											?>
											<span class="span_errors"><?php echo form_error('usuario'); ?></span>
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
								</div>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>