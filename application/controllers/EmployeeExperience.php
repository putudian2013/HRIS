<?php
    
    class EmployeeExperience extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('EmployeeExperienceModel');
        }                           
        
        function add($employeeID, $companyID, $divisionID, $departmentID){
                        
            $data["action"] = "add";
            $data["employeeID"] = $employeeID;
            $data["companyID"] = $companyID;
            $data["divisionID"] = $divisionID;
            $data["departmentID"] = $departmentID;            
            $this->load->view('employee/employee-experience-editor',$data);
            
        }   
        
        function save(){
            
            $employeeID = $this->input->post('employeeID');
            $companyID = $this->input->post('companyID');
            $divisionID = $this->input->post('divisionID');
            $departmentID = $this->input->post('departmentID');
            $company = $this->input->post('company');
            $position = $this->input->post('position');            
            $startDate = $this->input->post('startDate');
            $endDate = $this->input->post('endDate');
            
            $data = array(
                'company' => $company,
                'position' => $position,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'employee_id' => $employeeID
            );
            
            $this->EmployeeExperienceModel->insertEmployeeExperience($data);
            redirect('employee/experience/' . $employeeID . '/' . $companyID . '/' . $divisionID . '/' . $departmentID);
        }
        
        function edit($employeeExperienceID, $employeeID, $companyID, $divisionID, $departmentID){
            
            $data["action"] = "edit";
            $data["employeeID"] = $employeeID;
            $data["companyID"] = $companyID;
            $data["divisionID"] = $divisionID;
            $data["departmentID"] = $departmentID;
            $data["employeeExperience"] = $this->EmployeeExperienceModel->getEmployeeExperience($employeeExperienceID);
           $this->load->view('employee/employee-experience-editor',$data);
            
        }
        
        function update(){            
            $employeeExperienceID = $this->input->post('employeeExperienceID');
            $employeeID = $this->input->post('employeeID');
            $companyID = $this->input->post('companyID');
            $divisionID = $this->input->post('divisionID');
            $departmentID = $this->input->post('departmentID');
            $company = $this->input->post('company');
            $position = $this->input->post('position');            
            $startDate = $this->input->post('startDate');
            $endDate = $this->input->post('endDate');
            
            $data = array(
                'company' => $company,
                'position' => $position,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'employee_id' => $employeeID
            );
            
            $this->EmployeeExperienceModel->updateEmployeeExperience($data,$employeeExperienceID);
            redirect('employee/experience/' . $employeeID . '/' . $companyID . '/' . $divisionID . '/' . $departmentID);
        }
        
        function delete($employeeExperienceID) {
            $this->EmployeeExperienceModel->deleteEmployeeExperience($employeeExperienceID);                  
        }
        
    }
