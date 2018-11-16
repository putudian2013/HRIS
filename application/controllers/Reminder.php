<?php

    class Reminder extends CI_Controller{
        
        function __construct() {
            parent::__construct();
            $this->load->model('EmployeeModel');
        }
        
        function employeeContract(){
            
            $method = $this->input->post('method');
            
            switch ($method) {
                case "today":
                    $data["employee"] = $this->EmployeeModel->getExpiredEmployeeContractToday();
                    break;
                case "thisMonth":
                    $data["employee"] = $this->EmployeeModel->getExpiredEmployeeContractPerPeriodMonth("0");
                    break;
                case "3Months":
                    $data["employee"] = $this->EmployeeModel->getExpiredEmployeeContractPerPeriodMonth("3");
                    break;
                case "outstanding":
                    $data["employee"] = $this->EmployeeModel->getExpiredEmployeeContractOutstanding();    
                    break;
                default:
                    break;
            }
                                                                
            return $this->load->view('employee/ajax/employee-contract', $data);
            
        }
        
    }
