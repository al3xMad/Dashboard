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

        $subjectId = 1;
        $groupId = 3;

        $usersInGroup = $this->Musers->getAllUsersByGroupId($groupId);

        $data['groupId'] = $groupId;

        $data['subjectDetails'] = $this->Msubjects->getSubjectById($subjectId);
        $data['groupDetails'] = $this->Msubjects->getGroupById($groupId);

        $data['pageTitle'] = 'Teachers Dashboard';

        $data['lastWeekProblems'] = $this->Mproblems->getLastWeekProblems();

        $data['totalUsers'] = count($usersInGroup);

        $data['submissionChartTable'] = $this->Mproblems->getChartSubmissionsByGroupId($groupId);


        $problemsParams = [
            'order' => 'internalId',
            'direction' => 'ASC'
        ];

        $data['problemsAttempts'] = $this->Mproblems->getLastProblemsAttemptsByGroupId($groupId);

        $data['problems'] = $this->Mproblems->getAllProblemsSubmittedByGroup($groupId, $problemsParams);
        $data['totalProblemsSum'] = count($data['problems']);

        $data['usersRanking'] = $this->Musers->getUsersRankingByGroup($groupId);

        $data['totalAccepted'] = $this->Mproblems->getSumAllAcceptedByGroupId($groupId);
        $data['totalProblemsAttempts'] = $this->Mproblems->getSumAllAttemptsByGroupId($groupId)->total;

        $data['programmingLanguages'] = $this->Mproblems->getChartLanguagesByGroupId($groupId);

        $data['submissionErrors'] = $this->Mproblems->getChartErrorsByGroupId($groupId);

		$this->load->view('template-teacher-dashboard', $data);
	}
}
