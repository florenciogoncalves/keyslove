<?php


require __DIR__ . "./../models/userModel.php";

if (isset($_POST['btn'])) {


    $alerts = [];
    $FILTER = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (in_array("", $FILTER)) {
        $alerts[] = "Escolha pelo menos uma das opções!";
        $_SESSION['error'] = $alerts;
        header("Location: ../../cadastro/cadastro-4.php");
        die;
    }

    if (isset($_SESSION['username'])) {
        $user = $_SESSION['username'];
    } else {

        $alerts[] = "Erro! Siga todos os passos para o cadastro.";
        $_SESSION['error'] = $alerts;
        header("Location: ../../cadastro/cadastro-4.php");
        die;
    }

    unset($FILTER["btn"]);

    for ($c = 1; $c <= 6; $c++) {
        if (key_exists('escolha-' . $c, $FILTER)) {
            ((new userModel))->cadastro4($user, $FILTER['escolha-' . $c]);
        }
    }
    header("Location: ../../cadastro/cadastro-5.php");
}
