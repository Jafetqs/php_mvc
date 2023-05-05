<?php 
session_start();
if(isset($_SESSION['admin'])){
    ob_start();
};
require_once 'autoload.php';
require_once 'config/database.php';
require_once 'config/parametros.php';
require_once 'hps/tlsx.php';
include_once 'vws/inc/header.php';


?>
<main>

<?php 
function err(){
    $err = new errorController();
    $err->index();
}



if(isset($_GET['controller'])){

	$crtno = $_GET['controller'].'Controller';

}else if(!isset($_GET['controller']) && !isset($_GET['action'])){

    $crtno = controller_default;
    
}else{
    err();
}

if(class_exists($crtno)){

    $controlador = new $crtno();

    if(isset($_GET['action']) && method_exists($controlador,$_GET['action'])){
        
        $action = $_GET['action'];
        $controlador->$action();

    }else if(!isset($_GET['controller']) && !isset($_GET['action'])){
        
        $default = action_default;
        $controlador->$default();
    }
    else{
        err();
    }
}else{
    err();
}
?>
</main>



<?php include_once 'vws/inc/footer.php';?>
<?php
if(isset($_SESSION['admin'])){
    ob_end_flush();
    }; ?>