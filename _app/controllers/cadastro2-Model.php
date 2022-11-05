<?php

session_start();

require_once __DIR__ . "/../core/connect.php";
require_once __DIR__ . "/../controllers/cadastro2-Controller.php";

if (isset($_POST['btn'])) {

    $FILTER = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (in_array("", $FILTER)) {
        header("Location: ../../cadastro/cadastro-2.php");
        $_SESSION['error_empty'] = "Preencha Todos os campos!";
    } else {

        $nome = $_POST['nome'];
        $date = $_POST['day'] . "/" . $_POST['month'] . "/" . $_POST['year'];
        $genero = $_POST['genero'];

        ((new Cadastro($nome, $date, $genero)));

        header("Location: ../../cadastro/cadastro-3.php");
    }
}
