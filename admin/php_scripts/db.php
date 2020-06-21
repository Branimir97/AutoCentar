<?php

    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "acbutkovic";
    $charset = "utf8mb4";

    //Data Source Name
    $dsn = "mysql:host =" . $serverName .";dbname=" . $dbName ."; charset =". $charset;

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    
    try{
        $pdo = new PDO($dsn, $username, $password, $options);
        //echo "Connected";
    } catch (PDOException $e) {
       throw new PDOException($e->getMessage());
    }
?>