<?php

require __DIR__ . "./../models/profileModel.php";
require __DIR__ . "./../boot/helpers.php";

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
} else {
    $alerts[] = "Erro! Siga todos os passos para o cadastro.";
    $_SESSION['error'] = $alerts;
    die;
}

$alerts = [];

$FILTER = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// if (in_array("", $FILTER)) {
//     $alerts[] = "Preencha Todos os campos!";
//     $_SESSION['error'] = $alerts;
//     header("Location: ../../home/metodos-pagamento.php");
//     die;
// }



$cardNumber = filter($_POST['card-number']);
$cardTitular = filter($_POST['card-titular']);
$mes = filter($_POST['mes']);
$ano = filter($_POST['ano']);
$cvv = filter($_POST['cvv']);
$parcelas = filter($_POST['parcelas']);

// // echo $_POST['card-flag'];
print_r($_REQUEST);

// ((new profileModel()))->savePaymentMethod($user, $cardNumber, $cardTitular, $mes, $ano, $cvv, $parcelas);
$_SESSION['return'] = 'Metodo de Pagamento cadastrado com sucesso!';
// header("Location: ../../home/metodos-pagamento.php");
