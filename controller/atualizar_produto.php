<?php

session_start();

if($_SESSION['cargo'] == 'visitante') {

    echo "Você não tem permissão.";

    exit;

}

include("../config/conexao.php");

$id = $_POST['id'];

$nome = $_POST['nome'];

$preco = $_POST['preco'];

$quantidade = $_POST['quantidade'];

$validade = $_POST['validade'];

$sql = "UPDATE produtos SET

nome = '$nome',
preco = '$preco',
quantidade = '$quantidade',
validade = '$validade'

WHERE id = '$id'";

mysqli_query($conn, $sql);

header("Location: ../view/produtos.php");

?>