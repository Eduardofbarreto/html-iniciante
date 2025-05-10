<?php
    session_start();

    // Verifica se o usuário está logado
    if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] !== true) {
        // Se não estiver logado, redireciona para a página de login
        header('Location: login.php');
        exit();
    }

    // Se chegou até aqui, o usuário está logado
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Protegida</title>
</head>
<body>

    <h1>Bem-vindo à Página Protegida!</h1>

    <?php
        // Opcional: Exibir o nome do usuário logado
        if (isset($_SESSION['nome_usuario'])) {
            echo '<p>Olá, ' . htmlspecialchars($_SESSION['nome_usuario']) . '!</p>';
        }
    ?>

    <p>Este conteúdo só é visível para usuários que fizeram login com sucesso.</p>

    <a href="logout.php">Sair</a>

</body>
</html>