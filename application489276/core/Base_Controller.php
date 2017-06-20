<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller {

	public $templates;

	public function __construct()
	{
		Parent::__construct();
		$this->load->helper('html');
		$this->load->helper('url');
		//$this->templates = new League\Plates\Engine(APPPATH . "/views");
	}

}
