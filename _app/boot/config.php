<?php


/**
 * DATABASE
 */

define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "keyslov_bd");


/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
// define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
// define("CONF_PASSWD_OPTION", ["cost" => 10]);


/**
 * MAIL
 */
define("CONF_MAIL_HOST", "smtp.mailtrap.io");
define("CONF_MAIL_PORT", "2525");
define("CONF_MAIL_USER", "cc9068549ff8b0");
define("CONF_MAIL_PASS", "a948e504e232a0");
define("CONF_MAIL_SENDER", ["name" => "Equipe Keyslove", "address" => "keyslove2022teste@gmail.com"]);
define("CONF_MAIL_SUPPORT", "keyslove2022teste@gmail.com");
define("CONF_MAIL_OPTION_LANG", "br");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "tls");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");
