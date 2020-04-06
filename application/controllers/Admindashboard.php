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

        $data['totalUsers'] = count($this->Musers->getAllUsers());
        $data['countriesStats'] = $this->Mcountries->getAllCountriesWithUsers(['limit' => 10]);

        $data['countriesStatsForMap'] = [];
        foreach($data['countriesStats'] as $country) {
            $data['countriesStatsForMap'][] = [$country->id => $country->totalUsers];
        }

        $data['totalCountries'] = $this->Mcountries->getCountAllCountriesWithUsers();
        $problems = $this->Mproblems->getAllProblems(
            [
                'order' => 'totalAC',
                'direction' => 'DESC'
            ]
        );

        $data['totalProblemsSum'] = count($problems);
        $data['problems'] = array_slice($problems, 0, 15);

        $data['totalAccepted'] = $this->Mproblems->getSumAllAccepted()->total;

        $data['totalProblemsAttempts'] = $this->Mproblems->getSumAllAttempts()->total;

        $data['programmingLanguages'] = $this->Mproblems->getChartLanguages();
        $data['submissionErrors'] = $this->Mproblems->getChartErrors();

		$this->load->view('template-admin-dashboard', $data);
	}
}
