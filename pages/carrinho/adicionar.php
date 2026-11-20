
<?php
session_start();

require_once '../../config/conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acesso inválido.");
}

// Recebe o ID do produto
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    die("Produto inválido.");
}

// Busca o produto no banco
$sql = "SELECT id, nome FROM produtos WHERE id = :id AND ativo = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    die("Produto não encontrado.");
}

// Guarda as personalizações do produto
$opcoes = [];

if ($produto['nome'] === 'Café Gourmet') {

    $tipo = $_POST['tipo'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $torra = $_POST['torra'] ?? '';
    $peso = $_POST['peso'] ?? '';

    // Verifica se as opções são válidas
    if (
        !in_array($tipo, ['graos', 'moido'], true) ||
        !in_array($categoria, ['gourmet', 'especial'], true) ||
        !in_array($torra, ['clara', 'media', 'escura'], true) ||
        !in_array($peso, ['250g', '500g', '1kg'], true)
    ) {
        die("Selecione corretamente as opções do café.");
    }

    $opcoes = [
        'tipo' => $tipo,
        'categoria' => $categoria,
        'torra' => $torra,
        'peso' => $peso
    ];
}

// Cria uma identificação para cada combinação
$chave = $id . '_' . md5(json_encode($opcoes));

// Inicializa o carrinho
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Adiciona o produto ao carrinho
if (isset($_SESSION['carrinho'][$chave])) {

    $_SESSION['carrinho'][$chave]['quantidade']++;

} else {

    $_SESSION['carrinho'][$chave] = [
        'produto_id' => $id,
        'quantidade' => 1,
        'opcoes' => $opcoes
    ];
}

// Abre a página do carrinho
header("Location: index.php");
exit;
