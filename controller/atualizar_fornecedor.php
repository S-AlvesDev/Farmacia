<?php

session_start();

if($_SESSION['cargo'] == 'visitante') {

    echo "Você não tem permissão.";

    exit;

}

include("../config/conexao.php");

$id = $_POST['id'];

$nome = $_POST['nome'];

$cnpj = $_POST['cnpj'];

$telefone = $_POST['telefone'];

$email = $_POST['email'];

$endereco = $_POST['endereco'];

$sql = "UPDATE fornecedores SET

nome = '$nome',
cnpj = '$cnpj',
telefone = '$telefone',
email = '$email',
endereco = '$endereco'

WHERE id = '$id'";

mysqli_query($conn, $sql);

header("Location: ../view/fornecedores.php");

?>