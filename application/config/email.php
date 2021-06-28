<?php defined("BASEPATH") or exit("No direct script access allowed");

$config = [
  "protocol" => "smtp", // 'mail', 'sendmail', or 'smtp'
  "smtp_host" => "", //mail server
  "smtp_port" => 465,
  "smtp_user" => "", 
  "smtp_pass" => "",
  "smtp_crypto" => "ssl", //can be 'ssl' or 'tls' for example
  "mailtype" => "html", //plaintext 'text' mails or 'html'
  "smtp_timeout" => "4", //in seconds
  "charset" => "iso-8859-1",
  "wordwrap" => true,
];
