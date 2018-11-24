<?php
    
    class Education extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('EducationModel');
        }
        
        function index(){
            
            $data['education'] = $this->EducationModel->getAllEducation();           
            $this->load->view('employee/masterdata/education', $data);
            
        }               
        
        function add(){
                        
            $data["action"] = "add";
            $this->load->view('employee/masterdata/education-editor',$data);
            
        }   
        
        function save(){
            
            $educationLevel = $this->input->post('educationLevel');
            $this->EducationModel->insertEducation($educationLevel);
            redirect('education');
        }
        
        function edit($educationID){
            
            $data["action"] = "edit";
            $data["education"] = $this->EducationModel->getEducation($educationID);
            $this->load->view('employee/masterdata/education-editor',$data);
            
        }
        
        function update(){
            $educationLevel = $this->input->post('educationLevel');
            $educationID = $this->input->post('educationID');
            $this->EducationModel->updateEducation($educationID,$educationLevel);
            redirect('education');
        }
        
        function delete($educationID) {
            $this->EducationModel->deleteEducation($educationID);                  
        }
        
    }
