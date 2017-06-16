<?php 

class Log_model extends CI_Model {
	
    /*
     * Metodo constructor
    */

	function __construct()
    {
        parent::__construct();
    }

    /*
     * Funcion para almacenamiento en log de auditoria
    */

    public function LogAuditoria($modulo, $log_proceso_id)
    {
        $datos = array(
            'modulo' => $modulo,
            'usuario_id' => 1,
            'log_proceso_id' => $log_proceso_id,
            'fecha' => date('Y-m-d')
        );
        $this->db->insert('smp_hv_candidates', $datos);
    }
    
}