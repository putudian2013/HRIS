<?php

    class EmployeeExperienceModel extends CI_Model{
                                      
        
        function getAllEmployeeExperience($employeeID){            
                        
            $result = $this->db->query('SELECT * FROM hr_emp_experience heex where heex.employee_id = '.$employeeID.'');
            return $result;
            
        }
        
        function insertEmployeeExperience($data){
                                    
            $this->db->insert('hr_emp_experience',$data);
            
        }
        
        function getEmployeeExperience($experienceID){
            $result = $this->db->query("SELECT * FROM hr_emp_experience hee where hee.emp_experience_id ='$experienceID'");
            return $result;
	}
        
        function updateEmployeeExperience($data, $where){
            $this->db->where('emp_experience_id',$where);
            $this->db->update('hr_emp_experience',$data);
        }
        
        function deleteEmployeeExperience($experienceID){
            $sql = "DELETE FROM hr_emp_experience where emp_experience_id = '".$experienceID."'";
            $this->db->query($sql);
        }
        
    }
