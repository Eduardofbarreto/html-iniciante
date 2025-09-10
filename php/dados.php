<?php
// Bloco PHP no topo do arquivo para processar dados e consultas
$host = "localhost";
$dbname = "postgres";
$user = "postgres";
$password = "root";

try {
    $dsn = "pgsql:host=$host;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // Processa a inserção se o formulário for enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $data_nascimento = $_POST['data_nascimento'];

        $sql = "INSERT INTO pessoas (nome, data_nascimento) VALUES (:nome, :data_nascimento)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->execute();
    }

    // Busca os dados do banco de dados para a tabela
    $sql_select = "SELECT id, nome, data_nascimento FROM pessoas ORDER BY id DESC";
    $stmt_select = $pdo->prepare($sql_select);
    $stmt_select->execute();
    $pessoas = $stmt_select->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Exibe o erro de forma segura
    echo "Erro ao conectar ou inserir dados: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar no banco!</title>
</head>
<body>
    <div class="container">
        <h1>Salvar informações no banco!</h1>
        
        <form action="dados.php" method="post">
            <label for="nome">Digite seu nome:</label>
            <input type="text" id="nome" name="nome"><br><br>

            <label for="data">Data de nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>

            <button type="submit">Cadastrar</button>
        </form>

        <hr>

        <h1>Pessoas Cadastradas</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de nascimento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pessoas as $pessoa): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($pessoa['id']); ?></td>
                        <td><?php echo htmlspecialchars($pessoa['nome']); ?></td>
                        <td><?php echo htmlspecialchars($pessoa['data_nascimento']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>