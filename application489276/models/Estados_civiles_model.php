<?php 

class Estados_civiles_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }

    public function get_estados_civiles(){
    	$this->db->order_by('estado_civil', 'DESC');
    	$query = $this->db->get('estados_civiles');
    	return $query->result();
    }
}