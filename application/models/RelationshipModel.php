<?php

    class RelationshipModel extends CI_Model{
                                
        function getAllRelationship(){            
                        
            $result = $this->db->query('SELECT * FROM hr_relationship hr');
            return $result;
            
        }
        
        function insertRelationship($relationshipName){
            
            $sql = "INSERT INTO hr_relationship VALUES (NULL, '".$relationshipName."')";
            $this->db->query($sql);
            
        }
        
        function getRelationship($relationshipID){
            $result = $this->db->query("SELECT * FROM hr_relationship hc where hc.relationship_id ='$relationshipID'");
            return $result;
	}
        
        function updateRelationship($relationshipID,$relationshipName){
            $sql = "UPDATE hr_relationship SET relationship_name = '".$relationshipName."' where relationship_id = '".$relationshipID."'";
            $this->db->query($sql);
        }
        
        function deleteRelationship($relationshipID){
            $sql = "DELETE FROM hr_relationship where relationship_id = '".$relationshipID."'";
            $this->db->query($sql);
        }
        
    }
