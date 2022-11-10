<?php

session_start();

require __DIR__ . "./../core/connect.php";
require __DIR__ . "./../boot/helpers.php";

class userModel extends connect
{

    /********************************
     ***     Public Functions     ***
     ********************************
     */


    public function cadastro1(string $email, string $telefone, string $senha)
    {
        $this->firstInsert($email, $telefone, $senha);
    }

    public function cadastro2(string $nome, string $data, string $genero)
    {
        $this->secondInsert($nome, $data, $genero);
    }

    public function cadastro3(string $user, string $Pais, string $Estado, string $Cidade)
    {
        $this->thirdInsert($user, $Pais, $Estado, $Cidade);
    }

    public function insertUserImage(string $user, $photo)
    {
        $this->imageInsert($user, $photo);
    }


    public function cadastro4(string $user, $preferencia)
    {
        $this->fourthInsert($user, $preferencia);
    }


    public function First_Caracteristicas_Fisicas_Insert(
        string $user,
        string $corCabelos,
        string $corOlhos,
        string $altura,
        string $peso,
        string $tipoFisico = NULL,
        string $grupoEtnico = NULL,
        string $arteCorporal = NULL,
        string $aparencia = NULL
    ) {
        $this->firstCaracteristicasFisicasInsert(
            $user,
            $corCabelos,
            $corOlhos,
            $altura,
            $peso,
            $tipoFisico,
            $grupoEtnico,
            $arteCorporal,
            $aparencia
        );
    }

    public function Insert_Trabalho(
        string $user,
        string $cargo,
        string $empresa,
        string $formacao,
        string $regime,
        string $renda,
        string $moradia,
        string $dispPais
    ) {
        $this->trabalhoInsert(
            $user,
            $cargo,
            $empresa,
            $formacao,
            $regime,
            $renda,
            $moradia,
            $dispPais
        );
    }

    public function insertEdCulture(
        string $user,
        string $nacionalidade,
        string $educacao,
        string $idiomas,
        string $nivel,
        string $religiao,
        string $signo
    ) {
        $this->edCultureInsert($user, $nacionalidade, $educacao, $idiomas, $nivel, $religiao, $signo);
    }

    public function insertAboutMe(string $user, string $about, string $busca)
    {
        $this->aboutMeInsert($user, $about, $busca);
    }


    public function addEstiloVida(
        string $user,
        string $voceBebe,
        string $voceFuma,
        string $ocupacao,
        string $filhos,
        int $quant_filhos,
        string $animais = NULL,
        string $quantidade = NULL,
        string $moradia = NULL,
        string $disposicao = NULL,
        string $religiao = NULL
    ) {
        $this->putLifeStyle(
            $user,
            $voceBebe,
            $voceFuma,
            $ocupacao,
            $filhos,
            $quant_filhos,
            $animais,
            $quantidade,
            $moradia,
            $disposicao,
            $religiao
        );
    }

    /********************************
     ***     Private Functions    ***
     ********************************
     */


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

    private function thirdInsert(string $user, string $Pais, string $Estado, string $Cidade): bool
    {

        $query = $this->connect->prepare("INSERT INTO tb_localizacao(user, pais, estado, cidade) VALUES (?, ?, ?, ?) ");
        $query->bindParam(1, $user);
        $query->bindParam(2, $Pais);
        $query->bindParam(3, $Estado);
        $query->bindParam(4, $Cidade);

        if ($query->execute()) {
            return true;
        }

        return false;
    }

    private function fourthInsert(string $user, $preferencias): bool
    {
        $query = $this->connect->prepare("INSERT INTO tb_preferencia(usuario, preferencias) VALUES (?, ?)");
        $query->bindParam(1, $user);
        $query->bindParam(2, $preferencias);


        if ($query->execute()) {

            return true;
        }

        return false;
    }


