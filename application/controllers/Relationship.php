<?php
    
    class Relationship extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('RelationshipModel');
        }
        
        function index(){
            
            $data['relationship'] = $this->RelationshipModel->getAllRelationship();           
            $this->load->view('employee/masterdata/relationship', $data);
            
        }               
        
        function add(){
                        
            $data["action"] = "add";
            $this->load->view('employee/masterdata/relationship-editor',$data);
            
        }   
        
        function save(){
            
            $relationshipName = $this->input->post('relationshipName');
            $this->RelationshipModel->insertRelationship($relationshipName);
            redirect('relationship');
        }
        
        function edit($relationshipID){
            
            $data["action"] = "edit";
            $data["relationship"] = $this->RelationshipModel->getRelationship($relationshipID);
            $this->load->view('employee/masterdata/relationship-editor',$data);
            
        }
        
        function update(){
            $relationshipName = $this->input->post('relationshipName');
            $relationshipID = $this->input->post('relationshipID');
            $this->RelationshipModel->updateRelationship($relationshipID,$relationshipName);
            redirect('relationship');
        }
        
        function delete($relationshipID) {
            $this->RelationshipModel->deleteRelationship($relationshipID);                  
        }
        
    }
