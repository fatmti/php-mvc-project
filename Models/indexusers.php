<?php


class indexusers extends database
{
    public function login($username, $password)
    {
        $result = $this->db->prepare('SELECT * FROM `users` WHERE  `username`=? AND `password`=?');
        $result->bindValue(1, $username);
        $result->bindValue(2, $password);
        $result->execute();
        if ($result->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function register($username, $password)
    {
        $result = $this->db->prepare('INSERT INTO `users` SET  `username`=?,`password`=?');
        $result->bindValue(1, $username);
        $result->bindValue(2, $password);
        if ($result->execute()) {
            return true;
        } else {
            return false;
        }

    }


}