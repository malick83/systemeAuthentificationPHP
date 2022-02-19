<?php

require 'db-config.php';
try
{
    $options=
    [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $PDO1 = new PDO($DB_DSN, $DB_USER, $DB_PASS, $options);
    // echo 'Connexion établie!!!';
}
catch(PDOException $pdoe)
{
    echo 'ERREUR: '.$pdoe->getMessage();
}