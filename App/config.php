<?php
session_start();
const Address = 'http://localhost/mvc/';
function sanytize($vorodi)
{
    return trim(htmlentities($vorodi));
}