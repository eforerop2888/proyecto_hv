<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends Base_Controller {

	/*
     * Método contructor
    */
	
	Public function __construct()
	{
		parent::__construct();
		$administrator = $this->load->model('Administrator_model');
	}

	/*
     * Función para renderizar la lista de candidatos registrados en el sistema
    */
	public function candidates_list_render() {
		$this->session_active();
		$candidates_list = $this->Administrator_model->getCandidatesList();
		$this->load->view( 'header.php', ['title' => 'Lista de candidatos']  );
		$this->load->view( 'messages.php' );
		$this->load->view( 'administrator/candidates_list_render',
			['candidates_list' => $candidates_list] );
		$this->load->view( 'footer.php' );
	}

	public function session_active ()
	{
		if($this->session->role != 'admin'){
			$this->session->set_flashdata('danger', 'Acceso no permitido, debe iniciar sesión primero');
			redirect('administracion/ingresar');
		}
	}

	/*
     * Función para visualizar el detalle de la información de un usuario registrado en el sistema
    */
	public function detail($id) 
	{
		$this->session_active();
		$candidate_detail = $this->Administrator_model->getCandidatesDetail($id);
		$candidate_experiencia = $this->Administrator_model->getCandidatesDetailExperience($id);
		$candidate_formacion = $this->Administrator_model->getCandidatesDetailFormacion($id);
		$this->Administrator_model->logSystem( 'Ingreso vista detalle candidato '.$candidate_detail->nombre_completo, $this->session->id, 1);
		$this->load->view( 'header.php' , ['title' => 'Detalle Candidato']  );
		$this->load->view( 'messages.php' );
		$this->load->view( 'administrator/candidate_detail_render',  ['candidate_detail' => $candidate_detail,
		 	'candidate_experiencia' => $candidate_experiencia,
		 	'candidate_formacion' => $candidate_formacion] );
		$this->load->view( 'footer.php' );
	}

	/*
     * Función para renderizar la vista de parametrización de emails
    */
	public function parametrization_mail_render()
	{
		$this->session_active();
		$mail_process = $this->Administrator_model->getMailProcess();
		$this->load->view( 'header.php', ['title' => 'Parametrización Emails']  );
		$this->load->view( 'messages.php' );
		$this->load->view( 'administrator/parametrization_mail_render', ['procesos' => $mail_process] );
		$this->load->view( 'footer.php' );
	}

	/*
     * Función para almacenar la información ingresada en el formulario de parametrización de correos
    */
	public function mail_store()
	{
		$data = $this->input->post();
	  	if ($this->form_validation->run('mail_parametrization_store') == FALSE) {
            return $this->parametrization_mail_render();
        }else{
           	$this->Administrator_model->insertMailParametrization($data);
       		$this->session->set_flashdata('success', 'Configuración guardada exitosamente');
        	redirect('administrator/parametrization_mail_render');
        }
	}

	/*
     * Función que retorna la información de configuraciòn de parametrización de los envios de correos a
     * a través de ajax
    */
	public function getInfoProcess()
	{
		$proceso = $this->input->post('proceso');
		$info_process = $this->Administrator_model->getInfoProcess($proceso);
		echo json_encode($info_process);
	}

	/*
	 * Funciones que componene el loggin del los administradores
	*/

	// Función para renderizar el formulario de loggin de los administradores del sistema
	public function administrator_loggin_render () 
	{
		$this->load->view( 'header.php', ['title' => 'Loggin Administrador']  );
		$this->load->view( 'messages.php' );
		$this->load->view( 'administrator/administrator_loggin_render');
		$this->load->view( 'footer.php' );
	}


	// Función para la validación del formulario administrator_loggin_render()
	public function administrator_validate () 
	{
		if (empty($this->input->post( 'contrasena' ))) {
			$contraseña = $this->input->post( 'contrasena' );
		}else{
			$contraseña = 'contraseña';
		}
		$this->form_validation->set_rules( 'usuario', 'Usuario', 'required|callback_administrator_auth_check['.$this->input->post( 'contrasena' ).']' );
		
		if ( $this->form_validation->run() == FALSE ) {
            return $this->administrator_loggin_render();
        }else{
			/*$id_candidate = $this->Candidates_model->find( $this->input->post( 'numero_documento'), $this->input->post( 'tipo_documento' ) );*/
        	$this->session_administrator( $this->input->post( 'usuario' ) );
			$this->Administrator_model->logSystem( 'Ingreso vista listado candidatos', $this->session->id, 1);
        	redirect( 'administracion/listado' );
        }
	}

	public function session_administrator ($id) {
		$userdata = array(
	        'id'  => $id,
	        'role'=> 'admin'
		);
		$this->session->set_userdata($userdata);
	}

	// Callback validación contra directorio activo
	public function administrator_auth_check ($username, $password) 
	{
		if (empty($username) || empty($password)) {
			$this->form_validation->set_message( 'administrator_auth_check', 'Los accesos ingresados son incorrectos');
			return FALSE;
		}
	    $adServer = "ldap://192.168.0.20/";
	    $ldap = ldap_connect($adServer);
	    $ldaprdn = 'SIMPLE' . "\\" . $username;

	    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
	    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

	    $bind = @ldap_bind($ldap, $ldaprdn, $password);

	    if ($bind) {

	        $filter="(&(objectClass=user)(sAMAccountName=$username)(memberof=CN=GS_TALENTO_HUMANO,OU=Grupos,OU=SIMPLE,DC=SIMPLE,DC=local))";
	        $result = ldap_search($ldap,"dc=SIMPLE,dc=local",$filter);
	        //ldap_sort($ldap,$result,"sn");
	        $info = ldap_get_entries($ldap, $result);
            if($info['count'] != 0){
          		return TRUE;
	        }else{
	        	$this->form_validation->set_message( 'administrator_auth_check', 'Los accesos ingresados son incorrectos');
	        	return FALSE;
	        }
	        @ldap_close($ldap);
	    } else {
	    	$this->form_validation->set_message( 'administrator_auth_check', 'Los accesos ingresados son incorrectos');
	        return FALSE;
	    }
	}
}
