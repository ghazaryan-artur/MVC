<?php
namespace models;
use system\Model;
    class User extends Model {

        public function login($email, $password){
            $email = str_replace([ '\\', "'", '"' ], ['\\\\', "\'", '\"'], $email);
            $password = MD5($password);
            $sel = $this->db->select("SELECT id  FROM users WHERE  `email` = '$email' AND `password` = '$password'", false);		
            return $sel;
        }

        public function reg($data){
            return $this->db->insert('users', $data);
        }

        public function get_data($id){
            return $this->db->select("SELECT `name`, `email`, `image` FROM users WHERE id = $id", false);     
        }
        
        public function is_unique($email){
            $email = str_replace(['\\', "'", '"'], ['\\\\', "\'", '\"'], $email);
            $sel = $this->db->select("SELECT email FROM users WHERE  `email` = '$email'", false);
            return !$sel;
        }
        
        public function upd_img($name){
            $id = $_SESSION['user_id'];
            return $this->db->update("users", array('image' => "$name"), "id=$id");
        }
    }