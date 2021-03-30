<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_inform');
	}

	public function index(){
		$this->load->view('login');
	
	}
	public function authentication(){
		$response=[];
		$data=[
				'email'=>$this->input->post('email'),
			   'password'=>$this->input->post('password')
			  ];
		
		$result=$this->Login_inform->login_data($data['email'],$data['password']);

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

			$response=['status'=>200,'msg'=>'User is logged in successfully'];
		}
		else{
			$response=['status'=>201,'msg'=>'Please entered your correct email ID and password'];
		}
		echo json_encode($response);
	}
	public function logout()
    {
        $this->session->unset_userdata("id");
	//	delete_cookie("jwt");               
        $this->session->sess_destroy();
       // $this->cache->clean();
		//$user_token = $this->token->generateToken($token_data);
		setcookie("jwt",time() - (86400 * 30));
        redirect(base_url());
    }	
}
?>