<?php

// include_once __DIR__ . "/../boot/helpers.php";
include __DIR__ . "/../models/profileModel.php";




$FILTER = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (in_array("", $FILTER)) {
    $_SESSION['error'] = 'Preencha o campo com o nome de algum usuário que deseja localizar!';
    header("Location: ../../home/localizar-pessoas.php");
}

$field = $_POST['searchInput'];

$model = new profileModel();

$data = $model->searchPeople($field);

if ($data) {
    $_SESSION['userFounded'] = $data['nome'];
    header("Location: ../../home/localizar-pessoas.php");
} else {
    $_SESSION['error'] = 'Nenhum Usuário encontrado com este nome!';
    header("Location: ../../home/localizar-pessoas.php");
}

// var_dump([
//     // $FILTER,
//     $data['nome']
// ]);
