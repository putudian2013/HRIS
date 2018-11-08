<?php

    class DivisionModel extends CI_Model{
                                
        function getAllDivision(){            
                        
            $result = $this->db->query('SELECT * FROM hr_division hdiv
                                    inner join hr_company hc on hdiv.company_id = hc.company_id');
            return $result;
            
        }
        
        function insertDivision($companyID,$divisionName){
            
            $sql = "INSERT INTO hr_division VALUES (NULL, '".$companyID."', '".$divisionName."')";
            $this->db->query($sql);
            
        }
        
        function getDivisionByCompany($companyID){
            $result = $this->db->query("SELECT * FROM hr_division hdiv
                                    inner join hr_company hc on hdiv.company_id = hc.company_id where hdiv.company_id ='$companyID'");
            return $result->result();
	}
        
        function getDivision($divisionID){
            $result = $this->db->query("SELECT * FROM hr_division hdiv where hdiv.division_id ='$divisionID'");
            return $result;
	}
        
        function updateDivision($divisionID,$divisionName){
            $sql = "UPDATE hr_division SET division_name = '".$divisionName."' where division_id = '".$divisionID."'";
            $this->db->query($sql);
        }
        
        function deleteDivision($divisionID){
            $sql = "DELETE FROM hr_division where division_id = '".$divisionID."'";
            $this->db->query($sql);
        }
    }
