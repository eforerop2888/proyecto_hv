<?php 

class Administrator_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }

    public function getCandidatesList()
    {
    	//$this->db->order_by('title DESC, name ASC');
    	$query = $this->db->get('smp_hv_candidates');
    	return $query->result();
    }
}