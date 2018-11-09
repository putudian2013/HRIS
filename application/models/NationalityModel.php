<?php

    class NationalityModel extends CI_Model{
                                
        function getAllNationality(){            
                        
            $result = $this->db->query('SELECT * FROM hr_nationality hc');
            return $result;
            
        }
        
        function insertNationality($nationalityName,$nationalityType){
            
            $sql = "INSERT INTO hr_nationality VALUES (NULL, '".$nationalityName."','".$nationalityType."')";
            $this->db->query($sql);
            
        }
        
        function getNationality($nationalityID){
            $result = $this->db->query("SELECT * FROM hr_nationality hc where hc.nationality_id ='$nationalityID'");
            return $result;
	}
        
        function updateNationality($nationalityID,$nationalityName,$nationalityType){
            $sql = "UPDATE hr_nationality SET nationality_name = '".$nationalityName."', nationality_type = '".$nationalityType."' where nationality_id = '".$nationalityID."'";
            $this->db->query($sql);
        }
        
        function deleteNationality($nationalityID){
            $sql = "DELETE FROM hr_nationality where nationality_id = '".$nationalityID."'";
            $this->db->query($sql);
        }
        
    }
