<?php

    class EmployeeModel extends CI_Model{
                                
        function getAllEmployee(){            
                        
            $result = $this->db->query('SELECT * FROM hr_employee he
                                    INNER JOIN hr_company hc ON he.company_id = hc.company_id
                                    INNER JOIN hr_division hdiv ON he.division_id = hdiv.division_id
                                    INNER JOIN hr_department hdept ON he.department_id = hdept.department_id
                                    INNER JOIN hr_section hs ON he.section_id = hs.section_id
                                    INNER JOIN hr_position hp ON he.position_id = hp.position_id
                                    INNER JOIN hr_emp_category hec ON he.emp_category_id = hec.emp_category_id
                                    order by he.payroll_number');
            return $result;
            
        }
        
        function insertEmployee($data){
            
            $this->db->insert('hr_employee', $data);
            
        }
        
        function getEmployee($employeeID){
            $result = $this->db->query("select * from hr_employee he where he.employee_id = '".$employeeID."'");
            return $result;
	}
        
        function deleteEmployee($employeeID){
            $sql = "DELETE FROM hr_employee where employee_id = '".$employeeID."'";
            $this->db->query($sql);
        }
        
    }
