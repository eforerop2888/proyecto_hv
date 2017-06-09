<!-- 
 *Vista del landing page de trabaje con nosotros
-->

<?php $this->layout('template', ['title' => 'Trabaje con nosotros']) ?>

<?php $this->start("contenido") ?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					TRABAJE CON NOSOTROS
				</div>
				<div class="panel-body">
					<?php echo form_open('candidates/candidate_validate'); ?>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="numero_documento">Número</label>
									<?php 
										$data = array(
											'type'			=> 'number',
									        'name'          => 'numero_documento',
									        'id'            => 'numero_documento',
									        'class'         => 'form-control',
									        'required'      => 'required',
									        'placeholder'   => 'Número de documento',
										);
										echo form_input($data);
									?>
									<span class="span_errors"><?php echo form_error('numero_documento'); ?></span>
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
									<span class="span_errors"><?php echo form_error('contrasena'); ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<?php echo form_submit('loggin', 'Entrar', "class='btn btn-primary'");?>	
							</div>
							<div class="col-md-6">
								<button type="button" class="btn btn-primary">Cancelar</button>
							</div>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
<?php $this->stop() ?>