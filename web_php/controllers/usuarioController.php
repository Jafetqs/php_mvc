<?php
require_once 'mdls/usr.php';

class usuarioController{
    public function index(){
    }
    public function registro(){
        require_once 'vws/pgs/registro.php';
    }
    public function guardar(){
        if(isset($_POST)){
            // setCedula
            $usuario = new Usuario();
            $cedula = $_POST['cedula'];
            $telefono = $_POST['tel'];
            $celular = $_POST['telc'];

            $cedula = str_replace('-', '', $cedula);
            $telefono = str_replace('-', '', $telefono);
            $celular = str_replace('-', '', $celular);

            $cedula = str_replace(' ', '', $cedula);
            $telefono = str_replace(' ', '', $telefono);
            $celular = str_replace(' ', '', $celular);

            $usuario->setCedula($cedula);
            // setNombre
            $usuario->setNombre($_POST['nombre']);
            // setCorreo
            $usuario->setCorreo($_POST['mail']);
            // setTelefono
            $usuario->setTelefono($telefono);
            // setCelular
            $usuario->setCelular($celular);
            // setContrasenna
            $usuario->setContrasenna($_POST['contrasenia']);
            // setNacimiento
            $usuario->setNacimiento($_POST['nacimiento']);
            // setFoto
            $ft = $_FILES['foto']['name'];
            $fto = 'assets/img/' . uniqid() . '_' . $ft;
            move_uploaded_file($_FILES['foto']['tmp_name'], $fto);
            $usuario->setFoto($fto);

            $grsd = $usuario->guardar();
            if($grsd){
                $_SESSION['register']= "completed";
                
            }else{
                $_SESSION['register']= "failed";
            }
        }else{
            $_SESSION['register']= "failed";
        }
        header("Location:".brl.'usuario/registro');
    }
    public function login_form(){
        require_once 'vws/pgs/login.php';
    }
    public function login(){
        if(isset($_POST)){
            $usuario = new Usuario();
            $cedula = $_POST['cedula'];
            $cedula = str_replace('-', '', $cedula);
            $cedula = str_replace(' ', '', $cedula);
            $usuario->setCedula($cedula);
            $usuario->setContrasenna(($_POST['contrasenia']));

            $identity= $usuario->login();
            if($identity && is_object($identity)){
				$_SESSION['identity'] = $identity;
                $_SESSION['login'] = "yes";
				
				if($identity->rol == 'administrador'){
					$_SESSION['admin'] = true;
				}
                header("Location:".brl);
			}else{
                $_SESSION['login'] = "no";
                header("Location:".brl."usuario/login_form");
			}
        
        }
    }
    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']); 
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']); 
        }
        header("Location:".brl);
    }
    public function upu(){
        Tlsx::ify();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $us = new Usuario();
            $us->setIdUsuario($id);
            $usr = $us->getOne();
        }else{
            header('Location:'.brl);
        }
        require_once 'vws/pgs/update_user.php';
    }
    public function upd(){
        Tlsx::ify();
        if(isset($_POST)){
            $nombre = $_POST['nombre'];
            $telefono = $_POST['tel'];
            $celular = $_POST['telc'];
            $telefono = str_replace('-', '', $telefono);
            $celular = str_replace('-', '', $celular);
            $telefono = str_replace(' ', '', $telefono);
            $celular = str_replace(' ', '', $celular);
            $ibl = new Usuario();
            $ibl->setNombre($nombre);
            $ibl->setTelefono($telefono);
            $ibl->setCelular($celular);
            $ibl->setNacimiento($_POST['nacimiento']);
    
            $id = $_GET['id'];
            $ibl->setIdUsuario($id);
            $grsd = $ibl->ed($id); 
    
            if($grsd){
                $_SESSION['identity'] = $ibl->getOne();
            }else{
                $_SESSION['user'] = 'no';
            }
        }else{
            $_SESSION['user'] = 'no';
        }
        header('Location: '.brl);
        exit(); 
    }
    
    
}
