<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends OL_Controller {

    public function __construct () {
        parent::__construct();

        $this->data['no_breadcrumb'] = true;
    }

    public function index() {
        //redirect(base_url() . 'teacherdashboard/', 'refresh');

        // Retrieving vars
        $data = $this->data;
        $data['no_breadcrumb'] = true;

        $data['pageTitle'] = 'Listado completo de usuarios';

        $data['users'] = $this->Musers->getAllUsersData();

        $this->load->view('template-all-users-table', $data);
    }

    public function group($groupId) {
        // Retrieving vars
        $data = $this->data;

        if (empty($groupId)) {
            redirect(base_url() . 'teacherdashboard/', 'refresh');
        }

        $data['no_breadcrumb'] = true;

        $groupDetails = $this->Msubjects->getGroupById($groupId);
        $data['pageTitle'] = 'Listado completo de alumnos en el ' . $groupDetails->name;
        $data['silentResume'] = true;
        $data['groupId'] = $groupId;
        $data['users'] = $this->Musers->getAllUsersDataByGroupId($groupId);

        $this->load->view('template-all-users-table', $data);
    }

    public function id($userId) {
        $urlData = $this->uri->uri_to_assoc(2);

        // Retrieving vars
        $data = $this->data;
        $data['no_breadcrumb'] = true;
        $data['role'] = $this->session->userdata('role');

        if (empty($userId)) {
            redirect(base_url() . 'teacherdashboard/', 'refresh');
        }

        if (isset($urlData['group'])) {
            $data['groupId'] = $urlData['group'];
            $data['userDetails']= $this->Musers->getAllUserDataByIdAndGroupId($userId, $urlData['group']);

            $data['lastAttempts'] = $this->Mproblems->getLastProblemsAttemptsByUserIdAndGroupId($userId, $urlData['group']);
            $data['problemsRanking'] = $this->Mproblems->getProblemsRankingByUserIdAndGroupId($userId, $urlData['group']);
            $data['problemsSubmitted'] = $this->Mproblems->getProblemsSubmittedByUserIdAndGroupId($userId, $urlData['group']);
            //$data['programmingLanguages'] = $this->Mproblems->getChartLanguagesByUserIdAndGroupId($userId, $urlData['group']);
            $data['submissionErrors'] = $this->Mproblems->getChartErrorsByUserIdAndGroupId($userId, $urlData['group']);
            $data['submissionChartTable'] = $this->Mproblems->getChartSubmissionsByUserIdAndGroupId($userId, $urlData['group']);
            $totalSubmissionsByMonthAndUserId = $this->Mproblems->getTotalSubmissionsByMonthAndGroupId($userId, $urlData['group']);
            $totalAcceptedByMonthAndUserId = $this->Mproblems->getTotalAcceptedByMonthAndGroupId($userId, $urlData['group']);
            $data['submissionMonths'] = array_column($totalSubmissionsByMonthAndUserId, 'month');
        } else {
            $data['groupId'] = false;
            $this->session->set_userdata('role', 'admin');
            $data['userDetails']= $this->Musers->getAllUserDataById($userId);

            $data['lastAttempts'] = $this->Mproblems->getLastProblemsAttemptsByUserId($userId);
            $data['problemsRanking'] = $this->Mproblems->getProblemsRankingByUserId($userId);
            $data['problemsSubmitted'] = $this->Mproblems->getProblemsSubmittedByUserId($userId);
            $data['programmingLanguages'] = $this->Mproblems->getChartLanguagesByUserId($userId);
            $data['submissionErrors'] = $this->Mproblems->getChartErrorsByUserId($userId);
            $data['submissionChartTable'] = $this->Mproblems->getChartSubmissionsByUserId($userId);
            $totalSubmissionsByMonthAndUserId = $this->Mproblems->getTotalSubmissionsInLastYearByUserId($userId);
            $totalAcceptedByMonthAndUserId = $this->Mproblems->getTotalAcceptedInLastYearByUserId($userId);
            $data['submissionMonths'] = array_column($totalSubmissionsByMonthAndUserId, 'month');
        }

        if (empty($data['userDetails'])) {
            redirect(base_url() . 'teacherdashboard/', 'refresh');
        }

        if (isset($urlData['group'])) {
            $data['pageTitle'] = 'Detalle del alumno ';
        } else {
            $data['pageTitle'] = 'Detalle del usuario ';
        }

        $data['userName'] = $this->_getUserName($data['userDetails']);

        $data['totalSubmissionsByMonthAndUserId'] = implode(', ', array_map(function ($month) {
            return $month['total_submissions'];
        }, $totalSubmissionsByMonthAndUserId));

        $data['totalAcceptedByMonthAndUserId'] = implode(', ', array_map(function ($month) {
            return $month->total_submissions;
        }, $totalAcceptedByMonthAndUserId));

        //$data['notSubmissions'] = $this->notSubmissions($totalSubmissionsByMonthAndUserId);

        $this->load->view('template-user-details', $data);
    }

    public function submissions($id = null) {
        redirect(base_url() . 'teacherdashboard/', 'refresh');
    }

    /*public function notSubmissions($submissionChart){
        $data = array_column($submissionChart, 'total_submissions');

        return empty(array_filter($data));
    }*/

    private function _getUserName($user) {
        if (empty($user->first_name)) {
            return 'Nombre desconocido...';
        }

        return $user->first_name . ' ' . $user->last_name;
    }

    public function problem($problems){
        $data['problems'] = $problems;
    }
}
