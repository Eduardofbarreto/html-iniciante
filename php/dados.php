<?php
// Bloco PHP no topo do arquivo para processar dados e consultas
$servername = "localhost";
$dbname = "postgres";
$username = "postgres";
$password = "root";

try {
    // Conecta usando PDO para PostgreSQL
    $conn = new PDO("pgsql:host=$servername;dbname=$dbname", $username, $password);
    // Define o modo de erro para lançar exceções em caso de falha
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Falha na conexão com o banco de dados: " . $e->getMessage());
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];

    $sql = "INSERT INTO pessoas (nome, cidade, data_nascimento)
    VALUES (:nome, :cidade, :data_nascimento)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':data_nascimento', $data_nascimento);

    if($stmt->execute()){
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao cadastrar!";
    }
    $stmt->closeCursor(); // Em PDO, use closeCursor() em vez de close()
}

function buscarPessoas($filtro = ''){
    global $conn;

    $sql = "SELECT id, nome, cidade, data_nascimento FROM pessoas";

    if(!empty($filtro)){
        $sql .= " WHERE nome LIKE ?";
    }

    $sql .= " ORDER BY nome";

    $stmt = $conn->prepare($sql);

    if(!empty($filtro)){
        $param_filtro = "%" . $filtro . "%";
        $stmt->bindParam(1, $param_filtro);
    }

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function calcularIdadeCompleta($dataNascimento){
    $data_nasc = new DateTime($dataNascimento);
    $hoje = new DateTime();
    $diferenca = $hoje->diff($data_nasc);

    $anos = $diferenca->y;
    $meses = $diferenca->m;
    $dias = $diferenca->d;

    return "$anos anos, $meses meses e $dias dias";
}

?>