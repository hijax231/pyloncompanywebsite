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







$config = Array(
    'protocol' => 'mail',
    'smtp_host' => 'mail.pyloninternationals.com',
    'smtp_port' => 587 ,
    'smtp_user' => 'EQurantinePass@pyloninternationals.com',
    'smtp_pass' => 'ITpylon@dmin10',
    'mailtype'  => 'html', 
    'charset'   => 'iso-8859-1'
);


$this->load->library('email', $config);
$this->email->set_newline("\r\n");
 
//Email content
$htmlContent = '<p>'.ucfirst($data['fullname']).'</p>';
$htmlContent .= '<p>'.ucfirst($data['address']).'</p>';
$htmlContent .= '<p>'.ucfirst($data['position']).'</p>';

$htmlContent .= '<p>'.$data['email'].'</p>';
$htmlContent .= '<p>'.$data['contact'].'</p><br>';


$htmlContent .= '<p>'.date("M-d-Y").'</p><br>';

$htmlContent .= '<p>Message:</p>';
$htmlContent .= '<p>'.$data['message'].'</p><br>';

$this->email->to('pylon.intl.tradingcorp@gmail.com');
$this->email->from($data['email'],'E-Qurantine Pass Inquiry');
$this->email->subject('E-Qurantine Pass Inquiry');
$this->email->message($htmlContent);
 
//Send email
echo $this->email->send();
}
}