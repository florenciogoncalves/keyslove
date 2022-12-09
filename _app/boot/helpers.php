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

function filter($input)
{
    return filter_var($input, FILTER_DEFAULT);
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


function generateVerificationCode(): int
{
    return random_int(1000, 9999);
}

function UserAge(int $bornYear): int|null
{
    return date('Y') - $bornYear;
}

function dispatch()
{
    session_destroy();
    header("Location: ../");
    die;
}

function str_limit_words(string $string, int $limit, string $pointer = "..."): string
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    $arrWords = explode(" ", $string);
    $numWords = count($arrWords);

    if ($numWords < $limit) {
        return $string;
    }

    $words = implode(" ", array_slice($arrWords, 0, $limit));
    return "{$words}{$pointer}";
}

function getHour(string $time): string
{

    return mb_strcut($time, 0, 5);
}
