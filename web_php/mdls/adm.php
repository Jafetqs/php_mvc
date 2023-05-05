<?php
require_once('tcpdf/tcpdf.php');
class Admin{
        //PROP
    private $id_propiedad;
    private $id_usuario_p;
    private $nombrep;
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
    // Getter y setter para $id_propiedad
    public function getIdPropiedad() {
        return $this->id_propiedad;
    }

    public function setIdPropiedad($id_propiedad) {
        $this->id_propiedad = $this->db->real_escape_string($id_propiedad);
    }

    // Getter y setter para $id_usuario
    public function getIdUsuariop() {
        return $this->id_usuario_p;
    }

    public function setIdUsuariop($id_usuario_p) {
        $this->id_usuario_p = $this->db->real_escape_string($id_usuario_p);
    }

    // Getter y setter para $nombre
    public function getNombrep() {
        return $this->nombrep;
    }

    public function setNombrep($nombrep) {
        $this->nombrep = $this->db->real_escape_string($nombrep);
    }

    // Getter y setter para $provincia
    public function getProvincia() {
        return $this->provincia;
    }

    public function setProvincia($provincia) {
        $this->provincia =$this->db->real_escape_string($provincia);
    }

    // Getter y setter para $direccion
    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    // Getter y setter para $precio
    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    // Getter y setter para $numero_cuartos
    public function getNumeroCuartos() {
        return $this->numero_cuartos;
    }

    public function setNumeroCuartos($numero_cuartos) {
        $this->numero_cuartos = $this->db->real_escape_string($numero_cuartos);
    }

    // Getter y setter para $numero_bannos
    public function getNumeroBannos() {
        return $this->numero_bannos;
    }

    public function setNumeroBannos($numero_bannos) {
        $this->numero_bannos = $this->db->real_escape_string($numero_bannos);
    }

    // Getter y setter para $espacio_cochera
    public function getEspacioCochera() {
        return $this->espacio_cochera;
    }

    public function setEspacioCochera($espacio_cochera) {
        $this->espacio_cochera = $this->db->real_escape_string($espacio_cochera);
    }

