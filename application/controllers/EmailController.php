<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmailController extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('email/contact');
    }

    function send() {


        $email = $this->input->post('email');

        echo  json_encode($email[0]->Fullname);
//SMTP & mail configuration

// $config['protocol']    = 'smtp';
// $config['smtp_host']    = 'smtp.gmail.com';
// $config['smtp_port']    = '465';
// $config['smtp_timeout'] = '7';
// $config['smtp_user']    = 'pylondev10@gmail.com';
// $config['smtp_pass']    = 'ITpylon@dmin10';
// $config['charset']    = 'utf-8';
// $config['newline']    = "\r\n";
// $config['mailtype'] = 'text'; // or html
// $config['validation'] = TRUE; // bool whether to validate email or not     



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
$htmlContent = '<h1>Sending email via Gmail SMTP server</h1>';
$htmlContent .= '<p>This email has sent via Gmail SMTP server from CodeIgniter application.</p>';
 
$this->email->to('pasajol231@gmail.com');
$this->email->from('pylondev10@pyloninternationals.com','Pylon International Trading Corp.');
$this->email->subject('How to send email via Gmail SMTP server in CodeIgniter');
$this->email->message($htmlContent);
 
//Send email
$this->email->send();
    }
}