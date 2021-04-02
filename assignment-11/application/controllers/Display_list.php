<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Display_list extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index(){
		if(!$this->session->userdata("id"))
			return redirect(base_url());
		$this->load->view('display-list/display_list');	
	}
	public function display_ksa_list(){
		$this->load->model("list_model");
		/* $this->load->library("pagination");
		$config=array();
		$config["base_url"]="#";
		$config["total_rows"]=$this->list_pagination_model->count_all();
		//echo $config["total_rows"];
		$config["per_page"]=$this->input->get('list_limit');
		$config["uri_segment"]=3;
		$config["use_page_numbers"]=TRUE;
		$config["full_tag_open"]='<ul class="pagination">';
		$config["full_tag_close"]='</ul>';
		$config["first_tag_open"]='<li>';
		$config["first_tag_close"]='</li>';
		//echo $config["first_tag_open"].", ".$config["first_tag_close"];
		$config["last_tag_open"]='<li>';
		$config["last_tag_close"]='</li>';
		$config['next_link']='&gt;';
		$config["next_tag_open"]='<li>';
		$config["next_tag_close"]='</li>';
		$config["prev_link"]="&lt;";
		$config["prev_tag_open"]='<li>';
		$config["prev_tag_close"]='</li>';
		$config["cur_tag_open"]="<li class='active'><a href='#'>";
		$config["cur_tag_close"]="</a></li>";
		$config["num_tag_open"]="<li>";
		$config["num_tag_close"]="</li>";
		$config["num_links"]=1;
		$this->pagination->initialize($config);
		$page=$this->uri->segment(3);
		
		$start=$config["per_page"]*($page-1);
		 *///$search=$this->input->get('search'); 
	/* 	$col_name=$this->input->get('column_name');
		$orderBY=$this->input->get('order_type'); */
		//echo $col_name." ".$orderBY;
	/* 	$col_name=$this->input->get('filter_coloumnName');
		$orderBY=$this->input->get('order_by'); */
		
		$output=array(
	
			'list_table'=>$this->list_model->fetch_details()
		);
		echo json_encode($output);
	}
}
?>