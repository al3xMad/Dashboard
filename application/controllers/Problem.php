<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Problem extends OL_Controller {

    public function __construct () {
        parent::__construct();

        $this->data['breadcrumb'] = [
            [
                'url' => base_url() . 'admindashboard',
                'title' => 'problemas'
            ]
        ];
    }

    public function index() {
        // Retrieving vars
        $data = $this->data;

        $data['pageTitle'] = 'Listado completo de problemas';

        $data['problems'] = $this->Mproblems->getAllProblems(
            [
                'order' => 'totalAC',
                'direction' => 'DESC'
            ]
        );

        $data['worseProblem'] = end($data['problems']);

        $this->load->view('template-all-problems-table', $data);
    }

    public function group($groupId) {
        // Retrieving vars
        $data = $this->data;
        $groupId = 3;

        $groupDetails = $this->Msubjects->getGroupById($groupId);

        $data['breadcrumb'] = [
            [
                'url' => base_url() . 'teacherdashboard',
                'title' => 'problemas'
            ]
        ];

        $data['pageTitle'] = 'Listado completo de problemas para el grupo: ' . $groupDetails->name;
        $data['silentResume'] = true;

        $problemParams = [
            'order' => 'p.totalAC',
            'direction' => 'DESC'
        ];

        $data['problems'] = $this->Mproblems->getAllProblemsSubmittedByGroup($groupId, $problemParams);
        $data['groupId'] = $groupId;

        $data['worseProblem'] = end($data['problems']);

        $this->load->view('template-all-problems-table', $data);
    }

    public function id($id) {
        // Retrieving vars
        $data = $this->data;
        $urlData = $this->uri->uri_to_assoc(2);

        $data['role'] = $this->session->userdata('role');

        if (empty($id)) {
            redirect(base_url());
        }

        $data['pageTitle'] = 'Detalle del problema';

        if (isset($urlData['group'])) {
            $data['groupId'] = $urlData['group'];
            $data['problem'] = $this->Mproblems->getProblemByIdAndGroupId($id, $urlData['group']);
            $data['lastAttempts'] = $this->Mproblems->getLastUsersAttemptsByProblemIdAndGroupId($id, $urlData['group']);
            $data['usersRanking'] = $this->Musers->getUsersRankingByProblemIdAndGroupId($id, $urlData['group']);
            $data['programmingLanguages'] = $this->Mproblems->getChartLanguagesByProblemIdAndGroupId($id, $urlData['group']);
            $data['submissionErrors'] = $this->Mproblems->getChartErrorsByProblemIdAndGroupId($id, $urlData['group']);
            $data['submissionErrorsTable'] = $this->Mproblems->getChartErrorsTableByProblemIdAndGroupId($id, $urlData['group']);
            $problemAttemptsEvolution = $this->Mproblems->getProblemAttemptsEvolutionByProblemIdAndGroupId($id, $urlData['group']);
            $data['acceptedByCountry'] = $this->Mproblems->getAcceptedByCountryByProblemIdAndGroupId($id, $urlData['group']);
            $totalSubmissionsByMonthAndProblemId = $this->Mproblems->getTotalSubmissionsByMonthAndProblemIdAndGroupId($id, $urlData['group']);
            $totalAcceptedByMonthAndProblemId = $this->Mproblems->getTotalAcceptedByMonthAndProblemIdAndGroupId($id, $urlData['group']);
        } else {
            $data['groupId'] = false;
            $data['problem'] = $this->Mproblems->getProblemById($id);
            $data['lastAttempts'] = $this->Mproblems->getLastUsersAttemptsByProblemId($id);
            $data['usersRanking'] = $this->Musers->getUsersRankingByProblemId($id);
            $data['programmingLanguages'] = $this->Mproblems->getChartLanguagesByProblemId($id);
            $data['submissionErrors'] = $this->Mproblems->getChartErrorsByProblemId($id);
            $data['submissionErrorsTable'] = $this->Mproblems->getChartErrorsTableByProblemId($id);
            $problemAttemptsEvolution = $this->Mproblems->getProblemAttemptsEvolutionByProblemId($id);
            $data['acceptedByCountry'] = $this->Mproblems->getAcceptedByCountryByProblemId($id);
            $totalSubmissionsByMonthAndProblemId = $this->Mproblems->getTotalSubmissionsByMonthAndProblemId($id);
            $totalAcceptedByMonthAndProblemId = $this->Mproblems->getTotalAcceptedByMonthAndProblemId($id);
        }

        $data['problemAttemptsEvolution'] = array_column($problemAttemptsEvolution, 'attempts');

        $data['totalSubmissionsByMonthAndProblemId'] = implode(', ', array_map(function ($month) {
            return $month->total_submissions;
        }, $totalSubmissionsByMonthAndProblemId));

        $data['notSubmissions'] = $this->notSubmissions($totalSubmissionsByMonthAndProblemId);
        
        $data['totalAcceptedByMonthAndProblemId'] = implode(', ', array_map(function ($month) {
            return $month->total_submissions;
        }, $totalAcceptedByMonthAndProblemId));

        $this->load->view('template-problem-details', $data);
    }

    public function submissions($id) {
        // Retrieving vars
        $data = $this->data;
        $data['problem'] = $this->Mproblems->getProblemById($id);

        $data['breadcrumb'] = [
            [
                'url' => base_url() . 'admindashboard',
                'title' => 'problemas'
            ], [
                'url' => base_url() . 'problem/id/' . $data['problem']->id,
                'title' => 'problema ' . $data['problem']->name
            ]

        ];

        if (empty($id)) {
            redirect(base_url());
        }

        $data['pageTitle'] = 'Envíos por alumno para el problema: ' . $data['problem']->name;
        $data['lastAttempts'] = $this->Mproblems->getLastUsersAttemptsByProblemId($id, ['limit' => 9999999]);

        $this->load->view('template-all-problem-submissions-table', $data);
    }

    public function user($userId) {
        // Retrieving vars
        $data = $this->data;

        if (empty($userId)) {
            redirect(base_url() . 'teacherdashboard/', 'refresh');
        }

        $data['userDetails']= $this->Musers->getAllUserDataById($userId);


        if (empty($data['userDetails'])) {
            redirect(base_url() . 'teacherdashboard/', 'refresh');
        }

        $data['userName'] = $this->_getUserName($data['userDetails']);
        $data['lastAttempts'] = $this->Mproblems->getLastProblemsAttemptsByUserId($userId, ['limit' => 9999999]);

        $data['breadcrumb'] = [
            [
                'url' => base_url() . 'teacherdashboard',
                'title' => 'problemas'
            ], [
                'url' => base_url() . 'users/id/' . $userId,
                'title' => 'Usuario ' . $data['userName']
            ]

        ];

        if (empty($userId)) {
            redirect(base_url());
        }

        $data['pageTitle'] = 'Envíos';

        $this->load->view('template-all-problem-submissions-by-user-table', $data);
    }

    private function _getUserName($user) {
        if (empty($user->first_name)) {
            return 'Nombre desconocido...';
        }

        return $user->first_name . ' ' . $user->last_name;
    }

    private function notSubmissions($submissionChart){
        $data = array_column($submissionChart, 'total_submissions');

        return empty(array_filter($data));
    }
}
