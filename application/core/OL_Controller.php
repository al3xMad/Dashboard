<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class OL_Controller extends CI_Controller {
	/**
	 * @var array   Main data params
	 */
	public $data;

	/**
	 * Class Construct
	 *
	 */
	function __construct ()
	{
		parent::__construct();

		$this->data = [];
		$this->data['brandImage'] = assets_url() . config_item('brand');
		$this->data['projectTitle'] = '¡ACEPTA EL RETO!';

        if ($_POST) {
            $this->loginAFakeUser();
        }

        if (!$this->isUserLogged() && !$this->isLoginPage()) {
            redirect(base_url() . 'login', 'refresh');
        }

        if (!$this->isLoginPage()) {
            $this->data['user'] = $this->session->userdata['user_name'];
        }
	}

	private function isUserLogged () {
	    return isset($this->session->userdata['user_name']);
    }

    private function isLoginPage () {
	    return $this->router->fetch_class() === 'login';
    }

    private function loginAFakeUser () {
        $username = $this->input->post('user_name');
	    if (empty($username)) {
            return false;
        }

	    $user = [
            'user_name' => $this->input->post('user_name')
        ];

        $this->session->set_userdata($user);
    }
}
