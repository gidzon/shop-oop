<?php

namespace app;


class Cart
{
    private $price;
    private $number;
    private $summ;
    private $idUser;
    private $title;
    private $image;

    public  function addProduct($pdo, $idUser, $idProduct, $title,  $price, $number, $image)
    {
        $this->price = $price;
        $this->number = $number;
        $this->idUser = $idUser;
        $this->title = $title;
        $this->image = $image;

        

        $this->summ = $this->price*$this->number;

        

        $date = date('d-m-Y');

        $sql = "INSERT INTO cart (title, summ, image, date, id_user) VALUES (?,?,?,?,?)";
        $query = $pdo->prepare($sql);
        $query->execute([$this->title, $this->summ, $this->image, $date, $this->idUser]);

    }

    public function getCart($pdo, $idUser)
    {
        $sql = "SELECT * FROM cart WHERE id_user = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$idUser]);
        $cart = $query->fetchAll();
        return $cart;
    }

    
}