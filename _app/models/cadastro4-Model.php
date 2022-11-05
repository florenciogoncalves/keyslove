<?php


require_once __DIR__ . "/../core/connect.php";

class CadastroRelacionamento extends connect
{

    public function __construct($preferencias)
    {
        parent::__construct();
        $this->insert($preferencias);
    }

    private function insert($preferencias)
    {
        $query = $this->connect->prepare("INSERT INTO tb_preferencia(preferencias) VALUES (?)");
        $query->bindParam(1, $preferencias);

        if ($query->execute()) {

            return true;
        }

        return false;
    }
}
