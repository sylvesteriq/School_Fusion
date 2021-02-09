<?php

class Security{
    public static function sanitize($value){
        return htmlspecialchars($value,ENT_QUOTES,'UTF-8');
    }
    public static function hash($value){
        $val = trim($value);
        if($password = password_hash($val,PASSWORD_DEFAULT,['cost'=>12])){
            
        }
    }
}
class FormHandler{
    
}

