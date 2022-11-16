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

if (isset($_POST['retry'])) {

    $curtido = $_POST['retry'];
    $react = 'retry';

}
if (isset($_POST['maybe'])) {
    $curtido = $_POST['maybe'];
    $react = 'maybe';
}
if (isset($_POST['favorite'])) {
    $curtido = $_POST['favorite'];
    $react = 'favorite';
}
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
}

$otherReacts = [
    'maybe',
    'favorite',
    'retry'
];


if ($react == 'retry' || $react == 'maybe' || $react == 'favorite') {

    ((new profileModel))->addNewReacts($user, $curtido, $react);

}

((new profileModel))->addNewReacts($user, $curtido, $react);

// // if ($action == 'like' || $action == 'deslike') {

//     ((new profileModel))->reactAction($user, $curtido, $action);

// // }


var_dump($_REQUEST);