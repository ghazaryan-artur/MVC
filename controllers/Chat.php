<?php
namespace controllers;

use system\Controller;
use models\Messages;

class Chat extends Controller {


    public function conversation($to_id){
        $model = new Messages;
        $this->view->data = $model->get_msg($_SESSION['user_id'], $to_id);
        $this->view->to_id = $to_id;

        $this->view->render('chat');  
    
          
    }
    
    public function send($to_id, $text){
        $model = new Messages;
        $data = [
            'from_id' => $_SESSION['user_id'],
            'to_id' => $to_id,
            'body' => $text
        ];
       
        $result = $model->add_msg($data);
        $data2 = $model->get_last_msg($_SESSION['user_id']);
        $data2['body'] = str_replace('%20', ' ', $data2['body']);
        if($result){
            echo json_encode($data2);
        } else {
            echo 0;
        }
    }
    
}
