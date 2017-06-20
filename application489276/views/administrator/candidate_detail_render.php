	<!-- 
	 * Vista detalle hoja de vida registrada
	-->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<i class="fa fa-pencil" aria-hidden="true"></i> DATOS PERSONALES ASPIRANTE
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover table-striped">
							<tr>
								<th>NOMBRE</th>
								<td><?php echo $candidate_detail->nombre_completo ?></td>
							</tr>
							<tr>
								<th>EDAD</th>
								<td><?php echo $candidate_detail->edad ?> años</td>
							</tr>
							<tr>
								<th>TIPO DOCUMENTO</th>
								<td><?php echo $candidate_detail->tipo_documento ?></td>
							</tr>
							<tr>
								<th>NÚMERO DOCUMENTO</th>
								<td><?php echo $candidate_detail->numero_documento ?></td>
							</tr>
							<tr>
								<th>CORREO ELECTRONICO</th>
								<td><?php echo $candidate_detail->correo_electronico ?></td>
							</tr>
							<tr>
								<th>TELÉFONO</th>
								<td><?php echo $candidate_detail->telefono ?></td>
							</tr>
							<tr>
								<th>DIRECCIÓN RESIDENCIA</th>
								<td><?php echo $candidate_detail->direccion_residencia ?></td>
							</tr>
							<tr>
								<th>ESTADO CIVIL</th>
								<td><?php echo $candidate_detail->estado_civil ?></td>
							</tr>
							<tr>
								<th>FECHA NACIMIENTO</th>
								<td><?php echo $candidate_detail->fecha_nacimiento ?></td>
							</tr>
							<tr>
								<th>LUGAR NACIMIENTO</th>
								<td><?php echo $candidate_detail->lugar_nacimiento ?></td>
							</tr>
							<?php if ($candidate_detail->file) { ?>
							<tr>
								<th>ARCHIVO</th>
								<td>
									<a href="<?php echo base_url(); ?>uploads/<?php echo $candidate_detail->file ?>">
										<i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
									</a>
								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<i class="fa fa-graduation-cap" aria-hidden="true"></i> FORMACIÓN ACADEMICA
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<?php 
							$i = 1;
							foreach ($candidate_formacion as $row_candidate_formacion) { 
						?>
							<table class="table table-hover table-striped">
								<tr>
									<th colspan="2">FORMACIÓN <?php echo $i ?></th>
								</tr>
								<tr>
									<th>TIPO FORMACIÓN</th>
									<td><?php echo $row_candidate_formacion[0]->tipo_formacion ?></td>
								</tr>
								<tr>
									<th>TITULO OTORGADO</th>
									<td><?php echo $row_candidate_formacion[0]->titulo_otorgado ?></td>
								</tr>
								<tr>
									<th>NOMBRE INSTITUCION</th>
									<td><?php echo $row_candidate_formacion[0]->nombre_institucion ?> años</td>
								</tr>
								<tr>
									<th>AÑO</th>
									<td><?php echo $row_candidate_formacion[0]->año ?></td>
								</tr>
							</table>
						<?php 
							$i++;
							}
						?>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<i class="fa fa-cogs" aria-hidden="true"></i> EXPERIENCIA LABORAL
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<?php 
							$i = 1;
							foreach ($candidate_experiencia as $row_candidate_experiencia) { 
						?>
							<table class="table table-hover table-striped">
								<tr>
									<th colspan="2">EXPERIENCIA LABORAL <?php echo $i ?></th>
								</tr>
								<tr>
									<th>CARGO</th>
									<td><?php echo $row_candidate_experiencia->cargo ?></td>
								</tr>
								<tr>
									<th>EMPRESA</th>
									<td><?php echo $row_candidate_experiencia->empresa ?></td>
								</tr>
								<tr>
									<th>SALARIO BASICO</th>
									<td><?php echo $row_candidate_experiencia->salario_basico ?></td>
								</tr>
								<tr>
									<th>BENEFICIOS</th>
									<td><?php echo $row_candidate_experiencia->beneficios ?></td>
								</tr>
								<tr>
									<th>FECHA INGRESO</th>
									<td><?php echo $row_candidate_experiencia->fecha_ingreso ?></td>
								</tr>
								<tr>
									<th>FECHA RETIRO</th>
									<td><?php echo $row_candidate_experiencia->fecha_retiro ?></td>
								</tr>
							</table>
						<?php 
							$i++;
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>