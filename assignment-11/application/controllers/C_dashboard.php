<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		if(!$this->session->userdata("id"))
			return redirect(base_url());
		$this->load->view('dashboard');
	}

}

?>