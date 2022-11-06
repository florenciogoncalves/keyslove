<?php


require __DIR__ . "./../models/userModel.php";

if (isset($_POST['btn'])) {


    $alerts = [];
    $FILTER = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (in_array("", $FILTER)) {
        $alerts[] = "Escolha pelo menos uma das opções!";
        $_SESSION['error'] = $alerts;
        header("Location: ../../cadastro/cadastro-4.php");
    }
    // var_dump($FILTER);


    if (in_array("btn", $FILTER)) {
        var_dump($FILTER);
    }

    $key = array_search('btn', $FILTER);
    if ($key !== false) {
        unset($FILTER[$key]);

        var_dump($key);
    }
}
