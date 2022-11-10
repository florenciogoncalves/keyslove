<?php

require __DIR__ . "./../models/userModel.php";


if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
} else {
    $alerts[] = "Erro! Siga todos os passos para o cadastro.";
    $_SESSION['error'] = $alerts;
    header("Location: ../../cadastro/cadastro-5.php");
    die;
}


/**
 * First Insert
 */

$corCabelos = filter($_POST['cor-cabelos']);
$corOlhos = filter($_POST['cor-olhos']);
$altura = filter($_POST['altura']);
$peso = filter($_POST['peso']);

$tipoFisico = filter($_POST['tipo-fisico']);
$grupoEtnico = filter($_POST['grupo-etnico']);
$arteCorporal = filter($_POST['arte-corporal']);
$aparencia = filter($_POST['aparencia']);

((new userModel))->First_Caracteristicas_Fisicas_Insert(
    $user,
    $corCabelos,
    $corOlhos,
    $altura,
    $peso,
    $tipoFisico,
    $grupoEtnico,
    $arteCorporal,
    $aparencia
);
header("Location: ../../about-user/estilo-de-vida.php");

