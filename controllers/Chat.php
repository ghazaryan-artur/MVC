<?php
namespace controllers;

use system\Controller;
use models\Messages;

class Chat extends Controller {
    
    public function index(){
       
    }
    public function conversation($to_id){
        $model = new Messages;
        $this->view->data = $model->get_messages($_SESSION['user_id'], $to_id);
        $this->view->render('chat');    
    }
    
}
