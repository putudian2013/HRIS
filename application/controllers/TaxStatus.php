<?php
    
    class TaxStatus extends CI_Controller{
        
        function __construct() {
            parent::__construct();         
            $this->load->model('TaxStatusModel');
        }
        
        function index(){
            
            $data['taxStatus'] = $this->TaxStatusModel->getAllTaxStatus();           
            $this->load->view('payroll/masterdata/tax-status', $data);
            
        }               
        
        function add(){
                        
            $data["action"] = "add";
            $this->load->view('payroll/masterdata/tax-status-editor',$data);
            
        }   
        
        function save(){
            
            $taxStatusName = $this->input->post('taxStatusName');
            $taxStatusCode = $this->input->post('taxStatusCode');
            $this->TaxStatusModel->insertTaxStatus($taxStatusName,$taxStatusCode);
            redirect('taxStatus');
        }
        
        function edit($taxStatusID){
            
            $data["action"] = "edit";
            $data["taxStatus"] = $this->TaxStatusModel->getTaxStatus($taxStatusID);
            $this->load->view('payroll/masterdata/tax-status-editor',$data);
            
        }
        
        function update(){
            $taxStatusName = $this->input->post('taxStatusName');
            $taxStatusID = $this->input->post('taxStatusID');
            $taxStatusCode = $this->input->post('taxStatusCode');
            $this->TaxStatusModel->updateTaxStatus($taxStatusID,$taxStatusName,$taxStatusCode);
            redirect('taxStatus');
        }
        
        function delete($taxStatusID) {
            $this->TaxStatusModel->deleteTaxStatus($taxStatusID);                  
        }
        
    }
