<?php 
/*
 * Modelo para solicitudes a base de datos de las tablas que conforman el modulo de candidatos
*/
class Candidates_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }

    // Función para la inserción de los campos formulario de registro en base de datos
    public function insert ( $data, $contrasena, $file = NULL )
    {

    	// Insercion a tabla de candidatos
		$datos = array(
			'nombre_completo' => $data['nombre_candidato'],
			'edad' => $data['edad'],
			'tipo_documento_id' => $data['tipo_documento'],
			'numero_documento' => $data['numero_documento'],
			'correo_electronico' => $data['correo_electronico'],
			'telefono' => $data['telefono'],
			'direccion_residencia' => $data['direccion_residencia'],
			'estado_civil_id' => $data['estado_civil'],
			'fecha_nacimiento' => $data['fecha_nacimiento'],
			'lugar_nacimiento' => $data['lugar_nacimiento'],
			'declaracion_privacidad' => $data['declaracion_privacidad'],
			'password' => $contrasena,
			'file' => $file,
			'fecha_creacion' => date( 'Y-m-d' ),
			'fecha_actualizacion' => date( 'Y-m-d' )
		);
		$this->db->insert( 'smp_hv_candidates', $datos );
		$insert_id = $this->db->insert_id();

		// Inserción a tabla de formaciones_academicas
		if ( isset ( $data['titulo_otorgado'] ) ) {
			for ( $i=0; $i < count( $data['titulo_otorgado'] ); $i++ ) { 	
				$data_titulos = array(
		        	'titulo_otorgado' => $data['titulo_otorgado'][$i],
		        	'nombre_institucion' => $data['institucion'][$i],
		        	'año' => $data['ano_titulo'][$i],
		        	'nivel_educacion_id' => $data['niveles_educacion'][$i],
		        	'persona_id' => $insert_id,
		        	'fecha_creacion' => date('Y-m-d'),
	        		'fecha_actualizacion' => date('Y-m-d')
				);
				$this->db->insert('smp_hv_formaciones_academicas', $data_titulos);
			}
		}

		// Inserción a tabla de experiencias_laborales
		if( isset( $data['empresa'] ) ){
			for ( $j=0; $j < count( $data['empresa'] ); $j++ ) { 	
				$data_laboral = array(
		        	'cargo' => $data['cargo'][$j],
		        	'empresa' => $data['empresa'][$j],
		        	'salario_basico' => $data['salario_basico'][$j],
		        	'beneficios' => $data['beneficios'][$j],
		        	'fecha_ingreso' => $data['fecha_ingreso'][$j],
		        	'fecha_retiro' => $data['fecha_retiro'][$j],
		        	'persona_id' => $insert_id,
		        	'fecha_creacion' => date( 'Y-m-d' ),
	        		'fecha_actualizacion' => date( 'Y-m-d' )
				);
				$this->db->insert( 'smp_hv_experiencias_laborales', $data_laboral );
			}
		}
    }

    // Función para la busqueda de los datos de un candidado por el tipo y número de documento
    public function find ( $numero_documento, $tipo_documento )
    {
    	$this->db->select( '*' );
		$this->db->from( 'candidates' );
		$this->db->where( 'numero_documento', $numero_documento );
		$this->db->where( 'tipo_documento_id', $tipo_documento );
		$query = $this->db->get();
		return $query->row();
    }
    
    // Función para la busqueda de la contraseña de un candidato
    public function findPassword ( $numero_documento )
    {
    	$this->db->select( 'password' );
		$this->db->from( 'smp_hv_candidates' );
		$this->db->where( 'numero_documento', $numero_documento );
		$query = $this->db->get();
		return $query->row();
    }

    // Función para la creación en BD solicitud cambio de contraseña
    public function changePasswordStorage ( $usuario_id ) 
    {
    	$this->queryContrasena ($usuario_id);
    	$token = random_string( 'alnum', 5 );
    	$datos = array(
	        'usuario_id' => $usuario_id,
	        'token' => $token,
		);
		$this->db->insert( 'smp_hv_cambio_contrasena', $datos );
		return $token; 
    }

    // Función busqueda en base de datos de token y id usuario 
    public function findToken ( $token, $usuario_id ) 
    {
    	$this->db->select( 'token' );
    	$this->db->from( 'smp_hv_cambio_contrasena' );
    	$this->db->where( 'usuario_id', $usuario_id );
    	$this->db->where( 'token', $token );
    	$this->db->where( 'estado', 0 );
    	$query = $this->db->get();
    	return $query->row();
    }

    // Funcion para update de contraseña del usuario
    public function updatePassword ( $usuario_id, $contrasena )
    {
    	// Cambio de contraseña
    	$data = array(
    		'password' => $contrasena
    		);
    	$this->db->where( 'id', $usuario_id );
		$this->db->update( 'smp_hv_candidates', $data );
		// Cambio estado estado petición cambio de contraseña
		$this->queryContrasena ($usuario_id);
    }

    // Funcion ejecución cambio de contraseña
    public function queryContrasena ($usuario_id) {
    	$update = array(
    		'estado' => 1
    		);
    	$this->db->where( 'usuario_id', $usuario_id );
		$this->db->update( 'smp_hv_cambio_contrasena', $update );
    }
}