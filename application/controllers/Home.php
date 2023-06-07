<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index(){
        $this->load->view('includes/header');
        $this->load->view('Home');
        $this->load->view('includes/footer');
    }


    public function about(){
        $this->load->view('includes/header');
        $this->load->view('homepage/about');
        $this->load->view('includes/footer');
    }

    public function officials(){
        $this->load->view('includes/header');
        $this->load->view('homepage/officials');
        $this->load->view('includes/footer');
    }

    public function announcement(){
        $this->load->view('includes/header');
        $this->load->view('homepage/announcement');
        $this->load->view('includes/footer');
    }

}