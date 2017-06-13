<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends Base_Controller {
	
	Public function __construct()
		{
			parent::__construct();
			$administrator = $this->load->model('Administrator_model');
		}

	public function candidates_list_render() {
		$candidates_list = $this->Administrator_model->getCandidatesList();
		echo $this->templates->render('administrator/candidates_list_render',  ['candidates_list' => $candidates_list]);
	}

	public function detail($id) {
		$candidate_detail = $this->Administrator_model->getCandidatesDetail($id);
		$candidate_experiencia = $this->Administrator_model->getCandidatesDetailExperience($id);
		echo $this->templates->render('administrator/candidate_detail_render',  ['candidate_detail' => $candidate_detail,
		 	'candidate_experiencia' => $candidate_experiencia]);
	}

	public function parametrization_mail_render()
	{
		$mail_process = $this->Administrator_model->getMailProcess();
		echo $this->templates->render('administrator/parametrization_mail_render', ['procesos' => $mail_process]);
	}

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

	public function getInfoProcess()
	{
		$proceso = $this->input->post('proceso');
		$info_process = $this->Administrator_model->getInfoProcess($proceso);
		echo json_encode($info_process);
	}
}
