<?php



require __DIR__."./../boot/config.php";

// use PDO;
class connect{

    private $DB_HOST = CONF_DB_HOST;
    private $DB_USER = CONF_DB_USER;
    private $DB_PASS = CONF_DB_PASS;
    private $DB_NAME = CONF_DB_NAME;

    protected $connect;

    public function __construct()
    {
        $dsn = "mysql:host={$this->DB_HOST};dbname={$this->DB_NAME}";

        $this->connect = new \PDO($dsn, $this->DB_USER, $this->DB_PASS, [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

}