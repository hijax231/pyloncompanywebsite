<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }


	public function index()
	{
        $this->Main();
    }
    
    public function Main($pages = 'index')
    {
        $this->load->view('inc/header');
        $this->load->view('main/'.$pages);
        $this->load->view('inc/footer');
    }
}
