<?php
defined("BASEPATH") or exit("No direct script access allowed");

class CLogin_id extends CI_Controller
{
  public function index()
  {
    $title["title"] = "Login | Sarana Crowdfunding";
    $this->load->view("component/id/header", $title);
    $this->load->view("component/id/navbar");
    $this->load->view("id/participant/login");
    $this->load->view("component/id/footer_log");
  }

  function sign_up()
  {
    $title["title"] = "Register | Sarana Crowdfunding";
    $this->load->view("component/id/header", $title);
    $this->load->view("component/id/navbar");
    $this->load->view("id/participant/register");
    $this->load->view("component/id/footer_form");
  }

  function login()
  {
    $email = $this->input->post("email");
    $password = $this->input->post("password");
    $ceklogin = $this->mlogin->login($email, $password);

    if ($ceklogin) {
      foreach ($ceklogin as $row);
      if ($row->status == "1") {
        $this->session->set_flashdata(
          "pesan",
          '
								<div class="alert alert-danger alert-dismissible">
								<i class="icon fa fa-warning"></i>
								Please, verify your email
								</div>
							'
        );
        redirect("id/masuk");
      } else {
        $this->session->set_userdata("id", $row->id);
        $this->session->set_userdata("nama", $row->nama);
        $this->session->set_userdata("email", $row->email);
        $this->session->set_userdata("is_admin", $row->is_admin);
        $this->session->set_userdata("status", $row->status);
        $count = $this->mlogin->check_campaign($row->id);
        if ($row->status == "4" && $count > 0) {
          redirect("id/dashboard");
        } else {
          redirect("id/verifikasi");
        }
      }
    } else {
      $this->session->set_flashdata(
        "pesan",
        '
								<div class="alert alert-danger alert-dismissible">
								<i class="icon fa fa-warning"></i>
								Username / Password tidak sesuai
								</div>
							'
      );
      redirect("id/masuk");
    }
  }

  function password()
  {
    $title["title"] = "Reset Password | Sarana Crowdfunding";
    $this->load->view("component/id/header", $title);
    $this->load->view("component/id/navbar");
    $this->load->view("id/participant/reset_password");
    $this->load->view("component/id/footer_log");
  }
  function new_password($id, $code)
  {
    $idnew = decrypt_url($id);
    $codenew = decrypt_url($code);
    $res = $this->mlogin->verify($idnew, $codenew);
    if ($res) {
      $title["title"] = "Reset Password | Sarana Crowdfunding";
      $data["id"] = $id;
      $data["code"] = $code;
      $this->load->view("component/id/header", $title);
      $this->load->view("component/id/navbar");
      $this->load->view("id/participant/new_password", $data);
      $this->load->view("component/id/footer_form");
    } else {
      redirect("error");
    }
  }

  function proses_newpassword()
  {
    $this->form_validation->set_rules(
      "password",
      "password",
      "trim|required|min_length[8]"
    );
    $this->form_validation->set_rules(
      "repassword",
      "confirm password",
      "required|matches[password]"
    );

    if ($this->form_validation->run()) {
      $id = $this->input->post("id");
      $code = $this->input->post("code");
      $pass = $this->input->post("password");
      $idnew = decrypt_url($id);
      $codenew = decrypt_url($code);
      $res = $this->mlogin->verify($idnew, $codenew);
      if ($res) {
        $email = $res->email;
        $nama = $res->nama;
        $status = $res->status;
        $this->mlogin->new_password($idnew, $pass);
        if ($this->db->affected_rows() > 0) {
          $array = [
            "email" => $email,
            "nama" => $nama,
            "pass" => $pass,
            "status" => $status,
          ];
        }
      }
    } else {
      $array = [
        "error" => true,
        "password_error" => form_error("password"),
        "repassword_error" => form_error("repassword"),
      ];
    }

    echo json_encode($array);
  }

