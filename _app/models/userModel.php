<?php

session_start();

require __DIR__ . "./../core/connect.php";
require __DIR__ . "./../boot/helpers.php";

class userModel extends connect
{

    public $errors = [];


    public function cadastro1(string $email, string $telefone, string $senha)
    {
        $this->firstInsert($email, $telefone, $senha);
    }

    public function cadastro2(string $nome, string $data, string $genero)
    {
        $this->secondInsert($nome, $data, $genero);
    }

    public function cadastro3(string $Pais, string $Estado, string $Cidade)
    {
        $this->thirdInsert($Pais, $Estado, $Cidade);
    }


    public function cadastro4($preferencia)
    {
        $this->fourthInsert($preferencia);
    }

    private function firstInsert(string $email, string $telefone, string $senha): bool
    {
        $query = $this->connect->prepare("INSERT INTO tb_cadastroConta (email, telefone, senha)  VALUES (?, ?, ?)");
        $query->bindParam(1, $email);
        $query->bindParam(2, $telefone);
        $query->bindParam(3, $senha);

        if ($query->execute()) {
            return true;
        }

        return false;
    }

    private function secondInsert(string $nome, string $data, string $genero): bool
    {
        $query = $this->connect->prepare("INSERT INTO tb_cadastroConta2 (nome, data_nascimento, genero)  VALUES (?, ?, ?)");
        $query->bindParam(1, $nome);
        $query->bindParam(2, $data);
        $query->bindParam(3, $genero);

        if ($query->execute()) {
            return true;
        }

        return false;
    }

    private function thirdInsert(string $Pais, string $Estado, string $Cidade): bool
    {

        $query = $this->connect->prepare("INSERT INTO tb_localizacao(pais, estado, cidade) VALUES (?, ?, ?) ");
        $query->bindParam(1, $Pais);
        $query->bindParam(2, $Estado);
        $query->bindParam(3, $Cidade);

        if ($query->execute()) {
            return true;
        }

        return false;
    }

    private function fourthInsert($preferencias): bool
    {
        $query = $this->connect->prepare("INSERT INTO tb_preferencia(preferencias) VALUES (?)");
        $query->bindParam(1, $preferencias);

        if ($query->execute()) {

            return true;
        }

        return false;
    }
}
