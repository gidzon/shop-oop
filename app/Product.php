<?php

namespace app;

class Product
{
    protected $title;
    protected $rice;
    protected $description;

    

    public   function addProduct($pdo, $title, $price, $description, $pathImg, $idCategory)
    {
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
        
        
        $sql = "INSERT INTO product (title, price, description, image, id_category) VALUES (?,?,?,?,?)";
        $query = $pdo->prepare($sql);
        $query->execute([$this->title, $this->price, $this->description, $pathImg, $idCategory]);
        
    }

    public function getProductsFromCategory($pdo, $idCategory)
    {
        $sql = "SELECT * FROM product WHERE id_category = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$idCategory]);
        $result = $query->fetchAll();
        return $result;
    }

    public  function getProduct($pdo, $idProduct)
    {
        $sql = "SELECT * FROM product WHERE idproduct = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$idProduct]);
        $result = $query->fetch();
        return $result;
    }

    public function getProducts($pdo)
    {
        $sql = "SELECT * FROM product";
        $result = $pdo->query($sql);
        return $result;
    }

    public function deleteProduct($pdo, $idProduct)
    {
        $sql = "DELETE FROM product WHERE idproduct = ?";
        $result = $pdo->prepare($sql);
        $result->execute([$idProduct]);
    }

    public function updateProduct($pdo, $title, $price, $description, $pathImg = null, $idProduct)
    {
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;

        if (!empty($this->title)) {
            $sql = "UPDATE product SET titile=? WHERE idproduct=?";
            $query = $pdo->prepare($sql);
            $query->execute([ $this->title, $idProduct]);
        } elseif (!empty($this->price)) {
            $sql = "UPDATE product SET  price=? WHERE idproduct=?";
            $query = $pdo->prepare($sql);
            $query->execute([$this->price, $idProduct]);
        } elseif (!empty($this->description)) {
            $sql = "UPDATE product SET  description=? WHERE idproduct=?";
            $query = $pdo->prepare($sql);
            $query->execute([$this->description, $idProduct]);
        } elseif (!empty($_FILES)) {
            $sql = "UPDATE product SET  image=? WHERE idproduct=?";
            $query = $pdo->prepare($sql);
            $query->execute([$pathImg, $idProduct]);
        } else {
            $sql = "UPDATE product SET titile=?, price=?, description=? WHERE idproduct= ?";
            $query = $pdo->prepare($sql);
            $query->execute([ $this->title, $this->price, $this->description, $idProduct]);
        }
       
    }
}