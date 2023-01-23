<?php

include_once __DIR__ . "/../../../_app/core/connect.php";

class Model extends connect
{
    public function updateUserStatus(string $ip, string $status, string $user): bool
    {
        if ($this->hasStatus($user)) {
            $query = $this->connect->prepare("UPDATE tb_online SET status = ? WHERE user = ?");
            $query->bindParam(1, $status);
            $query->bindParam(2, $user);
            if ($query->execute()) {
                return true;
            }
            return false;
        } else {
            $query = $this->connect->prepare("INSERT INTO tb_online(user_ip, status, user) VALUES (?, ?, ?)");
            $query->bindParam(1, $ip);
            $query->bindParam(2, $status);
            $query->bindParam(3, $user);

            if ($query->execute()) {
                return true;
            }
            return false;
        }
    }

    /**
     * @param string $user
     * @return boolean
     */
    public function hasStatus(string $user): bool
    {
        $query = $this->connect->prepare("SELECT * FROM tb_online WHERE user = ?");
        $query->bindParam(1, $user);
        $query->execute();

        if ($query->rowCount() > 0) {
            return true;
        }
        return false;
    }


    public function usersOnline(string $user, string $status = 'online')
    {
        $query = $this->connect->prepare("SELECT * FROM tb_online WHERE user != ? AND status = ?");
        $query->bindParam(1, $user);
        $query->bindParam(2, $status);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
