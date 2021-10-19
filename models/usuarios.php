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
        $sql = "SELECT id, nombre, pass, califcar, correo, imagen FROM clientes WHERE correo = '$email'";
        $login = $this->db->query($sql);
        if($login && $login->num_rows == 1){
            $cliente = $login->fetch_object();
            
            if(password_verify($password, $cliente->pass)){
                $result = $cliente;
            }
            else{
                $result = $this->db->error;
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

    public function create($nombre, $correo, $password){
        $opciones = array(
            'cost' => 12
        );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
        $sql = "INSERT INTO clientes VALUES(null, '$nombre', '', '', '', '', '', '$correo', '', '$password_hashed', null, 'on', '')";
        $save = $this->db->query($sql);
        if($save){
            return $this->db->insert_id;
        }
        else{
            return $this->db->error;
        }
        
    }
}
?>