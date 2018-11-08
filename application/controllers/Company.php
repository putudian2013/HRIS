<?php
    
    class Company extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('CompanyModel');
        }
        
        function index(){
            
            $data['company'] = $this->CompanyModel->getAllCompany();           
            $this->load->view('organization/masterdata/company', $data);
            
        }               
        
        function add(){
                        
            $data["action"] = "add";
            $this->load->view('organization/masterdata/company-editor',$data);
            
        }   
        
        function save(){
            
            $companyName = $this->input->post('companyName');
            $this->CompanyModel->insertCompany($companyName);
            redirect('company');
        }
        
        function edit($companyID){
            
            $data["action"] = "edit";
            $data["company"] = $this->CompanyModel->getCompany($companyID);
            $this->load->view('organization/masterdata/company-editor',$data);
            
        }
        
        function update(){
            $companyName = $this->input->post('companyName');
            $companyID = $this->input->post('companyID');
            $this->CompanyModel->updateCompany($companyID,$companyName);
            redirect('company');
        }
        
        function delete($companyID) {
            $this->CompanyModel->deleteCompany($companyID);                  
        }
        
    }
