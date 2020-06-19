<?php
namespace controllers;

use system\Controller;
use models\User;
use \helpers\FlashHelper;

class Profile extends Controller{
    function __construct(){
        if (!isset($_SESSION['user_id'])){
            header("Location: /");
        }
        parent::__construct();
    }
    
    public function index(){
        $user_id = $_SESSION['user_id'];
        $model = new User;
        $user_data = $model->get_data($user_id);
        $this->view->name = $user_data['name'];
        $this->view->email = $user_data['email'];
        $this->view->img = $user_data['image'];

        $this->view->render('profile');
    }

    public function upg_img($id, $delImg){
        $error  = '';
        if(empty($_FILES['img']['name'])) {
            $error =  'Any file isn\'t choosen';
        } else {
            $imgType = strtolower(strrchr($_FILES['img']['name'], '.'));   
            if($imgType != ".jpg" && $imgType != ".png" && $imgType != ".jpeg" && $imgType != ".gif" ) {
                $error = 'Files format should be JPG, JPEG, PNG or GIF';
            } elseif ($_FILES['img']['size'] > 200000000) {
                $error = 'Files size should be less than 200 MB';
            }
        }


        
        if(!$error){
            $uploadingName = str_replace(" ", "", microtime() . $imgType);
            $model = new User;
            $isUpd = $model->upd_img($id, $uploadingName);
            if($isUpd){
                if (move_uploaded_file($_FILES['img']['tmp_name'], "public/images/users/".$uploadingName)){
                    if($delImg != 'default.png'){
                        unlink ("public/images/users/$delImg");
                    }
                } else {
                    $error = "Error with uploading your foto";
                }
            }
        }

        FlashHelper::set_flash_message(['error', 'img', 'thirdLevel'], $_SESSION , $error);

        header('Location: /profile');
    }
}