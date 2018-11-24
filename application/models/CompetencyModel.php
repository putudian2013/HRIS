<?php

    class CompetencyModel extends CI_Model{
                                
        function getAllCompetency(){            
                        
            $result = $this->db->query('SELECT * FROM hr_competency hc');
            return $result;
            
        }
        
        function insertCompetency($data){
                                    
            $this->db->insert('hr_competency',$data);
            
        }
        
        function getCompetency($competencyID){
            $result = $this->db->query("SELECT * FROM hr_competency hc where hc.competency_id ='$competencyID'");
            return $result;
	}
        
        function getCompetencyByArea($competencyAreaID){
            $result = $this->db->query("SELECT * FROM hr_competency hc where hc.competency_area_id = '$competencyAreaID'");
            return $result->result();
	}
        
        function updateCompetency($competencyID,$competencyName){
            $sql = "UPDATE hr_competency SET competency_name = '".$competencyName."' where competency_id = '".$competencyID."'";
            $this->db->query($sql);
        }
        
        function deleteCompetency($competencyID){
            $sql = "DELETE FROM hr_competency where competency_id = '".$competencyID."'";
            $this->db->query($sql);
        }
        
    }
