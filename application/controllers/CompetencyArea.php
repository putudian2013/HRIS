<?php
    
    class CompetencyArea extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('CompetencyAreaModel');
        }
        
        function index(){
            
            $data['competencyArea'] = $this->CompetencyAreaModel->getAllCompetencyArea();           
            $this->load->view('competency/masterdata/competency-area', $data);
            
        }               
        
        function add(){
                        
            $data["action"] = "add";
            $this->load->view('competency/masterdata/competency-area-editor',$data);
            
        }   
        
        function save(){
            
            $competencyAreaName = $this->input->post('competencyAreaName');
            $this->CompetencyAreaModel->insertCompetencyArea($competencyAreaName);
            redirect('competencyArea');
        }
        
        function edit($competencyAreaID){
            
            $data["action"] = "edit";
            $data["competencyArea"] = $this->CompetencyAreaModel->getCompetencyArea($competencyAreaID);
            $this->load->view('competency/masterdata/competency-area-editor',$data);
            
        }
        
        function update(){
            $competencyAreaName = $this->input->post('competencyAreaName');
            $competencyAreaID = $this->input->post('competencyAreaID');
            $this->CompetencyAreaModel->updateCompetencyArea($competencyAreaID,$competencyAreaName);
            redirect('competencyArea');
        }
        
        function delete($competencyAreaID) {
            $this->CompetencyAreaModel->deleteCompetencyArea($competencyAreaID);                  
        }
        
    }
