<?php




require __DIR__ . "./../models/userModel.php";
include_once __DIR__ . "/../boot/helpers.php";

if (isset($_POST['btn-submit'])) {

    $alerts = [];

    $FILTER = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (in_array("", $FILTER)) {
        $alerts[] = "Preencha todos os campos!";
        $_SESSION['error'] = $alerts;
        header("Location: ../../cadastro/cadastro-1.php");
        die;
    }

    if (!is_email($_POST['email'])) {
        $alerts[] = "E-mail Inválido!";
        $_SESSION['error'] = $alerts;
        header("Location: ../../cadastro/cadastro-1.php");
        die;
    }

    $email = filter_var($_POST['email'], FILTER_DEFAULT);
    $telefone = filter_var($_POST['telemovel'], FILTER_DEFAULT);
    $senha = filter_var($_POST['password'], FILTER_DEFAULT);


    ((new userModel()))->cadastro1($email, $telefone, $senha);
    header("Location: ../../cadastro/cadastro-2.php");
}
