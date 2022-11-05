<?php

require_once __DIR__."/../core/connect.php";
class Cadastro extends connect{


    public function __construct(string $nome, string $data, string $genero)
    {
        parent::__construct();
        $this->insert($nome, $data, $genero);
    }

    private function insert(string $nome, string $data, string $genero)
    {
    
        $query = $this->connect->prepare("INSERT INTO tb_cadastroConta2 (nome, data_nascimento, genero)  VALUES (?, ?, ?)");
        $query->bindParam(1, $nome);
        $query->bindParam(2, $data);
        $query->bindParam(3, $genero);

        if($query->execute()){
            return true;
        }

        return false;

    }

}