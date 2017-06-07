<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrations extends Base_Controller {

	/**
	 *
	 */

	Public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	    $this->load->library('migration');

	    for ($i=1; $i < 16; $i++) { 
	        if ($this->migration->version($i) === FALSE)
	        {
	            show_error($this->migration->error_string());
	        }
	    }

	}

}
