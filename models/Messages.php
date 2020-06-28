<?php
namespace models;

use system\Model;

    class Messages extends Model {


    public function get_msg($from_id, $to_id){
        return $this->db->select("SELECT messages.*, users.image, users.name FROM messages 
                                INNER JOIN users ON messages.from_id = users.id 
                                WHERE (from_id = $from_id AND to_id = $to_id) OR (from_id = $to_id AND to_id = $from_id)", true);
    }

    public function add_msg($data){
        return $this->db->insert("messages", $data);
    }
    
    public function get_last_msg($msg_id){
        return $this->db->select("SELECT messages.id, messages.from_id, messages.body, messages.seen, messages.date, users.image,
                                users.name FROM messages INNER JOIN users ON messages.from_id = users.id WHERE  messages.id = $msg_id");
    }

    public function get_all_last_msg($from_id, $to_id, $msg_id){
        return $this->db->select("SELECT messages.id, messages.from_id, messages.body, messages.seen, messages.date, users.image, users.name FROM messages INNER JOIN users ON messages.from_id = users.id WHERE (messages.from_id = $from_id AND messages.to_id = $to_id AND messages.id > $msg_id)
                                OR (messages.from_id = $to_id AND messages.to_id = $from_id AND messages.id > $msg_id)", true);
    }
}