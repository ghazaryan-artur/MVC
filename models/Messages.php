<?php
namespace models;

use system\Model;

    class Messages extends Model {


    public function get_messages($from_id, $to_id){
       return $this->db->select("SELECT messages.from_id, messages.to_id, messages.body, messages.seen, messages.date, users.image FROM messages INNER JOIN users ON messages.from_id = users.id WHERE (from_id = $from_id AND to_id = $to_id) OR (from_id = $to_id AND to_id = $from_id)", true);
    }
}