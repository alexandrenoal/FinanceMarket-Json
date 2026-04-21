<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - MarketFinance</title>
</head>
<body>
    <h1>Bem-vindo ao MarketFinance, <?= $_SESSION['usuario_nome'] ?>!</h1>
    <p>Você está na sua área logada.</p>
    <a href="logout.php">Sair</a>
</body>
</html>
