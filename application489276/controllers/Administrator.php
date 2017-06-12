<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends Base_Controller {
	
	Public function __construct()
		{
			parent::__construct();
		}

	public function candidates_list_render() {
		$candidates = $this->load->model('Administrator_model');
		$candidates_list = $this->Administrator_model->getCandidatesList();
		echo $this->templates->render('administrator/candidates_list_render',  ['candidates_list' => $candidates_list]);
	}
}
