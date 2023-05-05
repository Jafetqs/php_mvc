<?php
require_once 'mdls/inm.php';

class contentController{
    public function index(){
        $ibl = new Inmueble();
        $props = $ibl->getUltimos();
        require_once 'vws/inc/content.php';
    }
    public function contact(){
        require_once 'vws/pgs/contacto.php';
    }
    public function correo(){
        $ibl = new Inmueble();
        $cr = $ibl->correo();
    }
}

