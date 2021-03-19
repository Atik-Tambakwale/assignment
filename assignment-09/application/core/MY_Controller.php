<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	
	
	public function token_verification(){
		$headers = $this->input->request_headers();
		$token = $headers['Authorization'];
		return $token;		
	}
}

?>