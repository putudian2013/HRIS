<?php

    class ReligionModel extends CI_Model{
                                
        function getAllReligion(){            
                        
            $result = $this->db->query('SELECT * FROM hr_religion hp');
            return $result;
            
        }
        
        function insertReligion($religionName){
                        
            $sql = "INSERT INTO hr_religion VALUES (NULL, '".$religionName."')";
            $this->db->query($sql);
            
        }
        
        function getReligion($religionID){
            $result = $this->db->query("SELECT * FROM hr_religion hp where hp.religion_id ='$religionID'");
            return $result;
	}
        
        function updateReligion($religionID,$religionName){
            $sql = "UPDATE hr_religion SET religion_name = '".$religionName."' where religion_id = '".$religionID."'";
            $this->db->query($sql);
        }
        
        function deleteReligion($religionID){
            $sql = "DELETE FROM hr_religion where religion_id = '".$religionID."'";
            $this->db->query($sql);
        }
        
    }
