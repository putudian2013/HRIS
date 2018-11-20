<?php

    class RelationshipModel extends CI_Model{
                                
        function getAllRelationship(){            
                        
            $result = $this->db->query('SELECT * FROM hr_relationship hr');
            return $result;
            
        }
        
        function insertCompany($companyName){
            
            $sql = "INSERT INTO hr_company VALUES (NULL, '".$companyName."')";
            $this->db->query($sql);
            
        }
        
        function getCompany($companyID){
            $result = $this->db->query("SELECT * FROM hr_company hc where hc.company_id ='$companyID'");
            return $result;
	}
        
        function updateCompany($companyID,$companyName){
            $sql = "UPDATE hr_company SET company_name = '".$companyName."' where company_id = '".$companyID."'";
            $this->db->query($sql);
        }
        
        function deleteCompany($companyID){
            $sql = "DELETE FROM hr_company where company_id = '".$companyID."'";
            $this->db->query($sql);
        }
        
    }
