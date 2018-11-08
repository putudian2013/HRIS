<?php

    class EmployeeCategoryModel extends CI_Model{
                                
        function getAllEmployeeCategory(){            
                        
            $result = $this->db->query('SELECT * FROM hr_emp_category hec');
            return $result;
            
        }
        
        function insertEmployeeCategory($employeeCategoryName){
                        
            $sql = "INSERT INTO hr_emp_category VALUES (NULL, '".$employeeCategoryName."')";
            $this->db->query($sql);
            
        }
        
        function getEmployeeCategory($employeeCategoryID){
            $result = $this->db->query("SELECT * FROM hr_emp_category hp where hp.emp_category_id ='$employeeCategoryID'");
            return $result;
	}
        
        function updateEmployeeCategory($employeeCategoryID,$employeeCategoryName){
            $sql = "UPDATE hr_emp_category SET emp_category_name = '".$employeeCategoryName."' where emp_category_id = '".$employeeCategoryID."'";
            $this->db->query($sql);
        }
        
        function deleteEmployeeCategory($employeeCategoryID){
            $sql = "DELETE FROM hr_emp_category where emp_category_id = '".$employeeCategoryID."'";
            $this->db->query($sql);
        }
        
    }
