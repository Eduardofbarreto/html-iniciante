<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h1>Login</h1>

    <?php
        // Verifica se houve erro na tentativa de login
        if (isset($_GET['erro'])) {
            echo '<p style="color: red;">Usuário ou senha incorretos.</p>';
        }
    ?>

    <form action="processa_login.php" method="POST">
        <div>
            <label for="usuario">Usuário:</label>
            <input type="text" id="usuario" name="usuario" required>
        </div>
        <br>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>
        <br>
        <button type="submit">Entrar</button>
    </form>

</body>
</html>