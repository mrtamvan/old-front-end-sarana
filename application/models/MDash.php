<?php

class MDash extends CI_Model
{
  function logged_id()
  {
    if ($this->session->userdata("is_admin") == "0") {
      return $this->session->userdata("id");
      return $this->session->userdata("nama");
      return $this->session->userdata("email");
      return $this->session->userdata("is_admin");
    }
  }

  function get_table($table)
  {
    return $this->db->get($table);
  }

  function get_where($table, $where)
  {
    return $this->db->get_where($table, $where);
  }

  function get_campaign($where)
  {
    $this->db->select(
      "cfs_campaign.*,cfs_campaigndetail.title, cfs_campaigndetail.description"
    );
    $this->db->order_by("campaign_status", "ASC");
    $this->db->order_by("cfs_campaign.id", "DESC");
    $this->db->from("cfs_campaign");
    $this->db->join(
      "cfs_campaigndetail",
      "cfs_campaigndetail.id=cfs_campaign.id_en OR cfs_campaigndetail.id=cfs_campaign.id_id"
    );
    $this->db->where("id_participant", $where);
    $this->db->group_by("cfs_campaign.id");
    return $this->db->get();
  }

  function cek_data($email)
  {
    $this->db->select("*");
    $this->db->from("cfs_participant");
    // $this -> db -> join('cfs_campaigndetail', 'cfs_campaigndetail.id_participant=cfs_participant.id');
    $this->db->where("email", $email);
    $this->db->limit(1);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function verifikasi()
  {
    $nik = $this->input->post("nik", true);
    $temhir = $this->input->post("temhir", true);
    $tanghir = $this->input->post("tanghir", true);
    $alamat = $this->input->post("alamat", true);
    // $ktp		    = $this -> input -> post('ktp', true);
    $selfie_ktp = $this->input->post("selfie", true);
    // $file 			= $_FILES['ktp']['name'];

    // $extensi 					= pathinfo($file, PATHINFO_EXTENSION);
    // $ktp 						= $nik."-ktp.".$extensi;
    $config["upload_path"] = "./assets/images"; //buat folder dengan nama assets di root folder
    $config["allowed_types"] = "gif|jpg|png";
    $config["overwrite"] = true;
    $config["encrypt_name"] = true;
    $config["max_size"] = 5000;

    $this->load->library("upload", $config);
    if ($this->upload->do_upload("ktp")) {
      // $up = array('upload_data' => $this->upload->data());

      $up = $this->upload->data();

      //Resize and Compress Image
      $config["image_library"] = "gd2";
      $config["source_image"] = "./assets/images/" . $up["file_name"];
      $config["create_thumb"] = false;
      $config["maintain_ratio"] = false;
      $config["quality"] = "50%";
      $config["width"] = 500;
      $config["height"] = 700;
      $config["new_image"] = "./assets/images/" . $up["file_name"];
      $this->load->library("image_lib", $config);
      $this->image_lib->resize();

      $ktp = $up["file_name"];
    }
    if ($this->upload->do_upload("selfie")) {
      $ups = $this->upload->data();

      //Resize and Compress Image
      $configself["image_library"] = "gd2";
      $configself["source_image"] = "./assets/images/" . $ups["file_name"];
      $configself["create_thumb"] = false;
      $configself["maintain_ratio"] = false;
      $configself["quality"] = "50%";
      $configself["width"] = 500;
      $configself["height"] = 700;
      $configself["new_image"] = "./assets/images/" . $ups["file_name"];
      $this->load->library("image_lib", $configself);
      $this->image_lib->resize();

      $selfie = $ups["file_name"];
    }

    $data = [
      "nik" => $nik,
      "temhir" => $temhir,
      "tanghir" => $tanghir,
      "alamat" => $alamat,
      "ktp" => $ktp,
      "selfie_ktp" => $selfie,
    ];
    $this->db->insert("cfs_detailparticipant", $data);
  }

  public function resizeImage($filename)
  {
    $source_path = $_SERVER["DOCUMENT_ROOT"] . "/assets/images/" . $filename;
    $target_path = $_SERVER["DOCUMENT_ROOT"] . "/assets/images/";
    $config_manip = [
      "image_library" => "gd2",
      "source_image" => $source_path,
      "new_image" => $target_path,
      "maintain_ratio" => true,
      "width" => 500,
    ];

    $this->load->library("image_lib", $config_manip);
    if (!$this->image_lib->resize()) {
      echo $this->image_lib->display_errors();
    }

    $this->image_lib->clear();
  }

  function update_part()
  {
    $nik = $this->input->post("nik", true);
    $nama = $this->input->post("nama", true);
    $tlp = $this->input->post("tlp", true);
    $email = $this->input->post("email", true);
    $data = [
      "nik" => $nik,
      "nama" => $nama,
      "tlp" => $tlp,
      "status" => "2",
    ];

    $where = ["email" => $email];
    $this->db->where($where);
    $this->db->update("cfs_participant", $data);
  }
  function input_campaigndetail($slug)
  {
    $title = $this->input->post("title", true);
    $description = $this->input->post("description", true);
    $data = [
      "title" => $title,
      "description" => $description,
      "slug" => $slug,
    ];

    $this->db->insert("cfs_campaigndetail", $data);
  }

  function input_campaign($id)
  {
    // $title				= $this -> input -> post('title', true);
    $languange = $this->input->post("language", true);
    $id_category = $this->input->post("id_category", true);
    $target = $this->input->post("target", true);
    // $banner				= $this -> input -> post('banner', true);
    // $description		= $this -> input -> post('description', true);
    $id_participant = $this->input->post("id_participant", true);
    $create_date = date("Y-m-d");

    $config["upload_path"] = "./assets/images"; //buat folder dengan nama assets di root folder
    $config["allowed_types"] = "gif|jpg|png";
    $config["overwrite"] = true;
    $config["encrypt_name"] = true;
    $config["max_size"] = 5000;

    $this->load->library("upload", $config);
    if ($this->upload->do_upload("banner")) {
      // $up = array('upload_data' => $this->upload->data());

      $up = $this->upload->data();

      //Resize and Compress Image
      $config["image_library"] = "gd2";
      $config["source_image"] = "./assets/images/" . $up["file_name"];
      $config["create_thumb"] = false;
      $config["maintain_ratio"] = false;
      $config["quality"] = "50%";
      $config["width"] = 500;
      $config["height"] = 700;
      $config["new_image"] = "./assets/images/" . $up["file_name"];
      $this->load->library("image_lib", $config);
      $this->image_lib->resize();

      $banner = $up["file_name"];
    }
    if ($languange == "en") {
      $data = [
        // 'title' 			=> $title,
        "id_category" => $id_category,
        "id_en" => $id,
        "target_fund" => $target,
        "featured_image" => $banner,
        // 'description' 		=> $description,
        "id_participant" => $id_participant,
        "create_date" => $create_date,
        // 'slug'				=> $slug,
        "campaign_status" => "1",
      ];
    } elseif ($languange == "id") {
      $data = [
        // 'title' 			=> $title,
        "id_category" => $id_category,
        "id_id" => $id,
        "target_fund" => $target,
        "featured_image" => $banner,
        // 'description' 		=> $description,
        "id_participant" => $id_participant,
        "create_date" => $create_date,
        // 'slug'				=> $slug,
        "campaign_status" => "1",
      ];
    }

    $this->db->insert("cfs_campaign", $data);
  }
} //end class
