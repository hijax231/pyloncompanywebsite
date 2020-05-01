<?php
date_default_timezone_set('Asia/Manila');
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailController extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('email/contact');
    }

    public function send() {


      $data = [
            "fullname" => $this->input->post('fullname'),
            "position" => $this->input->post('position'),
            "address" => $this->input->post('address'),
            "email" => $this->input->post('email'),
            "contact" => $this->input->post('contact'),
            "message" => $this->input->post('message'),
      ];

      echo json_encode($data);

// SMTP & mail configuration

$config['protocol']    = 'smtp';
$config['smtp_host']    = 'smtp.gmail.com';
$config['smtp_port']    = '465';
$config['smtp_timeout'] = '7';
$config['smtp_user']    = 'pylondev10@gmail.com';
$config['smtp_pass']    = 'ITpylon@dmin10';
$config['charset']    = 'utf-8';
$config['newline']    = "\r\n";
$config['mailtype'] = 'text'; // or html
$config['validation'] = TRUE; // bool whether to validate email or not     



$config = Array(
    'protocol' => 'mail',
    'smtp_host' => 'mail.pyloninternationals.com',
    'smtp_port' => 587 ,
    'smtp_user' => 'pylondev10@pyloninternationals.com',
    'smtp_pass' => 'ITpylon@dmin10',
    'mailtype'  => 'html', 
    'charset'   => 'iso-8859-1'
);


$this->load->library('email', $config);
$this->email->set_newline("\r\n");
 
//Email content
$htmlContent = '<p>'.$data['fullname'].'</p>';
$htmlContent .= '<p>'.$data['address'].'</p><br>';
$htmlContent .= '<p>'.$data['position'].'</p>';
$htmlContent .= '<p>'.$data['contact'].'</p><br>';


$htmlContent .= '<p>'.date("Y/m/d").'</p><br>';


$htmlContent .= '<p>'.$data['message'].'</p><br>';

$this->email->to('pasajol231@gmail.com');
$this->email->from('pylondev10@pyloninternationals.com','Pylon International Trading Corp.');
$this->email->subject('E-Qurantine Pass Inquiry');
$this->email->message($htmlContent);
 
//Send email
$this->email->send();
}
}