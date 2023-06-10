<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResidentController extends CI_Controller {

    public function login(){

       
        $this->load->view('includes/header');
        $this->load->view('residents/login-user');
        $this->load->view('includes/footer');
    }

    public function forgot(){
        $this->load->view('includes/header');
        $this->load->view('residents/forgot-password');
        $this->load->view('includes/footer');
    }

    public function resetcode(){
        $this->load->view('includes/header');
        $this->load->view('residents/reset-code');
        $this->load->view('includes/footer');
    }

    public function newpass(){
        $this->load->view('includes/header');
        $this->load->view('residents/new-password');
        $this->load->view('includes/footer');
    }

    public function passwordchanged(){
        $this->load->view('includes/header');
        $this->load->view('residents/password-changed');
        $this->load->view('includes/footer');
    }


    public function welcome(){
        $this->load->view('residents/home'); 
    }

    public function documents(){
        $this->load->view('residents/requestsandappointment');  
    }

    public function signup(){

        $this->load->view('includes/header');
        $this->load->view('residents/signup-user');
        $this->load->view('includes/footer');
       
    }

    public function profile(){
        $this->load->view('residents/header-client');
        $this->load->view('residents/profile');
      
        
    }

    public function editprofile(){
      
        $this->load->view('residents/editprofile');
        
    }


    public function logout(){
        $this->load->view('residents/logout-user');
        
    }

    public function otp(){
        $this->load->view('residents/includes/header-process');
        $this->load->view('residents/user-otp');
        $this->load->view('includes/footer');
        
    }

    public function verify(){
        $this->load->view('residents/includes/header-process');
        $this->load->view('residents/verify');
        $this->load->view('includes/footer');
       
        
    }

    public function pendingverify(){
        $this->load->view('residents/includes/header-process');
        $this->load->view('residents/pendingverify');
        $this->load->view('includes/footer');
       
        
    }

    public function request(){
        $this->load->view('residents/includes/header-process');
        $this->load->view('residents/requestdocumentdetails');
        $this->load->view('includes/footer');
       
        
    }

    public function requestSent(){
        $this->load->view('residents/includes/header-process');
        $this->load->view('residents/requestapproval2');
        $this->load->view('includes/footer');
       
        
    }

    public function rate(){
        
        $this->load->view('residents/rate');
       
       
        
    }
}
