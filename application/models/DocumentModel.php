<?php

    class DocumentModel extends CI_Model{
                                
        function getAllEmployeeDocument($employeeID){            
                        
            $result = $this->db->query("SELECT * FROM hr_emp_document hed WHERE hed.employee_id = '".$employeeID."'");
            return $result;
            
        }            
        
        function uploadEmployeeDocument($data){
            
            $this->db->insert('hr_emp_document', $data);
            
        }
        
    }
