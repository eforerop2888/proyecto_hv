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

	    $i=1;

	    while ($i <= $this->migration->current()) {
	    	if ($this->migration->version($i) === FALSE)
	        {
	            show_error($this->migration->error_string());
	        }
	        $i++;
	    }

	    echo "Migración realizada exitosamente";
	}

}
