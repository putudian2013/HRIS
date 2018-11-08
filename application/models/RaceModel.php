<?php

    class RaceModel extends CI_Model{
                                
        function getAllRace(){            
                        
            $result = $this->db->query('SELECT * FROM hr_race hr');
            return $result;
            
        }
        
        function insertRace($raceName){
            
            $sql = "INSERT INTO hr_race VALUES (NULL, '".$raceName."')";
            $this->db->query($sql);
            
        }
        
        function getRace($raceID){
            $result = $this->db->query("SELECT * FROM hr_race hr where hr.race_id ='$raceID'");
            return $result;
	}
        
        function updateRace($raceID,$raceName){
            $sql = "UPDATE hr_race SET race_name = '".$raceName."' where race_id = '".$raceID."'";
            $this->db->query($sql);
        }
        
        function deleteRace($raceID){
            $sql = "DELETE FROM hr_race where race_id = '".$raceID."'";
            $this->db->query($sql);
        }
        
    }
