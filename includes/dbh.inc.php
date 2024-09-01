<?php

$host = 'localhost';
$dbUsername = 'root';
$dbname = 'mydb';
$dbpassword = '';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbUsername, $dbpassword);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $th) {
    die( 
        "connection failed " . $th -> getMessage()
    );
}