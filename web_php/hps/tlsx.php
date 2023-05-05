<?php

class Tlsx{
    public static function dlssn($sesion){
        if(isset($_SESSION[$sesion])){
            $_SESSION[$sesion] = null;
        }
        return $sesion ;
    }
    public static function ian(){
		if(!isset($_SESSION['admin'])){
			header("Location:".brl);
		}else{
			return true;
		}
	}
    public static function ify(){
		if(!isset($_SESSION['identity'])){
			header("Location:".brl.'usuario/login_form');
		}else{
			return true;
		}
	}
}