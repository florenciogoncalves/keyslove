<?php

require __DIR__ . "./../models/userModel.php";


$alerts = [];

$FILTER = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (in_array("", $FILTER)) {
    $alerts[] = "Preencha todos os campos!";
    $_SESSION['error'] = $alerts;
    header("Location: ../../login.php");
    die;
}

if (!is_email($_POST['email'])) {
    $alerts[] = "E-mail inválido! Tente novamente";
    $_SESSION['error'] = $alerts;
    header("Location: ../../login.php");
    die;
}

$email = filter($_POST['email']);
$senha = filter($_POST['password']);

// echo "<pre>";

// // if (isset($_SESSION['USERNAME_LOGIN'])) {
// //     echo $_SESSION['USERNAME_LOGIN'];
// //     unset($_SESSION['USERNAME_LOGIN']);
// // }

// var_dump([
//     "teste" => ((new userModel)->authUser($email, $senha)),
// ]);

$auth = new userModel();

if (!$auth->authUser($email, $senha)) {
    $alerts[] = "E-mail ou Senha inválidos! Tente novamente.";
    $_SESSION['error'] = $alerts;
    header("Location: ../../login.php");
    die;
}

header("Location: ../../home/index.php");
