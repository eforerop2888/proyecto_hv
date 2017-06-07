<?php 

class Tipos_documentos_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }

    public function get_tipos_documentos(){
    	$this->db->order_by('tipo_documento', 'DESC');
    	$query = $this->db->get('tipos_documentos');
    	return $query->result();
    }
}