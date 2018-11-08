<?php
    
    class EmployeeCategory extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('EmployeeCategoryModel');
        }
        
        function index(){
            
            $data['employeeCategory'] = $this->EmployeeCategoryModel->getAllEmployeeCategory();           
            $this->load->view('employee/masterdata/employee-category', $data);
            
        }               
        
        function add(){
                        
            $data["action"] = "add";
            $this->load->view('employee/masterdata/employee-category-editor',$data);
            
        }   
        
        function save(){
            
            $employeeCategoryName = $this->input->post('employeeCategoryName');
            $this->EmployeeCategoryModel->insertEmployeeCategory($employeeCategoryName);
            redirect('employeeCategory');
        }
        
        function edit($employeeCategoryID){
            
            $data["action"] = "edit";
            $data["employeeCategory"] = $this->EmployeeCategoryModel->getEmployeeCategory($employeeCategoryID);
            $this->load->view('employee/masterdata/employee-category-editor',$data);
            
        }
        
        function update(){
            $employeeCategoryName = $this->input->post('employeeCategoryName');
            $employeeCategoryID = $this->input->post('employeeCategoryID');
            $this->EmployeeCategoryModel->updateEmployeeCategory($employeeCategoryID,$employeeCategoryName);
            redirect('employeeCategory');
        }
        
        function delete($employeeCategoryID) {
            $this->EmployeeCategoryModel->deleteEmployeeCategory($employeeCategoryID);                  
        }
        
    }
