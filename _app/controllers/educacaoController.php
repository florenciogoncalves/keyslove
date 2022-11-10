<?php

require __DIR__ . "./../models/userModel.php";

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
} else {
    $alerts[] = "Erro! Siga todos os passos para o cadastro.";
    $_SESSION['error'] = $alerts;
    header("Location: ../../cadastro/cadastro-1.php");
    die;
}

$nacionalidade = filter($_POST['nacionalidade']);
$educacao = filter($_POST['educacao']);
$idiomas = filter($_POST['idiomas']);
$nivel = filter($_POST['nivel-ingles']);
$religiao = filter($_POST['religiao']);
$signo = filter($_POST['signo']);

((new userModel))->insertEdCulture($user, $nacionalidade, $educacao, $idiomas, $nivel, $religiao, $signo);


header("Location: ../../about-user/sobre-mim.php");


//sobre mim