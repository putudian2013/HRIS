<?php

    class EducationModel extends CI_Model{
                                
        function getAllEducation(){            
                        
            $result = $this->db->query('SELECT * FROM hr_education hp');
            return $result;
            
        }        
        
        function insertEducation($educationLevel){
                        
            $sql = "INSERT INTO hr_education VALUES (NULL, '".$educationLevel."')";
            $this->db->query($sql);
            
        }
        
        function getEducation($educationID){
            $result = $this->db->query("SELECT * FROM hr_education hp where hp.education_id ='$educationID'");
            return $result;
	}
        
        function updateEducation($educationID,$educationLevel){
            $sql = "UPDATE hr_education SET education_level = '".$educationLevel."' where education_id = '".$educationID."'";
            $this->db->query($sql);
        }
        
        function deleteEducation($educationID){
            $sql = "DELETE FROM hr_education where education_id = '".$educationID."'";
            $this->db->query($sql);
        }
        
    }
