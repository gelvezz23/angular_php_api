<?php
require_once  'test.php';
//$dsn =  new PDO ("mysql:host=$host, port=3306, dbname=$db, $username, $password");
try{
    // create a PostgreSQL database connection
    $conn = new PDO ('mysql:host=$host;dbname=$db', $username, $password);

    if($conn){
        echo "Connected to the <strong>$db</strong> database successfully!";

    }
}catch (PDOException $e){
    // report error message
    echo $e->getMessage();
}