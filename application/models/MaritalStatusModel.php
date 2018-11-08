<?php

    class MaritalStatusModel extends CI_Model{
                                
        function getAllMaritalStatus(){            
                        
            $result = $this->db->query('SELECT * FROM hr_marital_status hms');
            return $result;
            
        }
        
        function insertMaritalStatus($maritalStatusName){
                        
            $sql = "INSERT INTO hr_marital_status VALUES (NULL, '".$maritalStatusName."')";
            $this->db->query($sql);
            
        }
        
        function getMaritalStatus($maritalStatusID){
            $result = $this->db->query("SELECT * FROM hr_marital_status hms where hms.marital_status_id ='$maritalStatusID'");
            return $result;
	}
        
        function updateMaritalStatus($maritalStatusID,$maritalStatusName){
            $sql = "UPDATE hr_marital_status SET marital_status_name = '".$maritalStatusName."' where marital_status_id = '".$maritalStatusID."'";
            $this->db->query($sql);
        }
        
        function deleteMaritalStatus($maritalStatusID){
            $sql = "DELETE FROM hr_marital_status where marital_status_id = '".$maritalStatusID."'";
            $this->db->query($sql);
        }
        
    }
