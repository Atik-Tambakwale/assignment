<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once dirname(__file__).'/tcpdf/tcpdf.php';
	class Pdf_report extends TCPDF{
		protected $ci;

		public function __construct(){
			$this->c=&get_instance();
		}
	}
?>