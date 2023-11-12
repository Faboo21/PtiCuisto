<?php

class Manager
{
    protected $bdd;

    function connexion()
    {

        $env = parse_ini_file('bdd.env');

        $dbHost = $env['DB_HOST'];
        $dbUser = $env['DB_USER'];
        $dbPassword = $env['DB_PASS'];
        $dbName = $env['DB_NAME'];


        $bdd = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8', $dbUser, $dbPassword);

        return $bdd;
    }
}
