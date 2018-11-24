<?php
    
    class Family extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('FamilyModel');
            $this->load->model('RelationshipModel');
        }                              
                
        function add($employeeID, $companyID, $divisionID, $departmentID){
            
            $data['employee'] = $employeeID;
            $data['companyID'] = $companyID;
            $data['divisionID'] = $divisionID;
            $data['departmentID'] = $departmentID;                        
            $data["action"] = "add";            
            $data["relationship"] = $this->RelationshipModel->getAllRelationship();
            $this->load->view('employee/family-member-editor',$data);
            
        }   
        
        function save(){
                        
            $relationshipID = $this->input->post('relationship');
            $fullName = $this->input->post('fullName');
            $birthDate = $this->input->post('birthDate');
            $address = $this->input->post('address');
            $phoneNumber = $this->input->post('phoneNumber');
            
            $employeeID = $this->input->post('employeeID');
            $companyID = $this->input->post('companyID');
            $divisionID = $this->input->post('divisionID');
            $departmentID = $this->input->post('departmentID');
            
            $data = array(
                'relationship_id' => $relationshipID,
                'full_name' => $fullName,
                'birth_date' => $birthDate,
                'address' => $address,
                'phone_number' => $phoneNumber,
                'employee_id' => $employeeID
            );
            
            $this->FamilyModel->insertFamily($data);
            redirect('employee/family/' . $employeeID . '/' . $companyID . '/' . $divisionID . '/' . $departmentID);
        }
        
        function edit($familyID, $employeeID, $companyID, $divisionID, $departmentID){
            
            $data['familyID'] = $familyID;
            $data['employee'] = $employeeID;            
            $data['companyID'] = $companyID;
            $data['divisionID'] = $divisionID;
            $data['departmentID'] = $departmentID; 
            $data["action"] = "edit";
            $data["relationship"] = $this->RelationshipModel->getAllRelationship();
            $data['family'] = $this->FamilyModel->getFamily($familyID);
            $this->load->view('employee/family-member-editor',$data);
            
        }
        
        function update(){
            $familyID = $this->input->post('familyID');
            $relationshipID = $this->input->post('relationship');
            $fullName = $this->input->post('fullName');
            $birthDate = $this->input->post('birthDate');
            $address = $this->input->post('address');
            $phoneNumber = $this->input->post('phoneNumber');
            
            $employeeID = $this->input->post('employeeID');
            $companyID = $this->input->post('companyID');
            $divisionID = $this->input->post('divisionID');
            $departmentID = $this->input->post('departmentID');
            
            $data = array(
                'relationship_id' => $relationshipID,
                'full_name' => $fullName,
                'birth_date' => $birthDate,
                'address' => $address,
                'phone_number' => $phoneNumber,
                'employee_id' => $employeeID
            );
            
            $this->FamilyModel->updateFamily($data,$familyID);
            redirect('employee/family/' . $employeeID . '/' . $companyID . '/' . $divisionID . '/' . $departmentID);
        }
        
        function delete($familyID) {
            $this->FamilyModel->deleteFamily($familyID);                  
        }
        
    }
