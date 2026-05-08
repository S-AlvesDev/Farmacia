<?php

session_start();

if($_SESSION['cargo'] != 'operador') {

    echo "Sem permissão";

    exit;

}

include("../config/conexao.php");

$id = $_POST['id'];

$cargo = $_POST['cargo'];

$sql_busca = "SELECT * FROM usuarios WHERE id = '$id'";

$resultado = mysqli_query($conn, $sql_busca);

$dados = mysqli_fetch_assoc($resultado);

if($dados['email'] == 'jonatas.lopes@ifrn.edu.br') {

    echo "Este operador não pode ser alterado.";

    exit;

}

$sql = "UPDATE usuarios SET

cargo = '$cargo'

WHERE id = '$id'";

mysqli_query($conn, $sql);

header("Location: ../view/acesso.php");

?>