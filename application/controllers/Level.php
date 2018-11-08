<?php
    
    class Level extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('LevelModel');
        }
        
        function index(){
            
            $data['level'] = $this->LevelModel->getAllLevel();           
            $this->load->view('employee/masterdata/level', $data);
            
        }               
        
        function add(){
                        
            $data["action"] = "add";
            $this->load->view('employee/masterdata/level-editor',$data);
            
        }   
        
        function save(){
            
            $levelName = $this->input->post('levelName');
            $this->LevelModel->insertLevel($levelName);
            redirect('level');
        }
        
        function edit($levelID){
            
            $data["action"] = "edit";
            $data["level"] = $this->LevelModel->getLevel($levelID);
            $this->load->view('employee/masterdata/level-editor',$data);
            
        }
        
        function update(){
            $levelName = $this->input->post('levelName');
            $levelID = $this->input->post('levelID');
            $this->LevelModel->updateLevel($levelID,$levelName);
            redirect('level');
        }
        
        function delete($levelID) {
            $this->LevelModel->deleteLevel($levelID);                  
        }
        
    }
