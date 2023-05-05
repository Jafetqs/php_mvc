<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
class Inmueble{
    private $id_propiedad;
    private $id_usuario;
    private $nombre;
    private $provincia;
    private $direccion;
    private $precio;
    private $numero_cuartos;
    private $numero_bannos;
    private $espacio_cochera;
    private $estado;
    private $codigoqr;

    private $db;

    public function __construct(){
        $this->db = Db::connect();

    }

    public function getIdPropiedad() {
        return $this->id_propiedad;
    }

    public function setIdPropiedad($id_propiedad) {
        $this->id_propiedad = $this->db->real_escape_string($id_propiedad);
    }


    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $this->db->real_escape_string($id_usuario);
    }

  
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

 
    public function getProvincia() {
        return $this->provincia;
    }

    public function setProvincia($provincia) {
        $this->provincia =$this->db->real_escape_string($provincia);
    }

 
    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    public function getNumeroCuartos() {
        return $this->numero_cuartos;
    }

    public function setNumeroCuartos($numero_cuartos) {
        $this->numero_cuartos = $this->db->real_escape_string($numero_cuartos);
    }

    public function getNumeroBannos() {
        return $this->numero_bannos;
    }

    public function setNumeroBannos($numero_bannos) {
        $this->numero_bannos = $this->db->real_escape_string($numero_bannos);
    }

  
    public function getEspacioCochera() {
        return $this->espacio_cochera;
    }

    public function setEspacioCochera($espacio_cochera) {
        $this->espacio_cochera = $this->db->real_escape_string($espacio_cochera);
    }

    
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $this->db->real_escape_string($estado);
    }


    public function getCodigoqr() {
        return $this->codigoqr;
    }

    public function setCodigoqr($codigoqr) {
        $this->codigoqr = $this->db->real_escape_string($codigoqr);
    }

    public function getAll(){
        $sl = "SELECT * FROM props";
        $req= $this->db->query($sl);

        return $req;
    }
    public function getAllUser(){
        $sql = "SELECT * FROM props WHERE id_usuario = {$_SESSION["identity"]->id_usuario}";
        $rsw = $this->db->query($sql);

        return $rsw;
    }
    public function getOne(){
        $sql = "SELECT * FROM props WHERE id_inmueble = {$this->getIdPropiedad()}";
        $rsw = $this->db->query($sql);

        return $rsw->fetch_object();
    }
    public function getUltimos(){
        $sql = "SELECT * FROM props ORDER BY id_inmueble DESC LIMIT 10;";

        $props = $this->db->query($sql);


        return $props;
    }
    public function guardar(){

        $ig1_n = $_FILES['img1']['name'];
        $ig2_n = $_FILES['img2']['name'];
        $ig3_n = $_FILES['img3']['name'];

        $i_r1 = 'assets/img/' . uniqid() . '_' . $ig1_n;
        $i_r2 = 'assets/img/' . uniqid() . '_' . $ig2_n;
        $i_r3 = 'assets/img/' . uniqid() . '_' . $ig3_n;

        // Mueve las imágenes a la carpeta de destino
        move_uploaded_file($_FILES['img1']['tmp_name'], $i_r1);
        move_uploaded_file($_FILES['img2']['tmp_name'], $i_r2);
        move_uploaded_file($_FILES['img3']['tmp_name'], $i_r3);

        $s = "INSERT INTO props (id_usuario,nombre,provincia,direccion,precio,numero_cuartos,numero_bannos,espacios_cochera,estado,img1,img2,img3) VALUES({$_SESSION["identity"]->id_usuario}, '{$this->getNombre()}', '{$this->getProvincia()}', '{$this->getDireccion()}', '{$this->getPrecio()}', '{$this->getNumeroCuartos()}', '{$this->getNumeroBannos()}', '{$this->getEspacioCochera()}', '{$this->getEstado()}','{$i_r1}','{$i_r2}','{$i_r3}');";
        $sve = $this->db->query($s);

        for ($ikd = 1; $ikd <= 3; $ikd++) {
            move_uploaded_file($_FILES["img$ikd"]["name"], "assets/img");
        }
		$rztl = false;
		if($sve){
			$rztl = true;
		}
		return $rztl;
    }
    public function dlt($id){
        $ms = "DELETE FROM props WHERE id_inmueble = {$id}";
        $dlt = $this->db->query($ms);
    }
    public function ed($id){
        $sqlr = "SELECT img1, img2, img3 FROM props WHERE id_inmueble = $id";
        $rz = $this->db->query($sqlr);
        $flsc = $rz->fetch_object();
        $ict1= $flsc->img1;
        $ict2= $flsc->img2;
        $ict3= $flsc->img3;

        if (isset($_FILES['img1u']['tmp_name']) && $_FILES['img1u']['size'] > 0) {
            $ign1 = $_FILES['img1u']['name'];
            $i_1 = 'assets/img/' . uniqid() . '_' . $ign1;
            move_uploaded_file($_FILES['img1u']['tmp_name'], $i_1);
        } else {
            $i_1 = $ict1;
        }

        if (isset($_FILES['img2u']['tmp_name']) && $_FILES['img2u']['size'] > 0) {
            $ign2 = $_FILES['img2u']['name'];
            $i_2 = 'assets/img/' . uniqid() . '_' . $ign2;
            move_uploaded_file($_FILES['img2u']['tmp_name'], $i_2);
        } else {
            $i_2 = $ict2;
        }

        if (isset($_FILES['img3u']['tmp_name']) && $_FILES['img3u']['size'] > 0) {
            $ign3 = $_FILES['img3u']['name'];
            $i_3 = 'assets/img/' . uniqid() . '_' . $ign3;
            move_uploaded_file($_FILES['img3u']['tmp_name'], $i_3);
        } else {
            $i_3 = $ict3;
        }
        // var_dump($i_1);
        // var_dump($i_2);
        // var_dump($i_3);
        // die();

        $q = "UPDATE props SET id_usuario = {$_SESSION["identity"]->id_usuario}, nombre = '{$this->getNombre()}', provincia = '{$this->getProvincia()}', direccion = '{$this->getDireccion()}', precio = '{$this->getPrecio()}', numero_cuartos = '{$this->getNumeroCuartos()}', numero_bannos = '{$this->getNumeroBannos()}', espacios_cochera = '{$this->getEspacioCochera()}', estado = '{$this->getEstado()}', img1= '{$i_1}', img2 ='{$i_2}', img3='{$i_3}' WHERE id_inmueble = $id";

        $sv3 = $this->db->query($q);

        $rztl = false;
        if($sv3){
            $rztl = true;
        }
        return $rztl;
    }
    public function sc($bs){
        if(intval($bs)>0){
            $intbs = intval($bs);
        }
        else{
            $intbs = -1;
        }
        $l = "SELECT * FROM props WHERE nombre LIKE '%$bs%' OR  estado LIKE '%$bs%' OR provincia LIKE '%$bs%' OR numero_cuartos = $intbs OR numero_bannos = $intbs";
        $srch = $this->db->query($l);

        return $srch;
    }
    public function dt($id){
        $sql = "SELECT i.*,u.correo, u.telefono, u.celular, u.nombre as vendedor  FROM props as i INNER JOIN usrs as u on u.id_usuario = i.id_usuario WHERE id_inmueble = {$id}";
        $dtl = $this->db->query($sql);
        $dt = $dtl->fetch_object();

        return $dt;
    }
    public function correo(){    
        $smtpHost = 'smtp.gmail.com';
        $smtpPuerto = 587; 
        $smtpUsuario = 'tu_correo@gmail.com'; // Reemplaza con tu correo
        $smtpClave = 'tu_contraseña'; // Reemplaza con tu contraseña
        $mensaje = $_POST['contenido'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $destinatario = ""; //correo receptor en este caso el correo administrador
        $asunto = "Nuevo mensaje de contacto";
        $contenido = "Nombre: " . $nombre . "\nCorreo: " . $correo . "\nMensaje: " . $mensaje;
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = $smtpHost;
            $mail->SMTPAuth   = true;
            $mail->Username   = $smtpUsuario;
            $mail->Password   = $smtpClave;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = $smtpPuerto;
            $mail->setFrom($smtpUsuario, 'Formulario de Contacto');
            $mail->addAddress($destinatario);
            $mail->isHTML(false);
            $mail->Subject = $asunto;
            $mail->Body    = $contenido; //pueden remplazarlo
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}