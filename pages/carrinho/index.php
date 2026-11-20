
<?php
session_start();

require_once '../../config/conexao.php';

// Recupera os produtos do carrinho
$carrinho = $_SESSION['carrinho'] ?? [];

$total = 0;
$itensExibidos = [];
 
// Busca os dados de cada produto
foreach ($carrinho as $chave => $item) {

    $id = $item['produto_id'];
    $quantidade = $item['quantidade'];

    $sql = "SELECT * FROM produtos WHERE id = :id AND ativo = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produto) {
        continue;
    }

    $subtotal = $produto['preco'] * $quantidade;
    $total += $subtotal;

    $itensExibidos[] = [
        'produto' => $produto,
        'chave' => $chave,
        'quantidade' => $quantidade,
        'subtotal' => $subtotal,
        'opcoes' => $item['opcoes']
    ];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Meu Carrinho | Fazenda Boa Vista</title>

    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>

<header class="cabecalho">
    <div class="container">
        <h1>🌿 Fazenda Boa Vista</h1>
        <p>Produtos artesanais produzidos com qualidade e carinho.</p>
    </div>
</header>

<main class="container pagina-carrinho">

    <h2>Meu Carrinho</h2>

    <?php if (empty($itensExibidos)): ?>

        <p>Seu carrinho está vazio.</p>

        <a href="../produtos.php" class="botao-produto">
            Ver produtos
        </a>

    <?php else: ?>

        <div class="lista-carrinho">

            <?php foreach ($itensExibidos as $item): ?>

                <?php
                $produto = $item['produto'];
                $opcoes = $item['opcoes'];
                ?>

                <div class="item-carrinho">

                    <h3>
                        <?= htmlspecialchars($produto['nome']) ?>
                    </h3>

                    <p>
                        Preço: R$
                        <?= number_format($produto['preco'], 2, ',', '.') ?>
                    </p>

                    <?php if (!empty($opcoes)): ?>

                        <h4>Personalização do café:</h4>

                        <p>Tipo:
                            <?= htmlspecialchars($opcoes['tipo']) ?>
                        </p>

                        <p>Categoria:
                            <?= htmlspecialchars($opcoes['categoria']) ?>
                        </p>

                        <p>Torra:
                            <?= htmlspecialchars($opcoes['torra']) ?>
                        </p>

                        <p>Peso:
                            <?= htmlspecialchars($opcoes['peso']) ?>
                        </p>

                    <?php endif; ?>

                    <form action="atualizar.php" method="POST">
    <input type="hidden" name="chave" value="<?= htmlspecialchars($item['chave']) ?>">

    <label>Quantidade:</label>

    <input
        type="number"
        name="quantidade"
        value="<?= $item['quantidade'] ?>"
        min="1"
        max="99"
        required
    >

    <button type="submit" class="botao-produto">
        Atualizar
    </button>
</form>

                    <p>
                        Subtotal: R$
                        <?= number_format($item['subtotal'], 2, ',', '.') ?>
                    </p>

                    <a href="remover.php?chave=<?= urlencode($item['chave']) ?>"
   class="botao-remover">
    Remover
</a>

                </div>

            <?php endforeach; ?>

        </div>

        <h3>
            Total: R$ <?= number_format($total, 2, ',', '.') ?>
        </h3>

        <a href="../produtos.php" class="botao-produto">
            Continuar comprando
        </a>

        <br><br>

<a href="finalizar.php" class="botao-produto">
    Finalizar pedido
</a>

    <?php endif; ?>

</main>

</body>
</html>
