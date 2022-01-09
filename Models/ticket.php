<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/6/20
 * Time: 4:57 PM
 */

class ticket extends database
{
    public function newticketopen($title, $content, $userid)
    {
        $result = $this->db->prepare('INSERT INTO `tickets` SET  `title`=?,`content`=?,`userid`=?');
        $result->bindValue(1, $title);
        $result->bindValue(2, $content);
        $result->bindValue(3, $userid);
        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function readtitleticket($userid)
    {
        $result = $this->db->prepare('SELECT * FROM `tickets` WHERE  `userid`=?');
        $result->bindValue(1, $userid);
        $result->execute();
        if ($result->rowCount() >= 1) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function readByid($id)
    {
        $result = $this->db->prepare('SELECT * FROM `tickets` WHERE  `id`=? ');
        $result->bindValue(1, $id);
        $result->execute();
        if ($result->rowCount() >= 1) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function answerticket($content, $userid, $username)
    {
        $result = $this->db->prepare('INSERT INTO `answerticket` SET  `content`=?,`userid`=?,`username`=?');
        $result->bindValue(1, $content);
        $result->bindValue(2, $userid);
        $result->bindValue(3, $username);
        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function readticket($id)
    {
        $result = $this->db->prepare('SELECT * FROM `answerticket` WHERE  `userid`=? ');
        $result->bindValue(1, $id);
        $result->execute();
        if ($result->rowCount() >= 1) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}