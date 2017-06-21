<?php 

class Administrator_model extends CI_Model {
	
    /*
     * Metodo constructor
    */

	function __construct()
    {
        parent::__construct();
    }

    /*
     * Busqueda en base de datos de los candidatos
    */
    public function getCandidatesList()
    {
    	//$this->db->order_by('title DESC, name ASC');
    	$query = $this->db->get('smp_hv_candidates');
    	return $query->result();
    }

    /*
     * Busqueda de detalle de un candidato en base de datos
    */
    public function getCandidatesDetail($id)
    {
    	$this->db->select('*');
		$this->db->from('smp_hv_candidates');
		$this->db->join('smp_hv_tipos_documentos', 'smp_hv_tipos_documentos.id = smp_hv_candidates.tipo_documento_id');
		$this->db->join('smp_hv_estados_civiles', 'smp_hv_estados_civiles.id = smp_hv_candidates.estado_civil_id');
		/*$this->db->join('smp_hv_formaciones_academicas', 'smp_hv_formaciones_academicas.persona_id = smp_hv_candidates.id');
		$this->db->join('smp_hv_niveles_educacion', 'smp_hv_niveles_educacion.id = smp_hv_formaciones_academicas.nivel_educacion_id');*/
		$this->db->where('smp_hv_candidates.id', $id);
       	$query = $this->db->get();
    	return $query->row();
    }

    /*
     * Busqueda de detalle de la formacion academica del candidato
    */
    public function getCandidatesDetailFormacion($id)
    {
        $this->db->select('*');
        $this->db->from('smp_hv_candidates');
        $this->db->join('smp_hv_formaciones_academicas', 'smp_hv_formaciones_academicas.persona_id = smp_hv_candidates.id');
        $this->db->join('smp_hv_niveles_educacion', 'smp_hv_niveles_educacion.id = smp_hv_formaciones_academicas.nivel_educacion_id');
        $this->db->where('smp_hv_candidates.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * Busqueda de detalle de la experiencia de un candidato en base de datos
    */
    public function getCandidatesDetailExperience($id)
    {
    	$this->db->select('*');
		$this->db->from('smp_hv_candidates');
		$this->db->join('smp_hv_experiencias_laborales', 'smp_hv_experiencias_laborales.persona_id = smp_hv_candidates.id');
		$this->db->where('smp_hv_candidates.id', $id);
       	$query = $this->db->get();
    	return $query->result();
    }

    /*
     * Busqueda de detalle la configuraciòn de la parametrización para envio de correos electronicos
    */
    public function getMailProcess()
    {
        $this->db->order_by('proceso DESC');
        $query = $this->db->get('smp_hv_procesos_correos');
        return $query->result();
    }

    /*
     * Función para la inserción de la parametrización para envio de correos electronicos
    */
    public function insertMailParametrization($data)
    {

        $datos = array(
            'protocolo' => $data['protocolo'],
            'host' => $data['host'],
            'puerto' => $data['puerto'],
            'correo_remitente' => $data['correo_remitente'],
            'nombre_remitente' => $data['nombre_remitente'],
            'correo_receptor' => $data['correo_receptor'],
            'copia_receptor' => $data['copia_receptor'],
            'asunto' => $data['asunto'],
            'proceso_correo_id' => $data['proceso'],
            'fecha_actualizacion' => date('Y-m-d')
        );

        $this->db->select('proceso_correo_id');
        $this->db->from('smp_hv_correos_parametrizacion');
        $this->db->where('proceso_correo_id', $data['proceso']);
        $query = $this->db->get();

        
        if ($query->row()) {
            $this->db->set($datos);
            $this->db->where('proceso_correo_id', $data['proceso']);
            $this->db->update('smp_hv_correos_parametrizacion');
        }else{
            $datos['fecha_creacion'] = date('Y-m-d');
            $this->db->insert('smp_hv_correos_parametrizacion', $datos);
        }
    }

    /*
     * Funciónes para obtener de base de datos el proceso y la configuraciòn almacenada de la configuración de la parametrización
    */
    public function getConfigurationMail($proceso)
    {
        //$this->db->order_by('proceso DESC');
        $query = $this->db->get('smp_hv_correos_parametrizacion');
        return $query->row();
    }

    public function getInfoProcess($proceso)
    {
        $this->db->where('proceso_correo_id', $proceso);
        $query = $this->db->get('smp_hv_correos_parametrizacion');
        return $query->row();
    }

    /*
     * Funcion para el almacenamiento de log sistema
    */
    public function logSystem($modulo, $usuario_id, $log_proceso_id) {
        $datos = array(
            'modulo' => $modulo,
            'usuario_id' => $usuario_id,
            'log_proceso_id' => $log_proceso_id,
            'fecha' => date( 'Y-m-d' )
        );
        $this->db->insert( 'smp_hv_log_auditoria', $datos );
    }
}