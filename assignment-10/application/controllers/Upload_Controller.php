<?php
	defined('BASEPATH') or exit('No direct script access allowed');

class Upload_Controller extends MY_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function custom_view(){
		$this->load->view('property_master');
	}
	public function do_upload(){
		$config = [
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "5048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "768",
			'max_width' => "1024"
		];
		$this->load->library('upload', $config);
		$this->upload->do_upload();

		$data = [
			'upload_data' => $this->upload->data(),
			'name'=>$this->input->post('name')
			];
		print_r($data);
	}
}
?>