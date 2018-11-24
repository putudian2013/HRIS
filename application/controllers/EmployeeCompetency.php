<?php
    
    class EmployeeCompetency extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('EmployeeCompetencyModel');
            $this->load->model('CompetencyAreaModel');            
            $this->load->model('CompetencyModel');            
        }
                      
        
        function add($employeeID, $companyID, $divisionID, $departmentID){
                        
            $data["action"] = "add";
            $data["employeeID"] = $employeeID;
            $data["companyID"] = $companyID;
            $data["divisionID"] = $divisionID;
            $data["departmentID"] = $departmentID;
            $data["competencyArea"] = $this->CompetencyAreaModel->getAllCompetencyArea();  
            $data["competency"] = $this->CompetencyModel->getAllCompetency();  
            $this->load->view('employee/employee-competency-editor',$data);
            
        }   
        
        function save(){
            
            $employeeID = $this->input->post('employeeID');
            $companyID = $this->input->post('companyID');
            $divisionID = $this->input->post('divisionID');
            $departmentID = $this->input->post('departmentID');
            $issuedBy = $this->input->post('issuedBy');
            $issuedDate = $this->input->post('issuedDate');
            $registrationNumber = $this->input->post('registrationNumber');            
            $competencyID = $this->input->post('competency');
            $validFrom = $this->input->post('validFrom');
            $validTo = $this->input->post('validTo');
            
            $data = array(
                'issued_by' => $issuedBy,
                'issued_date' => $issuedDate,
                'registration_number' => $registrationNumber,
                'competency_id' => $competencyID,
                'valid_from' => $validFrom,
                'valid_to' => $validTo,
                'employee_id' => $employeeID
            );
            
            $this->EmployeeCompetencyModel->insertEmployeeCompetency($data);
            redirect('employee/education/' . $employeeID . '/' . $companyID . '/' . $divisionID . '/' . $departmentID);
        }
        
        function edit($employeeCompetencyID, $employeeID, $companyID, $divisionID, $departmentID){
            
            $data["action"] = "edit";
            $data["employeeCompetency"] = $this->EmployeeCompetencyModel->getEmployeeCompetency($employeeCompetencyID);
            $data["employeeID"] = $employeeID;
            $data["companyID"] = $companyID;
            $data["divisionID"] = $divisionID;
            $data["departmentID"] = $departmentID;
            $data["competencyArea"] = $this->CompetencyAreaModel->getAllCompetencyArea();  
            $data["competency"] = $this->CompetencyModel->getAllCompetency();  
            $this->load->view('employee/employee-competency-editor',$data);
            
        }
        
        function update(){
            $employeeCompetencyID = $this->input->post('employeeCompetencyID');
            $employeeID = $this->input->post('employeeID');
            $companyID = $this->input->post('companyID');
            $divisionID = $this->input->post('divisionID');
            $departmentID = $this->input->post('departmentID');
            $issuedBy = $this->input->post('issuedBy');
            $issuedDate = $this->input->post('issuedDate');
            $registrationNumber = $this->input->post('registrationNumber');            
            $competencyID = $this->input->post('competency');
            $validFrom = $this->input->post('validFrom');
            $validTo = $this->input->post('validTo');
            
            $data = array(
                'issued_by' => $issuedBy,
                'issued_date' => $issuedDate,
                'registration_number' => $registrationNumber,
                'competency_id' => $competencyID,
                'valid_from' => $validFrom,
                'valid_to' => $validTo,
                'employee_id' => $employeeID
            );
            
            $this->EmployeeCompetencyModel->updateEmployeeCompetency($data,$employeeCompetencyID);
            redirect('employee/competency/' . $employeeID . '/' . $companyID . '/' . $divisionID . '/' . $departmentID);
        }
        
        function delete($employeeCompetencyID) {
            $this->EmployeeCompetencyModel->deleteEmployeeCompetency($employeeCompetencyID);                  
        }
        
    }
