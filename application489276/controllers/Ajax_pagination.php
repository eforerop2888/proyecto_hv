<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_pagination extends Base_Controller {

	/*
     * Método contructor
    */

    public function index() 
    {
    	$this->load->view( 'header.php' );
		$this->load->view( 'messages.php' );
    	$this->load->view( 'administrator/candidates_list_render' );
    	$this->load->view( 'footer.php' );
    }

    public function pagination()
    {
    	$this->load->model('ajax_pagination_model');
    	$config = array(
    		'base_url' => '#',
    		'total_rows' => $this->ajax_pagination_model->count_all(),
    		'per_page' => 4,
    		'uri_segments' => 3,
    		'use_page_numbers' => TRUE,
    		'full_tag_open' => '<ul class="pagination">',
    		'full_tag_close' => '</ul>',
    		'first_tag_open' => '<li>',
    		'first_tag_close' => '</li>',
    		'last_tag_open' => '<li>',
    		'last_tag_close' => '</li>',
    		'next_link' => '&gt;',
    		'next_tag_open' => '<li>',
    		'next_tag_close' => '</li>',
    		'prev_link' => '&lt;',
    		'prev_tag_open' => '<li>',
    		'prev_tag_close' => '</li>',
    		'cur_tag_open' => '<li class="active"><a href="#">',
    		'cur_tag_close' => '</a></li>',
    		'num_tag_open' => '<li>',
    		'num_tag_close' => '</li>',
    		'num_links' => 1
    		);
    	$this->pagination->initialize($config);
    	$page = $this->uri->segment(3);
    	$start = ($page - 1) * $config["per_page"];
    	$output = array(
    		'pagination_link' => $this->pagination->create_links(),
    		'candidates_table' => $this->ajax_pagination_model->fetch_details($config['per_page'], $start)
    	);
    	echo json_encode($output);
    }

}