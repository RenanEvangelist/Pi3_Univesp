<?php
    include_once('config.php');

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];

        // Prepara a query para evitar SQL Injection
        $stmt = $conexao->prepare("SELECT * FROM produtos_brutos WHERE idProdutosBrutos = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $produto_data = $result->fetch_assoc();
            $nome = $produto_data['nomeProdutosBrutos'];
            $descricao = $produto_data['descricaoProdutosBrutos'];
            $preco = $produto_data['precoProdutosBrutos'];
            $categoria = $produto_data['categoriaProdutosBrutos'];
            $imagem = $produto_data['imagemProdutosBrutos'];
        } else {
            header('Location: sistema.php');
            exit();
        }
    } else {
        header('Location: sistema.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto | Supermercado Inova</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            color: #004d00;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        header {
            background: linear-gradient(90deg, #00b300, #008000);
            border-bottom-left-radius: 20%;
            border-bottom-right-radius: 20%;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            width: 100%;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        .container {
            width: 90%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #f0fff0;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 4px 8px rgba(0, 128, 0, 0.2);
        }
        h2 {
            color: #006400;
            border-bottom: 2px solid #008000;
            padding-bottom: 10px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #006400;
        }
        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
        }
        button {
            width: 100%;
            background-color: #00b300;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }
        button:hover {
            background-color: #006400;
            transform: scale(1.02);
        }
        a {
            text-decoration: none;
            color: #006400;
            margin-top: 15px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <header>
        <h1>Editar Produto 🛒</h1>
    </header>

    <div class="container">
        <form action="saveEdit.php" method="POST" enctype="multipart/form-data">
            <h2>Atualize o Produto</h2>

            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" rows="4" required><?php echo htmlspecialchars($descricao); ?></textarea>
            </div>

            <div class="form-group">
                <label for="preco">Preço (R$)</label>
                <input type="number" step="0.01" name="preco" id="preco" value="<?php echo htmlspecialchars($preco); ?>" required>
            </div>

            <!-- <div class="form-group">
                <label for="quantidade">Quantidade em Estoque</label>
                <input type="number" name="quantidade" id="quantidade" value="<?php echo htmlspecialchars($quantidade); ?>" required>
            </div> -->

            <div class="form-group">
                <label for="categoria">Categoria</label>
                <input type="text" name="categoria" id="categoria" value="<?php echo htmlspecialchars($categoria); ?>" required>
            </div>

            <!-- Novo campo para imagem -->
            <div class="form-group">
                <label for="imagem">Imagem do Produto</label>
                <input type="file" name="imagem" id="imagem">
                <?php if (!empty($imagem)): ?>
                    <p>Imagem atual: <img src="uploads/<?php echo htmlspecialchars($imagem); ?>" alt="Imagem atual" width="100"></p>
                <?php endif; ?>
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">


            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" name="update">Atualizar Produto</button>
        </form>

        <a href="sistema.php">← Voltar</a>
    </div>
</body>
</html>
