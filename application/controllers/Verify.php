<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Verify extends CI_Controller
{
  function index()
  {
    $title["title"] = "Verify Your Email Account | Sarana Crowdfunding";
    $this->load->view("component/id/header", $title);
    $this->load->view("component/id/navbar");
    $this->load->view("verify_page");
    $this->load->view("component/id/footer_log");
  }
  function success()
  {
    $title["title"] = "Success | Sarana Crowdfunding";
    $this->load->view("component/id/header", $title);
    $this->load->view("component/id/navbar");
    $this->load->view("success_emailverify");
    $this->load->view("component/id/footer_log");
  }
  function error()
  {
    $title["title"] = "upps.. Something wrong | Sarana Crowdfunding";
    $this->load->view("component/id/header", $title);
    $this->load->view("component/id/navbar");
    $this->load->view("error_emailverify");
    $this->load->view("component/id/footer_log");
  }
  function email($id, $code)
  {
    $idnew = decrypt_url($id);
    $codenew = decrypt_url($code);
    $res = $this->mlogin->verify($idnew, $codenew);
    if ($res) {
      $this->mlogin->update_verify($idnew);
      if ($this->db->affected_rows() > 0) {
        redirect("success");
      }
    } else {
      redirect("error");
    }
  }
}
