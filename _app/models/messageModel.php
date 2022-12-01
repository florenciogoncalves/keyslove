<?php

require __DIR__ . "/profileModel.php";

class messageModel extends profileModel
{
    public function existe_chat(string $sender, string $reciver): bool
    {
        $query = $this->connect->prepare("SELECT * FROM tb_mensagens WHERE sender = ? AND reciver = ?");
        $query->bindParam(1, $sender);
        $query->bindParam(2, $reciver);
        $query->execute();

        if ($query->rowCount() > 0) {
            return true;
        }
        return false;
    }
}
