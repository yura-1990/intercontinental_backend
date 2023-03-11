<?php

class Product
{
    public $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $query = "SELECT * FROM products";
        $region = $this->pdo->prepare($query);
        $region->execute();
        return $region->fetchAll(PDO::FETCH_OBJ);
    }

    public function showProduct($id){
        $query = "SELECT * FROM products WHERE id=?";
        $region = $this->pdo->prepare($query);
        $region->execute([$id]);
        return $region->fetchAll(PDO::FETCH_OBJ);
    }

    public function getRelation($id)
    {
        $query = "SELECT * FROM products WHERE region_id=?";
        $district = $this->pdo->prepare($query);
        $district->execute([$id]);
        return $district->fetchAll(PDO::FETCH_OBJ);
    }

    public function getStoreRelation($id)
    {
        $query = "SELECT * FROM products WHERE store_id=?";
        $district = $this->pdo->prepare($query);
        $district->execute([$id]);
        return $district->fetchAll(PDO::FETCH_OBJ);
    }

    public function countInRegion()
    {
        $query = "SELECT region_id, COUNT('region_id') FROM products GROUP BY region_id;";
        $district = $this->pdo->prepare($query);
        $district->execute();
        return $district->fetchAll(PDO::FETCH_OBJ);
    }

    public function countInDistrict()
    {
        $query = "SELECT district_id, COUNT('district_id') FROM products GROUP BY district_id;";
        $district = $this->pdo->prepare($query);
        $district->execute();
        return $district->fetchAll(PDO::FETCH_OBJ);
    }

    public function countInCompany()
    {
        $query = "SELECT company_id, COUNT('company_id') FROM products GROUP BY company_id;";
        $district = $this->pdo->prepare($query);
        $district->execute();
        return $district->fetchAll(PDO::FETCH_OBJ);
    }

    public function countInStore()
    {
        $query = "SELECT store_id, COUNT('store_id') FROM products GROUP BY store_id;";
        $district = $this->pdo->prepare($query);
        $district->execute();
        return $district->fetchAll(PDO::FETCH_OBJ);
    }

    public function editProduct($id, $import=null, $export=null){
        if ($import){
            $query = "UPDATE products SET import=? WHERE id=?;";
            $district = $this->pdo->prepare($query);
            $district->execute([$import, $id]);
        }else{
            $query = "UPDATE products SET export=? WHERE id=?;";
            $district = $this->pdo->prepare($query);
            $district->execute([$export, $id]);
        }
    }
}