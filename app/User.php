<?php

namespace app;

class User
{
    protected $login;
    protected $pass;
    protected $name;
    protected $email;
    protected $role = 'user';
    

    public function reg($pdo, $login, $pass, $name, $email)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->name = $name;
        $this->email = $email;


      $hash = password_hash($this->pass, PASSWORD_DEFAULT);

      $sql = "INSERT INTO user (login, name, email, password, role) VALUES (?,?,?,?,?)";
      $query = $pdo->prepare($sql);
      $query->execute([$this->login, $this->name, $this->email, $hash, $this->role]);
    }

    public function auth($pdo, $login, $pass)
    {
        $this->login = $login;
        $this->pass = $pass;
        
        $sql = "SELECT * FROM user WHERE login=?";
        $query = $pdo->prepare($sql);
        $query->execute([$this->login]);
        $data = $query->fetch();

        

        if(password_verify($this->pass, $data['password']) or !empty($data)){
            
            return $data;
        }
    }

    public function getUser($pdo, $idUser)
    {
        $sql = "SELECT * FROM user WHERE login=?";
        $query = $pdo->prepare($sql);
        $query->execute([$this->login]);
        $data = $query->fetch();
        return $data;
    }

    public static function quit()
    {
        if(!empty($_SESSION['auth']))
        unset($_SESSION['auth']);
    }
}