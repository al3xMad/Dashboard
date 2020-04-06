<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacherdashboard extends OL_Controller {

	public function __construct () {
		parent::__construct();
	}

	public function index() {
		// Retrieving vars
		$data = $this->data;
        $data['no_breadcrumb'] = true;

        $subjectId = $this->session->userdata('subjectId');
        $groupId = $this->session->userdata('groupId');

        $usersInGroup = $this->Musers->getAllUsersByGroupId($groupId);

        $data['groupId'] = $groupId;

        $data['subjectDetails'] = $this->Msubjects->getSubjectById($subjectId);
        $data['groupDetails'] = $this->Msubjects->getGroupById($groupId);

        $data['pageTitle'] = 'Teachers Dashboard';

        $data['totalUsers'] = count($usersInGroup);

        $data['countriesStats'] = $this->Mcountries->getAllCountriesWithUsersByGroupId($groupId, ['limit' => 10]);

        $data['countriesStatsForMap'] = [];
        foreach($data['countriesStats'] as $country) {
            $data['countriesStatsForMap'][] = [$country->id => $country->totalUsers];
        }

        $data['totalCountries'] = $this->Mcountries->getCountAllCountriesWithUsersByGroupId($groupId);

        $problemsParams = [
            'order' => 'totalAC',
            'direction' => 'DESC'
        ];

        $problemsSubmitted = $this->Mproblems->getAllProblemsSubmittedByGroup($groupId, $problemsParams);
        $data['totalProblemsSum'] = count($problemsSubmitted);

        $data['problems'] = array_slice($problemsSubmitted, 0, 15);

        $data['totalAccepted'] = $this->Mproblems->getSumAllAcceptedByGroupId($groupId);
        $data['totalProblemsAttempts'] = $this->Mproblems->getSumAllAttemptsByGroupId($groupId);

        $data['programmingLanguages'] = $this->Mproblems->getChartLanguagesByGroupId($groupId);

        $data['submissionErrors'] = $this->Mproblems->getChartErrorsByGroupId($groupId);

		$this->load->view('template-teacher-dashboard', $data);
	}
}
