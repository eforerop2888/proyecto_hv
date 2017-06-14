<!-- 
 *Vista hojas de vida registradas
-->

<?php $this->layout('template', ['title' => 'Crear hoja vida']) ?>

<?php $this->start("contenido") ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<i class="fa fa-list-alt" aria-hidden="true"></i> HOJAS DE VIDA REGISTRADAS
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<tr>
						<th>#</th>
						<th>Nombre Candidato</th>
						<th>Documento</th>
						<th>Correo electronico</th>
						<th>Teléfono</th>
						<th colspan="2">Dirección</th>
					</tr>
					<?php 
						$i = 1;
						foreach ($candidates_list as $row_candidates_list) {	
						$parameters = array('administracion','detalle', $row_candidates_list->id)					
					?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row_candidates_list->nombre_completo; ?></td>
							<td><?php echo $row_candidates_list->numero_documento; ?></td>
							<td><?php echo $row_candidates_list->correo_electronico; ?></td>
							<td><?php echo $row_candidates_list->telefono; ?></td>
							<td><?php echo $row_candidates_list->direccion_residencia; ?></td>
							<td>
								<a href="<?php echo site_url($parameters)?>">
									<i class="fa fa-eye" aria-hidden="true"></i>
								</a>
							</td>
						</tr>
					<?php
							$i++; 
						}
					?>
				</table>
			</div>
		</div>
	</div>

<?php $this->stop() ?>