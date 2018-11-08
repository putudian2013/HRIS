<?php

    class PositionModel extends CI_Model{
                                
        function getAllPosition(){            
                        
            $result = $this->db->query('SELECT * FROM hr_position hp');
            return $result;
            
        }
        
        function insertPosition($positionName){
                        
            $sql = "INSERT INTO hr_position VALUES (NULL, '".$positionName."')";
            $this->db->query($sql);
            
        }
        
        function getPosition($positionID){
            $result = $this->db->query("SELECT * FROM hr_position hp where hp.position_id ='$positionID'");
            return $result;
	}
        
        function updatePosition($positionID,$positionName){
            $sql = "UPDATE hr_position SET position_name = '".$positionName."' where position_id = '".$positionID."'";
            $this->db->query($sql);
        }
        
        function deletePosition($positionID){
            $sql = "DELETE FROM hr_position where position_id = '".$positionID."'";
            $this->db->query($sql);
        }
        
    }
