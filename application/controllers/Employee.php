<?php
    
    class Employee extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('EmployeeModel');
        }
        
        function index(){
            
            $data['employee'] = $this->EmployeeModel->getAllEmployee();           
            $this->load->view('employee/employee-list', $data);
            
        }               
        
    }
