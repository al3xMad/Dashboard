<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends OL_Controller {
	public function __construct () {
		parent::__construct();
	}

	public function index() {
        if (isset($this->session->userdata['user_name'])) {
            redirect(base_url(), 'refresh');
        }

	    $data = [];

		$data['no_header'] = true;
		$data['no_breadcrumb'] = true;
		$data['no_footer'] = true;
		$data['page_simple'] = true;

		$this->load->view('login', $data);
	}

    public function logout() {
        $this->session->sess_destroy();

        redirect(base_url() . 'login', 'refresh');
    }
}
