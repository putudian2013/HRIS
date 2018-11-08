<?php
    
    class Religion extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('ReligionModel');
        }
        
        function index(){
            
            $data['religion'] = $this->ReligionModel->getAllReligion();           
            $this->load->view('employee/masterdata/religion', $data);
            
        }               
        
        function add(){
                        
            $data["action"] = "add";
            $this->load->view('employee/masterdata/religion-editor',$data);
            
        }   
        
        function save(){
            
            $religionName = $this->input->post('religionName');
            $this->ReligionModel->insertReligion($religionName);
            redirect('religion');
        }
        
        function edit($religionID){
            
            $data["action"] = "edit";
            $data["religion"] = $this->ReligionModel->getReligion($religionID);
            $this->load->view('employee/masterdata/religion-editor',$data);
            
        }
        
        function update(){
            $religionName = $this->input->post('religionName');
            $religionID = $this->input->post('religionID');
            $this->ReligionModel->updateReligion($religionID,$religionName);
            redirect('religion');
        }
        
        function delete($religionID) {
            $this->ReligionModel->deleteReligion($religionID);                  
        }
        
    }
