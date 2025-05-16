<?php
session_start();
include_once('config.php');

// Consulta todos os produtos autorizados
$sql = "SELECT * FROM produtos ORDER BY id DESC";
$result = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermercado Inova</title>
    <link rel="stylesheet" href="styles.css">
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
        section {
            padding: 20px;
            margin: 20px;
            border-radius: 12px;
            background-color: #f0fff0;
            width: 80%;
            box-shadow: 0px 4px 8px rgba(0, 128, 0, 0.2);
            transition: transform 0.3s;
        }
        section:hover {
            transform: scale(1.02);
        }
        h2 {
            color: #006400;
            border-bottom: 2px solid #008000;
            padding-bottom: 5px;
        }
        .galeria {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }
        .galeria img {
            width: 100%;
            max-width: 300px;
            border-radius: 12px;
            box-shadow: 0px 4px 6px rgba(0, 128, 0, 0.3);
            transition: transform 0.3s;
        }
        .galeria img:hover {
            transform: scale(1.05);
        }
        button {
            background-color: #00b300;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s, transform 0.2s;
        }
        button:hover {
            background-color: #006400;
            transform: scale(1.05);
        }
        footer {
            background-color: #004d00;
            border-top-left-radius: 20%;
            border-top-right-radius: 20%;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 20px;
            width: 100%;
        }
        .logos {
            width: 5%;
            height: 5%;
            margin-right: 30px;
        }
        .imagensIlustrativas {
            margin-right: 30px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Supermercado Inova 🛒</h1>
        <p>Atender bem para atender sempre</p>
    </header>
    
    <section id="historia">
        <h2>📖 Nossa História</h2>
        <p>Em 2003, decidi abrir uma pequena mercearia no bairro onde moro...</p>
    </section>

    <section id="missao">
        <h2>🎯 Nossa Missão</h2>
        <p>Nosso foco é sempre o cliente e a qualidade dos produtos.</p>
    </section>

    <section id="contato">
        <h2>📞 Contato</h2>
        <p>Email: <a href="mailto:Cris.Gomes.10@gmail.com">Cris.Gomes.10@gmail.com</a></p>
        <p>Endereço: Rua Padre Marcelo Dykmans, S/N, Pirapora do Bom Jesus, SP</p>
        <div class="social-icons">
            <a href="#"><img src="./image/Insta_logo.webp" alt="Instagram" class="logos"></a>
            <a href="#"><img src="./image/facebook_logo.png" alt="Facebook" class="logos"></a>
        </div>
    </section>

    <section id="produtos">
        <h2>🛍️ Nossos Produtos</h2>
        <div class="galeria">
            <!-- Produtos vindos do banco -->
            <?php while($produto = mysqli_fetch_assoc($result)) : ?>
                <div class="produto-card">
                    <img src="<?= htmlspecialchars($produto['imagem']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>" class="imagensIlustrativas">
                    <p><strong><?= htmlspecialchars($produto['nome']) ?></strong></p>
                    <p>Preço: R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <section id="promocoes">
        <h2>🔥 Promoções da Semana</h2>
        <div class="galeria">
            <img src="image/promocao_um.jpg" alt="Promoção 1" class="imagensIlustrativas">
            <img src="image/promocao_dois.jpg" alt="Promoção 2" class="imagensIlustrativas">
        </div>
    </section>

    <section id="enquete">
        <h2>🗳️ Enquete Semanal</h2>
        <p>O que você gostaria de ver em promoção na próxima semana?</p>
        <form>
            <input type="radio" name="promo" value="perfumaria"> Perfumaria<br>
            <input type="radio" name="promo" value="padaria"> Padaria<br>
            <input type="radio" name="promo" value="açougue"> Açougue<br>
            <input type="radio" name="promo" value="hortifruti"> Hortifruti<br>
            <button type="submit">Votar</button>
        </form>
    </section>

    <section id="pedidos">
        <h2>📦 Faça Seu Pedido</h2>
        <button>Fazer Pedido</button>
    </section>

    <section id="fotos">
        <h2>🏢 Nosso Supermercado</h2>
        <div class="galeria">
            <img src="image/supermercado_um.jpg" alt="Supermercado Inova" class="imagensIlustrativas">
            <img src="image/supermercado_dois.jpg" alt="Supermercado Inova" class="imagensIlustrativas">
        </div>
    </section>

    <section id="carrinho">
        <h2>🛒 Carrinho de Compras</h2>
        <button>Ir para o Carrinho</button>
    </section>

    <footer>
        <p>✨ Acreditar sempre no amanhã e fazer por merecer hoje ✨</p>
    </footer>
</body>
</html>
