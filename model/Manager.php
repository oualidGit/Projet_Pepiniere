<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=dbpepiniere;charset=utf8', 'root', '');
        return $db;
    }
}