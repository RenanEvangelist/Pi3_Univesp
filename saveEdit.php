<?php
include_once('config.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

    // Gerenciar upload de nova imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem_nome = $_FILES['imagem']['name'];
        $imagem_tmp = $_FILES['imagem']['tmp_name'];
        $imagem_dir = 'uploads/' . $imagem_nome;
        move_uploaded_file($imagem_tmp, $imagem_dir);
    
        // Atualizar também a imagem
        $stmt = $conexao->prepare("UPDATE produtos_brutos SET nomeProdutosBrutos = ?, descricaoProdutosBrutos = ?, precoProdutosBrutos = ?, categoriaProdutosBrutos = ?, imagemProdutosBrutos = ? WHERE idProdutosBrutos = ?");
        $stmt->bind_param("ssdssi", $nome, $descricao, $preco, $categoria, $imagem_dir, $id);
    } else {
        // Sem upload de nova imagem: atualizar usando imagem atual
        $imagem_nome = $_POST['imagem_atual'];
    
        $stmt = $conexao->prepare("UPDATE produtos_brutos SET nomeProdutosBrutos = ?, descricaoProdutosBrutos = ?, precoProdutosBrutos = ?, categoriaProdutosBrutos = ?, imagemProdutosBrutos = ? WHERE idProdutosBrutos = ?");
        $stmt->bind_param("ssdssi", $nome, $descricao, $preco, $categoria, $imagem_dir, $id);
    }
    

    if ($stmt->execute()) {
        header('Location: sistema.php');
        exit();
    } else {
        echo "Erro ao atualizar o produto.";
    }
} else {
    header('Location: sistema.php');
    exit();
}
?>
