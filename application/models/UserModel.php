<?php

    class UserModel extends CI_Model{
                
        function selectUser($username,$password){
            
            $where = array('user_name' => $username, 'password' => $password);
            $result = $this->db->get_where('hr_user', $where);
            return $result;
            
        }
        
    }
