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
                <?php foreach ($pesssoas as $pessoa): ?>
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