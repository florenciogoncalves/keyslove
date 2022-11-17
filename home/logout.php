<?php

session_start();

require __DIR__ . "./../_app/boot/helpers.php";

dispatch('username');
header("Location: ../");