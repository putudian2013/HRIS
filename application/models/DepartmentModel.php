<?php

    class DepartmentModel extends CI_Model{
                                
        function getAllDepartment(){            
                        
            $result = $this->db->query('SELECT * FROM hr_department hdept
                                    inner join hr_division hdiv on hdept.division_id = hdiv.division_id
                                    inner join hr_company hc on hdiv.company_id = hc.company_id');
            return $result;
            
        }
        
        function insertDepartment($divisionID,$departmentName){
            
            $sql = "INSERT INTO hr_department VALUES (NULL, '".$divisionID."', '".$departmentName."')";
            $this->db->query($sql);
            
        }
        
        function getDepartmentByDivision($divisionID){
            $result = $this->db->query("SELECT * FROM hr_department hdept
                                    inner join hr_division hdiv on hdept.division_id = hdiv.division_id 
                                    where hdept.division_id ='$divisionID'");
            return $result->result();
	}
        
        function getDepartment($departmentID){
            $result = $this->db->query("SELECT * FROM hr_department hdept 
                inner join hr_division hdiv on hdept.division_id = hdiv.division_id
                where hdept.department_id ='$departmentID'");
            return $result;
	}
        
        function updateDepartment($departmentID,$divisionID,$departmentName){
            $sql = "UPDATE hr_department SET division_id = '".$divisionID."',department_name = '".$departmentName."' where department_id = '".$departmentID."'";
            $this->db->query($sql);
        }
        
        function deleteDepartment($departmentID){
            $sql = "DELETE FROM hr_department where department_id = '".$departmentID."'";
            $this->db->query($sql);
        }
    }
