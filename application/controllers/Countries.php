<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Countries extends OL_Controller {

    public function __construct () {
        parent::__construct();

        $this->data['breadcrumb'] = [
            [
                'url' => base_url() . 'admindashboard',
                'title' => 'Admin Dashboard'
            ]
        ];
    }

    public function index() {
        // Retrieving vars
        $data = $this->data;

        $data['pageTitle'] = 'Listado completo de países participantes';

        $data['totalUsers'] = count($this->Musers->getAllUsers());
        $data['countriesStats'] = $this->Mcountries->getAllCountriesWithUsers();

        $this->load->view('template-all-countries-table', $data);
    }
}
