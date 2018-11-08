<?php
    
    class Division extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('DivisionModel');
            $this->load->model('CompanyModel');
        }
        
        function index(){
            
            $data['division'] = $this->DivisionModel->getAllDivision();           
            $this->load->view('organization/masterdata/division', $data);
            
        }     
        
        function getDivisionByCompanyAjax($companyID){            
            $data = $this->DivisionModel->getDivisionByCompany($companyID);
            echo json_encode($data);
        }
        
        function add(){
            
            $data["action"] = "add";
            $data['company'] = $this->CompanyModel->getAllCompany();
            $this->load->view('organization/masterdata/division-editor',$data);
            
        }  
        
        function save(){
            
            $companyID = $this->input->post('companyID');                        
            $divisionName = $this->input->post('divisionName');            
            $this->DivisionModel->insertDivision($companyID,$divisionName);
            redirect('division');
            
        }
        
        function edit($divisionID){
            
            $data["action"] = "edit";
            $data['company'] = $this->CompanyModel->getAllCompany();
            $data["division"] = $this->DivisionModel->getDivision($divisionID);
            $this->load->view('organization/masterdata/division-editor',$data);
            
        }
        
        function update(){
            $divisionName = $this->input->post('divisionName');
            $divisionID = $this->input->post('divisionID');
            $this->DivisionModel->updateDivision($divisionID,$divisionName);
            redirect('division');
        }
        
        function delete($divisionID) {
            $this->DivisionModel->deleteDivision($divisionID);                  
        }
    }
