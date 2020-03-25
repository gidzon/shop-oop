<?php

namespace app;

class Category
{
    protected $category;

    public  function  addCategory($pdo, $category, $pathImage)
    {
        $this->category = $category;
        $sql = "INSERT INTO category (category, image) VALUES (?,?)";
        $query = $pdo->prepare($sql);
        $query->execute([$this->category, $pathImage]);
    }

    public static function delCategory($pdo, $nameCategory)
    {
        $sql = "DELETE FROM category WHERE category = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$nameCategory]);
    }

    public static function getCategories($pdo)
    {
        $sql = "SELECT * FROM category";
        $result = $pdo->query($sql);
        return $result;
    }

    public static function getCategory($pdo, $nameCategory)
    {
        $sql = "SELECT * FROM category WHERE category = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$nameCategory]);
        $result = $query->fetch();
        return $result;
    }
}