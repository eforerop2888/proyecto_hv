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
		echo $this->templates->render('candidates/candidate_register_render', ['estados_civiles' => $lista_estados_civiles,
			'tipos_documentos' => $lista_tipos_documentos]);
	}

	// Función almacenamiento de información de candidatos a base de datos, con validaciones
	public function candidate_store()
	{
	  	if ($this->form_validation->run('candidate_store') == FALSE) {
            return $this->candidate_register_render();
        }else{
        	$contrasena = $this->input->post('constrasena');
    		$hash = $this->bcrypt->hash_password($contrasena);

        	$data = $this->input->post();
        	$candidates = $this->load->model('Candidates_model');
        	$this->Candidates_model->insert($data, $hash);
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
		if ($documento_form != $numero_documento[0]->numero_documento)
	    {
            $this->form_validation->set_message('documento_user_check', 'El usuario no se encuentra creado en la base de datos');
            return FALSE;
	    }
	    else
	    {
	        return TRUE;	
	    }
	}		
}
