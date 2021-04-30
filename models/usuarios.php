<?php
class usuarios{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
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
}
?>