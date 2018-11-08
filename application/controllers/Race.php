<?php
    
    class Race extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('RaceModel');
        }
        
        function index(){
            
            $data['race'] = $this->RaceModel->getAllRace();           
            $this->load->view('employee/masterdata/race', $data);
            
        }               
        
        function add(){
                        
            $data["action"] = "add";
            $this->load->view('employee/masterdata/race-editor',$data);
            
        }   
        
        function save(){
            
            $raceName = $this->input->post('raceName');
            $this->RaceModel->insertRace($raceName);
            redirect('race');
        }
        
        function edit($raceID){
            
            $data["action"] = "edit";
            $data["race"] = $this->RaceModel->getRace($raceID);
            $this->load->view('employee/masterdata/race-editor',$data);
            
        }
        
        function update(){
            $raceName = $this->input->post('raceName');
            $raceID = $this->input->post('raceID');
            $this->RaceModel->updateRace($raceID,$raceName);
            redirect('race');
        }
        
        function delete($raceID) {
            $this->RaceModel->deleteRace($raceID);                  
        }
        
    }
