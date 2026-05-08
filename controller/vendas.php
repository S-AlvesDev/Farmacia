<?php

session_start();

if($_SESSION['cargo'] == 'visitante') {

    echo "Você não tem permissão.";

    exit;

}

include("../config/conexao.php");

$produto = $_POST['produto'];

$cliente = $_POST['cliente'];

$quantidade = $_POST['quantidade'];

$total = $_POST['total'];

$sql_busca = "SELECT * FROM produtos WHERE nome = '$produto'";

$resultado = mysqli_query($conn, $sql_busca);

$dados = mysqli_fetch_assoc($resultado);

$estoque_atual = $dados['quantidade'];

$novo_estoque = $estoque_atual - $quantidade;

$sql_venda = "INSERT INTO vendas
(produto, cliente, quantidade, total)

VALUES

('$produto', '$cliente', '$quantidade', '$total')";

mysqli_query($conn, $sql_venda);

$sql_estoque = "UPDATE produtos SET

quantidade = '$novo_estoque'

WHERE nome = '$produto'";

mysqli_query($conn, $sql_estoque);

header("Location: ../view/vendas.php");

?>