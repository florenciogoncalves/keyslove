<?php
require __DIR__ . "./../models/profileModel.php";

$normalReacts = [];
$otherReactions = [];
$reacts = [
    'retry',
    'maybe',
    'favorite',
    'like',
    'deslike'
];


if (isset($_POST['like'])) {

    $curtido = $_POST['like'];
    $action = 'like';
    $normalReacts[] = $action;
}
if (isset($_POST['deslike'])) {
    $curtido = $_POST['deslike'];
    $action = 'deslike';
    $normalReacts[] = $action;
}

if (isset($_POST['retry'])) {

    $curtido = $_POST['retry'];
    $react = 'retry';

    $otherReactions[] = $react;
}
if (isset($_POST['maybe'])) {
    $curtido = $_POST['maybe'];
    $react = 'maybe';

    $otherReactions[] = $react;
}
if (isset($_POST['favorite'])) {
    $curtido = $_POST['favorite'];
    $react = 'favorite';

    $otherReactions[] = $react;
}
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
}

foreach ($reacts as $item) {
    if (in_array($item, $otherReactions)) {
        ((new profileModel))->addNewReacts($user, $curtido, $item);
        header("Location: ../../home?user={$curtido}");
    }

    if (in_array($item, $normalReacts)) {
        ((new profileModel))->reactAction($user, $curtido, $item);
        header("Location: ../../home?user={$curtido}");
    }
}
