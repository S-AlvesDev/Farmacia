<?php

session_start();

if($_SESSION['cargo'] == 'visitante') {

    echo "Você não tem permissão.";

    exit;

}

include("../config/conexao.php");

$id = $_GET['id'];

$sql = "DELETE FROM fornecedores WHERE id = '$id'";

mysqli_query($conn, $sql);

header("Location: ../view/fornecedores.php");

?>