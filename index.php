<?php
require_once 'Auth.php';
$auth = new Auth();

// Se quiser criar um usuário de teste descomente a linha abaixo UMA VEZ e atualize a página:
// $auth->cadastrar("Admin", "admin@teste.com", "123456");

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($auth->login($email, $senha)) {
        header("Location: dashboard.php");
        exit;
    } else {
        $erro = "E-mail ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>MarketFinance - Login</title>
</head>
<body>
    <h1>MarketFinance</h1>
    <form method="POST">
        <input type="email" name="email" placeholder="E-mail" required><br><br>
        <input type="password" name="senha" placeholder="Senha" required><br><br>
        <button type="submit">Entrar</button>
    </form>
    <?php if($erro): ?> <p style="color:red;"><?= $erro ?></p> <?php endif; ?>
    <p>Ainda não tem conta? <a href="cadastro.php">Cadastre-se aqui</a></p>
</body>
</html>
