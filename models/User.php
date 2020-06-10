<?php
namespace models;
use system\Model;
    class User extends Model {

        public function index(){
            
        }
        public function login($email, $password){
            $email = $this->db->real_escape_string($email);
            $password = MD5($password);
            $sel = $this->select("SELECT *  FROM users WHERE  `email` = '$email' AND `password` = '$password'");		
            return $sel;
        }
    }