<?php
    
    class Nationality extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('NationalityModel');
        }
        
        function index(){
            
            $data['nationality'] = $this->NationalityModel->getAllNationality();           
            $this->load->view('employee/masterdata/nationality', $data);
            
        }               
        
        function add(){
                        
            $data["action"] = "add";
            $this->load->view('employee/masterdata/nationality-editor',$data);
            
        }   
        
        function save(){
            
            $nationalityName = $this->input->post('nationalityName');
            $nationalityType = $this->input->post('nationalityType');
            $this->NationalityModel->insertNationality($nationalityName,$nationalityType);
            redirect('nationality');
        }
        
        function edit($nationalityID){
            
            $data["action"] = "edit";
            $data["nationality"] = $this->NationalityModel->getNationality($nationalityID);
            $this->load->view('employee/masterdata/nationality-editor',$data);
            
        }
        
        function update(){
            $nationalityName = $this->input->post('nationalityName');
            $nationalityID = $this->input->post('nationalityID');
            $nationalityType = $this->input->post('nationalityType');
            $this->NationalityModel->updateNationality($nationalityID,$nationalityName,$nationalityType);
            redirect('nationality');
        }
        
        function delete($nationalityID) {
            $this->NationalityModel->deleteNationality($nationalityID);                  
        }
        
    }
