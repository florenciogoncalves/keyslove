<?php


require_once __DIR__ . "./../models/userModel.php";

if (isset($_POST['btn-submit'])) {

    $alerts = [];

    $FILTER = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (in_array("", $FILTER)) {
        $alerts[] = "Preencha todos os campos";
        $_SESSION['error'] = $alerts;
        header("Location: ../../cadastro/cadastro-3.php");
        die;
    }

    if (isset($_SESSION['username'])) {

        $user = $_SESSION['username'];
    } else {

        $alerts[] = "Erro! Siga todos os passos para o cadastro.";
        $_SESSION['error'] = $alerts;
        header("Location: ../../cadastro/cadastro-3.php");
        die;
    }

    $Pais = $_POST['pais'];
    $Estado = $_POST['estado'];
    $Cidade = $_POST['cidade'];
    ((new userModel))->cadastro3($user, $Pais, $Estado, $Cidade);
    $_SESSION['step'] += 1;
    header("Location: ../../cadastro/cadastro-4.php");
}
