<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $dbhost = 'cmp408db.cd4gki5ztccc.eu-west-2.rds.amazonaws.com';
    $dbport = '3306';
    $dbname = 'cmp408main';
    $charset = 'utf8';

    $dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset={$charset}";
    $username = 'admin';
    //I am aware this is insecure
    //I don't care
    //I don't want to bother with the secrets manager right now
    $password = 'password101';

    return new PDO($dsn, $username, $password);