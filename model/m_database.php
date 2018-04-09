<?php

class Database

{

    public static function Conectar()

    {

        $pdo = new PDO('mysql:host=localhost;dbname=sictasu;charset=utf8', 'root', '12345678');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

        return $pdo;

    }

}