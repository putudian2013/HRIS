<?php

    class EmployeeEducationModel extends CI_Model{
                                
        function getAllEmployeeEducation($employeeID){            
                        
            $result = $this->db->query('SELECT * FROM hr_emp_education hee
                inner join hr_education he on hee.education_id = he.education_id
                where hee.employee_id = '.$employeeID.'');
            return $result;
            
        }
        
        function insertEmployeeEducation($data){
                        
            
            $this->db->insert('hr_emp_education', $data);
            
        }
        
        function getEmployeeEducation($employeeEducationID){
            $result = $this->db->query("SELECT * FROM hr_emp_education hp where hp.emp_education_id ='$employeeEducationID'");
            return $result;
	}
        
        function updateEmployeeEducation($data,$where){
            $this->db->where('emp_education_id',$where);
            $this->db->update('hr_emp_education', $data);
        }
        
        function deleteEmployeeEducation($employeeEducationID){
            $sql = "DELETE FROM hr_emp_education where emp_education_id = '".$employeeEducationID."'";
            $this->db->query($sql);
        }
        
    }
