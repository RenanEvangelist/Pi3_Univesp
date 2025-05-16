<?php
session_start();
include_once('config.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
    exit();
}

// Verificar se foi passado um ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Buscar produto na tabela produtos_brutos
    $sql_select = "SELECT * FROM produtos_brutos WHERE idProdutosBrutos = $id";
    $result_select = mysqli_query($conexao, $sql_select);

    if (mysqli_num_rows($result_select) > 0) {
        $produto = mysqli_fetch_assoc($result_select);

        // Preparar dados para inserção
        $nome_produto = mysqli_real_escape_string($conexao, $produto['nomeProdutosBrutos']);
        $descricao = mysqli_real_escape_string($conexao, $produto['descricaoProdutosBrutos']);
        $preco = $produto['precoProdutosBrutos'];
        $imagem = mysqli_real_escape_string($conexao, $produto['imagemProdutosBrutos']);
        $categoria = mysqli_real_escape_string($conexao, $produto['categoriaProdutosBrutos']);

        // Inserir na tabela produtos
        $sql_insert = "INSERT INTO produtos (nome, descricao, preco, imagem, categoria) 
                       VALUES ('$nome_produto', '$descricao', '$preco', '$imagem', '$categoria')";

        if (mysqli_query($conexao, $sql_insert)) {
            // Atualizar o status de autorizado para 1
            $sql_update = "UPDATE produtos_brutos SET autorizado = 1 WHERE idProdutosBrutos = $id";
            mysqli_query($conexao, $sql_update);

            header('Location: index.php?status=sucesso');
        } else {
            echo "Erro ao inserir o produto: " . mysqli_error($conexao);
        }
    } else {
        echo "Produto não encontrado.";
    }
} else {
    echo "ID não especificado.";
}
?>
