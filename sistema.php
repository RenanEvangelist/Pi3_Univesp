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
    $sql = "SELECT * FROM produtos_brutos WHERE nomeProdutosBrutos LIKE '%$data%' ORDER BY idProdutosBrutos DESC";
} else {
    $sql = "SELECT * FROM produtos_brutos WHERE autorizado = 0 ORDER BY idProdutosBrutos DESC";
}

$result = $conexao->query($sql);

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem_nome = $_FILES['imagem']['name'];
        $imagem_tmp = $_FILES['imagem']['tmp_name'];
        $imagem_dir = 'uploads/' . $imagem_nome;
        move_uploaded_file($imagem_tmp, $imagem_dir);
    } else {
        $imagem_dir = null;
    }

    $query = "INSERT INTO produtos_brutos (nomeProdutosBrutos, descricaoProdutosBrutos, precoProdutosBrutos, categoriaProdutosBrutos, imagemProdutosBrutos) 
              VALUES ('$nome', '$descricao', '$preco', '$categoria', '$imagem_dir')";
    mysqli_query($conexao, $query);

    header('Location: sistema.php');
}
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema | Supermercado Inova</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./style/sistemaStyle.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="#">Supermercado Inova</a>
        <a class="navbar-brand" href="galeria.php">Produtos no monstroario</a>

        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger">Sair</a>
        </div>
    </div>
</nav>

<h1>Painel de controle de produtos</h1>

<div class="container container-custom">
    <div class="box-search">
        <button id="btnAdd" class="btn btn-success">➕ Adicionar Produto</button>
    </div>

    <!-- Fundo escuro -->
    <div id="overlay" style="display:none;"></div>

    <!-- Formulário Popup -->
    <div id="popupForm" style="display:none;">
        <div class="popup-content">
            <h2>Adicionar Produto</h2>
            <form action="sistema.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome do produto</label>
                    <input type="text" name="nome" id="nome" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" rows="4" required></textarea>

                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" name="preco" id="preco" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <input type="text" name="categoria" id="categoria" required>
                </div>
                <div class="form-group">
                    <label for="imagem">Imagem</label>
                    <input type="file" name="imagem" id="imagem">
                </div>
                <div class="buttons">
                    <button type="submit" name="submit" class="btn-success">Salvar</button>
                    <button type="button" id="btnClose" class="btn-cancel">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <?php while($produto = mysqli_fetch_assoc($result)) : ?>
    <div class="user-card">
        <div>
            <?php if (!empty($produto['imagemProdutosBrutos'])): ?>
                <img src="<?= $produto['imagemProdutosBrutos'] ?>" alt="Imagem do produto">
            <?php else: ?>
                <img src="uploads/default.png" alt="Sem imagem">
            <?php endif; ?>
        </div>
        <div class="user-info">
            <h5><?= $produto['nomeProdutosBrutos'] ?></h5>
            <p><b>Descrição:</b> <?= $produto['descricaoProdutosBrutos'] ?></p>
            <p><b>Preço:</b> R$ <?= number_format($produto['precoProdutosBrutos'], 2, ',', '.') ?></p>
            <p><b>Categoria:</b> <?= $produto['categoriaProdutosBrutos'] ?></p>
            <div class="user-actions">
                <a class="btn btn-sm btn-primary" href="edit.php?id=<?= $produto['idProdutosBrutos'] ?>" title="Editar">✏️ Editar</a>
                <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $produto['idProdutosBrutos'] ?>" title="Excluir">🗑️ Excluir</a>
                <button class="btn btn-sm btn-success autorizar-btn" data-id="<?= $produto['idProdutosBrutos'] ?>">✅ Autorizar</button>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<script  src="js/sistemaJS.js"></script>
</body>
</html>
