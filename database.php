<?php

    $server="localhost:3306";
    $username="root";
    $password="";
    $database='dbphp';

    try {
        $con = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
    } catch (PDOException $e) {
        die('Connection failed: '.$e->getMessage());
    }

?>