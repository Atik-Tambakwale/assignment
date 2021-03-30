<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendMail{

	public function send_email($from,$from_name,$to,$subject,$msg) {
		$this->load->library('email');
		/* $config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'text'; */
		//$this->email->initialize($config);
		$this->email->from($from,$from_name);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($msg);
		
		if ($this->email->send()) {

			echo '<script>alert("success..!")</script>';
		} else {
			echo '<script>alert("Please Try Again Later..!")</script>';

		}
	}
}
?>