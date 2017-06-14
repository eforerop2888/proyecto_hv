<!-- 
 * Vista detalle hoja de vida registrada
-->

<?php $this->layout('template', ['title' => 'Ver hoja vida']) ?>

<?php $this->start("contenido") ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<i class="fa fa-pencil" aria-hidden="true"></i> DATOS PERSONALES ASPIRANTE
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<tr>
						<th>NOMBRE</th>
						<td><?php echo $candidate_detail[0]->nombre_completo ?></td>
					</tr>
					<tr>
						<th>EDAD</th>
						<td><?php echo $candidate_detail[0]->edad ?> años</td>
					</tr>
					<tr>
						<th>TIPO DOCUMENTO</th>
						<td><?php echo $candidate_detail[0]->tipo_documento ?></td>
					</tr>
					<tr>
						<th>NÚMERO DOCUMENTO</th>
						<td><?php echo $candidate_detail[0]->numero_documento ?></td>
					</tr>
					<tr>
						<th>CORREO ELECTRONICO</th>
						<td><?php echo $candidate_detail[0]->correo_electronico ?></td>
					</tr>
					<tr>
						<th>TELÉFONO</th>
						<td><?php echo $candidate_detail[0]->telefono ?></td>
					</tr>
					<tr>
						<th>DIRECCIÓN RESIDENCIA</th>
						<td><?php echo $candidate_detail[0]->direccion_residencia ?></td>
					</tr>
					<tr>
						<th>ESTADO CIVIL</th>
						<td><?php echo $candidate_detail[0]->estado_civil ?></td>
					</tr>
					<tr>
						<th>FECHA NACIMIENTO</th>
						<td><?php echo $candidate_detail[0]->fecha_nacimiento ?></td>
					</tr>
					<tr>
						<th>LUGAR NACIMIENTO</th>
						<td><?php echo $candidate_detail[0]->lugar_nacimiento ?></td>
					</tr>
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
					foreach ($candidate_detail as $row_candidate_detail) { 
				?>
					<table class="table table-hover table-striped">
						<tr>
							<th colspan="2">FORMACIÓN <?php echo $i ?></th>
						</tr>
						<tr>
							<th>TIPO FORMACIÓN</th>
							<td><?php echo $row_candidate_detail->tipo_formacion ?></td>
						</tr>
						<tr>
							<th>TITULO OTORGADO</th>
							<td><?php echo $row_candidate_detail->titulo_otorgado ?></td>
						</tr>
						<tr>
							<th>NOMBRE INSTITUCION</th>
							<td><?php echo $row_candidate_detail->nombre_institucion ?> años</td>
						</tr>
						<tr>
							<th>AÑO</th>
							<td><?php echo $row_candidate_detail->año ?></td>
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

<?php $this->stop() ?>