<?php 
namespace helpers;

class FlashHelper {
    public static function set_flash_message_old($key, $message){
        $_SESSION[$key] = $message;
    }
    static function get_flash_message_old($key){
        if(isset($_SESSION[$key])) {
            $message = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $message;
        } 
        return null;
    }



    public static function set_flash_message(&$arr, $keys, $message){
        if(is_array($keys)){
            $key = array_shift($keys);
            $arr[$key] = null;
            if(empty($keys)) {
               $arr[$key] = $message;
                return;
            }
            FlashHelper::set_flash_message($arr[$key], $keys, $message);
        } else {
            $arr[$keys] = $message;
        }
    }
    public static function get_flash_message(&$arr, $keys){
        if(is_array($keys)){
            $tmp = $arr;
            foreach($keys as $key => $value) {
                $tmp =& $tmp[$value];
            }
            FlashHelper::unset_flash_message($arr, $keys);
            return $tmp;
        } else {
            if(isset($array[$keys])) {
                $message = $arr[$keys];
                unset($array[$keys]);
                return $message;
            } 
            return null;
        }
        
    }

    public static function unset_flash_message(&$arr, $keys){
        $key = array_shift($keys);
        $arr[$key] = null;
        if(empty($keys)) {
            unset($arr);
            return;
        }
        FlashHelper::unset_flash_message($arr[$key], $keys);
    }
    

}
