<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Dados</title>
</head>
<body>

<div class="container">
    <h1>Salvar informações no banco!</h1>

    <form action="dados.php" method="post">
        <label for="nome">Digite seu nome:</label>
        <input type="text" id="nome" name="nome"><br><br>

        <label for="cidade">Digite sua cidade:</label>
        <input type="text" id="cidade" name="cidade"><br><br>

        <label for="data_nascimento">Data de nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>

        <button type="submit">Cadastrar</button>

    </form>

    <hr>

    <h2>Buscar Pessoas</h2>
    <form action="index.php" method="get">
        <label for="filtro_nome">Filtrar por nome:</label>
        <input type="text" id="filtro_nome" name="filtro_nome"
        placeholder="Digite uma letra ou nome">
        <button type="submit">Buscar</button>
    </form>

    <hr>

    <h1>Pessoas Cadastradas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cidade</th>
                <th>Data de nascimento</th>
                <th>Idade Completa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once 'dados.php';

            $$filtro = isset($_GET['filtro_nome']) ? $_GET['filtro_nome'] : '';

            $pessoas = buscarPessoas($filtro);

            foreach($pessoas as $pessoa): ?>
            <tr>
                <td><?php echo htmlspecialchars($pessoa['id']); ?></td>
                <td><?php echo htmlspecialchars($pessoa['nome']); ?> </td>
                <td><?php echo htmlspecialchars($pessoa['cidade']); ?> </td>
                <td><?php echo htmlspecialchars($pessoa['data_nascimento']); ?> </td>
                <td><?php echo calcularIdadeCompleta($pessoa['data_nascimento']); ?> </td>
                <th>Ações</th>
                <td>
                    <a href="editar.php?id=<?php echo htmlspecialchars($pessoa['id']); ?>">Editar</a>
                    |
                    <a href="excluir.php?id=<?php echo htmlspecialchars($pessoa['id']); ?>">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>