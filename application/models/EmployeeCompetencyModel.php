<?php

    class EmployeeCompetencyModel extends CI_Model{
                                                
        function getAllEmployeeCompetency($employeeID){            
                        
            $result = $this->db->query('SELECT * FROM hr_emp_competency hec
                inner join hr_competency hc on hec.competency_id = hc.competency_id
                inner join hr_competency_area hca on hc.competency_area_id = hca.competency_area_id
                where hec.employee_id = '.$employeeID.'');
            return $result;
            
        }
        
        function insertEmployeeCompetency($data){
                                    
            $this->db->insert('hr_emp_competency', $data);
            
        }
        
        function getEmployeeCompetency($employeeCompetencyID){
            $result = $this->db->query("SELECT * FROM hr_emp_competency hec 
                inner join hr_competency hc on hec.competency_id = hc.competency_id
                inner join hr_competency_area hca on hc.competency_area_id = hca.competency_area_id
                where hec.emp_competency_id ='$employeeCompetencyID'");
            return $result;
	}
        
        function updateEmployeeCompetency($data, $where){
            $this->db->where('emp_competency_id', $where);
            $this->db->update('hr_emp_competency', $data);
        }
        
        function deleteEmployeeCompetency($employeeCompetencyID){
            $sql = "DELETE FROM hr_emp_competency where emp_competency_id = '".$employeeCompetencyID."'";
            $this->db->query($sql);
        }
        
    }
