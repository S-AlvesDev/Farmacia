<?php

session_start();

if($_SESSION['cargo'] == 'visitante') {

    echo "Você não tem permissão.";

    exit;

}

include("../config/conexao.php");

$nome = $_POST['nome'];

$cnpj = $_POST['cnpj'];

$telefone = $_POST['telefone'];

$email = $_POST['email'];

$endereco = $_POST['endereco'];

$sql = "INSERT INTO fornecedores
(nome, cnpj, telefone, email, endereco)

VALUES

('$nome', '$cnpj', '$telefone', '$email', '$endereco')";

mysqli_query($conn, $sql);

header("Location: ../view/fornecedores.php");

?>