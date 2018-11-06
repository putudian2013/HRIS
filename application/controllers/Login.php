<?php
    
    class Login extends CI_Controller{
        
        function __construct() {
            parent::__construct();
            $this->load->model('UserModel');            
        }
        
        function index(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $checkUser = $this->UserModel->selectUser($username,$password)->num_rows();
                                               
            if($checkUser==1){
                $this->load->view('dashboard');
                $data = $this->UserModel->selectUser($username,$password);
                foreach ($data->result() as $row) {
                    $this->session->set_userdata('full_name', $row->full_name);
                }                
            } else {
                redirect('');
            }                        
        }
        
    }
