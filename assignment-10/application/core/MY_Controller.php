<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	
	
	public function token_verification(){
		$headers = $this->input->request_headers();
		$token = $headers['Authorization'];
		return $token;		
	}
	function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); 
	}
	/* public function sendpassword($data) {
		$user_password = $data['initial_password'];

		if ($user_password->num_rows() > 0) {

			$this->load->library('email');

			//SMTP & mail configuration
			$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => '<test-account-name>@gmail.com',
			'smtp_pass' => '<test-account-password>',
			);
			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");

			//Email content

			$this->email->from('admin@gmail.com', 'Admin');
			$this->email->to($user_email);
			$this->email->subject('Password reset request');
			$mail_message = 'Dear ' . $row[0]['full_name'] . ',' . "<br>\r\n";
			$mail_message .= 'Thanks for contacting regarding to forgot password,<br> Click On Link And Reset Password:<b><a href="http://www.ciadmin.local/welcome/update_password">Reset Password</a></b>'."\r\n";
			$mail_message .= '<br>Please Update your password.';
			$mail_message .= '<br>Thanks & Regards';
			$mail_message .= '<br>Red Feather Software';

			$this->email->message($mail_message);

			//Send email

			if ($this->email->send()) {

				echo '<script>alert("success..!")</script>';
			} else {
				echo '<script>alert("Please Try Again Later..!")</script>';

			}
		}
		} */
}

?>