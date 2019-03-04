<?php

class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host     = 'z12itfj4c1vgopf8.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
        $this->db       = 'ost4g6yz9kex2re7';
        $this->user     = 'a475y0a742z9kxy5';
        $this->password = 'qfq6hvbjqb8po5ki';
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