  function reset_password()
  {
    $email = $this->input->post("email", true);
    $ceklogin = $this->mlogin->check_email($email);

    if ($ceklogin) {
      foreach ($ceklogin as $row);
      if ($row->status == "1") {
        $this->session->set_flashdata(
          "pesan",
          '
								<div class="alert alert-danger alert-dismissible">
								<i class="icon fa fa-warning"></i>
								Please, verify your email
								</div>
							'
        );
        redirect("id/lupa-password");
      } else {
        $code = substr(
          str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 6)),
          6,
          6
        );

        $this->mlogin->reset_password($row->id, $code);
        if ($this->db->affected_rows() > 0) {
          $this->mlogin->email_reset($row->id, $code, $email);
          $this->session->set_flashdata(
            "success",
            '
								<div class="alert alert-success alert-dismissible">
								<i class="icon fa fa-warning"></i>
								Email reset password sudah dikirim, silahkan check email kamu
								</div>
							'
          );
          redirect("id/lupa-password");
        }
      }
    } else {
      $this->session->set_flashdata(
        "pesan",
        '
								<div class="alert alert-danger alert-dismissible">
								<i class="icon fa fa-warning"></i>
								Email tidak ditemukan
								</div>
							'
      );
      redirect("id/lupa-password");
    }
  }

  function dologin()
  {
    $email = $this->input->post("mail");
    $password = $this->input->post("pwd");
    $nama = $this->input->post("nama");
    $status = $this->input->post("status");
    $res = $this->mlogin->islogin($email, $password);
    if ($res) {
      $this->session->set_userdata("email", $email);
      $this->session->set_userdata("nama", $nama);
      $this->session->set_userdata("status", $status);
      echo base_url() . "id/verifikasi";
    } else {
      echo 0;
    }
  }

  function logout()
  {
    $this->session->unset_userdata("email");
    $this->session->unset_userdata("nama");
    $this->session->unset_userdata("id");
    $this->session->unset_userdata("is_admin");
    $this->session->unset_userdata("status");

    redirect("id/masuk");
  } //end function logout

  function sende()
  {
    $this->mlogin->email_verify();
  }

  function register()
  {
    $this->form_validation->set_rules("nama", "name", "required");
    $this->form_validation->set_rules(
      "tlp",
      "phone number",
      "required|numeric"
    );
    $this->form_validation->set_rules(
      "email",
      "email",
      "trim|required|valid_email|callback_email_check"
    );
    $this->form_validation->set_rules(
      "password",
      "password",
      "trim|required|min_length[8]"
    );
    $this->form_validation->set_rules(
      "repassword",
      "confirm password",
      "required|matches[password]"
    );

    if ($this->form_validation->run()) {
      $code = substr(
        str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 6)),
        6,
        6
      );

      $this->mlogin->register($code);
      if ($this->db->affected_rows() > 0) {
        $id_user = $this->db->insert_id();
        $this->mlogin->email_verify($id_user, $code);
        $nama = $this->input->post("nama", true);
        $email = $this->input->post("email", true);
        $password = $this->input->post("password", true);
        $array = [
          "nama" => $nama,
          "email" => $email,
          "pass" => $password,
          "success" => true,
        ];
      }
    } else {
      $array = [
        "error" => true,
        "nama_error" => form_error("nama"),
        "tlp_error" => form_error("tlp"),
        "email_error" => form_error("email"),
        "password_error" => form_error("password"),
        "repassword_error" => form_error("repassword"),
      ];
    }

    echo json_encode($array);
  }

  function email_check($strr)
  {
    $cekk = $this->db
      ->query("SELECT * FROM cfs_participant where email='" . $strr . "'")
      ->num_rows();
    if ($cekk > 0) {
      $this->form_validation->set_message(
        "email_check",
        '<span style="color:red">* alamat email sudah dipakai</span>'
      );
      return false;
    } else {
      return true;
    }
  }
} // end class
