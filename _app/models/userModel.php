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


    public function authUser(string $email, string $senha)
    {
        if ($this->login($email, $senha)) {
            return true;
        }
        return false;
    }

    public function VerifyUser(string $email)
    {
        if ($this->verify_register($email)) {
            return true;
        }
        return false;
    }


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


    private function getName(string $email, string $senha): ?string
    {
        $queryUser = $this->connect->prepare("SELECT * FROM tb_cadastroConta WHERE email = ? AND senha = ?");
        $queryUser->bindParam(1, $email);
        $queryUser->bindParam(2, $senha);
        $queryUser->execute();


        $fetch = $queryUser->fetch(PDO::FETCH_ASSOC);


        $query = $this->connect->prepare("SELECT * FROM `keyslov_bd`.`tb_cadastroConta2` WHERE `user_id` = ?");
        $query->bindParam(1, $fetch['id']);
        $query->execute();

        $getName = $query->fetch(PDO::FETCH_ASSOC);
        return $getName['nome'];
    }


    private function login(string $email, string $senha): object|bool
    {
        $queryUser = $this->connect->prepare("SELECT * FROM tb_cadastroConta WHERE email = ? AND senha = ?");
        $queryUser->bindParam(1, $email);
        $queryUser->bindParam(2, $senha);
        $queryUser->execute();

        $fetch = $queryUser->fetch(PDO::FETCH_ASSOC);

        $query = $this->connect->prepare("SELECT * FROM `keyslov_bd`.`tb_cadastroConta2` WHERE `id` = ?");
        $query->bindParam(1, $fetch['id']);
        $query->execute();

        $getName = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION['username_id'] = $fetch['id'];
        $_SESSION['username'] = $getName['nome'];



        if ($queryUser->rowCount() > 0) {
            return true;
        }
        return false;
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

        $query = $this->connect->prepare("INSERT INTO tb_caracteristicas(user, corCabelos, corOlhos, altura, peso, tipoFisico, grupoEtnico, arteCorporal, minhaAparencia) VALUES (?, ? , ?, ?, ?, ?, ?, ?, ?)");
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

        $query = $this->connect->prepare("INSERT INTO tb_job_tb(user, cargo, empresa, formado_em, regime_trabalho, renda_anual, situacaoMoradia, changePais) VALUES (? , ?, ?, ?, ?, ?, ?, ?)");
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

        $query = $this->connect->prepare("INSERT INTO tb_cultura(user, nacionalidade, educacao, idiomas, nivel_ingles, religiao, signo) VALUES (?, ?, ?, ?, ?, ?, ?)");
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
        $query = $this->connect->prepare("INSERT INTO tb_sobre_mim(user, sobre, busca) VALUES (?, ?, ?)");
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

    ): bool {

        $query = $this->connect->prepare("INSERT INTO tb_estilo_vida(
            user, 
            voceBebe, 
            voceFuma,
            ocupacao,
            filhos,
            quantidadeFilhos,
            animais,
            quantidade) VALUES 
            (?,?,?, ?, ?, ?, ?, ?)");

        $query->bindParam(1, $user);
        $query->bindParam(2, $voceBebe);
        $query->bindParam(3, $voceFuma);
        $query->bindParam(4, $ocupacao);
        $query->bindParam(5, $filhos);
        $query->bindParam(6, $quant_filhos);
        $query->bindParam(7, $animais);
        $query->bindParam(8, $quantidade);


        if ($query->execute()) {
            return true;
        }
        return false;
    }

    private function imageInsert(string $user, $photo): bool
    {
        $query = $this->connect->prepare("INSERT INTO tb_photos(user, photo) VALUES (?, ?)");
        $query->bindParam(1, $user);
        $query->bindParam(2, $photo);


        if ($query->execute()) {
            return true;
        }

        return false;
    }

    private function verify_register(string $email): bool
    {
        $query = $this->connect->prepare("SELECT email = ? FROM tb_cadastroConta");
        $query->bindParam(1, $email);
        $query->execute();

        if ($query->rowCount() > 0) {

            return true;
        }
        return false;
    }
}
