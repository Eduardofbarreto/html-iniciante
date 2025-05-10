<?php
    session_start(); // Inicia a sessão para guardar informações do usuário logado

    // Dados de usuários válidos (em um cenário real, isso viria de um banco de dados)
    $usuarios_validos = [
        'efbarreto' => '123',
        'teste' => 'abc456',
        'admin' => 'securepass'
    ];

    // Verifica se o formulário foi submetido
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario_digitado = $_POST['usuario'];
        $senha_digitada = $_POST['senha'];

        // Verifica se o usuário existe e se a senha está correta
        if (isset($usuarios_validos[$usuario_digitado]) && $usuarios_validos[$usuario_digitado] === $senha_digitada) {
            // Autenticação bem-sucedida
            $_SESSION['usuario_logado'] = true;
            $_SESSION['nome_usuario'] = $usuario_digitado; // Opcional: guardar o nome do usuário

            // Redireciona para a página protegida
            header('Location: pagina_protegida.php');
            exit(); // Encerra a execução do script após o redirecionamento
        } else {
            // Autenticação falhou
            header('Location: login.php?erro=1'); // Redireciona de volta para a página de login com um parâmetro de erro
            exit();
        }
    } else {
        // Se o arquivo for acessado diretamente sem ser por um POST do formulário
        header('Location: login.php');
        exit();
    }
?>