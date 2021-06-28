<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLogin extends CI_Controller {

	public function index(){	
			$title['title']	 ="Login | Sarana Crowdfunding";
			$this->load->view('component/header', $title);
			$this->load->view('component/navbar');
			$this->load->view('en/participant/login');
			$this->load->view('component/footer_log');
    }
    
    function sign_up(){	
        $title['title']	 ="Register | Sarana Crowdfunding";
		$this->load->view('component/header', $title);
		$this->load->view('component/navbar');
		$this->load->view('en/participant/register');
		$this->load->view('component/footer_form');
	}

	function login(){

		$email 		    = $this -> input -> post('email');
		$password 	 	= $this -> input -> post('password');
		$ceklogin 		= $this -> mlogin -> login($email, $password);

		if($ceklogin){

			foreach ($ceklogin as $row);
			$this -> session -> set_userdata('id', $row -> id);
			$this -> session -> set_userdata('nama', $row -> nama);
			$this -> session -> set_userdata('email', $row -> email);
			$this -> session -> set_userdata('is_admin', $row -> is_admin);
			$this -> session -> set_userdata('status', $row -> status);
			$count 			= $this -> mlogin -> check_campaign($row -> id);
				if($row -> status == "4" && $count > 0){

					redirect('en/dashboard');
				}else{
					redirect('en/verifikasi');
				}
					
		}else{

			$this -> session -> set_flashdata('pesan','
								<div class="alert alert-danger alert-dismissible">
								<i class="icon fa fa-warning"></i>
								Username / Password tidak sesuai
								</div>
							');
			redirect('en/login');

		}
	}

	function dologin(){
		
		$email 		    = $this -> input -> post('mail');
		$password 	 	= $this -> input -> post('pwd'); 
		$nama 		 	= $this -> input -> post('nama'); 
		$status 		= $this -> input -> post('status'); 
		$res=$this->mlogin->islogin($email, $password);  
		if($res){     
			$this->session->set_userdata('email',$email);  
			$this->session->set_userdata('nama',$nama);   
			$this->session->set_userdata('status',$status);   
		  echo base_url()."en/verifikasi";  
		}  
		else{  
		   echo 0;  
		} 
	}

	function logout(){
		
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('is_admin');
		$this->session->unset_userdata('status');
		
		redirect('en/login');

	} //end function logout

	function register(){

		$this->form_validation->set_rules('nama', 'name', 'required');
		$this->form_validation->set_rules('tlp', 'phone number', 'required|numeric');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_email_check');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('repassword', 'confirm password', 'required|matches[password]');

		if($this->form_validation->run()){

			$this -> mlogin -> register();
			if($this-> db ->affected_rows() > 0){
					$nama			= $this -> input -> post('nama', true);
					$email			= $this -> input -> post('email', true);
					$password		= $this -> input -> post('password', true);
					$array = array(
						'nama' => $nama,
						'email' => $email,
						'pass' => $password
					);	
			}
		}else{
			 $array = array(
			  'error'   => true,
			  'nama_error' => form_error('nama'),
			  'tlp_error' => form_error('tlp'),
			  'email_error' => form_error('email'),
			  'password_error' => form_error('password'),
			  'repassword_error' => form_error('repassword'),
			 );
		}

		echo json_encode($array);
   }


    function email_check($strr){
			  $cekk = $this->db->query("SELECT * FROM cfs_participant where email='".$strr."'")->num_rows();
			  if ($cekk > 0)
			  {
					  $this->form_validation->set_message('email_check', '<span style="color:red">* alamat email sudah dipakai</span>');
					  return FALSE;
			  }
			  else
			  {
					  return TRUE;
			  }
 	}



} // end class
