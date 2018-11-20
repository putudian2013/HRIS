<?php
    
    class Employee extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('EmployeeModel');
            $this->load->model('ReligionModel');
            $this->load->model('MaritalStatusModel');
            $this->load->model('RaceModel');
            $this->load->model('NationalityModel');
            $this->load->model('CompanyModel');
            $this->load->model('DivisionModel');
            $this->load->model('DepartmentModel');            
            $this->load->model('SectionModel');            
            $this->load->model('PositionModel');
            $this->load->model('TaxStatusModel');
            $this->load->model('LevelModel');
            $this->load->model('EmployeeCategoryModel');
            $this->load->model('FamilyModel');
        }
        
        function index(){
            
            $data['employee'] = $this->EmployeeModel->getAllEmployee();           
            $this->load->view('employee/employee-list', $data);
            
        }      
        
        function add(){
                        
            $data["action"] = "add";
            $data["religion"] = $this->ReligionModel->getAllReligion();
            $data["maritalStatus"] = $this->MaritalStatusModel->getAllMaritalStatus();
            $data["race"] = $this->RaceModel->getAllRace();
            $data["nationality"] = $this->NationalityModel->getAllNationality();
            $data["company"] = $this->CompanyModel->getAllCompany();
            $data["position"] = $this->PositionModel->getAllPosition();
            $data["taxStatus"] = $this->TaxStatusModel->getAllTaxStatus();
            $data["level"] = $this->LevelModel->getAllLevel();
            $data["empCategory"] = $this->EmployeeCategoryModel->getAllEmployeeCategory();
            $this->load->view('employee/employee-editor',$data);
            
        } 
        
        function save(){            
            $payrollNumber = $this->input->post("payrollNumber");           
            $fullName = $this->input->post("fullName");
            $primaryAddress = $this->input->post("primaryAddress");
            $secondaryAddress = $this->input->post("secondaryAddress");
            $phoneNumber = $this->input->post("phoneNumber");
            $gender = $this->input->post("gender");
            $birthPlace = $this->input->post("birthPlace");
            $birthDate = $this->input->post("birthDate");    
            $religionID = $this->input->post("religion");
            $maritalStatusID = $this->input->post("maritalStatus");
            $bloodType = $this->input->post("bloodType");
            $raceID = $this->input->post("race");
            $nationalityID = $this->input->post("nationality");                        
            $idCardType = $this->input->post("idCardType");
            $idCardNumber = $this->input->post("idCardNumber");
            $email = $this->input->post("email");
            $companyID = $this->input->post("company");
            $divisionID = $this->input->post("division");
            $departmentID = $this->input->post("department");
            $sectionID = $this->input->post("section");            
            $positionID = $this->input->post("position");
            $empCategoryID = $this->input->post("empCategory");  
            $levelID = $this->input->post("level");  
            $commencingDate = $this->input->post("commencingDate");                          
            $bpjsKesehatanNumber = $this->input->post("bpjsKesehatanNumber");  
            $bpjsKesehatanJoinDate = $this->input->post("bpjsKesehatanJoinDate");  
            $bpjsKetenagakerjaanNumber = $this->input->post("bpjsKetenagakerjaanNumber");  
            $bpjsKetenagakerjaanJoinDate = $this->input->post("bpjsKetenagakerjaanJoinDate");  
            $taxStatusID = $this->input->post("taxStatus");
            $contractEndDate = $this->input->post("contractEndDate");
            
            $data = array(
                'payroll_number' => $payrollNumber,
                'full_name' => $fullName,
                'primary_address' => $primaryAddress,
                'secondary_address' => $secondaryAddress,
                'phone_number' => $phoneNumber,
                'gender' => $gender,
                'birth_place' => $birthPlace,
                'birth_date' => $birthDate,
                'religion_id' => $religionID,
                'marital_status_id' => $maritalStatusID,
                'race_id' => $raceID,
                'nationality_id' => $nationalityID,
                'blood_type' => $bloodType,
                'id_card_type' => $idCardType,
                'id_card_number' => $idCardNumber,
                'email' => $email,
                'company_id' => $companyID,
                'division_id' => $divisionID,
                'department_id' => $departmentID,
                'section_id' => $sectionID,
                'position_id' => $positionID,
                'commencing_date' => $commencingDate,
                'emp_category_id' => $empCategoryID,                
                'level_id' => $levelID,                
                'bpjs_kesehatan_number' => $bpjsKesehatanNumber,
                'bpjs_kesehatan_join_date' => $bpjsKesehatanJoinDate,
                'bpjs_ketenagakerjaan_number' => $bpjsKetenagakerjaanNumber,
                'bpjs_ketenagakerjaan_join_date' => $bpjsKetenagakerjaanJoinDate,
                'tax_status_id' => $taxStatusID,
                'contract_end_date' => $contractEndDate
            );
            
            $this->EmployeeModel->insertEmployee($data);
            redirect('employee');
        }
        
        function edit($employeeID,$companyID,$divisionID,$departmentID){
                        
            $data["action"] = "edit";            
            $data['employee'] = $this->EmployeeModel->getEmployee($employeeID); 
            $data["religion"] = $this->ReligionModel->getAllReligion();
            $data["maritalStatus"] = $this->MaritalStatusModel->getAllMaritalStatus();
            $data["race"] = $this->RaceModel->getAllRace();
            $data["nationality"] = $this->NationalityModel->getAllNationality();
            $data["company"] = $this->CompanyModel->getAllCompany();            
            $data['division'] = $this->DivisionModel->getDivisionByCompany($companyID);   
            $data['department'] = $this->DepartmentModel->getDepartmentByDivision($divisionID); 
            $data['section'] = $this->SectionModel->getSectionByDepartment($departmentID);
            $data["position"] = $this->PositionModel->getAllPosition();
            $data["empCategory"] = $this->EmployeeCategoryModel->getAllEmployeeCategory();
            $data["level"] = $this->LevelModel->getAllLevel();
            $data["taxStatus"] = $this->TaxStatusModel->getAllTaxStatus();
            $this->load->view('employee/employee-editor',$data);                    
            
        }
        
        function updatePersonalData(){
            $employeeID = $this->input->post("employeeID");
            $companyID = $this->input->post("companyID");
            $divisionID = $this->input->post("divisionID");
            $departmentID = $this->input->post("departmentID");
            
            $payrollNumber = $this->input->post("payrollNumber");           
            $fullName = $this->input->post("fullName");
            $primaryAddress = $this->input->post("primaryAddress");
            $secondaryAddress = $this->input->post("secondaryAddress");
            $phoneNumber = $this->input->post("phoneNumber");
            $gender = $this->input->post("gender");
            $birthPlace = $this->input->post("birthPlace");
            $birthDate = $this->input->post("birthDate");    
            $religionID = $this->input->post("religion");
            $maritalStatusID = $this->input->post("maritalStatus");
            $bloodType = $this->input->post("bloodType");
            $raceID = $this->input->post("race");
            $nationalityID = $this->input->post("nationality");                        
            $idCardType = $this->input->post("idCardType");
            $idCardNumber = $this->input->post("idCardNumber");
            $email = $this->input->post("email");
            
            $data = array(
                'payroll_number' => $payrollNumber,
                'full_name' => $fullName,
                'primary_address' => $primaryAddress,
                'secondary_address' => $secondaryAddress,
                'phone_number' => $phoneNumber,
                'gender' => $gender,
                'birth_place' => $birthPlace,
                'birth_date' => $birthDate,
                'religion_id' => $religionID,
                'marital_status_id' => $maritalStatusID,
                'blood_type' => $bloodType,
                'race_id' => $raceID,
                'nationality_id' => $nationalityID,                
                'id_card_type' => $idCardType,
                'id_card_number' => $idCardNumber,
                'email' => $email                
            );
            
            $this->db->where('employee_id', $employeeID);
            $this->db->update('hr_employee', $data);
            redirect('employee/edit/'.$employeeID.'/'.$companyID.'/'.$divisionID.'/'.$departmentID);
            
        }
        
        function updateCompanyData(){
            
            $employeeID = $this->input->post("employeeID");
            $companyID = $this->input->post("companyID");
            $divisionID = $this->input->post("divisionID");
            $departmentID = $this->input->post("departmentID");
            
            $companyID = $this->input->post("company");
            $divisionID = $this->input->post("division");
            $departmentID = $this->input->post("department");
            $sectionID = $this->input->post("section");            
            $positionID = $this->input->post("position");
            $empCategoryID = $this->input->post("empCategory");  
            $levelID = $this->input->post("level");  
            $commencingDate = $this->input->post("commencingDate");  
            $contractEndDate = $this->input->post("contractEndDate");  
                       
            $data = array(
                'company_id' => $companyID,
                'division_id' => $divisionID,
                'department_id' => $departmentID,
                'section_id' => $sectionID,
                'position_id' => $positionID,
                'commencing_date' => $commencingDate,
                'emp_category_id' => $empCategoryID,                
                'level_id' => $levelID,
                'contract_end_date' => $contractEndDate
            );
            
            $this->db->where('employee_id', $employeeID);
            $this->db->update('hr_employee', $data);
            redirect('employee/edit/'.$employeeID.'/'.$companyID.'/'.$divisionID.'/'.$departmentID);
            
        }
        
        function updateBPJSData(){
            
            $employeeID = $this->input->post("employeeID");
            $companyID = $this->input->post("companyID");
            $divisionID = $this->input->post("divisionID");
            $departmentID = $this->input->post("departmentID");
            
            $bpjsKesehatanNumber = $this->input->post("bpjsKesehatanNumber");  
            $bpjsKesehatanJoinDate = $this->input->post("bpjsKesehatanJoinDate");  
            $bpjsKetenagakerjaanNumber = $this->input->post("bpjsKetenagakerjaanNumber");  
            $bpjsKetenagakerjaanJoinDate = $this->input->post("bpjsKetenagakerjaanJoinDate");   
            
            $data = array(
                'bpjs_kesehatan_number' => $bpjsKesehatanNumber,
                'bpjs_kesehatan_join_date' => $bpjsKesehatanJoinDate,
                'bpjs_ketenagakerjaan_number' => $bpjsKetenagakerjaanNumber,
                'bpjs_ketenagakerjaan_join_date' => $bpjsKetenagakerjaanJoinDate         
            );
            
            $this->db->where('employee_id', $employeeID);
            $this->db->update('hr_employee', $data);
            redirect('employee/edit/'.$employeeID.'/'.$companyID.'/'.$divisionID.'/'.$departmentID);
            
        }
        
        function updatePayrollData(){
            
            $employeeID = $this->input->post("employeeID");
            $companyID = $this->input->post("companyID");
            $divisionID = $this->input->post("divisionID");
            $departmentID = $this->input->post("departmentID");
            
            $taxStatusID = $this->input->post("taxStatus");            
            
            $data = array(
                'tax_status_id' => $taxStatusID
            );
            
            $this->db->where('employee_id', $employeeID);
            $this->db->update('hr_employee', $data);
            redirect('employee/edit/'.$employeeID.'/'.$companyID.'/'.$divisionID.'/'.$departmentID);
            
        }
        
        function delete($employeeID) {
            $this->EmployeeModel->deleteEmployee($employeeID);
        }
        
        function family($employeeID){    
            
            $data['family'] = $this->FamilyModel->getEmployeeFamily($employeeID);           
            $this->load->view('employee/family-member', $data);        
            
        }
        
        function picture($employeeID, $companyID, $divisionID, $departmentID){    
            
            $data["employeeID"] = $employeeID;
            $data["companyID"] = $companyID;
            $data["divisionID"] = $divisionID;
            $data["departmentID"] = $departmentID;
            
            $employee = $this->EmployeeModel->getEmployee($employeeID);
            foreach ($employee->result() as $row) :
                $data["pictureName"] = $row->picture_filename;
            endforeach;
            
            $this->load->view('employee/picture', $data);
            
        }                
        
    }
