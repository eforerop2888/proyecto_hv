<?php 

class Ajax_pagination_model extends CI_Model 
{
	public function count_all()
	{
		$query = $this->db->get('smp_hv_candidates');
		return $query->num_rows();
	}

	public function fetch_details($limit, $start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->from('smp_hv_candidates');
		$this->db->order_by('fecha_creacion', 'ASC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '<table class="table table-hover table-striped">
						<tr>
							<th>#</th>
							<th>Nombre Candidato</th>
							<th>Documento</th>
							<th>Correo electronico</th>
							<th>Teléfono</th>
							<th colspan="2">Dirección</th>
						</tr>';
		$i = $start + 1;
		foreach ($query->result() as $row) {
			$output .='
			<tr>
				<td>'.$i.'</td>
				<td>'.$row->nombre_completo.'</td>
				<td>'.$row->numero_documento.'</td>
				<td>'.$row->correo_electronico.'</td>
				<td>'.$row->telefono.'</td>
				<td>'.$row->direccion_residencia.'</td>
				<td>
					<a href="'.site_url('administracion/detalle/'.$row->id).'">
						<i class="fa fa-eye" aria-hidden="true"></i>
					</a>
				</td>
			</tr>
			';
		$i++;
		}
		$output .= '</table>';
		return $output;

	}
}