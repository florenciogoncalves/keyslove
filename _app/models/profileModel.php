<?php

session_start();

// require __DIR__ . "/userModel.php";
require __DIR__ . "/../core/connect.php";


class profileModel extends connect
{
    public function userAge(string $entity = 'data_nascimento')
    {

        if (isset($_SESSION['username_id'])) {
            $id = $_SESSION['username_id'];
        }


        $query = $this->connect->prepare("SELECT * FROM `keyslov_bd`.`tb_cadastroConta2` WHERE `id` = ?");
        $query->bindParam(1, $id);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);


        return explode('/', $user[$entity])[2];
    }



    public function Age(string $entity = 'data_nascimento', string $user)
    {

        if (isset($_SESSION['username_id'])) {
            $id = $_SESSION['username_id'];
        }


        $query = $this->connect->prepare("SELECT * FROM `keyslov_bd`.`tb_cadastroConta2` WHERE `nome` = ?");
        $query->bindParam(1, $user);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);


        return explode('/', $user[$entity])[2];
    }



    public function savePaymentMethod(
        string $user,
        string $card_number,
        string $card_titular,
        string $mes,
        string $ano,
        string $cvv
    ): bool
    {
        $query = $this->connect->prepare("INSERT INTO tb_metodo_pagamento(user, numeroCartao, nomeTitular, mes, ano, cvv) VALUES (?, ?, ?, ?, ?, ?)");
        $query->bindParam(1, $user);
        $query->bindParam(2, $card_number);
        $query->bindParam(3, $card_titular);
        $query->bindParam(4, $mes);
        $query->bindParam(5, $ano);
        $query->bindParam(6, $cvv);

        if ($query->execute()) {
            return true;
        }
        return false;

    }


    public function FirstUserData(string $entity = 'tb_cadastroConta'): iterable|object
    {
        if (isset($_SESSION['username_id'])) {
            $id = $_SESSION['username_id'];
        }


        $firstQuery = $this->connect->prepare("SELECT * FROM {$entity} WHERE id = ?");

        $firstQuery->bindParam(1, $id);
        // $data = $firstQuery->fetch(PDO::FETCH_ASSOC);



        $query = $this->connect->prepare("SELECT * FROM `keyslov_bd`.`tb_cadastroConta2` WHERE `id` = ?");
        $query->bindParam(1, $id);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        return $user;
    }





    public function UserData(string $entity = 'tb_cadastroConta'): iterable|object
    {
        if (isset($_SESSION['username_id'])) {
            $id = $_SESSION['username_id'];
        }

        if (isset($_SESSION['username'])) {
            $user = $_SESSION['username'];
        }


        $firstQuery = $this->connect->prepare("SELECT * FROM {$entity} WHERE id = ?");

        $firstQuery->bindParam(1, $id);
        $firstQuery->execute();
        $data = $firstQuery->fetch(PDO::FETCH_ASSOC);


        return $data;

    }

    public function User(string $entity = 'tb_cadastroConta', string $where = 'user', string $user, string $operation = '=', string $method = 'fetch'): iterable|object
    {
        if (isset($_SESSION['username_id'])) {
            $id = $_SESSION['username_id'];
        }

        // if (isset($_SESSION['username'])) {
        //     $user = $_SESSION['username'];
        // }


        $firstQuery = $this->connect->prepare("SELECT * FROM {$entity} WHERE {$where} {$operation} ?");

        $firstQuery->bindParam(1, $user);
        $firstQuery->execute();
        $data = $firstQuery->{$method}(PDO::FETCH_ASSOC);



        return $data;

    }

    public function getUserToCarroussel(string $entity = 'tb_cadastroConta'): iterable|object
    {
        if (isset($_SESSION['username_id'])) {
            $id = $_SESSION['username_id'];
        }


        $firstQuery = $this->connect->prepare("SELECT * FROM {$entity} WHERE id != ?");

        $firstQuery->bindParam(1, $id);
        // $data = $firstQuery->fetch(PDO::FETCH_ASSOC);



        $query = $this->connect->prepare("SELECT * FROM `keyslov_bd`.`tb_cadastroConta2` WHERE `id` != ?");
        $query->bindParam(1, $id);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    // public function getMorePeople(): bool
    // {
    //     if (isset($_SESSION['username_id'])) {
    //         $id = $_SESSION['username_id'];
    //     }

    //     $query = $this->connect->prepare("SELECT * FROM `keyslov_bd`.`tb_cadastroConta2` WHERE `id` != ?");
    //     $query->bindParam(1, $id);
    //     $query->execute();
    //     $user = $query->fetch(PDO::FETCH_ASSOC);

    //     $about = $this->connect->prepare("SELECT * FROM tb_sobre_mim WHERE id != ?");
    //     $about->bindParam(1, $id);
    //     $about->execute();

    //     $getAbout = $about->fetch(PDO::FETCH_ASSOC);

    //     if ($query->rowCount() > 1) {
    //         return true;
    //     }
    //     return false;

    // }


    public function reactAction(string $curtiu, string $curtido, string $action): bool
    {
        $query = $this->connect->prepare("INSERT INTO tb_curtidas(curtiu, curtido, action) VALUES (?, ?, ?)");
        $query->bindParam(1, $curtiu);
        $query->bindParam(2, $curtido);
        $query->bindParam(3, $action);

        if ($query->execute()) {
            return true;
        }
        return false;
    }

    public function verifyReaction(string $user): bool
    {
        $query = $this->connect->prepare("SELECT * FROM tb_curtidas WHERE curtiu = ?");
        $query->bindParam(1, $user);
        $query->execute();

        if ($query->rowCount() > 1) {
            return true;
        }
        return false;
    }

}