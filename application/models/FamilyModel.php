<?php

    class FamilyModel extends CI_Model{
                                
        function getEmployeeFamily($employeeID){            
                        
            $result = $this->db->query("SELECT * FROM hr_emp_family hef 
                inner join hr_relationship hr on hef.relationship_id = hr.relationship_id
                inner join hr_religion hre on hef.religion_id = hre.religion_id
                inner join hr_education he on hef.education_id = he.education_id
                inner join hr_marital_status hms on hef.marital_status_id = hms.marital_status_id
                inner join hr_nationality hn on hef.nationality_id = hn.nationality_id
                where hef.employee_id = '".$employeeID."'");
            return $result;
            
        }
        
        function insertFamily($data){
            
            $this->db->insert('hr_emp_family', $data);
            
        }
        
        function getFamily($familyID){
            $result = $this->db->query("SELECT * FROM hr_emp_family hef where hef.emp_family_id ='$familyID'");
            return $result;
	}
        
        function updateFamily($data,$where){
            
            $this->db->where('emp_family_id', $where);
            $this->db->update('hr_emp_family', $data);
        }
        
        function deleteFamily($familyID){
            $this->db->where('emp_family_id', $familyID);
            $this->db->delete('hr_emp_family');
        }
        
        
        
    }
