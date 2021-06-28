<?php

class MLogin extends CI_Model
{
  //proses validasi login
  function login($email, $password)
  {
    $this->db->select("*");
    $this->db->from("cfs_participant");
    $this->db->where("email", $email);
    $this->db->where("password", md5($password));
    $this->db->limit(1);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  } //end function login

  //proses validasi login
  function check_email($email)
  {
    $this->db->select("*");
    $this->db->from("cfs_participant");
    $this->db->where("email", $email);
    $this->db->limit(1);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  } //end function login

  function check_campaign($id)
  {
    $this->db->select("*");
    $this->db->from("cfs_campaign");
    $this->db->where("id_participant", $id);
    $this->db->limit(1);

    $query = $this->db->get();

    return $query->num_rows();
  } //end function login

  public function islogin($email, $password)
  {
    $this->db->select("*");
    $this->db->from("cfs_participant");
    $this->db->where("email", $email);
    $this->db->where("password", md5($password));
    $this->db->limit(1);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->num_rows();
      return $query->result();
    } else {
      return false;
    }
  }

  function register($code)
  {
    $nama = $this->input->post("nama", true);
    $email = $this->input->post("email", true);
    $tlp = $this->input->post("tlp", true);
    $password = $this->input->post("password", true);
    $tgl_reg = date("Y-m-d");
    $data = [
      "nama" => $nama,
      "email" => $email,
      "tlp" => $tlp,
      "tgl_register" => $tgl_reg,
      "password" => md5($password),
      "status" => "1",
      "code" => $code,
    ];
    $this->db->insert("cfs_participant", $data);
  }

  function email_verify($id, $code)
  {
    $this->load->config("email");

    $from = $this->config->item("smtp_user");
    $to = $this->input->post("email", true);
    $subject = "Verify Your Email Account";
    $data["nama"] = $this->input->post("nama", true);
    $data["id"] = encrypt_url($id);
    $data["code"] = encrypt_url($code);
    $message = $this->load->view("email", $data, true);

    $this->email->set_newline("\r\n");
    $this->email->from($from, "Sarana Crowdfunding");
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
  }

  function reset_password($id, $code)
  {
    $data = [
      "code" => $code,
    ];
    $where = ["id" => $id];
    $this->db->where($where);
    $this->db->update("cfs_participant", $data);
  }
  function new_password($id, $pass)
  {
    $data = [
      "code" => null,
      "password" => md5($pass),
    ];
    $where = ["id" => $id];
    $this->db->where($where);
    $this->db->update("cfs_participant", $data);
  }

  function email_reset($id, $code, $email)
  {
    $this->load->config("email");

    $from = $this->config->item("smtp_user");
    $to = $email;
    $subject = "Request Reset Password";
    $data["id"] = encrypt_url($id);
    $data["code"] = encrypt_url($code);
    $message = $this->load->view("email_reset", $data, true);

    $this->email->set_newline("\r\n");
    $this->email->from($from, "Sarana Crowdfunding");
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
  }

  function verify($id, $code)
  {
    $this->db->select("*");
    $this->db->from("cfs_participant");
    $this->db->where("id", $id);
    $this->db->where("code", $code);
    $this->db->limit(1);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function update_verify($id)
  {
    $data = [
      "status" => "2",
      "code" => null,
    ];
    $where = ["id" => $id];
    $this->db->where($where);
    $this->db->update("cfs_participant", $data);
  }
} //end class
