<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
    exit;
}
?>

<?php 
session_start();
$titulo_pagina = "Dashboard";

include 'includes/header.php'; 
?>
    <h1>Bem-vindo ao MarketFinance, <?= $_SESSION['usuario_nome'] ?>!</h1>
    <p>Você está na sua área logada.</p>
    <a href="logout.php">Sair</a>

<?php include 'includes/footer.php'; ?>