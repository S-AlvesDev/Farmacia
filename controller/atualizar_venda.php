<?php

session_start();

if($_SESSION['cargo'] == 'visitante') {

    echo "Você não tem permissão.";

    exit;

}

include("../config/conexao.php");

$id = $_POST['id'];

$produto = $_POST['produto'];

$cliente = $_POST['cliente'];

$quantidade = $_POST['quantidade'];

$total = $_POST['total'];

$sql = "UPDATE vendas SET

produto = '$produto',
cliente = '$cliente',
quantidade = '$quantidade',
total = '$total'

WHERE id = '$id'";

mysqli_query($conn, $sql);

header("Location: ../view/vendas.php");

?>