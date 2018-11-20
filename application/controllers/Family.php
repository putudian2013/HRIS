<?php
    
    class Family extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('FamilyModel');
            $this->load->model('RelationshipModel');
        }                              
        
        function add($employeeID){
                        
            $data["action"] = "add";
            $data["employee"] = $employeeID;
            $data["relationship"] = $this->RelationshipModel->getAllRelationship();
            $this->load->view('employee/family-member-editor',$data);
            
        }   
        
        function save(){
            
            $employeeID = $this->input->post('employeeID');
            $relationshipID = $this->input->post('relationship');
            $fullName = $this->input->post('fullName');
            $birthDate = $this->input->post('birthDate');
            $address = $this->input->post('address');
            $phoneNumber = $this->input->post('phoneNumber');
            
            $data = array(
                'relationship_id' => $relationshipID,
                'full_name' => $fullName,
                'birth_date' => $birthDate,
                'address' => $address,
                'phone_number' => $phoneNumber                
            );
            
            $this->FamilyModel->insertFamily($companyName);
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
