<?php

require_once __DIR__ . "./../models/userModel.php";

if (isset($_POST['btn-submit'])) {


    $alerts = [];

    $FILTER = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (in_array("", $FILTER)) {
        $alerts[] = "Preencha Todos os campos!";
        $_SESSION['error'] = $alerts;
        header("Location: ../../cadastro/cadastro-2.php");
        die;
    }

    $nome = $_POST['nome'];
    $date = $_POST['dia-nascimento'] . "/" . $_POST['mes-nascimento'] . "/" . $_POST['ano-nascimento'];
    $genero = $_POST['genre'];

    $_SESSION['username'] = $nome;

    ((new userModel))->cadastro2($nome, $date, $genero);
    $_SESSION['step'] += 1;
    header("Location: ../../cadastro/cadastro-3.php");
}
