<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            color: #004d00;
            margin: 0;
            padding: 0;
            text-align: center;
        }


        .box {
            background-color: #f0fff0;
            box-shadow: 1px 4px 8px rgba(0, 128, 0, 0.2);
            padding: 30px;
            border-radius: 20px;
            margin: 80px auto;
            width: 80%;
            max-width: 400px;
            transition: transform 0.3s;
            margin-top:15%;

            
        }

        .box:hover {
            transform: scale(1.02);
        }

        a {
            text-decoration: none;
            color: white;
            background-color: #00b300;
            padding: 12px 24px;
            border-radius: 12px;
            margin: 10px;
            display: inline-block;
            transition: background 0.3s, transform 0.2s;
            font-size: 16px;
        }

        a:hover {
            background-color: #006400;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
<br>
<br>
    <div class="box">
        <a href="login.php">Login</a>
        <a href="formulario.php">Cadastre-se</a>
    </div>
</body>
</html>
