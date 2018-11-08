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
            $this->TaxStatusModel->insertTaxStatus($taxStatusName);
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
            $this->TaxStatusModel->updateTaxStatus($taxStatusID,$taxStatusName);
            redirect('taxStatus');
        }
        
        function delete($taxStatusID) {
            $this->TaxStatusModel->deleteTaxStatus($taxStatusID);                  
        }
        
    }
