<?php

session_start();

if($_SESSION['cargo'] == 'visitante') {

    echo "Você não tem permissão.";

    exit;

}

include("../config/conexao.php");

$id = $_POST['id'];

$nome = $_POST['nome'];

$cpf = $_POST['cpf'];

$telefone = $_POST['telefone'];

$email = $_POST['email'];

$endereco = $_POST['endereco'];

$sql = "UPDATE funcionarios SET

nome = '$nome',
cpf = '$cpf',
telefone = '$telefone',
email = '$email',
endereco = '$endereco'

WHERE id = '$id'";

mysqli_query($conn, $sql);

header("Location: ../view/funcionarios.php");

?>