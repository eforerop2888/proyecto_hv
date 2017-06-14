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
		$candidates_list = $this->Administrator_model->getCandidatesList();
		echo $this->templates->render('administrator/candidates_list_render',  ['candidates_list' => $candidates_list]);
	}

	/*
     * Función para visualizar el detalle de la información de un usuario registrado en el sistema
    */
	public function detail($id) {
		$candidate_detail = $this->Administrator_model->getCandidatesDetail($id);
		$candidate_experiencia = $this->Administrator_model->getCandidatesDetailExperience($id);
		echo $this->templates->render('administrator/candidate_detail_render',  ['candidate_detail' => $candidate_detail,
		 	'candidate_experiencia' => $candidate_experiencia]);
	}

	/*
     * Función para renderizar la vista de parametrización de emails
    */
	public function parametrization_mail_render()
	{
		$mail_process = $this->Administrator_model->getMailProcess();
		echo $this->templates->render('administrator/parametrization_mail_render', ['procesos' => $mail_process]);
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
        	redirect('administrator/parametrization_mail_render');
        }
	}

	/*
     * Función que retorna la información de configuraciòn de parametrización de los envios de correos a través de ajax
    */
	public function getInfoProcess()
	{
		$proceso = $this->input->post('proceso');
		$info_process = $this->Administrator_model->getInfoProcess($proceso);
		echo json_encode($info_process);
	}
}
