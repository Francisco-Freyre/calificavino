<?php
class usuarios{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getFriends($id_user){
        $sql = "SELECT id, nombre FROM clientes WHERE calificaciones = 'on' AND id != $id_user";
        return $result = $this->db->query($sql);
    }

    public function getUser($id_user){
        $sql = "SELECT id, nombre, correo, imagen FROM clientes WHERE id = $id_user";
        return $result = $this->db->query($sql);
    }

    public function logueo($password, $email){
        $result = false;
        $sql = "SELECT id, nombre, pass, imagen, calificaciones FROM clientes WHERE correo = '$email'";
        $login = $this->db->query($sql);
        if($login && $login->num_rows == 1){
            $cliente = $login->fetch_object();
            
            if(password_verify($password, $cliente->pass)){
                $result = $cliente;
            }
        }
        return $result;
    }

    public function getPerfil($id_user){
        $sql = "SELECT * FROM clientes WHERE id = $id_user";
        return $result = $this->db->query($sql);
    }

    public function updatePerfil($id, $nombre, $edad, $sexo, $dom, $cp, $cel, $correo, $imagen){
        $sql = "";
        if($imagen != ""){
            $sql = "UPDATE clientes SET nombre = '$nombre', edad = '$edad', sexo = '$sexo', domicilio = '$dom', cp = '$cp', cel = '$cel', correo = '$correo', imagen = '$imagen' WHERE id = $id";
        }
        else{
            $sql = "UPDATE clientes SET nombre = '$nombre', edad = '$edad', sexo = '$sexo', domicilio = '$dom', cp = '$cp', cel = '$cel', correo = '$correo' WHERE id = $id";
        }
        $response = $this->db->query($sql);
        $result = false;
        if($response){
            $result = true;
        }
        return $result;
    }
}
?>