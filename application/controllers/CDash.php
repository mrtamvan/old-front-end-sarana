<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CDash extends CI_Controller {

	public function index(){	
        // filter session untuk keamanan
		if(($this -> session -> userdata('nama')=="")&&($this -> session -> userdata('email')=="")){

			redirect('en/login');
        }elseif($this -> session -> userdata('is_admin')=="1"){
            redirect('en/login');
        }
        $data = $this -> mdash -> cek_data($this -> session -> userdata('email'));
        $get['result'] = $data;
        foreach ($data as $row);
        if($row -> status =="1"){
            $title['title']	 ="Verifikasi | Sarana Crowdfunding";
            $this->load->view('component/header', $title);
            $this->load->view('component/navbar');
            $this->load->view('en/participant/dashboard/verifikasi/verifikasi', $get);
            $this->load->view('component/footer_form');
        }if($row -> status =="2"){
            $title['title']	 ="Waiting Verified | Sarana Crowdfunding";
            $this->load->view('component/header', $title);
            $this->load->view('component/navbar');
            $this->load->view('en/participant/dashboard/verifikasi/waiting', $get);
            $this->load->view('component/footer_log');
        }if($row -> status =="4"){
            $title['title']	 ="Waiting Verified | Sarana Crowdfunding";
            $this->load->view('component/header', $title);
            $this->load->view('component/navbar');
            $this->load->view('en/participant/dashboard/index', $get);
            $this->load->view('component/footer_log');
        }if($row -> status =="5"){
            $title['title']	 ="Waiting Verified | Sarana Crowdfunding";
            $this->load->view('component/header', $title);
            $this->load->view('component/navbar');
            $this->load->view('en/participant/dashboard/verifikasi/banned', $get);
            $this->load->view('component/footer_log');
        }if($row -> status =="3"){
            $title['title']	 ="Waiting Verified | Sarana Crowdfunding";
            $this->load->view('component/header', $title);
            $this->load->view('component/navbar');
            $this->load->view('en/participant/dashboard/verifikasi/danied', $get);
            $this->load->view('component/footer_log');
        }
        
    }

    function dashboard(){
        if(($this -> session -> userdata('nama')=="")&&($this -> session -> userdata('email')=="")){

			redirect('en/login');
        }elseif($this -> session -> userdata('is_admin')=="1"){
            redirect('en/login');
        }
        $data = $this -> mdash -> cek_data($this -> session -> userdata('email'));
        $get['result'] = $data;
        foreach ($data as $row);
        $where  = $row -> id;
        $data2 = $this -> mdash -> get_campaign($where)-> result();
        $get['campaigns']=$data2;
            $title['title']	 ="Dashboard | Sarana Crowdfunding";
            $this->load->view('component/header', $title);
            $this->load->view('component/navbar');
            $this->load->view('en/participant/dashboard/dashboard', $get);
            $this->load->view('component/footer_log');
    }


    function verifikasi(){

		$this->form_validation->set_rules('nama', 'name', 'required');
		$this->form_validation->set_rules('tlp', 'phone number', 'required|numeric');
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric|callback_nik_check');
        $this->form_validation->set_rules('temhir', 'tempat lahir', 'required');
        $this->form_validation->set_rules('tanghir', 'tanggal lahir', 'required|date');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        // $this->form_validation->set_rules('ktp', 'foto ktp', 'callback_ktp_check');
        // $this->form_validation->set_rules('selfie', 'foto ktp selfie', 'required');

		if($this->form_validation->run()){

            $this -> mdash -> verifikasi();
            $this -> mdash -> update_part();
			if($this-> db ->affected_rows() > 0){
					$array = array(
						'success' => true,
					);	
			}
		}else{
			 $array = array(
			  'error'   => true,
			  'nama_error' => form_error('nama'),
			  'tlp_error' => form_error('tlp'),
			  'nik_error' => form_error('nik'),
			  'temhir_error' => form_error('temhir'),
			  'tanghir_error' => form_error('tanghir'),
			  'alamat_error' => form_error('alamat'),
			  'ktp_error' => form_error('ktp'),
			  'selfie_error' => form_error('selfie'),
			 );
		}

		echo json_encode($array);
   }

   function ktp_check(){

       $this->form_validation->set_message('ktp_check', 'Please select file.');
       if (empty($_FILES['ktp']['name'])) {
           return false;
        }else{
                return true;
            }
    }

    function nik_check($strr){
			  $cekk = $this->db->query("SELECT * FROM cfs_participant where nik='".$strr."'")->num_rows();
			  if ($cekk > 0)
			  {
					  $this->form_validation->set_message('nik_check', '<span style="color:red">* NIK sudah terpakai</span>');
					  return FALSE;
			  }
			  else
			  {
					  return TRUE;
			  }
     }
     
     function create_campaign(){
            // filter session untuk keamanan
            if(($this -> session -> userdata('nama')=="")&&($this -> session -> userdata('email')=="")){

                redirect('en/login');
            }elseif($this -> session -> userdata('is_admin')=="1"){
                redirect('en/login');
            }
            $data = $this -> mdash -> cek_data($this -> session -> userdata('email'));
            $kategori = $this -> mdash -> get_table('cfs_campaigncategory') -> result();
            $get['result'] = $data;
            $get['category'] = $kategori;
            $title['title']	 ="Create Campaign | Sarana Crowdfunding";
            $this->load->view('component/header', $title);
            $this->load->view('component/navbar');
            $this->load->view('en/participant/dashboard/campaign/create_campaign', $get);
            $this->load->view('component/footer_form');
     }

     function upload_image(){
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload');
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 800;
                $config['height']= 800;
                $config['new_image']= './assets/images/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url().'assets/images/'.$data['file_name'];
            }
        }
    }

    function delete_image(){
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name)){
            echo 'File Delete Successfully';
        }
    }
     
     function new_campaign(){
            // filter session untuk keamanan
            if(($this -> session -> userdata('nama')=="")&&($this -> session -> userdata('email')=="")){

                redirect('en/login');
            }elseif($this -> session -> userdata('is_admin')=="1"){
                redirect('en/login');
            }
            $data = $this -> mdash -> cek_data($this -> session -> userdata('email'));
            $kategori = $this -> mdash -> get_table('cfs_campaigncategory') -> result();
            $get['result'] = $data;
            $get['category'] = $kategori;
            $title['title']	 ="New Campaign | Sarana Crowdfunding";
            $this->load->view('component/header', $title);
            $this->load->view('component/navbar');
            $this->load->view('en/participant/dashboard/campaign/new_campaign', $get);
            $this->load->view('component/footer_form');
     }

     function input_campaign(){

        $title			= $this -> input -> post('title', true);
        $string			= strtolower(str_replace(" ", "-", $title));
        $slug			= preg_replace('/[^a-zA-Z0-9\-\&]/', '', $string); 
        $cek = $this->db->query("SELECT * FROM cfs_campaigndetail where slug='".$slug."'")->num_rows();
        if ($cek > 0){
            $slugplus = $slug."-1";
            $this -> mdash -> input_campaigndetail($slugplus);
            $id = $this->db->insert_id();
            $this -> mdash -> input_campaign($id);
            if($this-> db ->affected_rows() > 0){

                redirect('en/dashboard');
            }
		}else{
            $this -> mdash -> input_campaigndetail($slug);
            $id = $this->db->insert_id();
            $this -> mdash -> input_campaign($id);
            if($this-> db ->affected_rows() > 0){

                redirect('en/dashboard');
            }
        }
        
     }


} //end class