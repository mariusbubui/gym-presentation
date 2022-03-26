<?php

const DB_SERVER = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'gym_database';

try {
    $conn = new PDO("mysql:host=" . DB_SERVER, DB_USERNAME, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
    $conn->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS gym_database.gym (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  username VARCHAR(30) NOT NULL UNIQUE,
  password VARCHAR(30) NOT NULL
  )";
    $conn->exec($sql);

    $path = str_replace("\\","\\\\",getcwd())."\\\csv\\\users.csv";
    $sql = "SELECT COUNT(id) FROM gym_database.gym";
    if($conn->query($sql)->fetch()[0] == 0){
        $sql = "LOAD DATA INFILE '" . $path . "'
        INTO TABLE gym_database.gym 
        FIELDS TERMINATED BY ',' 
        LINES TERMINATED BY '\r\n';";
        $conn->exec($sql);
    }

} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    die();
}
$conn = null;

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>