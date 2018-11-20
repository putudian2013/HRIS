<?php

    class FamilyModel extends CI_Model{
                                
        function getEmployeeFamily($employeeID){            
                        
            $result = $this->db->query("SELECT * FROM hr_emp_family hef 
                inner join hr_relationship hr on hef.relationship_id = hr.relationship_id
                where hef.employee_id = '".$employeeID."'");
            return $result;
            
        }
        
        function insertCompany($companyName){
            
            $sql = "INSERT INTO hr_company VALUES (NULL, '".$companyName."')";
            $this->db->query($sql);
            
        }
        
        function getCompany($companyID){
            $result = $this->db->query("SELECT * FROM hr_company hc where hc.company_id ='$companyID'");
            return $result;
	}
        
        function updateCompany($companyID,$companyName){
            $sql = "UPDATE hr_company SET company_name = '".$companyName."' where company_id = '".$companyID."'";
            $this->db->query($sql);
        }
        
        function deleteCompany($companyID){
            $sql = "DELETE FROM hr_company where company_id = '".$companyID."'";
            $this->db->query($sql);
        }
        
        
        
    }
