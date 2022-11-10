<?php

require __DIR__ . "./../models/userModel.php";

var_dump($_REQUEST);

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
} else {
    $alerts[] = "Erro! Siga todos os passos para o cadastro.";
    $_SESSION['error'] = $alerts;
    header("Location: ../../cadastro/cadastro-1.php");
    die;
}

$sobreVoce = filter($_POST['sobre-voce']);
$busca = filter($_POST['o-que-busca']);

((new userModel))->insertAboutMe($user, $sobreVoce, $busca);
header("Location: ../../about-user/caracteristicas-fisicas.php");
