<?php

class Usuario{
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
    private $db;

    public function __construct(){
        $this->db = Db::connect();

    }

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

        $sql = "INSERT INTO usrs (cedula,nombre,correo,telefono,celular,contrasenna,nacimiento,foto) VALUES('{$this->getCedula()}', '{$this->getNombre()}', '{$this->getCorreo()}', '{$this->getTelefono()}', '{$this->getCelular()}', '{$this->getContrasenna()}', '{$this->getNacimiento()}', '{$this->getFoto()}');";
        $save = $this->db->query($sql);
        
		$rztl = false;
		if($save){
			$rztl = true;
		}
		return $rztl;
    }
    public function login(){
		$rztl = false;
		$cedula = $this->cedula;
		$password = $this->contrasenna;
	
		// Comprobar si existe el usuario
		$sql = "SELECT * FROM usrs WHERE cedula = '$cedula'";
		$login = $this->db->query($sql);

		if($login && $login->num_rows == 1){
			$usuario = $login->fetch_object();
			// Verificar la contraseña
            // var_dump($usuario->contrasenna);
            // var_dump(password_hash($password, PASSWORD_BCRYPT, ['cost' => 4] ));
			// $verify = password_verify($password, $usuario->contrasenna);
			
			if($password ==$usuario->contrasenna){
				$rztl = $usuario;
			}
		}
		
		return $rztl;
	}
    public function getOne(){
        $sql = "SELECT * FROM usrs WHERE id_usuario = {$this->getIdUsuario()}";
        $usr = $this->db->query($sql);
        return $usr->fetch_object();
    }
    public function ed($id){
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
}
