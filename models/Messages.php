<?php
namespace models;

use system\Model;

    class Messages extends Model {


    public function get_msg($from_id, $to_id){
       return $this->db->select("SELECT messages.from_id, messages.to_id, messages.body, messages.seen, messages.date, users.image 
                                FROM messages INNER JOIN users ON messages.from_id = users.id 
                                WHERE (from_id = $from_id AND to_id = $to_id) OR (from_id = $to_id AND to_id = $from_id)", true);
    }

    public function add_msg($data){
        return $this->db->insert("messages", $data);
    }
    function get_last_msg($from_id){
        $max_id_arr = $this->db->select("SELECT MAX(id) FROM messages");
        $max_id = $max_id_arr['MAX(id)'];
        return $this->db->select("SELECT messages.from_id, messages.to_id, messages.body, messages.seen, messages.date, users.image 
                                FROM messages INNER JOIN users ON messages.from_id = users.id WHERE  messages.id=$max_id");
    }
}