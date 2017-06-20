		<!-- 
		 *Vista render cambio de contraseña
		-->
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<i class="fa fa-key" aria-hidden="true"></i> CAMBIO DE CONTRASEÑA
					</div>
					<div class="panel-body">
						<?php echo form_open('candidates/change_password'); ?>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="token">Código o token enviado al correo</label>
										<?php 
											$data = array(
												'type'			=> 'text',
										        'name'          => 'token',
										        'id'            => 'token',
										        'class'         => 'form-control',
										        'required'      => 'required',
										        'placeholder'   => 'Código o token',
										        'value'			=> set_value('token')
											);
											echo form_input($data);
										?>
										<span class="span_errors"><?php echo form_error('token'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="contrasena">Nueva Contraseña</label>
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
							</div>
							<div class="row">
								<div class="col-md-12">
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
							<div class="row row_center">
								<div class="col-md-12">
									<?php 
										$data = array(
											'type'			=> 'hidden',
									        'name'          => 'user_id',
									        'id'            => 'user_id',
									        'value'			=> $user_id
										);
										echo form_input($data);
									?>
									<button type="submit" name="Guardar" class="btn btn-primary">
										<i class="fa fa-floppy-o" aria-hidden="true"></i>
										 Guardar
									</button>
								</div>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>