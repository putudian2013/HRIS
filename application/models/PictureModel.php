<?php

    class PictureModel extends CI_Model {
        
        function __construct() {
            parent::__construct();
        }
        
        function uploadEmployeePicture($data,$where){
            
            $this->db->where('employee_id', $where);
            $this->db->update('hr_employee', $data);
            
        }               
        
        
    }
