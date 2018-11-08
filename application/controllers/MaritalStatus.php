<?php
    
    class MaritalStatus extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('MaritalStatusModel');
        }
        
        function index(){
            
            $data['maritalStatus'] = $this->MaritalStatusModel->getAllMaritalStatus();           
            $this->load->view('employee/masterdata/marital-status', $data);
            
        }               
        
        function add(){
                        
            $data["action"] = "add";
            $this->load->view('employee/masterdata/marital-status-editor',$data);
            
        }   
        
        function save(){
            
            $maritalStatusName = $this->input->post('maritalStatusName');
            $this->MaritalStatusModel->insertMaritalStatus($maritalStatusName);
            redirect('maritalStatus');
        }
        
        function edit($maritalStatusID){
            
            $data["action"] = "edit";
            $data["maritalStatus"] = $this->MaritalStatusModel->getMaritalStatus($maritalStatusID);
            $this->load->view('employee/masterdata/marital-status-editor',$data);
            
        }
        
        function update(){
            $maritalStatusName = $this->input->post('maritalStatusName');
            $maritalStatusID = $this->input->post('maritalStatusID');
            $this->MaritalStatusModel->updateMaritalStatus($maritalStatusID,$maritalStatusName);
            redirect('maritalStatus');
        }
        
        function delete($maritalStatusID) {
            $this->MaritalStatusModel->deleteMaritalStatus($maritalStatusID);                  
        }
        
    }
