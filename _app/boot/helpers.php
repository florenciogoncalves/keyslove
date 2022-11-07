<?php

include_once __DIR__ . "/config.php";

function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


function is_password(string $password): bool
{
    if ($password < CONF_PASSWD_MIN_LEN && $password > CONF_PASSWD_MAX_LEN) {
        return false;
    }
    return true;
}

/**
 * UPLOAD HELPERS
 */


function max_size_allowed($file): bool
{
    /**
     * Tamanho máximo permitido: 3MB
     */

    $convertByteToKB = 0.001 * $file;
    if ($convertByteToKB > 3072) {
        return false;
    }
    return true;
}

function rename_image($file): string
{
    return time() . mb_strstr($file, '.');
}

function uploader($origin, $destination): bool
{

    if (move_uploaded_file($origin, $destination)) {
        return true;
    }
    return false;
}
