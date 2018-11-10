<?php

    class SectionModel extends CI_Model{
                                
        function getAllSection(){            
                        
            $result = $this->db->query('SELECT * FROM hr_section hs
                                    inner join hr_department hdept on hs.department_id = hdept.department_id
                                    inner join hr_division hdiv on hdept.division_id = hdiv.division_id');
            return $result;
            
        }
        
        function insertSection($departmentID,$sectionName){
            
            $sql = "INSERT INTO hr_section VALUES (NULL, '".$departmentID."', '".$sectionName."')";
            $this->db->query($sql);
            
        }
        
        function getSectionByDepartment($departmentID){
            $result = $this->db->query("SELECT * FROM hr_section hs
                                    inner join hr_department hdept on hs.department_id = hdept.department_id 
                                    where hs.department_id ='$departmentID'");
            return $result->result();
	}
        
        function getSection($sectionID){
            $result = $this->db->query("SELECT * FROM hr_section hs 
                inner join hr_department hdept on hs.department_id = hdept.department_id 
                inner join hr_division hdiv on hdept.division_id = hdiv.division_id 
                where hs.section_id ='$sectionID'");
            return $result;
	}
        
        function updateSection($sectionID,$departmentID,$sectionName){
            $sql = "UPDATE hr_section SET department_id = '".$departmentID."', section_name = '".$sectionName."' where section_id = '".$sectionID."'";
            $this->db->query($sql);
        }
        
        function deleteSection($sectionID){
            $sql = "DELETE FROM hr_section where section_id = '".$sectionID."'";
            $this->db->query($sql);
        }
        
    }
