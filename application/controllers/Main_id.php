<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_id extends CI_Controller {

	public function index()
	{	
		$title['title']	 ="Sarana Crowdfunding";
		$this->load->view('component/id/header', $title);
		$this->load->view('component/id/navbar');
		$this->load->view('id/index');
		$this->load->view('component/id/footer');
	}

	public function allCause()
	{
		$title['title']	 ="All Cause | Sarana Crowdfunding";
		$this->load->view('component/id/header', $title);
		$this->load->view('component/id/navbar');
		$this->load->view('all_cause');
		$this->load->view('component/id/footer');
	}

	public function causedetail()
	{	
		$title['title']	 ="Detail Cause | Sarana Crowdfunding";
		$this->load->view('component/id/header', $title);
		$this->load->view('component/id/navbar');
		$this->load->view('causeDetail');
		$this->load->view('component/id/footer');
	}
}
