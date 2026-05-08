<?php

session_start();

if($_SESSION['cargo'] == 'visitante') {

    echo "Você não tem permissão.";

    exit;

}

include("../config/conexao.php");

$nome = $_POST['nome'];

$cpf = $_POST['cpf'];

$telefone = $_POST['telefone'];

$email = $_POST['email'];

$endereco = $_POST['endereco'];

$sql = "INSERT INTO funcionarios
(nome, cpf, telefone, email, endereco)

VALUES

('$nome', '$cpf', '$telefone', '$email', '$endereco')";

mysqli_query($conn, $sql);

header("Location: ../view/funcionarios.php");

?>