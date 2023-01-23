<?php

require __DIR__ . "./../core/connect.php";
require __DIR__ . "./../boot/helpers.php";


class Support extends connect
{

    private $email;
    private $nome;


    public function __construct($email, $nome)
    {
        parent::__construct();
        $this->email = $email;
        $this->nome = $nome;
    }

    public function getVerificationCode()
    {
        $query = $this->connect->prepare("SELECT code FROM tb_code_cadastro WHERE email = ?");
        $query->bindParam(1, $this->email);
        $query->execute();
        if ($query->rowCount() > 0) {
            foreach ($query->fetch(PDO::FETCH_ASSOC) as $code) {
                return $code;
            }
            return false;
        }
    }

    public function saveInfoVerification(int $code): bool
    {

        if ($this->saveVerificationInfo($this->nome, $this->email, $code)) {
            return true;
        }
        return false;
    }

    public function deleteCode()
    {
        return $this->delete();
    }

    public function verifyLimit()
    {
        return $this->verifyValidation();
    }

    public function count(): int
    {
        $query = $this->connect->prepare("SELECT * FROM tb_code_cadastro WHERE email = ?");
        $query->bindParam(1, $this->email);
        $query->execute();
        return $query->rowCount();
    }

    private function saveVerificationInfo(string $user, string $email, int $code)
    {
         $expire = date('H:i:s', strtotime("+10 minutes"));

        $query = $this->connect->prepare("INSERT INTO tb_code_cadastro (user, email, code, expire_at) VALUES (?, ?, ?, ?)");
        $query->bindParam(1, $user);
        $query->bindParam(2, $email);
        $query->bindParam(3, $code);
        $query->bindParam(4, $expire);

        if ($query->execute()) {
            return true;
        }
        return false;
    }


    protected function delete()
    {
        $query = $this->connect->prepare("DELETE FROM tb_code_cadastro WHERE email = ?");
        $query->bindParam(1, $this->email);
        if ($query->execute()) {
            return true;
        }
        return false;
    }

    private function verifyValidation()
    {
        $now = date('H:i:s');
        $query = $this->connect->prepare("SELECT expire_at FROM tb_code_cadastro WHERE email = ?");
        $query->bindParam(1, $this->email);
        $query->execute();


        if ($query->rowCount() > 0) {

            foreach ($query->fetch(PDO::FETCH_ASSOC) as $data) {
                $expire_at = getHour($data);
                $timeNow = getHour($now);

                if ($timeNow >= $expire_at) {
                    if ($this->delete()) {
                        $error[] = "O código enviado para sí expirou! Tente Novamente, Obrigado!";
                        $_SESSION['expired_alert'] = $error;
                        return false;
                    }
                }
            }
            // echo "Já foi enviado um código para o e-mail referido!";
        }
    }
}
