
<?php
require_once '../config/conexao.php';

// Verifica se recebeu um ID pela URL
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    die("Produto inválido.");
}

// Busca o produto no banco
$sql = "SELECT * FROM produtos WHERE id = :id AND ativo = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

$produto = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o produto existe
if (!$produto) {
    die("Produto não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($produto['nome']) ?> | Fazenda Boa Vista</title>

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <header class="cabecalho">
        <div class="container">
            <h1>🌿 Fazenda Boa Vista</h1>
            <p>Produtos artesanais produzidos com qualidade e carinho.</p>
        </div>
    </header>

    <main class="container pagina-produto">

        <a href="produtos.php" class="voltar-produtos" style="display: inline-block; background: #ffffff; color: #3f6045; padding: 12px 22px; border: 1px solid #3f6045; border-radius: 8px; margin-bottom: 25px; text-decoration: none; font-weight: bold;">
    ← Voltar aos produtos
</a>

        <div class="detalhe-produto">

            <div class="detalhe-imagem">
                <img
                    src="../assets/images/<?= htmlspecialchars($produto['imagem']) ?>"
                    alt="<?= htmlspecialchars($produto['nome']) ?>"
                >
            </div>

            <div class="detalhe-conteudo">

                <h1><?= htmlspecialchars($produto['nome']) ?></h1>

                <p class="detalhe-descricao">
                    <?= htmlspecialchars($produto['descricao']) ?>
                </p>

                
<form action="carrinho/adicionar.php" method="POST">

    <input type="hidden" name="id" value="<?= $produto['id'] ?>">

    <?php if ($produto['nome'] === 'Café Gourmet'): ?>

        <div class="personalizacao-cafe">

            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" required>
                <option value="graos">Grãos</option>
                <option value="moido">Moído</option>
            </select>

            <label for="categoria">Categoria:</label>
            <select id="categoria" name="categoria" required>
                <option value="gourmet">Gourmet</option>
                <option value="especial">Especial</option>
            </select>

            <label for="torra">Torra:</label>
            <select id="torra" name="torra" required>
                <option value="clara">Clara</option>
                <option value="media">Média</option>
                <option value="escura">Escura</option>
            </select>

            <label for="peso">Peso:</label>
            <select id="peso" name="peso" required>
                <option value="250g">250 g</option>
                <option value="500g">500 g</option>
                <option value="1kg">1 kg</option>
            </select>

        </div>

    <?php endif; ?>

    <div class="detalhe-preco">
        R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
    </div>

    <button type="submit" class="botao-produto">
        Adicionar ao carrinho
    </button>

</form>


                <a href="produtos.php" class="botao-produto"
   style="text-align: center; margin-top: 12px;">
    Ver outros produtos
</a>

<a href="https://wa.me/5551999999999?text=Olá!%20Tenho%20interesse%20no%20produto%20<?= urlencode($produto['nome']) ?>"
   class="botao-whatsapp"
   target="_blank">
    Encomendar pelo WhatsApp
</a>

            </div>

        </div>

    </main>

    <footer class="rodape">
        <p>© 2026 Fazenda Boa Vista — Feito com carinho 🌿</p>
    </footer>

</body>
</html>
