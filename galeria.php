<?php
session_start();
include_once('config.php');

if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}

$logado = $_SESSION['email'];

if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM produtos WHERE nome LIKE '%$data%' ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM produtos  ORDER BY id DESC";
}

$result = $conexao->query($sql);
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria | Supermercado Inova</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./style/sistemaStyle.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="#">Supermercado Inova</a>
        <a class="navbar-brand" href="sistema.php">Sistema de Produtos</a>

        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger">Sair</a>
        </div>
    </div>
</nav>

<h1>Galeria de produtos</h1>

<div class="container container-custom">
    

    <?php while($produto = mysqli_fetch_assoc($result)) : ?>
    <div class="user-card">
        <div>
            <?php if (!empty($produto['imagem'])): ?>
                <img src="<?= $produto['imagem'] ?>" alt="Imagem do produto">
            <?php else: ?>
                <img src="uploads/default.png" alt="Sem imagem">
            <?php endif; ?>
        </div>
        <div class="user-info">
            <h5><?= $produto['nome'] ?></h5>
            <p><b>Descrição:</b> <?= $produto['descricao'] ?></p>
            <p><b>Preço:</b> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
            <p><b>Categoria:</b> <?= $produto['categoria'] ?></p>
            <div class="user-actions">
                <a class="btn btn-sm btn-danger" href="deleteGaleria.php?id=<?= $produto['id'] ?>" title="Excluir">🗑️ Excluir</a>
                
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<script  src="js/galeriaJS.js"></script>
</body>
</html>
