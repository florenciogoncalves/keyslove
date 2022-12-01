<?php


require __DIR__ . "./../models/profileModel.php";


if (isset($_POST['like'])) {

    $curtido = $_POST['like'];
    $action = 'like';
}
if (isset($_POST['deslike'])) {
    $curtido = $_POST['deslike'];
    $action = 'deslike';
}

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
}


((new profileModel))->reactAction($user, $curtido, $action);
$_SESSION['message'] = 'Você deu ' . $action . ' ao usuário ' . $curtido;
header("Location: ../../home/carroussel.php");



var_dump($_REQUEST);
