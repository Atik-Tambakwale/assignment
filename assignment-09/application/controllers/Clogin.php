<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
            $this->load->view('vlogin');
	}
	public function userLogin(){
		$email=$this->input->post('username');
		$password=$this->input->post('password');

		// TODO: Login
        $this->db->where("email", $email)->where("password", md5($password));
        $result = $this->db->get("user_tbl");

        if(($result->num_rows()) > 0){


            $row = $result->row();

            $data = (array) $row;

            $token_data=[
                "id" => $data['id'],
                "name" => $data['name'],
                "email" => $data['email'],
            ];

            $user_token = $this->token->generateToken($token_data);

            $data['token'] = $user_token;
            $this->session->set_userdata($data);
            setcookie('jwt',$user_token,time() + (86400 * 30));
            $response['status'] = 200;
            $response['msg']="Your successfully login ".$email;
        }else{
            $response["status"]=201;
            $response["msg"]="Please enter corect Email and Password";
        }

         echo json_encode($response);

	}
     public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
?>
