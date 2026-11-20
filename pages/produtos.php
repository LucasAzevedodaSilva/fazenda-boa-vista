<?php

require_once '../config/conexao.php';

$sql = "SELECT * FROM produtos WHERE ativo = 1 ORDER BY nome ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produtos | Fazenda Boa Vista</title>

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <header class="cabecalho">
        <div class="container">
            <h1>🌿 Fazenda Boa Vista</h1>
            <p>Produtos artesanais produzidos com qualidade e carinho.</p>
        </div>
    </header>

    <main class="container">

        <section class="secao-produtos">

            <div class="titulo-secao">
                <h2>Nossos Produtos</h2>
                <p>Sabores especiais direto da nossa fazenda para você.</p>
            </div>

            <div class="grade-produtos">

                <?php foreach ($produtos as $produto): ?>

                    <div class="card-produto">

                        <div class="imagem-produto">

                            <span class="emoji-produto">🌾</span>

                            <img
                                src="../assets/images/<?= htmlspecialchars($produto['imagem']) ?>"
                                alt="<?= htmlspecialchars($produto['nome']) ?>"
                                onerror="this.style.display='none'"
                            >

                        </div>

                        <div class="conteudo-produto">

                            <h3><?= htmlspecialchars($produto['nome']) ?></h3>

                            <p class="descricao">
                                <?= htmlspecialchars($produto['descricao']) ?>
                            </p>

                            <div class="preco">
                                R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                            </div>

                            <a href="produto.php?id=<?= $produto['id'] ?>" class="botao-produto">
    Ver produto
</a>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </section>

    </main>

    <footer class="rodape">
        <p>© <?= date('Y') ?> Fazenda Boa Vista — Feito com carinho 🌿</p>
    </footer>

</body>

</html>