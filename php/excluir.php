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

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM pessoas WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if($stmt->execute()){
        header("Location: index.php?status=sucesso");
        exit();
    }else{
        header("Location: index.php?status=erro");
        exit();
    }
}else{
    header("Location: index.php?status=erro");
    exit();
}


?>