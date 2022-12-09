<?php

require __DIR__ . "/profileModel.php";

class messageModel extends profileModel
{



    public function existe_chat(string $sender, string $reciver): bool
    {
        $query = $this->connect->prepare("SELECT * FROM tb_mensagens WHERE sender = ? AND reciver = ? OR reciver = ? AND sender = ?");
        $query->bindParam(1, $sender);
        $query->bindParam(2, $reciver);
        $query->bindParam(3, $sender);
        $query->bindParam(4, $reciver);
        $query->execute();

        if ($query->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function sendMessage(string $sender, string $reciver, string $message): bool
    {
        $query = $this->connect->prepare("INSERT INTO tb_mensagens(sender, reciver, message) VALUES (?, ?, ?)");
        $query->bindParam(1, $sender);
        $query->bindParam(2, $reciver);
        $query->bindParam(3, $message);


        if ($query->execute()) {
            return true;
        }
        return false;
    }

    public function getMessages(string $sender = null): bool|iterable|object
    {
        $query = $this->connect->prepare("SELECT * FROM tb_mensagens ORDER BY sender ASC");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showMessages(string $sender, string $reciver, int $LIMIT = 5): bool|iterable|object
    {


        $query = $this->connect->prepare("SELECT * FROM tb_mensagens WHERE sender = ? AND reciver = ? OR reciver = ? AND sender = ? LIMIT {$LIMIT}");
        $query->bindParam(1, $sender);
        $query->bindParam(2, $reciver);
        $query->bindParam(3, $sender);
        $query->bindParam(4, $reciver);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
