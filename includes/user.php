<?php
//
include_once 'db.php';
//clase qque extiende de db
class User extends DB{
    private $id;
    private $nombre;
    private $username;

    public function userExists($user, $pass){
        $query = $this->connect()->prepare('SELECT * FROM aplicador WHERE usuario = :user AND contrasena = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT p.*, a.* FROM persona p, aplicador a WHERE a.persona = p.id_persona and a.usuario =  :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->id = $currentUser['id_aplicador'];
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['usuario'];
        }
    }

    public function getID(){
        return $this->id;
    }
}

?>
