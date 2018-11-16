<?php
    
    class Dashboard extends CI_Controller{
        
        function __construct() {
            parent::__construct();
            $this->load->model('EmployeeModel');
        }
        
        function index(){
            $userID = $this->session->userdata('user_id');
            
            if(isset($userID)){
                $data["endContractToday"] = $this->EmployeeModel->getExpiredEmployeeContractToday();
                $data["endContractThisMonth"] = $this->EmployeeModel->getExpiredEmployeeContractPerPeriodMonth("0");
                $data["endContractNextThreeMonths"] = $this->EmployeeModel->getExpiredEmployeeContractPerPeriodMonth("3");
                $data["endContractOutstanding"] = $this->EmployeeModel->getExpiredEmployeeContractOutstanding();
                $this->load->view('dashboard',$data);
            } else {
                redirect('');
            }
        }
        
    }
