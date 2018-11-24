<?php
    
    class Family extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('FamilyModel');
            $this->load->model('RelationshipModel');
            $this->load->model('ReligionModel');
            $this->load->model('EducationModel');
            $this->load->model('MaritalStatusModel');
            $this->load->model('NationalityModel');
        }                              
                
        function add($employeeID, $companyID, $divisionID, $departmentID){
            
            $data['employee'] = $employeeID;
            $data['companyID'] = $companyID;
            $data['divisionID'] = $divisionID;
            $data['departmentID'] = $departmentID;                        
            $data["action"] = "add";            
            $data["relationship"] = $this->RelationshipModel->getAllRelationship();
            $data["religion"] = $this->ReligionModel->getAllReligion();
            $data["education"] = $this->EducationModel->getAllEducation();
            $data["maritalStatus"] = $this->MaritalStatusModel->getAllMaritalStatus();
            $data["nationality"] = $this->NationalityModel->getAllNationality();
            $this->load->view('employee/family-member-editor',$data);
            
        }   
        
        function save(){
            
            $fullName = $this->input->post('fullName');
            $idCardNumber = $this->input->post('idCardNumber');
            $gender = $this->input->post('gender');
            $birthPlace = $this->input->post('birthPlace');
            $birthDate = $this->input->post('birthDate');
            $religionID = $this->input->post('religion');
            $educationID = $this->input->post('education');
            $maritalStatusID = $this->input->post('maritalStatus');            
            $relationshipID = $this->input->post('relationship');
            $natinalityID = $this->input->post('nationality');
            $address = $this->input->post('address');
            $phoneNumber = $this->input->post('phoneNumber');
            
            $employeeID = $this->input->post('employeeID');
            $companyID = $this->input->post('companyID');
            $divisionID = $this->input->post('divisionID');
            $departmentID = $this->input->post('departmentID');
            
            $data = array(
                'full_name' => $fullName,
                'id_card_number' => $idCardNumber,
                'gender' => $gender,
                'birth_place' => $birthPlace,
                'birth_date' => $birthDate,
                'religion_id' => $religionID,
                'education_id' => $educationID,
                'marital_status_id' => $maritalStatusID,               
                'relationship_id' => $relationshipID,
                'nationality_id' => $natinalityID,                                
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
            $data["relationship"] = $this->RelationshipModel->getAllRelationship();
            $data["religion"] = $this->ReligionModel->getAllReligion();
            $data["education"] = $this->EducationModel->getAllEducation();
            $data["maritalStatus"] = $this->MaritalStatusModel->getAllMaritalStatus();
            $data["nationality"] = $this->NationalityModel->getAllNationality();
            $this->load->view('employee/family-member-editor',$data);
            
        }
        
        function update(){
            $familyID = $this->input->post('familyID');
             $fullName = $this->input->post('fullName');
            $idCardNumber = $this->input->post('idCardNumber');
            $gender = $this->input->post('gender');
            $birthPlace = $this->input->post('birthPlace');
            $birthDate = $this->input->post('birthDate');
            $religionID = $this->input->post('religion');
            $educationID = $this->input->post('education');
            $maritalStatusID = $this->input->post('maritalStatus');            
            $relationshipID = $this->input->post('relationship');
            $natinalityID = $this->input->post('nationality');
            $address = $this->input->post('address');
            $phoneNumber = $this->input->post('phoneNumber');
            
            $employeeID = $this->input->post('employeeID');
            $companyID = $this->input->post('companyID');
            $divisionID = $this->input->post('divisionID');
            $departmentID = $this->input->post('departmentID');
            
            $data = array(
                'full_name' => $fullName,
                'id_card_number' => $idCardNumber,
                'gender' => $gender,
                'birth_place' => $birthPlace,
                'birth_date' => $birthDate,
                'religion_id' => $religionID,
                'education_id' => $educationID,
                'marital_status_id' => $maritalStatusID,               
                'relationship_id' => $relationshipID,
                'nationality_id' => $natinalityID,                                
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
