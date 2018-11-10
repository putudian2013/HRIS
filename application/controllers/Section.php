<?php
    
    class Section extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('SectionModel');
            $this->load->model('DepartmentModel');
            $this->load->model('DivisionModel');
            $this->load->model('CompanyModel');
        }
        
        function index(){
            
            $data['section'] = $this->SectionModel->getAllSection();           
            $this->load->view('organization/masterdata/section', $data);
            
        }    
        
        function getSectionByDepartmentAjax($departmentID){            
            $data = $this->SectionModel->getSectionByDepartment($departmentID);
            echo json_encode($data);
        }
        
        function add(){
            
            $data["action"] = "add";
            $data['company'] = $this->CompanyModel->getAllCompany();   
            $data['division'] = $this->DivisionModel->getAllDivision();   
            $data['department'] = $this->DepartmentModel->getAllDepartment(); 
            $this->load->view('organization/masterdata/section-editor',$data);
            
        }  
        
        function save(){
            
            $departmentID = $this->input->post('departmentID');
            $sectionName = $this->input->post('sectionName');
            $this->SectionModel->insertSection($departmentID,$sectionName);
            redirect('section');
        }
        
        function edit($sectionID,$companyID,$divisionID){
            
            $data["action"] = "edit";
            $data['company'] = $this->CompanyModel->getAllCompany();   
            $data['division'] = $this->DivisionModel->getDivisionByCompany($companyID);   
            $data['department'] = $this->DepartmentModel->getDepartmentByDivision($divisionID); 
            $data["section"] = $this->SectionModel->getSection($sectionID);
            $this->load->view('organization/masterdata/section-editor',$data);
            
        }
        
        function update(){
            $sectionName = $this->input->post('sectionName');
            $sectionID = $this->input->post('sectionID');
            $departmentID = $this->input->post('departmentID');
            $this->SectionModel->updateSection($sectionID,$departmentID,$sectionName);
            redirect('section');
        }
        
        function delete($sectionID) {
            $this->SectionModel->deleteSection($sectionID);                  
        }
    }
