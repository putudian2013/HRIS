<?php

    class CompetencyAreaModel extends CI_Model{
                                
        function getAllCompetencyArea(){            
                        
            $result = $this->db->query('SELECT * FROM hr_competency_area hca');
            return $result;
            
        }
        
        function insertCompetencyArea($competencyAreaName){
                        
            $sql = "INSERT INTO hr_competency_area VALUES (NULL, '".$competencyAreaName."')";
            $this->db->query($sql);
            
        }
        
        function getCompetencyArea($competencyAreaID){
            $result = $this->db->query("SELECT * FROM hr_competency_area hca where hca.competency_area_id ='$competencyAreaID'");
            return $result;
	}
        
        function updateCompetencyArea($competencyAreaID,$competencyAreaName){
            $sql = "UPDATE hr_competency_area SET competency_area_name = '".$competencyAreaName."' where competency_area_id = '".$competencyAreaID."'";
            $this->db->query($sql);
        }
        
        function deleteCompetencyArea($competencyAreaID){
            $sql = "DELETE FROM hr_competency_area where competency_area_id = '".$competencyAreaID."'";
            $this->db->query($sql);
        }
        
    }
