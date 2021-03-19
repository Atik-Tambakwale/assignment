<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        if(isset($this->session->id))
        {   
            $this->load->view('dashboard');
            
        }else{
            redirect(base_url());
        }
    }

}
?>
