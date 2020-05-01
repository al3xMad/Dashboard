<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class OL_Controller extends CI_Controller {
	const FAKE_USER = 'user';

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

        $this->loginAFakeUser();
	}

	private function loginAFakeUser () {
	    $user = [
            'user_name' => self::FAKE_USER
        ];

        $this->session->set_userdata($user);
    }
}
