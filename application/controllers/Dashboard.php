<?php
    
    class Dashboard extends CI_Controller{
        
        function __construct() {
            parent::__construct();                     
        }
        
        function index(){
            $userID = $this->session->userdata('user_id');
            
            if(isset($userID)){
                $this->load->view('dashboard');
            } else {
                redirect('');
            }
        }
        
    }
