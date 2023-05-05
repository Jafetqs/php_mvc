<?php
require_once 'mdls/inm.php';

class propiedadController{
    public function index(){
        
        $ibs = new Inmueble();
        $inmbs = $ibs->getAll();
        require_once 'vws/pgs/inmuebles.php';
    }
    public function gestionUser(){
        Tlsx::ify();
        $ibl = new Inmueble();
        $props = $ibl->getAllUser();
        require_once 'vws/pgs/userProps.php';
        

    }
    public function crear(){
        Tlsx::ify();
        require_once 'vws/pgs/pubInmueble.php';
    }
    public function guardar(){
        Tlsx::ify();
        if(isset($_POST)){
            $nombre = $_POST['inmueble'];
            $provincia = $_POST['provincia'];
            $direccion = $_POST['direccion'];
            $precio = $_POST['precio'];
            $numero_cuartos = $_POST['cuartos'];
            $numero_bannos = $_POST['bannos'];
            $espacios_cochera = $_POST['cochera'];
            $estado = $_POST['estado'];

            $ibl = new Inmueble();

            $ibl ->setNombre($nombre);
            $ibl ->setProvincia($provincia);
            $ibl ->setDireccion($direccion);
            $ibl ->setPrecio($precio);
            $ibl ->setNumeroCuartos($numero_cuartos);
            $ibl ->setNumeroBannos($numero_bannos);
            $ibl ->setEspacioCochera($espacios_cochera);
            $ibl ->setEstado($estado);   
            $grsd = $ibl ->guardar();         
            if($grsd){
                $_SESSION['inmueble'] = 'yes';
            }else{
                $_SESSION['inmueble'] = 'no';
            }
        }else{
            $_SESSION['inmueble'] = 'no';
        }
        header('Location:'.brl);
    }public function dlt(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $inm = new Inmueble;
            $inm->dlt($id);
        }
        header('Location:'.brl."propiedad/gestionUser");
        
    }
    public function edit(){
        Tlsx::ify();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $inm = new Inmueble();
            $inm->setIdPropiedad($id);
            $pro = $inm->getOne();
        }else{
            header('Location:'.brl."propiedad/gestionUser");
        }
        require_once 'vws/pgs/update_prop.php';
    }
    public function rll(){
        Tlsx::ify();
        if(isset($_POST)){
            $nombre = $_POST['inmueble'];
            $provincia = $_POST['provincia'];
            $direccion = $_POST['direccion'];
            $precio = $_POST['precio'];
            $numero_cuartos = $_POST['cuartos'];
            $numero_bannos = $_POST['bannos'];
            $espacios_cochera = $_POST['cochera'];
            $estado = $_POST['estado'];

            $ibl = new Inmueble();

            $ibl ->setNombre($nombre);
            $ibl ->setProvincia($provincia);
            $ibl ->setDireccion($direccion);
            $ibl ->setPrecio($precio);
            $ibl ->setNumeroCuartos($numero_cuartos);
            $ibl ->setNumeroBannos($numero_bannos);
            $ibl ->setEspacioCochera($espacios_cochera);
            $ibl ->setEstado($estado);   
            $id = $_GET['id'];
            $dr = $ibl->ed($id);      
    
            if($dr){
                $_SESSION['inmueble'] = 'yes';
            }else{
                $_SESSION['inmueble'] = 'no';
            }
        }else{
            $_SESSION['inmueble'] = 'no';
        }
        header('Location:'.brl.'propiedad/gestionUser');
    }
    public function vsc(){
        if(isset($_POST['bs'])){
            $bs = $_POST['bs'];
            $ibl = new Inmueble();
            
            $src = $ibl->sc($bs);
           require_once 'vws/pgs/scv.php';
        }
      
    }
    public function dtll(){
        Tlsx::ify();
        $id = $_GET['id'];
        $ibl = new Inmueble();
        $dt= $ibl->dt($id);

        require_once 'vws/pgs/inmueble.php';
    }
}