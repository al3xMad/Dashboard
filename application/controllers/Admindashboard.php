<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admindashboard extends OL_Controller {

	public function __construct () {
		parent::__construct();
	}

	public function index() {
		// Retrieving vars
		$data = $this->data;
        $data['no_breadcrumb'] = true;

        $data['pageTitle'] = 'Admin Dashboard';

        $data['totalInternalErrors'] = $this->Mproblems->getSumAllIR()->total;
        $data['IELastWeek'] = count($this->Mproblems->getLastIR());
        $data['lastWeekUsers'] = count($this->Musers->getLastRegisteredUsers());

        $data['totalUsers'] = count($this->Musers->getAllUsers());
        $data['countriesStats'] = $this->Mcountries->getAllCountriesWithUsers();

        $data['countriesStatsForMap'] = [];
        foreach($data['countriesStats'] as $country) {
            $data['countriesStatsForMap'][] = [$country->id => $country->totalUsers];
        }

        $data['totalCountries'] = $this->Mcountries->getCountAllCountriesWithUsers();
        $problems = $this->Mproblems->getAllProblems(
            [
                'order' => 'internalId',
                'direction' => 'ASC'
            ]
        );

        $data['problems'] = $problems;
        $data['totalProblemsSum'] = count($problems);
        $data['totalProblemsAttempts'] = $this->Mproblems->getSumAllAttempts()->total;

        $data['programmingLanguages'] = $this->Mproblems->getChartLanguages();
        $data['totalAccepted'] = $this->Mproblems->getSumAllAccepted()->total;
        $data['submissionErrors'] = $this->Mproblems->getChartErrors();

        $data['problemsAttempts'] = $this->Mproblems->getLastProblemsAttempts();
        $data['problemsRanking'] = $this->Mproblems->getProblemsRanking();
        $data['usersRanking'] = $this->Musers->getUsersRanking();

        $totalSubmissionsByMonth = $this->Mproblems->getTotalSubmissionsByMonth();
        $totalAcceptedByMonth = $this->Mproblems->getTotalAcceptedByMonth();

        $data['totalSubmissionsByMonth'] = implode(', ', array_map(function ($month) {
            return $month->total_submissions;
        }, $totalSubmissionsByMonth));

        $data['totalAcceptedByMonth'] = implode(', ', array_map(function ($month) {
            return $month->total_submissions;
        }, $totalAcceptedByMonth));

		$this->load->view('template-admin-dashboard', $data);
	}
}
