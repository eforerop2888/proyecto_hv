<!-- 
 *Vista hojas de vida registradas
-->

<?php $this->layout('template', ['title' => 'Crear hoja vida']) ?>

<?php $this->start("contenido") ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			HOJAS DE VIDA REGISTRADAS
		</div>
		<div class="panel-body">
			<table class="table table-hover">
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

<?php $this->stop() ?>