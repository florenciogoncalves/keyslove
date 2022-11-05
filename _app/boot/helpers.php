<?php

include_once __DIR__."/config.php";

function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);    
}

function is_Password_equal(string $var1, string $var2): bool
{
    if($var1 != $var2){
        return false;
    }
    return true;
}

function is_password(string $password): bool
{
    if($password < CONF_PASSWD_MIN_LEN && $password > CONF_PASSWD_MAX_LEN){
            return false;
    }
    return true;
}


