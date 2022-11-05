<?php

require_once __DIR__."/../core/connect.php";

// namespace Source\Controllers;

// use Source\Core\connect;


class Cadastro extends connect{
    

    public function __construct(string $email, string $telefone, string $senha)
    {
        parent::__construct();
        $this->insert($email, $telefone, $senha);
    }

    private function insert(string $email, string $telefone, string $senha)
    {
    
        $query = $this->connect->prepare("INSERT INTO tb_cadastroConta (email, telefone, senha)  VALUES (?, ?, ?)");
        $query->bindParam(1, $email);
        $query->bindParam(2, $telefone);
        $query->bindParam(3, $senha);

        if($query->execute()){
            return true;
        }

        return false;

    }


}