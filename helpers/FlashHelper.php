<?php 
namespace helpers;

class FlashHelper {
    public $someProp = 'someValue';
    function __contruct(){
        var_dump('adasd');
    }

    public static function set_flash_message($key, $message){
        $_SESSION[$key] = $message;
    }

    static function get_flash_message  ($key){
        if(isset($_SESSION[$key])) {
            $message = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $message;
        } 
        return null;
    }
    

}