    private function firstCaracteristicasFisicasInsert(
        string $user,
        string $corCabelos,
        string $corOlhos,
        string $altura,
        string $peso,
        string $tipoFisico = NULL,
        string $grupoEtnico = NULL,
        string $arteCorporal = NULL,
        string $aparencia = NULL
    ): bool {

        $query = $this->connect->prepare("INSERT INTO caracteristicas(user, corCabelos, corOlhos, altura, peso, tipoFisico, grupoEtnico, arteCorporal, minhaAparencia) VALUES (?, ? , ?, ?, ?, ?, ?, ?, ?)");
        $query->bindParam(1, $user);
        $query->bindParam(2, $corCabelos);
        $query->bindParam(3, $corOlhos);
        $query->bindParam(4, $altura);
        $query->bindParam(5, $peso);
        $query->bindParam(6, $tipoFisico);
        $query->bindParam(7, $grupoEtnico);
        $query->bindParam(8, $arteCorporal);
        $query->bindParam(9, $aparencia);

        if ($query->execute()) {
            return true;
        }
        return false;
    }

    private function trabalhoInsert(
        string $user,
        string $cargo,
        string $empresa,
        string $formacao,
        string $regime,
        string $renda,
        string $moradia,
        string $dispPais
    ): bool {

        $query = $this->connect->prepare("INSERT INTO job_tb(user, cargo, empresa, formado_em, regime_trabalho, renda_anual, situacaoMoradia, changePais) VALUES (? , ?, ?, ?, ?, ?, ?, ?)");
        $query->bindParam(1, $user);
        $query->bindParam(2, $cargo);
        $query->bindParam(3, $empresa);
        $query->bindParam(4, $formacao);
        $query->bindParam(5, $regime);
        $query->bindParam(6, $renda);
        $query->bindParam(7, $moradia);
        $query->bindParam(8, $dispPais);

        if ($query->execute()) {
            return true;
        }
        return false;
    }

    private function edCultureInsert(
        string $user,
        string $nacionalidade,
        string $educacao,
        string $idiomas,
        string $nivel,
        string $religiao,
        string $signo
    ): bool {

        $query = $this->connect->prepare("INSERT INTO cultura(user, nacionalidade, educacao, idiomas, nivel_ingles, religiao, signo) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $query->bindParam(1, $user);
        $query->bindParam(2, $nacionalidade);
        $query->bindParam(3, $educacao);
        $query->bindParam(4, $idiomas);
        $query->bindParam(5, $nivel);
        $query->bindParam(6, $religiao);
        $query->bindParam(7, $signo);

        if ($query->execute()) {
            return true;
        }
        return false;
    }


    private function aboutMeInsert(string $user, string $about, string $busca): bool
    {
        $query = $this->connect->prepare("INSERT INTO sobre_mim(cliente, sobre, busca) VALUES (?, ?, ?)");
        $query->bindParam(1, $user);
        $query->bindParam(2, $about);
        $query->bindParam(3, $busca);

        if ($query->execute()) {
            return true;
        }
        return false;
    }

    private function putLifeStyle(
        string $user,
        string $voceBebe,
        string $voceFuma,
        string $ocupacao,
        string $filhos,
        int $quant_filhos,
        string $animais = NULL,
        string $quantidade = NULL,
        string $moradia = NULL,
        string $disposicao = NULL,
        string $religiao = NULL
    ): bool {

        $query = $this->connect->prepare("INSERT INTO estilo_vida(
            user, 
            voceBebe, 
            voceFuma,
            ocupacao,
            filhos,
            quantidadeFilhos,
            animais,
            quantidade,
            moradia,
            disposicao,
            religiao) VALUES 
            (?,?,?, ?, ?, ?, ?, ?, ?, ? ,?)");

        $query->bindParam(1, $user);
        $query->bindParam(2, $voceBebe);
        $query->bindParam(3, $voceFuma);
        $query->bindParam(4, $ocupacao);
        $query->bindParam(5, $filhos);
        $query->bindParam(6, $quant_filhos);
        $query->bindParam(7, $animais);
        $query->bindParam(8, $quantidade);
        $query->bindParam(9, $moradia);
        $query->bindParam(10, $disposicao);
        $query->bindParam(11, $religiao);

        if ($query->execute()) {
            return true;
        }
        return false;
    }

    private function imageInsert(string $user, $photo): bool
    {
        $query = $this->connect->prepare("INSERT INTO photos(user, photo) VALUES (?, ?)");
        $query->bindParam(1, $user);
        $query->bindParam(2, $photo);


        if ($query->execute()) {
            return true;
        }

        return false;
    }
}
