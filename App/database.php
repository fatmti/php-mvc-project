<?php


class database
{
    protected $db;

    public function __construct()
    {
        $array = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ];
        $this->db = new PDO('mysql:host=localhost;dbname=mvc', 'root', '', $array);
    }
}
