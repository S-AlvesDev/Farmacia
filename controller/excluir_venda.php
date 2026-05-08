<?php

session_start();

if($_SESSION['cargo'] == 'visitante') {

    echo "Você não tem permissão.";

    exit;

}

include("../config/conexao.php");

$id = $_GET['id'];

$sql_venda = "SELECT * FROM vendas WHERE id = '$id'";

$resultado = mysqli_query($conn, $sql_venda);

$dados = mysqli_fetch_assoc($resultado);

$produto = $dados['produto'];

$quantidade_venda = $dados['quantidade'];

$sql_produto = "SELECT * FROM produtos WHERE nome = '$produto'";

$resultado_produto = mysqli_query($conn, $sql_produto);

$produto_dados = mysqli_fetch_assoc($resultado_produto);

$estoque_atual = $produto_dados['quantidade'];

$novo_estoque = $estoque_atual + $quantidade_venda;

$sql_update = "UPDATE produtos SET

quantidade = '$novo_estoque'

WHERE nome = '$produto'";

mysqli_query($conn, $sql_update);

$sql_delete = "DELETE FROM vendas WHERE id = '$id'";

mysqli_query($conn, $sql_delete);

header("Location: ../view/vendas.php");

?>