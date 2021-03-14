<?php
class email_check{
	public function Is_email($data){
		//If the username input string is an e-mail, return true
			if(filter_var($data, FILTER_VALIDATE_EMAIL)) {
					return true;
			} else {
					return false;
			}
	}
}

?>