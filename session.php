<?php




class Session{

    static function start(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }


    static function destroy(){
        session_unset();
        session_destroy();
    }


    static function add($key, $value){
        $_SESSION[$key] = $value;
    }


    static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return null;
        }
    }

    static function delete($key){
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }
}





?>