<?php

session_start();

if($_SESSION['cargo'] == 'visitante') {

    echo "Você não tem permissão.";

    exit;

}

include("../config/conexao.php");

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$validade = $_POST['validade'];

$sql = "INSERT INTO produtos
(nome, preco, quantidade, validade)

VALUES

('$nome', '$preco', '$quantidade', '$validade')";

mysqli_query($conn, $sql);

header("Location: ../view/produtos.php");

?>