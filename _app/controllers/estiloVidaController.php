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


$bebe = filter($_POST['beber']);
$fumar = filter($_POST['fumar']);
$filhos = filter($_POST['filhos']);
$quant_filhos = filter($_POST['quantidade-filhos']);
$pets = filter($_POST['pets']);
$quant_pets = filter($_POST['quantidade-pets']);

((new userModel))->addEstiloVida($user, $bebe, $fumar, '', $filhos, $quant_filhos, $pets, $quant_pets);


header("Location: ../../home/index.php");
