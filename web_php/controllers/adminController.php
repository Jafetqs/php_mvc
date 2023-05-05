<?php
require_once 'mdls/adm.php';



class adminController{
    public function gestionAdmin(){
        Tlsx::ian();
        $ibl = new Admin();
        $inm = $ibl->getAll();
        require_once 'vws/pgs/adminProps.php';
        

    }
    public function dlt(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $inm = new Admin;
            $inm->dlt($id);
        }
        header('Location:'.brl."admin/gestionAdmin");
        
    }
    public function edit(){
        Tlsx::ian();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $inm = new Admin();
            $inm->setIdPropiedad($id);
            $pro = $inm->getOne();
        }else{
            header('Location:'.brl."admin/gestionAdmin");
        }
        require_once 'vws/pgs/update_prop_adm.php';
    }
    public function rll(){
        Tlsx::ian();
        if(isset($_POST)){
            $nombre = $_POST['inmueble'];
            $provincia = $_POST['provincia'];
            $direccion = $_POST['direccion'];
            $precio = $_POST['precio'];
            $numero_cuartos = $_POST['cuartos'];
            $numero_bannos = $_POST['bannos'];
            $espacios_cochera = $_POST['cochera'];
            $estado = $_POST['estado'];

            $ibl = new Admin();

            $ibl ->setNombrep($nombre);
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
        header('Location:'.brl.'admin/gestionAdmin');
    }
    public function vsc(){
        if(isset($_POST['bs'])){
            $bs = $_POST['bs'];
            $ibl = new Admin();
            
            $src = $ibl->sc($bs);
        require_once 'vws/pgs/scv.php';
        }
    
    }
    public function dtll(){
        Tlsx::ian();
        $id = $_GET['id'];
        $ibl = new Admin();
        $dt= $ibl->dt($id);

        require_once 'vws/pgs/inm.php';
    }
    public function gestionAdminUs(){
        Tlsx::ian();
        $ibl = new Admin();
        $inm = $ibl->getAllUs();
        require_once 'vws/pgs/adminUser.php';
    }

    public function upu(){
        Tlsx::ian();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $us = new Admin();
            $us->setIdUsuario($id);
            $usr = $us->getOneUs();
        }else{
            header('Location:'.brl);
        }
        require_once 'vws/pgs/update_user_adm.php';
    }
    public function upd(){
        Tlsx::ian();
        if(isset($_POST)){
            $nombre = $_POST['nombre'];
            $telefono = $_POST['tel'];
            $celular = $_POST['telc'];
            $telefono = str_replace('-', '', $telefono);
            $celular = str_replace('-', '', $celular);
            $telefono = str_replace(' ', '', $telefono);
            $celular = str_replace(' ', '', $celular);
            $ibl = new Admin();
            $ibl->setNombre($nombre);
            $ibl->setTelefono($telefono);
            $ibl->setCelular($celular);
            $ibl->setNacimiento($_POST['nacimiento']);
    
            $id = $_GET['id'];
            $grsd = $ibl->edus($id); 
    
            if($grsd){
                $_SESSION['user'] = 'yes'; 
            }else{
                $_SESSION['user'] = 'no';
            }
        }else{
            $_SESSION['user'] = 'no';
        }
        header('Location: '.brl.'admin/gestionAdminUs');
    }
    public function dltus(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $inm = new Admin;
            $inm->dltus($id);
        }
        header('Location:'.brl."admin/gestionAdminUs");
        
    }
    public function registro(){
        Tlsx::ian();
        require_once 'vws/pgs/registroAdm.php';
    }
    public function guardar(){
        if(isset($_POST)){
            // setCedula
            $usuario = new Admin();
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
            $usuario->setRol('Administrador');

            $grsd = $usuario->guardar();
            if($grsd){
                $_SESSION['register']= "completed";
                
            }else{
                $_SESSION['register']= "failed";
            }
        }else{
            $_SESSION['register']= "failed";
        }
        header("Location:".brl.'admin/gestionAdminUs');
    }
    public function report() {
        ob_start(); 
    
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator('Mi Aplicación');
        $pdf->SetAuthor('Autor');
        $pdf->SetTitle('Reporte de Usuarios');
        $pdf->SetSubject('Reporte de Usuarios');
    
       
        $pdf->AddPage();
    
      
        $ibl = new Admin();
        $inm = $ibl->getAll();
    
 
        $html = '<table class="table table-hover w-75 mx-auto">';
        $html .= '<thead><tr><th>Nombre</th><th>Provincia</th><th>Número de Baños</th><th>Espacios de Cochera</th><th>Estado</th></tr></thead><tbody>';
        while ($inmb = $inm->fetch_object()) {
            $html .= '<tr class="table-primary"><td>' . $inmb->nombre . '</td><td>' . $inmb->provincia . '</td><td>' . $inmb->numero_bannos . '</td><td>' . $inmb->espacios_cochera . '</td><td>' . $inmb->estado . '</td></tr>';
        }
        $html .= '</tbody></table>';
        $pdf->writeHTML($html, true, false, true, false, '');
        ob_end_clean(); 
        $pdf->Output(__DIR__ . '/pdfs/reporte_usuarios.pdf', 'F');
        $_SESSION['pdf']= true;
        header("Location:".brl.'admin/gestionAdmin');
    }
    

}




