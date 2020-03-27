<?php

namespace app;

use app\User;

class Cart
{
    private $price;
    private $number;
    private $summ;
    private $login;

    public  function addProduct($pdo, $login, $idProduct, $price, $number)
    {
        $this->price = $price;
        $this->number = $number;
        $this->login = $login;

        if (!is_int($number)){
            $this->number = (int)$number;
        }

        $this->summ = $this->price*$this->number;

        $sql = "SELECT title, image FROM product WHERE idproduct=?";
        $query = $pdo->prepare($sql);
        $query->execute([$idProduct]);
        $product = $query->fetch();

        $user = new User();
        $userInfo = $user->getUser($pdo, $this->login);

        $sql = "INSERT INTO cart (title, summ, image, date, id_user) VALUES (?,?,?,?,?)";
        $query = $pdo->prepare($sql);
        $query->execute([$product['title'], $this->summ, $product['image'], date('d-m-Y'), $userInfo['id']]);

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