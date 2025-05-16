<?php
    if(isset($_POST['submit']))
    {
        include_once('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        // $telefone = $_POST['telefone'];
        // $sexo = $_POST['genero'];
        // $data_nasc = $_POST['data_nascimento'];
        // $cidade = $_POST['cidade'];
        // $estado = $_POST['estado'];
        // $endereco = $_POST['endereco'];       
        
        // Processamento da imagem
        if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
            $imagem_nome = $_FILES['imagem']['name'];
            $imagem_tmp = $_FILES['imagem']['tmp_name'];
            $imagem_dir = 'uploads/' . $imagem_nome;
            move_uploaded_file($imagem_tmp, $imagem_dir);
        } else {
            $imagem_dir = null; // Caso nenhuma imagem seja enviada
        }

        // $result = mysqli_query($conexao, "INSERT INTO usuario(nome,senha,email,telefone,sexo,data_nasc,cidade,estado,endereco,imagem) 
        // VALUES ('$nome','$senha','$email','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco','$imagem_dir')");
        $result = mysqli_query($conexao, "INSERT INTO usuario(nome,email,senha) 
        VALUES ('$nome','$email','$senha')");

        header('Location: login.php');
    }
?>
            <!-- Telefone, sexo, Data de nascimento, Cidade, Estado, Endereço -->


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Supermercado Inova</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            color: #004d00;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f0fff0;
            border-radius: 15px;
            box-shadow: 0px 4px 8px rgba(0, 128, 0, 0.2);
        }
        h1 {
            text-align: center;
            color: #006400;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .inputBox {
            position: relative;
            margin-bottom: 20px;
        }
        .inputUser {
            background: none;
            border: none;
            border-bottom: 2px solid #006400;
            width: 100%;
            padding: 10px 5px;
            font-size: 16px;
            color: #004d00;
            outline: none;
        }
        .labelInput {
            position: absolute;
            top: 10px;
            left: 5px;
            color: #004d00;
            pointer-events: none;
            transition: 0.3s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput {
            top: -15px;
            font-size: 12px;
            color: #00b300;
        }
        input[type="date"],
        input[type="radio"] {
            margin-top: 5px;
        }
        label {
            font-weight: 500;
        }
        #submit {
            background-color: #00b300;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }
        #submit:hover {
            background-color: #006400;
            transform: scale(1.05);
        }
        .radio-group {
            display: flex;
            gap: 20px;
            margin: 10px 0 20px;
        }
        a {
            display: inline-block;
            margin: 20px;
            color: #006400;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        a:hover {
            color: #00b300;
        }
        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 15px;
            }
            .radio-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <a href="home.php">⬅ Voltar</a>
    <div class="container">
        <h1>Cadastro de Cliente</h1>
        <form enctype="multipart/form-data" action="formulario.php" method="POST">
            <div class="inputBox">
                <input type="text" name="nome" id="nome" class="inputUser" required>
                <label for="nome" class="labelInput">Nome completo</label>
            </div>
            <div class="inputBox">
                <input type="text" name="email" id="email" class="inputUser" required>
                <label for="email" class="labelInput">Email</label>
            </div>
            <div class="inputBox">
                <input type="password" name="senha" id="senha" class="inputUser" required>
                <label for="senha" class="labelInput">Senha</label>
            </div>
            
            <!-- </div>
            <div class="inputBox">
                <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                <label for="telefone" class="labelInput">Telefone</label>
            </div>
            <label>Sexo:</label>
            <div class="radio-group">
                <label><input type="radio" name="genero" value="feminino" required> Feminino</label>
                <label><input type="radio" name="genero" value="masculino" required> Masculino</label>
                <label><input type="radio" name="genero" value="outro" required> Outro</label>
            </div>
            <label for="data_nascimento"><b>Data de Nascimento:</b></label>
            <input type="date" name="data_nascimento" id="data_nascimento" required>
            <div class="inputBox">
                <input type="text" name="cidade" id="cidade" class="inputUser" required>
                <label for="cidade" class="labelInput">Cidade</label>
            </div>
            <div class="inputBox">
                <input type="text" name="estado" id="estado" class="inputUser" required>
                <label for="estado" class="labelInput">Estado</label>
            </div>
            <div class="inputBox">
                <input type="text" name="endereco" id="endereco" class="inputUser" required>
                <label for="endereco" class="labelInput">Endereço</label>
            </div> 
            <div class="inputBox">
                <input type="file" name="imagem" id="imagem" class="inputUser" accept="image/*">
                <label for="imagem" class="labelInput">Imagem</label>
            </div>
    -->
            <input type="submit" name="submit" id="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>
