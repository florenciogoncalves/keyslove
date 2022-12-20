<?php

session_start();

// require __DIR__ . "/userModel.php";
require __DIR__ . "/../core/connect.php";


class profileModel extends connect
{




    public function userAge(string $entity = 'data_nascimento')
    {

        // if (isset($_SESSION['username_id'])) {
        //     $id = $_SESSION['username_id'];
        // }
        $name = $_SESSION['username'];


        $query = $this->connect->prepare("SELECT * FROM `keyslov_bd`.`tb_cadastroConta2` WHERE `nome` = ?");
        $query->bindParam(1, $name);
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
        string $cvv,
        int $parcelas
    ): bool {
        $query = $this->connect->prepare("INSERT INTO tb_metodo_pagamento(user, numeroCartao, nomeTitular, mes, ano, cvv, parcelas) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $query->bindParam(1, $user);
        $query->bindParam(2, $card_number);
        $query->bindParam(3, $card_titular);
        $query->bindParam(4, $mes);
        $query->bindParam(5, $ano);
        $query->bindParam(6, $cvv);
        $query->bindParam(7, $parcelas);

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

        $nome = $_SESSION['username'];

        $firstQuery = $this->connect->prepare("SELECT * FROM {$entity} WHERE id = ?");

        $firstQuery->bindParam(1, $id);
        // $data = $firstQuery->fetch(PDO::FETCH_ASSOC);



        $query = $this->connect->prepare("SELECT * FROM `keyslov_bd`.`tb_cadastroConta2` WHERE `nome` = ?");
        $query->bindParam(1, $nome);
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

    public function User(string $entity = 'tb_cadastroConta', string $where = 'user', string $user, string $operation = '=', string $method = 'fetch', int $LIMIT = null): iterable|object|bool
    {
        if (isset($_SESSION['username_id'])) {
            $id = $_SESSION['username_id'];
        }

        if (isset($LIMIT)) {
            $firstQuery = $this->connect->prepare("SELECT * FROM {$entity} WHERE {$where} {$operation} ? LIMIT {$LIMIT}");
            $firstQuery->bindParam(1, $user);
            $firstQuery->execute();
            $data = $firstQuery->{$method}(PDO::FETCH_ASSOC);

            return $data;
        } else {
            $firstQuery = $this->connect->prepare("SELECT * FROM {$entity} WHERE {$where} {$operation} ?");
            $firstQuery->bindParam(1, $user);
            $firstQuery->execute();
            $data = $firstQuery->{$method}(PDO::FETCH_ASSOC);

            return $data;
        }
    }


    public function where(string $table,  ?string $operation = '=', string $field, string $arg, string $orderBy = 'ORDER BY id DESC'): iterable|object|bool
    {
        $query = $this->connect->prepare("SELECT * FROM {$table} WHERE {$field} {$operation} ? {$orderBy}");
        $query->bindParam(1, $arg);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function SELECT(string $arg1, string $arg2): iterable|object|bool
    {
        $query = $this->connect->prepare("SELECT * FROM tb_mensagens WHERE sender = ? AND reciver = ? OR reciver = ? AND sender = ? ORDER BY id DESC");
        $query->bindParam(1, $arg1);
        $query->bindParam(2, $arg2);
        $query->bindParam(3, $arg1);
        $query->bindParam(4, $arg2);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getFavorites(string $user, string $reacted, string $reaction = 'favorite'): iterable|object
    {
        $query = $this->connect->prepare("SELECT * FROM tb_reacts WHERE user_react = ? AND reaction = ?");
        $query->bindParam(1, $user);
        $query->bindParam(2, $reaction);

        $query->execute();

        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function getUserToCarroussel(string $entity = 'tb_cadastroConta'): bool|iterable|object
    {
        if (isset($_SESSION['username_id'])) {
            $id = $_SESSION['username_id'];
        }
        // $id = 2;

        $firstQuery = $this->connect->prepare("SELECT * FROM {$entity} WHERE id != ?");

        $firstQuery->bindParam(1, $id);




        $query = $this->connect->prepare("SELECT * FROM `keyslov_bd`.`tb_cadastroConta2` WHERE `id` != ?");
        $query->bindParam(1, $id);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        return $user;
    }


    public function reactAction(string $curtiu, string $curtido, string $action): bool
    {


        if ($this->verifyAction($curtiu, $curtido)) {
            $Updatequery = $this->connect->prepare("UPDATE tb_curtidas SET action = ? WHERE curtido = ? AND curtiu = ?");
            $Updatequery->bindParam(1, $action);
            $Updatequery->bindParam(2, $curtido);
            $Updatequery->bindParam(3, $curtiu);

            $Updatequery->execute();
        } else {

            $query = $this->connect->prepare("INSERT INTO tb_curtidas(curtiu, curtido, action) VALUES (?, ?, ?)");
            $query->bindParam(1, $curtiu);
            $query->bindParam(2, $curtido);
            $query->bindParam(3, $action);

            if ($query->execute()) {
                return true;
            }
        }
        return false;
    }

    public function verifyAction(string $user, string $curtido): bool
    {
        $query = $this->connect->prepare("SELECT * FROM tb_curtidas WHERE curtiu = ? AND curtido = ?");
        $query->bindParam(1, $user);
        $query->bindParam(2, $curtido);

        $query->execute();

        if ($query->rowCount() > 0) {
            return true;
        }
        return false;
    }


    public function addNewReacts(string $user, string $reacted, string $reaction)
    {
        $selectQuery = $this->connect->prepare("SELECT user_react = ? , reacted = ? FROM tb_reacts WHERE reaction = ?");
        $selectQuery->bindParam(1, $user);
        $selectQuery->bindParam(2, $reacted);
        $selectQuery->bindParam(3, $reaction);
        $selectQuery->execute();

        if ($selectQuery->rowCount() <= 0) {

            $query = $this->connect->prepare("INSERT INTO tb_reacts(user_react, reacted, reaction) VALUES (?, ?, ?)");
            $query->bindParam(1, $user);
            $query->bindParam(2, $reacted);
            $query->bindParam(3, $reaction);
            $query->execute();
        }
    }

    public function searchPeople(string $people, string $table = 'tb_cadastroConta2'): bool|iterable|object
    {
        $replace = "%" . $people . "%";

        $query = $this->connect->prepare("SELECT nome FROM {$table} WHERE nome LIKE ? ORDER BY nome ASC");
        $query->bindParam(1, $replace);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
