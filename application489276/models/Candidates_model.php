<?php 

class Candidates_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }

    public function insert($data, $contrasena) {

		$data = array(
	        'nombre_completo' => $data['nombre_candidato'],
	        'edad' => $data['edad'],
	        'numero_documento' => $data['numero_documento'],
	        'correo_electronico' => $data['correo_electronico'],
	        'telefono' => $data['telefono'],
	        'direccion_residencia' => $data['direccion_residencia'],
	        'fecha_nacimiento' => $data['fecha_nacimiento'],
	        'lugar_nacimiento' => $data['lugar_nacimiento'],
	        'password' => $contrasena
		);
		$this->db->insert('smp_hv_candidates', $data);
		$insert_id = $this->db->insert_id();
		foreach ($data['niveles_educacion'] as $rowData) {
			$data = array(
	        	'titulo_otorgado' => $rowData->titulo_otorgado,
	        	'nombre_institucion' => $rowData->institucion,
	        	'año' => $rowData->ano_titulo,
	        	'persona_id' => $insert_id,
			);
			$this->db->insert('smp_hv_formaciones_academicas', $data);
		}
		//$this->session->set_flashdata('success', 'Usuario creado exitosamente, podras acceder a tu información y editarla si lo deseas');
		redirect('candidatos/loggin');
    }

    public function find($numero_documento) {
    	$this->db->select('numero_documento');
		$this->db->from('candidates');
		$this->db->where('numero_documento', $numero_documento);
		$query = $this->db->get();
		return $query->row();
    }

    public function findPassword($numero_documento) {
    	$this->db->select('password');
		$this->db->from('candidates');
		$this->db->where('numero_documento', $numero_documento);
		$query = $this->db->get();
		return $query->row();
    }
}