<?php
    
    class Competency extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('CompetencyModel');
            $this->load->model('CompetencyAreaModel');
        }
        
        function index(){
            
            $data['competency'] = $this->CompetencyModel->getAllCompetency();           
            $this->load->view('competency/masterdata/competency', $data);
            
        }               
        
        function add(){
                        
            $data["action"] = "add";
            $data["competencyArea"] = $this->CompetencyAreaModel->getAllCompetencyArea();
            $this->load->view('competency/masterdata/competency-editor',$data);
            
        }   
        
        function save(){
            
            $competencyArea = $this->input->post('competencyArea');
            $competencyName = $this->input->post('competencyName');
            
            $data = array(
                    'competency_area_id' => $competencyArea,          
                    'competency_name' => $competencyName
                ); 
            $this->CompetencyModel->insertCompetency($data);
            redirect('competency');
        }
        
        function edit($competencyID){
            
            $data["action"] = "edit";
            $data["competency"] = $this->CompetencyModel->getCompetency($competencyID);
            $data["competencyArea"] = $this->CompetencyAreaModel->getAllCompetencyArea();
            $this->load->view('competency/masterdata/competency-editor',$data);
            
        }
        
        function update(){
            $competencyName = $this->input->post('competencyName');
            $competencyID = $this->input->post('competencyID');
            $this->CompetencyModel->updateCompetency($competencyID,$competencyName);
            redirect('competency');
        }
        
        function delete($competencyID) {
            $this->CompetencyModel->deleteCompetency($competencyID);                  
        }
        
        function getCompetencyByAreaAjax($competencyAreaID){
            $data = $this->CompetencyModel->getCompetencyByArea($competencyAreaID);
            echo json_encode($data);
        }
    }
