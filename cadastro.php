<?php
require_once 'Auth.php';
$auth = new Auth();
$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!$auth->emailExiste($email)) {
        $auth->cadastrar($nome, $email, $senha);
        $mensagem = "Usuário cadastrado com sucesso! <a href='index.php'>Ir para Login</a>";
    } else {
        $mensagem = "Erro: Este e-mail já está cadastrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>MarketFinance - Cadastro</title>
</head>
<body>
    <h1>Criar Conta no MarketFinance</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome Completo" required><br><br>
        <input type="email" name="email" placeholder="Seu melhor e-mail" required><br><br>
        <input type="password" name="senha" placeholder="Crie uma senha" required><br><br>
        <button type="submit">Cadastrar</button>
    </form>
    <p><?= $mensagem ?></p>
    <a href="index.php">Já tenho conta</a>
</body>
</html>
