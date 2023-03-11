<?php

class Region
{
    public $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $query = "SELECT * FROM regions";
        $region = $this->pdo->prepare($query);
        $region->execute();
        return $region->fetchAll(PDO::FETCH_OBJ);
    }

    public function showRegion($id){
        $query = "SELECT * FROM regions WHERE id=?";
        $region = $this->pdo->prepare($query);
        $region->execute([$id]);
        return $region->fetchAll(PDO::FETCH_OBJ);
    }
}