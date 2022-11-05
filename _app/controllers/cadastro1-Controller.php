<?php

session_start();
// include_once __DIR__."/../../vendor/autoload.php";

include_once __DIR__ . "/../controllers/cadastro1-Controller.php";
include_once __DIR__ . "/../boot/helpers.php";

if (isset($_POST['btn-cad'])) {

    if (is_email($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $_SESSION['error_email'] = "Verifique o seu e-mail, ele está incorrecto!";
        header("Location: ../../cadastro/cadastro-1.php");
    }
    $telefone = $_POST['telefone'];

    $senha1 = $_POST['senha'];
    $senha2 = $_POST['conf-senha'];

    if (is_Password_equal($senha1, $senha2) && is_password($senha1)) {
        $senha = $senha1;
    } else {

        $_SESSION['error_senha'] = "Verifique a sua senha! ";
        header("Location: ../../cadastro/cadastro-1.php");
    }

    if (!isset($_SESSION['error_senha']) || (!isset($_POST['error_email']))) {

        header("Location: ../../cadastro/cadastro-2.php");
        $cadastrar = new Cadastro($email, $telefone, $senha);
    }
}
