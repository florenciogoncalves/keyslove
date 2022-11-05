<?php

session_start();

require_once __DIR__ . "/../controllers/cadastro3-Controller.php";

if (isset($_POST['btn'])) {

    $FILTER = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (in_array("", $FILTER)) {
        $_SESSION['error_empty'] = "Preencha todos os campos";
        header("Location: ../../cadastro/cadastro-3.php");
    } else {

        $Pais = $_POST['pais'];
        $Estado = $_POST['estado'];
        $Cidade = $_POST['cidade'];
        $cadastra = new Cadastro($Pais, $Estado, $Cidade);
        header("Location: ../../cadastro/cadastro-4.php");
    }
}
