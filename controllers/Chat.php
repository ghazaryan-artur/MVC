<?php
namespace controllers;

use system\Controller;
use models\Messages;

class Chat extends Controller {
    function __construct(){
        if (!isset($_SESSION['user_id'])){
            header("Location: /");
        }
        parent::__construct();
    }


    public function conversation($to_id){
        $model = new Messages;
        $this->view->data = $model->get_msg($_SESSION['user_id'], $to_id);
        $this->view->to_id = $to_id;
        $this->view->render('chat');   
    }
    
    public function send(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['text'])) {
            $data = [
                'from_id' => $_SESSION['user_id'],
                'to_id' => $_POST['to_id'],
                'body' => $_POST['text']
            ];
            $output = [
                'success' => true,
                'data' => []
            ];
            $model = new Messages;
            $last_msg_id = $model->add_msg($data);
            if($last_msg_id){
                $output['data'] = $model->get_last_msg($last_msg_id);
            }
            if($output['data']['body'] ){
                echo json_encode($output);
            } else {
                $output['success'] = false;
                echo json_encode($output);
            }            
        }
    }

    public function refresh(){
        $output = [
            'success' => true,
            'data' => [],
            'last_msg_id' => $_POST['msg_id']
        ];
        $model = new Messages;
        $result = $model->get_all_last_msg($_SESSION['user_id'], $_POST['to_id'], $_POST['msg_id']);
        if(!empty($result)){
            $output['last_msg_id'] = $result[count($result)-1]['id'];
            $output['data'] = $result;
            echo json_encode($output);
        } else {
            $output['success'] = false;
            echo json_encode($output);
        }
        
    }

}
