<?php 
namespace helpers;

class FlashHelper {
    public static function set_flash_message($key, $message){
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



    public static function set_flash_message($keys, &$arr, $message){
        if(is_array($keys)){
            $key = array_shift($keys);
            $arr[$key] = null;
            if(empty($keys)) {
               $arr[$key] = $message;
                return;
            }
            FlashHelper::set_flash_message($keys, $arr[$key], $message);
        } else {
            $arr[$keys] = $message;
        }
    }
    public static function get_flash_message($keys, $array){
        if(is_array($keys)){
            $tmp = &$array;
            foreach($keys as $key => $value) {
                $tmp =& $tmp[$value];
            }
            FlashHelper::unset_flash_message($keys,$array);
            return $tmp;
        } else {
            if(isset($_SESSION[$key])) {
                $message = $array[$key];
                unset($array[$key]);
                return $message;
            } 
            return null;
        }
        
    }
    public static function unset_flash_message($keys, &$arr){
        $key = array_shift($keys);
        $arr[$key] = null;
        if(empty($keys)) {
            var_dump($arr);
            unset($arr);
            return;
        }
        FlashHelper::unset_flash_message($keys, $arr[$key]);
    }
    

}
