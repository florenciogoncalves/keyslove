<?php

require __DIR__ . "./../models/userModel.php";
include_once __DIR__ . "./../boot/helpers.php";



$errors = [];

$allowedTypes = [
    "image/png",
    "image/jpeg",
    "imgage/jpg"
];


$firstImageSize = $_FILES['img-1']['size'];
$secondImageSize = $_FILES['img-2']['size'];

$firstImageNewName = rename_image($_FILES['img-1']['name']);
$secondImageNewName = rename_image($_FILES['img-2']['name']);


if (empty($_FILES['img-1']['name'] || $_FILES['img-2']['name'])) {
    $errors[] = "Por favor, insira duas fotografias!";
    $_SESSION['error'] = $errors;
    header("Location: ../../cadastro/cadastro-5.php");
    die;
}


if (!max_size_allowed($firstImageSize) || !max_size_allowed($secondImageSize)) {
    $errors[] = "O Tamanho da imagem excede o permitido! Insira uma imagem com menos de 3MB";
    $_SESSION['error'] = $errors;
    header("Location: ../../cadastro/cadastro-5.php");
    die;
}

if (!in_array($_FILES['img-1']['type'], $allowedTypes) || (!in_array($_FILES['img-2']['type'], $allowedTypes))) {

    $errors[] = "Apenas é permitido o upload de imagens do tipo: PNG, JPEG, JPG";
    $_SESSION['error'] = $errors;
    header("Location: ../../cadastro/cadastro-5.php");
    die;
} else {
    uploader($_FILES['img-1']['tmp_name'], __DIR__ . "./../../_storage/images/{$firstImageNewName}");
    uploader($_FILES['img-2']['tmp_name'], __DIR__ . "./../../_storage/images/{$secondImageNewName}");
    ((new userModel))->insertUserImage($firstImageNewName);
    ((new userModel))->insertUserImage($secondImageNewName);

    header("Location: ../../cadastro/cadastro-6.php");
}




