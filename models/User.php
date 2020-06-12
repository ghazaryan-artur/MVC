<?php
namespace models;
use system\Model;
    class User extends Model {

        public function login($email, $password){
            $email = $this->db->connection->real_escape_string($email);
            $password = MD5($password);
            $sel = $this->db->select("SELECT id  FROM users WHERE  `email` = '$email' AND `password` = '$password'", false);		
            return $sel;
        }

        public function reg($data){
            var_dump($data);
            return $this->db->insert('users', $data);
        }

        public function get_data($id){
            return $this->db->select("SELECT * FROM users WHERE id = $id", false);     
        }
        
        public function is_unique($email){
            $email = $this->db->connection->real_escape_string($email);
            $sel = $this->db->select("SELECT email FROM users WHERE  `email` = '$email'", false);
            return !$sel;
        }
    }