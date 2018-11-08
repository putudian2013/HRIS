<?php

    class TaxStatusModel extends CI_Model{
                                
        function getAllTaxStatus(){            
                        
            $result = $this->db->query('SELECT * FROM hr_tax_status hms');
            return $result;
            
        }
        
        function insertTaxStatus($taxStatusName){
                        
            $sql = "INSERT INTO hr_tax_status VALUES (NULL, '".$taxStatusName."')";
            $this->db->query($sql);
            
        }
        
        function getTaxStatus($taxStatusID){
            $result = $this->db->query("SELECT * FROM hr_tax_status hms where hms.tax_status_id ='$taxStatusID'");
            return $result;
	}
        
        function updateTaxStatus($taxStatusID,$taxStatusName){
            $sql = "UPDATE hr_tax_status SET tax_status_name = '".$taxStatusName."' where tax_status_id = '".$taxStatusID."'";
            $this->db->query($sql);
        }
        
        function deleteTaxStatus($taxStatusID){
            $sql = "DELETE FROM hr_tax_status where tax_status_id = '".$taxStatusID."'";
            $this->db->query($sql);
        }
        
    }
