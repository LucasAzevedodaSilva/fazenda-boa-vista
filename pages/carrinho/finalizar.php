
<?php
session_start();

require_once '../../config/conexao.php';

// Recupera os produtos do carrinho
$carrinho = $_SESSION['carrinho'] ?? [];

if (empty($carrinho)) {
    header("Location: index.php");
    exit;
}

$total = 0;
$itens = [];

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

    $itens[] = [
        'produto' => $produto,
        'quantidade' => $quantidade,
        'subtotal' => $subtotal
    ];
}

// Processa a finalização do pedido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $endereco = trim($_POST['endereco']);

    try {
        $pdo->beginTransaction();

        // Cadastra o cliente
        $sqlCliente = "INSERT INTO clientes (nome, email, telefone, endereco)
                       VALUES (:nome, :email, :telefone, :endereco)";

        $stmtCliente = $pdo->prepare($sqlCliente);

        $stmtCliente->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':telefone' => $telefone,
            ':endereco' => $endereco
        ]);

        $clienteId = $pdo->lastInsertId();

        // Cria o pedido
        $sqlPedido = "INSERT INTO pedidos (cliente_id, total)
                      VALUES (:cliente_id, :total)";

        $stmtPedido = $pdo->prepare($sqlPedido);

        $stmtPedido->execute([
            ':cliente_id' => $clienteId,
            ':total' => $total
        ]);

        $pedidoId = $pdo->lastInsertId();

        // Registra os produtos do pedido
        $sqlItem = "INSERT INTO itens_pedido
                    (pedido_id, produto_id, quantidade, preco_unitario)
                    VALUES (:pedido_id, :produto_id, :quantidade, :preco)";

        $stmtItem = $pdo->prepare($sqlItem);

        foreach ($itens as $item) {
            $stmtItem->execute([
                ':pedido_id' => $pedidoId,
                ':produto_id' => $item['produto']['id'],
                ':quantidade' => $item['quantidade'],
                ':preco' => $item['produto']['preco']
            ]);
        }

        $pdo->commit();

        // Limpa o carrinho após salvar o pedido
        unset($_SESSION['carrinho']);

        echo "<script>
            alert('Pedido realizado com sucesso!');
            window.location.href = '../produtos.php';
        </script>";
        exit;

    } catch (Exception $e) {
        $pdo->rollBack();
        die('Erro ao finalizar pedido: ' . $e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Pedido | Fazenda Boa Vista</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>

<header class="cabecalho">
    <div class="container">
        <h1>🌿 Fazenda Boa Vista</h1>
        <p>Finalização do pedido</p>
    </div>
</header>

<main class="container">

    <h2>Finalizar Pedido</h2>

    <h3>Resumo da compra</h3>

    <?php foreach ($itens as $item): ?>
        <p>
            <?= htmlspecialchars($item['produto']['nome']) ?>
            - Quantidade: <?= $item['quantidade'] ?>
            - Subtotal: R$
            <?= number_format($item['subtotal'], 2, ',', '.') ?>
        </p>
    <?php endforeach; ?>

    <h3>
        Total: R$ <?= number_format($total, 2, ',', '.') ?>
    </h3>


<h3>Dados do cliente</h3>

<form action="finalizar.php" method="POST" class="formulario-cliente">

    <label for="nome">Nome completo:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>

    <label for="telefone">Telefone:</label>
    <input type="tel" id="telefone" name="telefone" required>

    <label for="endereco">Endereço:</label>
    <input type="text" id="endereco" name="endereco" required>

    <button type="submit" class="botao-produto">
        Confirmar pedido
    </button>

</form>


</main>

</body>
</html>
