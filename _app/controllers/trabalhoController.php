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

$cargo = filter($_POST['cargo']);
$empresa = filter($_POST['empresa']);
$formacao = filter($_POST['formacao']);
$regime = filter($_POST['regime-trabalho']);
$renda = filter($_POST['renda-anual']);
$moradia = filter($_POST['situacao-moradia']);
$mudar = filter($_POST['disp-mudar-pais']);


((new userModel))->Insert_Trabalho(
    $user,
    $cargo,
    $empresa,
    $formacao,
    $regime,
    $renda,
    $moradia,
    $mudar
);

header("Location: ../../about-user/educacao-e-cultura.php");
