<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends OL_Controller {

	public function __construct () {
		parent::__construct();

        $subjectId = $this->input->post('subject');
        $groupId = $this->input->post('group');
        if (
            isset($subjectId) &&
            isset($groupId)
        ) {
            $this->session->set_userdata('subjectId', $subjectId);
            $this->session->set_userdata('groupId', $groupId);

            redirect(base_url() . 'teacherdashboard/', 'refresh');
        }
	}

	public function index() {
		// Retrieving vars
		$data = $this->data;
        $data['no_breadcrumb'] = true;

        $data['pageTitle'] = 'Selección de grupo:';
        $data['subjects'] = $this->Msubjects->getAllSubjects();
        $data['groups'] = $this->Msubjects->getAllGroups();

		$this->load->view('template-teacher-selection', $data);
	}
}
