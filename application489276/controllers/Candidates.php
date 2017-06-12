<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidates extends Base_Controller {

	Public function __construct()
	{
		parent::__construct();
	}

	/*
	* CRUD REGISTRO DE USUARIOS
	*/

	// Render formulario registro de usuarios
	public function candidate_register_render()
	{
		$estados_civiles = $this->load->model('Estados_civiles_model');
		$lista_estados_civiles = $this->Estados_civiles_model->get_estados_civiles();
		$tipos_documentos = $this->load->model('Tipos_documentos_model');
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
            return $this->candidate_register_render();
        }else{
        	$contrasena = $this->input->post('constrasena');
    		$hash = $this->bcrypt->hash_password($contrasena);

        	$data = $this->input->post();
        	$candidates = $this->load->model('Candidates_model');
        	$this->Candidates_model->insert($data, $hash);
        	//$this->emailCandidate($data);
        	//$this->session->set_flashdata('success', 'Usuario creado exitosamente, podras acceder a tu información y editarla si lo deseas');
        	//redirect('candidatos/loggin');
        }
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

	public function candidate_validate()
	{
		$this->form_validation->set_rules('numero_documento', 'Numero Documento', 'callback_documento_user_check');
		$this->form_validation->set_rules('contrasena', 'Contraseña', 'callback_password_user_check['.$this->input->post('numero_documento').']');
		if ($this->form_validation->run() == FALSE) {
            return $this->candidate_loggin_render();
        }else{
        	return $this->candidate_register_render();
        }
	}

	public function documento_user_check($documento_form)
	{
		$this->load->model('Candidates_model');
		$numero_documento = $this->Candidates_model->find($documento_form);

		if (!empty($numero_documento)) {
			return TRUE;
		}else {
			$this->form_validation->set_message('documento_user_check', 'El usuario no se encuentra creado en la base de datos');
	    	return FALSE;
		}
	}		
	public function password_user_check($password_form, $numero_documento_form)
	{
		$numero_documento = $numero_documento_form;
		$this->load->model('Candidates_model');
		$password = $this->Candidates_model->findPassword($numero_documento);

		if (!empty($password)) {
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

	public function emailCandidate($candidate) {
		$config = array(
			'useragent' => "CodeIgniter",
			'protocol' => 'smtp',
			'smtp_host' => 'localhost',
			'smtp_port' => 25,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);    
 
		//cargamos la configuración para enviar con gmail
		$this->email->initialize($config);
		$this->email->from('eafp.91@gmail.com', 'Administración Hojas de Vida');
		$this->email->to('eafp.91@gmail.com');
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');
		$this->email->subject('Nueva hoja de vida recibida');
		$this->email->message('Hoja de vida con los siguientes datos recibidos');
		$this->email->send();
		var_dump($this->email->print_debugger());
	}		
}
