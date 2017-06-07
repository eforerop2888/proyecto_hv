<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidates extends Base_Controller {

	/**
	 *
	 */

	Public function __construct()
	{
		parent::__construct();
	}

	public function candidate_validate_render()
	{
		echo $this->templates->render('candidates/candidate_validate_render');
	}

	public function candidate_register_render()
	{
		$estados_civiles = $this->load->model('Estados_civiles_model');
		$lista_estados_civiles = $this->Estados_civiles_model->get_estados_civiles();
		$tipos_documentos = $this->load->model('Tipos_documentos_model');
		$lista_tipos_documentos = $this->Tipos_documentos_model->get_tipos_documentos();
		echo $this->templates->render('candidates/candidate_register_render', ['estados_civiles' => $lista_estados_civiles,
			'tipos_documentos' => $lista_tipos_documentos]);
	}

	public function candidate_store()
	{
	  	if ($this->form_validation->run('candidate_store') == FALSE) {
            return $this->candidate_register_render();
        }else{
            echo "Retorna a formulario exitoso";
            }
	}

}
