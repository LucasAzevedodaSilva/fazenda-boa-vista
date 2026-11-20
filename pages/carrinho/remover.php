
<?php
session_start();

// Recebe a identificação do produto no carrinho
$chave = $_GET['chave'] ?? '';

// Verifica se o produto existe no carrinho
if ($chave !== '' && isset($_SESSION['carrinho'][$chave])) {

    // Remove o produto
    unset($_SESSION['carrinho'][$chave]);
}

// Volta para o carrinho
header("Location: index.php");
exit;
