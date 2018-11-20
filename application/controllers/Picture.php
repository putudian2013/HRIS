<?php

    class Picture extends CI_Controller {
        
        function __construct() {
            parent::__construct();
            $this->load->model('PictureModel');
        }
        
        function upload() {
            
            $employeeID = $this->input->post('employeeID');
            $companyID = $this->input->post('companyID');
            $divisionID = $this->input->post('divisionID');
            $departmentID = $this->input->post('departmentID');
            
            $config['upload_path'] = './media/employee/picture/';
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('fileToUpload')) {
                $error = $this->upload->display_errors();   
                var_dump($error);                
            } else {
                $upload_data = $this->upload->data();
                
                $data = array(
                    'picture_filename' => $upload_data['file_name']
                );                                
                
                $this->PictureModel->uploadEmployeePicture($data, $employeeID);
                redirect('employee/picture/' . $employeeID . '/' . $companyID . '/' . $divisionID  . '/' . $departmentID  );
            }
        }
        
    }
