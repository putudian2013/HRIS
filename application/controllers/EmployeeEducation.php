<?php
    
    class EmployeeEducation extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('EmployeeEducationModel');
            $this->load->model('EducationModel');
        }
        
        function index(){
            
            $data['employeeEducation'] = $this->EmployeeEducationModel->getAllEmployeeEducation();           
            $this->load->view('employee/masterdata/employee-education', $data);
            
        }               
        
        function add($employeeID, $companyID, $divisionID, $departmentID){
                        
            $data["action"] = "add";
            $data["employeeID"] = $employeeID;
            $data["companyID"] = $companyID;
            $data["divisionID"] = $divisionID;
            $data["departmentID"] = $departmentID;
            $data['education'] = $this->EducationModel->getAllEducation();
            $this->load->view('employee/employee-education-editor',$data);
            
        }   
        
        function save(){
            
            $employeeID = $this->input->post('employeeID');
            $companyID = $this->input->post('companyID');
            $divisionID = $this->input->post('divisionID');
            $departmentID = $this->input->post('departmentID');
            $educationID = $this->input->post('education');
            $almaMater = $this->input->post('almaMater');
            $department = $this->input->post('department');
            $yearStart = $this->input->post('yearStart');
            $yearEnd = $this->input->post('yearEnd');
            
            $data = array(
                'employee_id' => $employeeID,
                'education_id' => $educationID,
                'alma_mater' => $almaMater,
                'department' => $department,
                'year_start' => $yearStart,
                'year_end' => $yearEnd
            );
            
            $this->EmployeeEducationModel->insertEmployeeEducation($data);
            redirect('employee/education/' . $employeeID . '/' . $companyID . '/' . $divisionID . '/' . $departmentID);
        }
        
        function edit($employeeEducationID, $employeeID, $companyID, $divisionID, $departmentID){
            
            $data["action"] = "edit";
            $data["employeeID"] = $employeeID;
            $data["companyID"] = $companyID;
            $data["divisionID"] = $divisionID;
            $data["departmentID"] = $departmentID;
            $data['education'] = $this->EducationModel->getAllEducation();
            $data["employeeEducation"] = $this->EmployeeEducationModel->getEmployeeEducation($employeeEducationID);
            $this->load->view('employee/employee-education-editor',$data);
            
        }
        
        function update(){
            $employeeEducationID = $this->input->post('employeeEducationID');
            $employeeID = $this->input->post('employeeID');
            $companyID = $this->input->post('companyID');
            $divisionID = $this->input->post('divisionID');
            $departmentID = $this->input->post('departmentID');
            $educationID = $this->input->post('education');
            $almaMater = $this->input->post('almaMater');
            $department = $this->input->post('department');
            $yearStart = $this->input->post('yearStart');
            $yearEnd = $this->input->post('yearEnd');
            
            $data = array(
                'employee_id' => $employeeID,
                'education_id' => $educationID,
                'alma_mater' => $almaMater,
                'department' => $department,
                'year_start' => $yearStart,
                'year_end' => $yearEnd
            );
            
            $this->EmployeeEducationModel->updateEmployeeEducation($data, $employeeEducationID);
            redirect('employee/education/' . $employeeID . '/' . $companyID . '/' . $divisionID . '/' . $departmentID);
        }
        
        function delete($employeeEducationID) {
            $this->EmployeeEducationModel->deleteEmployeeEducation($employeeEducationID);                  
        }
        
    }
