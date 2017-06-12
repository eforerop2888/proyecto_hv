<?php 

class Niveles_educacion_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }

    public function get_niveles_educacion(){
    	$this->db->order_by('tipo_formacion', 'DESC');
    	$query = $this->db->get('niveles_educacion');
    	return $query->result();
    }
}