<?php

// session_start();


include_once __DIR__ . "/../models/messageModel.php";
include_once __DIR__ . "/../boot/helpers.php";
if (isset($_POST['submitBtn'])) {
    $sender = $_SESSION['username'];
    $reciver = $_SESSION['reciver'];
    $message = filter($_POST['message']);

    if (((new messageModel))->sendMessage($sender, $reciver, $message)) {
        header("Location: ../../home/mensagens.php?user={$reciver}");
    }
}
