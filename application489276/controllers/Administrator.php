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
		$this->load->view( 'header.php', ['title' => 'Lista de candidatos']  );
		$this->load->view( 'messages.php' );
		$this->load->view( 'administrator/candidates_list_render',
			['candidates_list' => $candidates_list] );
		$this->load->view( 'footer.php' );
	}

	/*
     * Función para visualizar el detalle de la información de un usuario registrado en el sistema
    */

	public function detail($id) 
	{
		$candidate_detail = $this->Administrator_model->getCandidatesDetail($id);
		$candidate_experiencia = $this->Administrator_model->getCandidatesDetailExperience($id);
		$candidate_formacion = $this->Administrator_model->getCandidatesDetailFormacion($id);
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
}
