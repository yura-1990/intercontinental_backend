<?php

class Store
{
    public $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll($id)
    {
        $query = "SELECT * FROM stores WHERE company_id=?";
        $region = $this->pdo->prepare($query);
        $region->execute([$id]);
        return $region->fetchAll(PDO::FETCH_OBJ);
    }


    public function showStore($id){
        $query = "SELECT * FROM stores WHERE id=?";
        $region = $this->pdo->prepare($query);
        $region->execute([$id]);
        return $region->fetchAll(PDO::FETCH_OBJ);
    }

    public function getRelation($id)
    {
        $query = "SELECT * FROM stores WHERE region_id=?";
        $district = $this->pdo->prepare($query);
        $district->execute([$id]);
        return $district->fetchAll(PDO::FETCH_OBJ);
    }

    public function countInRegion()
    {
        $query = "SELECT region_id, COUNT('region_id') FROM stores GROUP BY region_id;";
        $district = $this->pdo->prepare($query);
        $district->execute();
        return $district->fetchAll(PDO::FETCH_OBJ);
    }

    public function countInDistrict()
    {
        $query = "SELECT district_id, COUNT('district_id') FROM stores GROUP BY district_id;";
        $district = $this->pdo->prepare($query);
        $district->execute();
        return $district->fetchAll(PDO::FETCH_OBJ);
    }

    public function countInCompany()
    {
        $query = "SELECT company_id, COUNT('company_id') FROM stores GROUP BY company_id;";
        $district = $this->pdo->prepare($query);
        $district->execute();
        return $district->fetchAll(PDO::FETCH_OBJ);
    }

}