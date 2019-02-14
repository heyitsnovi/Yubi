<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		
		$data['page_title'] = 'Home - UB - LI';
		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/home',$data);
		$this->load->view('frontend/footer',$data);
	}
}
