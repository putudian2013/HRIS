<?php
    
    class Department extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('DepartmentModel');
            $this->load->model('DivisionModel');
            $this->load->model('CompanyModel');
        }
        
        function index(){
            
            $data['department'] = $this->DepartmentModel->getAllDepartment();           
            $this->load->view('organization/masterdata/department', $data);
            
        }    
        
        function getDepartmentByDivisionAjax($divisionID){            
            $data = $this->DepartmentModel->getDepartmentByDivision($divisionID);
            echo json_encode($data);
        }
        
        function add(){
                     
            $data["action"] = "add";
            $data['division'] = $this->DivisionModel->getAllDivision();
            $data['company'] = $this->CompanyModel->getAllCompany();
            $this->load->view('organization/masterdata/department-editor',$data);
            
        }  
        
        function save(){
                        
            $divisionID = $this->input->post('divisionID');
            $departmentName = $this->input->post('departmentName');
            $this->DepartmentModel->insertDepartment($divisionID,$departmentName);
            redirect('department');
        }
        
        function edit($departmentID,$companyID){
            
            $data["action"] = "edit";
            $data['division'] = $this->DivisionModel->getDivisionByCompany($companyID);
            $data['company'] = $this->CompanyModel->getAllCompany();
            $data["department"] = $this->DepartmentModel->getDepartment($departmentID);
            $this->load->view('organization/masterdata/department-editor',$data);
            
        }
        
        function update(){            
            $departmentName = $this->input->post('departmentName');
            $departmentID = $this->input->post('departmentID');
            $divisionID = $this->input->post('divisionID');
            $this->DepartmentModel->updateDepartment($departmentID,$divisionID,$departmentName);
            redirect('department');
        }
        
        function delete($departmentID) {
            $this->DepartmentModel->deleteDepartment($departmentID);                  
        }
    }
