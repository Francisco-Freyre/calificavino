<?php
class usuarios{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getFriends($id_user){
        $sql = "SELECT id_paciente, nombre_p FROM d_paciente WHERE calificaciones = 'on' AND id_paciente != $id_user";
        return $result = $this->db->query($sql);
    }

    public function getUser($id_user){
        $sql = "SELECT id_paciente, nombre_p, correo, imagen FROM d_paciente WHERE id_paciente = $id_user";
        return $result = $this->db->query($sql);
    }

    public function readOne($correo){
        $sql = "SELECT * FROM d_paciente WHERE correo = '$correo's";
        return $result = $this->db->query($sql);
    }

    public function UpdateCodigo($codigo, $id){
        $result = $this->db->query("UPDATE d_paciente SET codigo = '$codigo' WHERE id_paciente = $id");

        if($this->db->affected_rows > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function readByCodigo($codigo){
        $sql = "SELECT * FROM d_paciente WHERE codigo = '$codigo'";
        return $response = $this->db->query($sql);
    }

    public function updatePass($password, $id){
        $opciones = array(
            'cost' => 12
        );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

        $result = $this->db->query("UPDATE d_paciente SET pass = '$password_hashed' WHERE id_paciente = $id");

        if($this->db->affected_rows > 0){
            return true;
        }
        else{
            return false;
        }

    }

    public function logueo($password, $email){
        $result = false;
        $sql = "SELECT id_paciente, nombre_p, pass, calificaciones, correo, imagen FROM d_paciente WHERE correo = '$email'";
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
        $sql = "SELECT * FROM d_paciente WHERE id_paciente = $id_user";
        return $result = $this->db->query($sql);
    }

    public function updatePerfil($id, $nombre, $edad, $sexo, $dom, $cp, $cel, $correo, $imagen){
        $sql = "";
        if($imagen != ""){
            $sql = "UPDATE d_paciente SET nombre_p = '$nombre', edad_p = '$edad', sexo_p = '$sexo', domicilio_p = '$dom', cp_p = '$cp', cel_pac = '$cel', correo = '$correo', imagen = '$imagen' WHERE id_paciente = $id";
        }
        else{
            $sql = "UPDATE d_paciente SET nombre_p = '$nombre', edad_p = '$edad', sexo_p = '$sexo', domicilio_p = '$dom', cp_p = '$cp', cel_pac = '$cel', correo = '$correo' WHERE id_paciente = $id";
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
        $sql = "INSERT INTO d_paciente VALUES(null, '$nombre', null, '', '', '', '', '', '', '$correo','', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DE1871', 'DE1871', '', 79, '', '', '', 0, '','$password_hashed', '', null, 'T', 'on', 'precio1', null, null,0,0,'')";
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