    // Getter y setter para $tipo
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $this->db->real_escape_string($estado);
    }

    //USUARIO-
    private $id_usuario;
    private $cedula;
    private $nombre;
    private $correo;
    private $telefono;
    private $celular;
    private $contrasenna;
    private $nacimiento;
    private $foto;
    private $rol;

    public function getIdUsuario(){
        return $this->id_usuario;
    }
    
    public function setIdUsuario($id_usuario){
        $this->id_usuario = $this->db->real_escape_string($id_usuario);
    }
    
    public function getCedula(){
        return $this->cedula;
    }
    
    public function setCedula($cedula){
        $this->cedula = $this->db->real_escape_string($cedula);
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    
    public function getCorreo(){
        return $this->correo;
    }
    
    public function setCorreo($correo){
        $this->correo = $this->db->real_escape_string($correo);
    }
    
    public function getTelefono(){
        return $this->telefono;
    }
    
    public function setTelefono($telefono){
        $this->telefono = $this->db->real_escape_string($telefono);
    }
    
    public function getCelular(){
        return $this->celular;
    }
    
    public function setCelular($celular){
        $this->celular = $this->db->real_escape_string($celular);
    }
    
    public function getContrasenna(){
        // return password_hash($this->db->real_escape_string($this->contrasenna), PASSWORD_BCRYPT, ['cost' => 4]);
        return $this->db->real_escape_string($this->contrasenna);
    }
    
    public function setContrasenna($contrasenna){
        $this->contrasenna = $contrasenna;
    }
    
    public function getNacimiento(){
        return $this->nacimiento;
    }
    
    public function setNacimiento($nacimiento){
        $this->nacimiento = $this->db->real_escape_string($nacimiento);
    }
    
    public function getFoto(){
        return $this->foto;
    }
    
    public function setFoto($foto){
        $this->foto = $this->db->real_escape_string($foto);
    }
    
    public function getRol(){
        return $this->rol;
    }
    
    public function setRol($rol){
        $this->rol = $rol;
    }
    

    public function guardar(){

        $sql = "INSERT INTO usrs (cedula,nombre,correo,telefono,celular,contrasenna,nacimiento,foto,rol) VALUES('{$this->getCedula()}', '{$this->getNombre()}', '{$this->getCorreo()}', '{$this->getTelefono()}', '{$this->getCelular()}', '{$this->getContrasenna()}', '{$this->getNacimiento()}', '{$this->getFoto()}','{$this->getRol()}');";
        $save = $this->db->query($sql);
		$rztl = false;
		if($save){
			$rztl = true;
		}
		return $rztl;
    }

    public function getAll(){
        $sql = "SELECT * FROM props";
        $rsw = $this->db->query($sql);

        return $rsw;
    }
    public function getAllUs(){
        $sql = "SELECT * FROM usrs";
        $rsw = $this->db->query($sql);

        return $rsw;
    }
    public function getOne(){
        $sql = "SELECT * FROM props WHERE id_inmueble = {$this->getIdPropiedad()}";
        $rsw = $this->db->query($sql);

        return $rsw->fetch_object();
    }
    public function getOneUs(){
        $sql = "SELECT * FROM usrs WHERE id_usuario = {$this->getIdUsuario()}";
        $rsw = $this->db->query($sql);

        return $rsw->fetch_object();
    }
    public function dlt($id){
        $ms = "DELETE FROM props WHERE id_inmueble = {$id}";
        $dlt = $this->db->query($ms);
    }
    public function ed($id){
        $sqlr = "SELECT img1, img2, img3,id_usuario FROM props WHERE id_inmueble = $id";
        $rz = $this->db->query($sqlr);
        $flsc = $rz->fetch_object();
        $ict1= $flsc->img1;
        $ict2= $flsc->img2;
        $ict3= $flsc->img3;
        $id_us =  $flsc->id_usuario;

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


        $q = "UPDATE props SET id_usuario = {$id_us}, nombre = '{$this->getNombrep()}', provincia = '{$this->getProvincia()}', direccion = '{$this->getDireccion()}', precio = '{$this->getPrecio()}', numero_cuartos = '{$this->getNumeroCuartos()}', numero_bannos = '{$this->getNumeroBannos()}', espacios_cochera = '{$this->getEspacioCochera()}', estado = '{$this->getEstado()}', img1= '{$i_1}', img2 ='{$i_2}', img3='{$i_3}' WHERE id_inmueble = $id";

        $sv3 = $this->db->query($q);

        $rztl = false;
        if($sv3){
            $rztl = true;
        }
        return $rztl;
    }
    public function dt($id){
        $sql = "SELECT i.*,u.correo, u.telefono, u.celular, u.nombre as vendedor  FROM props as i INNER JOIN usrs as u on u.id_usuario = i.id_usuario WHERE id_inmueble = {$id}";
        $dtl = $this->db->query($sql);
        $dt = $dtl->fetch_object();

        return $dt;
    }
    public function edus($id){
        $sqlr = "SELECT foto FROM usrs WHERE id_usuario = $id";
        $rz = $this->db->query($sqlr);
        $flsc = $rz->fetch_object();
        $ict1= $flsc->foto;

        if (isset($_FILES['fotoup']['tmp_name']) && $_FILES['fotoup']['size'] > 0) {
            $ign1 = $_FILES['fotoup']['name'];
            $i_1 = 'assets/img/' . uniqid() . '_' . $ign1;
            move_uploaded_file($_FILES['fotoup']['tmp_name'], $i_1);
        } else {
            $i_1 = $ict1; 
        }
        $q = "UPDATE usrs SET nombre = '{$this->getNombre()}', telefono = '{$this->getTelefono()}', celular = '{$this->getCelular()}', nacimiento = '{$this->getNacimiento()}', foto = '{$i_1}' WHERE id_usuario = $id";
        $sv3 = $this->db->query($q);
        
        $rztl = false;
        if($sv3){
            $rztl = true;
        }
        return $rztl;
    }
    public function dltus($id){
        $ms = "DELETE FROM usrs WHERE id_usuario = {$id}";
        $dlt = $this->db->query($ms);
    }
   
}