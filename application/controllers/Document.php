<?php

    class Document extends CI_Controller {
        
        function __construct() {
            parent::__construct();
            $this->load->model('DocumentModel');
        }
        
        function upload() {
            
            $documentName = $this->input->post('fileName');
            $employeeID = $this->input->post('employeeID');
            $companyID = $this->input->post('companyID');
            $divisionID = $this->input->post('divisionID');
            $departmentID = $this->input->post('departmentID');
            
            $config['upload_path'] = './media/employee/document';
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('fileToUpload')) {
                $error = $this->upload->display_errors();
                var_dump($error);
            } else {
                $upload_data = $this->upload->data();
                
                $data = array(
                    'emp_document_name' => $documentName,
                    'filename' => $upload_data['file_name'],
                    'employee_id' => $employeeID
                );
                
                $this->DocumentModel->uploadEmployeeDocument($data);
                redirect('employee/document/' . $employeeID . '/' . $companyID . '/' . $divisionID  . '/' . $departmentID  );
            }
        }
        
        function delete($empDocumentID){
            
            $this->db->where('emp_document_id', $empDocumentID);
            $this->db->delete('hr_emp_document');
            
        }
        
    }
