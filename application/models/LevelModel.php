<?php

    class LevelModel extends CI_Model{
                                
        function getAllLevel(){            
                        
            $result = $this->db->query('SELECT * FROM hr_level hp');
            return $result;
            
        }
        
        function insertLevel($levelName){
                        
            $sql = "INSERT INTO hr_level VALUES (NULL, '".$levelName."')";
            $this->db->query($sql);
            
        }
        
        function getLevel($levelID){
            $result = $this->db->query("SELECT * FROM hr_level hp where hp.level_id ='$levelID'");
            return $result;
	}
        
        function updateLevel($levelID,$levelName){
            $sql = "UPDATE hr_level SET level_name = '".$levelName."' where level_id = '".$levelID."'";
            $this->db->query($sql);
        }
        
        function deleteLevel($levelID){
            $sql = "DELETE FROM hr_level where level_id = '".$levelID."'";
            $this->db->query($sql);
        }
        
    }
