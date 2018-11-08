<?php
    
    class Position extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('PositionModel');
        }
        
        function index(){
            
            $data['position'] = $this->PositionModel->getAllPosition();           
            $this->load->view('organization/masterdata/position', $data);
            
        }               
        
        function add(){
                        
            $data["action"] = "add";
            $this->load->view('organization/masterdata/position-editor',$data);
            
        }   
        
        function save(){
            
            $positionName = $this->input->post('positionName');
            $this->PositionModel->insertPosition($positionName);
            redirect('position');
        }
        
        function edit($positionID){
            
            $data["action"] = "edit";
            $data["position"] = $this->PositionModel->getPosition($positionID);
            $this->load->view('organization/masterdata/position-editor',$data);
            
        }
        
        function update(){
            $positionName = $this->input->post('positionName');
            $positionID = $this->input->post('positionID');
            $this->PositionModel->updatePosition($positionID,$positionName);
            redirect('position');
        }
        
        function delete($positionID) {
            $this->PositionModel->deletePosition($positionID);                  
        }
        
    }
