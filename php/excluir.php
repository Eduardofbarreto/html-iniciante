<?php

$servername = "localhost";
$dbname = "postgres";
$username = "postgres";
$password = "root";

try{
    $conn = new PDO("pgsql:host=$servername;
    dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die ("Falha na conexão com o banco de dados: " . 
    $e->getMessage());
}

?>