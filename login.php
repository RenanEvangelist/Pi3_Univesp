<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Supermercado Inova</title>
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
            max-width: 400px;
            margin: 60px auto;
            padding: 30px;
            background-color: #f0fff0;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 128, 0, 0.2);
        }
        h1 {
            text-align: center;
            color: #006400;
            margin-bottom: 30px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"],
        input[type="password"] {
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-bottom: 2px solid #006400;
            font-size: 16px;
            background: none;
            color: #004d00;
            outline: none;
            transition: border-color 0.3s;
        }
        input[type="text"]::placeholder,
        input[type="password"]::placeholder {
            color: #006400b0;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-bottom: 2px solid #00b300;
        }
        .inputSubmit {
            background-color: #00b300;
            color: white;
            padding: 14px;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }
        .inputSubmit:hover {
            background-color: #006400;
            transform: scale(1.05);
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
        @media (max-width: 500px) {
            .container {
                margin: 20px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <a href="home.php">⬅ Voltar</a>
    <div class="container">
        <h1>Login</h1>
        <form action="testLogin.php" method="POST">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input class="inputSubmit" type="submit" name="submit" value="Entrar">
        </form>
    </div>
</body>
</html>
