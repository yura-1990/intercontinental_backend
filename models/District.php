<?php

class District
{
    public $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll($id)
    {
        $query = "SELECT * FROM districts WHERE region_id=?;";
        $district = $this->pdo->prepare($query);
        $district->execute([$id]);
        return $district->fetchAll(PDO::FETCH_OBJ);
    }

    public function showDistrict($id)
    {
        $query = "SELECT * FROM districts WHERE id=?;";
        $district = $this->pdo->prepare($query);
        $district->execute([$id]);
        return $district->fetchAll(PDO::FETCH_OBJ);
    }

    public function getRelation($id)
    {
        $query = "SELECT * FROM districts WHERE region_id=?;";
        $district = $this->pdo->prepare($query);
        $district->execute([$id]);
        return $district->fetchAll(PDO::FETCH_OBJ);
    }

    public function countInRegion()
    {
        $query = "SELECT region_id, COUNT('region_id') FROM districts GROUP BY region_id;";
        $district = $this->pdo->prepare($query);
        $district->execute();
        return $district->fetchAll(PDO::FETCH_ASSOC);
    }

}