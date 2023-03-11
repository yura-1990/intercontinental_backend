<?php

class Database
{
    private $host= 'localhost';
    private $db = 'postgres';
    private $user = 'postgres';
    private $password = 'postgres';
    private $port = 5433;
    private $conn;

    public function connect()
    {
        try {
            $dsn = "pgsql:host=$this->host;port=$this->port;dbname=$this->db;";
            $this->conn = new PDO($dsn, $this->user, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return $this->conn;
        } catch (PDOException $exception){
            return array([
                'status'=>false,
                'message'=>$exception->getMessage()
            ]);
        }
    }
}