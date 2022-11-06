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

    $Pais = $_POST['pais'];
    $Estado = $_POST['estado'];
    $Cidade = $_POST['cidade'];
    ((new userModel))->cadastro3($Pais, $Estado, $Cidade);
    header("Location: ../../cadastro/cadastro-4.php");
}
