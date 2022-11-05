<?php

require_once __DIR__."/../core/connect.php";

class Cadastro extends connect{


    public function __construct(string $Pais, string $Estado, string $Cidade)
    {
        parent::__construct();
        $this->insert($Pais, $Estado, $Cidade);
    }

    private function insert(string $Pais, string $Estado, string $Cidade): bool
    {
        $query = $this->connect->prepare("INSERT INTO tb_localizacao(pais, estado, cidade) VALUES (?, ?, ?) ");
        $query->bindParam(1, $Pais);
        $query->bindParam(2, $Estado);
        $query->bindParam(3, $Cidade);

        if($query->execute()){
            return true;
        }

        return false;
    }


}