<?php

$servername = "localhost";
$dbname = "postgres";
$username = "postgres";
$password = "root";

try{
    $conn = new PDO("pgsql:host=$servername; dbname=$dbname",
    $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    die ("Falha na conexão com o banco de dados: " . $e->getMessage());
}

$pessoa = null;

if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT id, nome, cidade, data_nascimento
    FROM pessoas WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $pessoa = $stmt->fecth(PDO::FETCH_ASSOC);
}

?>