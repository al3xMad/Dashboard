<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends OL_Controller {

	public function __construct () {
		parent::__construct();
	}

	public function index() {
		// Retrieving vars
		$data = $this->data;
        $data['no_breadcrumb'] = true;

//        $data['categories'] = $this->Mcategories->getAllCategories();
//        $data['pageTitle'] = 'Categorías';

		$this->load->view('template-select-role', $data);
	}
}
