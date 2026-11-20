
<?php
session_start();

// Recebe os dados enviados pelo formulário
$chave = $_POST['chave'] ?? '';
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);

// Verifica se o produto existe no carrinho
if (
    $chave !== '' &&
    isset($_SESSION['carrinho'][$chave]) &&
    $quantidade !== false &&
    $quantidade !== null &&
    $quantidade >= 1 &&
    $quantidade <= 99
) {
    $_SESSION['carrinho'][$chave]['quantidade'] = $quantidade;
}

// Volta para o carrinho
header("Location: index.php");
exit;
