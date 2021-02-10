<?php

class Utils{
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        
        return $name;
    }
    
    public static function isCatador(){
        if(isset($_SESSION['identity'])){
            if($_SESSION['identity']->califcar == "on"){
                return true;
            }
            else{
                echo "<script>";
                echo "window.location.replace('http://localhost:8080/segundapuesta.shop/');";
                echo "</script>";
            }
        }
    }
}

