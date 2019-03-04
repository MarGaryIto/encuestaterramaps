<?php

class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host     = 'i943okdfa47xqzpy.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
        $this->db       = 'nob4xoafqpyvdedq';
        $this->user     = 'q923e2k5av0o6g3e';
        $this->password = 'dw6rzwed0y0sbv32';
        $this->charset  = 'utf8mb4';
    }

    function connect(){
        
        try{
            
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            
            return $pdo;

        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
}

?>
