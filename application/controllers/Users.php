<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends OL_Controller {

    public function __construct () {
        parent::__construct();

        $this->data['breadcrumb'] = [
            [
                'url' => base_url() . 'admindashboard',
                'title' => 'usuarios'
            ]
        ];
    }

    public function index() {
        //redirect(base_url() . 'teacherdashboard/', 'refresh');

        // Retrieving vars
        $data = $this->data;

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

        $data['breadcrumb'] = [
            [
                'url' => base_url() . 'teacherdashboard',
                'title' => 'problemas'
            ]
        ];

        $groupDetails = $this->Msubjects->getGroupById($groupId);
        $data['pageTitle'] = 'Listado completo de alumnos en el ' . $groupDetails->name;
        $data['silentResume'] = true;

        $data['users'] = $this->Musers->getAllUsersDataByGroupId($groupId);

        $this->load->view('template-all-users-table', $data);
    }

    public function id($userId) {
        // Retrieving vars
        $data = $this->data;

        if (empty($userId)) {
            redirect(base_url() . 'teacherdashboard/', 'refresh');
        }

        $data['breadcrumb'] = [
            [
                'url' => base_url() . 'teacherdashboard',
                'title' => 'usuarios'
            ]
        ];

        $data['userDetails']= $this->Musers->getAllUserDataById($userId);


        if (empty($data['userDetails'])) {
            redirect(base_url() . 'teacherdashboard/', 'refresh');
        }

        $data['pageTitle'] = 'Detalle del usuario ';
        $data['userName'] = $this->_getUserName($data['userDetails']);

        $data['lastAttempts'] = $this->Mproblems->getLastProblemsAttemptsByUserId($userId);

        $data['problemsRanking'] = $this->Mproblems->getProblemsRankingByUserId($userId);

        $data['programmingLanguages'] = $this->Mproblems->getChartLanguagesByUserId($userId);
        $data['submissionErrors'] = $this->Mproblems->getChartErrorsByUserId($userId);
        $data['submissionErrorsTable'] = $this->Mproblems->getChartErrorsTableByUserId($userId);

        $totalSubmissionsByMonthAndUserId = $this->Mproblems->getTotalSubmissionsByMonthAndUserId($userId);
        $totalAcceptedByMonthAndUserId = $this->Mproblems->getTotalAcceptedByMonthAndUserId($userId);

        $data['totalSubmissionsByMonthAndUserId'] = implode(', ', array_map(function ($month) {
            return $month->total_submissions;
        }, $totalSubmissionsByMonthAndUserId));

        $data['totalAcceptedByMonthAndUserId'] = implode(', ', array_map(function ($month) {
            return $month->total_submissions;
        }, $totalAcceptedByMonthAndUserId));

        $this->load->view('template-user-details', $data);
    }

    public function submissions($id = null) {
        redirect(base_url() . 'teacherdashboard/', 'refresh');
    }

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