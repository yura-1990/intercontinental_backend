<?php

class Company
{
    public $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll($id)
    {
        $query = "SELECT * FROM companies WHERE district_id=?;";
        $company = $this->pdo->prepare($query);
        $company->execute([$id]);
        return $company->fetchAll(PDO::FETCH_OBJ);
    }

    public function showCompany($id)
    {
        $query = "SELECT * FROM companies WHERE id=?";
        $company = $this->pdo->prepare($query);
        $company->execute([$id]);
        return $company->fetchAll(PDO::FETCH_OBJ);
    }

    public function getRelation($id)
    {
        $query = "SELECT * FROM companies WHERE region_id=?";
        $company = $this->pdo->prepare($query);
        $company->execute([$id]);
        return $company->fetchAll(PDO::FETCH_OBJ);
    }

    public function countInRegion()
    {
        $query = "SELECT region_id, COUNT('region_id') FROM companies GROUP BY region_id;";
        $district = $this->pdo->prepare($query);
        $district->execute();
        return $district->fetchAll(PDO::FETCH_OBJ);
    }

    public function countInDistrict()
    {
        $query = "SELECT district_id, COUNT('district_id') FROM companies GROUP BY district_id;";
        $district = $this->pdo->prepare($query);
        $district->execute();
        return $district->fetchAll(PDO::FETCH_OBJ);
    }
}