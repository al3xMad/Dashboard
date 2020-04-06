<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends OL_Controller {

    public function __construct () {
        parent::__construct();

        $this->data['breadcrumb'] = [
            [
                'url' => base_url(),
                'title' => 'Categorías'
            ]
        ];
    }

    public function getSubcategory($id) {
        // Retrieving vars
        $data = $this->data;

        if (empty($id)) {
            redirect(base_url());
        }

        $data['subcategories'] = $this->Mcategories->getSubCategoryById($id);
        $data['categoryDetails'] = $this->Mcategories->getCategoryById($id);

        if (!empty($data['subcategories'])) {
            $data['pageTitle'] = 'Subcategorías';
            $this->load->view('template-subcategories', $data);
        } else {
            $data['pageTitle'] = 'Problemas';
            $data['problems'] = $this->Mproblems->getProblemsByCategoryId($id);
            $this->load->view('template-problems', $data);
        }
    }
}
