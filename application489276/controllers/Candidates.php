<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidates extends Base_Controller {

	Public function __construct()
	{
		parent::__construct();
		$tipos_documentos = $this->load->model('Tipos_documentos_model');
	}

	/*
	* CRUD LOGGIN DE USUARIOS
	*/

	// Render landing page
	public function candidate_loggin_render()
	{
		$tipos_documentos = $this->load->model('Tipos_documentos_model');
		$lista_tipos_documentos = $this->Tipos_documentos_model->get_tipos_documentos();
		echo $this->templates->render('candidates/candidate_loggin_render', ['tipos_documentos' => $lista_tipos_documentos]);
	}

	// Función para validar campos del loggin
	public function candidate_validate()
	{
		$this->form_validation->set_rules('numero_documento', 'Numero Documento', 'callback_documento_user_check['.$this->input->post('tipo_documento').']');
		$this->form_validation->set_rules('contrasena', 'Contraseña', 'callback_password_user_check['.$this->input->post('numero_documento').']');
		if ($this->form_validation->run() == FALSE) {
            return $this->candidate_loggin_render();
        }else{
        	return $this->candidate_register_render();
        }
	}
	// validate document user check
	public function documento_user_check($documento_form, $tipo_documento)
	{
		$this->load->model('Candidates_model');
		$numero_documento = $this->Candidates_model->find($documento_form, $tipo_documento);

		if (!empty($numero_documento)) {
			return TRUE;
		}else {
			$this->form_validation->set_message('documento_user_check', 'El usuario no se encuentra creado en la base de datos');
	    	return FALSE;
		}
	}		

	// validate document password check
	public function password_user_check($password_form, $numero_documento_form)
	{
		$this->load->model('Candidates_model');
		$password = $this->Candidates_model->findPassword($numero_documento_form);

		if ($password) {
			if ($this->bcrypt->check_password($password_form, $password->password))
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('password_user_check', 'El password ingresado es incorrecto');
				return FALSE;
			}
		}
	}

	/*
	* CRUD REGISTRO DE USUARIOS
	*/

	// Render formulario de validacion de usuario
	public function candidate_form_validation_render()
	{
		$lista_tipos_documentos = $this->Tipos_documentos_model->get_tipos_documentos();
		echo $this->templates->render('candidates/candidate_form_validation_render', ['tipos_documentos' => $lista_tipos_documentos]);
	}

	public function document_validate()
	{
		$this->form_validation->set_rules('numero_documento', 'Numero Documento', 'callback_documento_user_index_check['.$this->input->post('tipo_documento').']');

		if ($this->form_validation->run() == FALSE) {
            return $this->candidate_loggin_render();
        }else{
        	return $this->candidate_register_render();
        }
	}

	// validate document user index check
	public function documento_user_index_check($documento_form, $tipo_documento)
	{
		$this->load->model('Candidates_model');
		$numero_documento = $this->Candidates_model->find($documento_form, $tipo_documento);

		if (empty($numero_documento)) {
			return TRUE;
		}else {
			$this->form_validation->set_message('documento_user_index_check', 'El usuario ya se encuentra creado en nuestro sistema, por favor ingrese con sus datos');
	    	return FALSE;
		}
	}		

	// Función render registro de usuario
	public function candidate_register_render()
	{
		$estados_civiles = $this->load->model('Estados_civiles_model');
		$lista_estados_civiles = $this->Estados_civiles_model->get_estados_civiles();
		$lista_tipos_documentos = $this->Tipos_documentos_model->get_tipos_documentos();
		$niveles_educacion = $this->load->model('niveles_educacion_model');
		$lista_niveles_educacion = $this->niveles_educacion_model->get_niveles_educacion();
		echo $this->templates->render('candidates/candidate_register_render', ['estados_civiles' => $lista_estados_civiles,
			'tipos_documentos' => $lista_tipos_documentos,
			'niveles_educacion' => $lista_niveles_educacion]);
	}

	// Función almacenamiento de información de candidatos a base de datos, con validaciones
	public function candidate_store()
	{
		$data = $this->input->post();
	  	if ($this->form_validation->run('candidate_store') == FALSE) {
            $mensaje = array (
            		'nombre_candidato' => form_error('nombre_candidato'),
            		'edad' => form_error('edad'),
            		'tipo_documento' => form_error('tipo_documento'),
            		'numero_documento' => form_error('numero_documento'),
            		'correo_electronico' => form_error('correo_electronico'),
            		'telefono' => form_error('telefono'),
            		'direccion_residencia' => form_error('direccion_residencia'),
            		'fecha_nacimiento' => form_error('fecha_nacimiento'),
            		'estado_civil' => form_error('estado_civil'),
            		'lugar_nacimiento' => form_error('lugar_nacimiento'),
            		'contrasena' => form_error('contrasena'),
            		'confirmar_contrasena' => form_error('confirmar_contrasena'),
            		'declaracion_privacidad' => form_error('declaracion_privacidad'),
            		'niveles_educacion' => form_error('niveles_educacion[]'),
            	);
            
        }else{
        	$contrasena = $this->input->post('constrasena');
    		$hash = $this->bcrypt->hash_password($contrasena);
        	$candidates = $this->load->model('Candidates_model');
        	$this->Candidates_model->insert($data, $hash);
        	$mensaje = array (
        		'estado' => 1,
        	);
        	//$this->emailCandidate($data);
        	//$this->session->set_flashdata('success', 'Usuario creado exitosamente, podras acceder a tu información y editarla si lo deseas');
        	//redirect('candidatos/loggin');
        }
        echo json_encode($mensaje);
	}

	// Función render actualizar candidato
	public function candidate_register_render_update()
	{
		$estados_civiles = $this->load->model('Estados_civiles_model');
		$lista_estados_civiles = $this->Estados_civiles_model->get_estados_civiles();
		$lista_tipos_documentos = $this->Tipos_documentos_model->get_tipos_documentos();
		$niveles_educacion = $this->load->model('niveles_educacion_model');
		$lista_niveles_educacion = $this->niveles_educacion_model->get_niveles_educacion();
		echo $this->templates->render('candidates/candidate_register_render_update', ['estados_civiles' => $lista_estados_civiles,
			'tipos_documentos' => $lista_tipos_documentos,
			'niveles_educacion' => $lista_niveles_educacion]);
	}

	/*
	 * Función para renderizar recuperación de contraseña
	*/

	public function candidate_recover_password() 
	{
		$lista_tipos_documentos = $this->Tipos_documentos_model->get_tipos_documentos();
		echo $this->templates->render('candidates/candidate_recover_password', ['tipos_documentos' => $lista_tipos_documentos]);	
	}

	public function send_mail_recover()
	{
		$this->form_validation->set_rules('numero_documento', 'Numero Documento', 'callback_documento_user_check['.$this->input->post('tipo_documento').']');

		if ($this->form_validation->run() == FALSE) {
            return $this->candidate_recover_password();
        }else{
        	echo "Enviar Email";
        }
	}

	/*
	 * Función para el envio de correos electronicos
	*/
	public function emailCandidate($candidate) {

		$this->load->model('Administrator_model');
		$parametrizacion = $this->Administrator_model->getInfoProcess(1);
		
		//cargamos la configuración para enviar con gmail
		$config = array(
			'useragent' => "CodeIgniter",
			'protocol' => $parametrizacion['protocolo'],
			'smtp_host' => $parametrizacion['host'],
			'smtp_port' => $parametrizacion['puerto'],
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);    
 
		$this->email->initialize($config);
		$this->email->from($parametrizacion['correo_remitente'], $parametrizacion['nombre_remitente']);
		$this->email->to($parametrizacion['correo_receptor']);
		$this->email->cc($parametrizacion['copia_receptor']);
		//$this->email->bcc('them@their-example.com');
		$this->email->subject($parametrizacion['asunto']);
		$this->email->message('Hoja de vida con los siguientes datos recibidos');
		$this->email->send();
		//var_dump($this->email->print_debugger());
	}		
}
