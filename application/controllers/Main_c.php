<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_c extends CI_Controller {

	public function index()
	{	
		$title['title']	 ="Sarana Crowdfunding";
		$this->load->view('component/header', $title);
		$this->load->view('component/navbar');
		$this->load->view('en/index');
		$this->load->view('component/footer');
	}

	public function allCause()
	{
		$title['title']	 ="All Cause | Sarana Crowdfunding";
		$this->load->view('component/header', $title);
		$this->load->view('component/navbar');
		$this->load->view('en/all_cause');
		$this->load->view('component/footer');
	}

	public function causedetail()
	{	
		$title['title']	 ="Detail Cause | Sarana Crowdfunding";
		$this->load->view('component/header', $title);
		$this->load->view('component/navbar');
		$this->load->view('en/causeDetail');
		$this->load->view('component/footer');
	}
}
