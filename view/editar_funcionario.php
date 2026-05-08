<?php

include("../config/conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM funcionarios WHERE id = '$id'";

$resultado = mysqli_query($conn, $sql);

$dados = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar Funcionário</title>

    <link rel="stylesheet" href="../styles/dashboard.css?v=7">

</head>

<body>

<div class="overlay">

<div class="content">

<div class="welcome-box">

<h2>Editar Funcionário</h2>

<form action="../controller/atualizar_funcionario.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

    <input type="text" name="nome" value="<?php echo $dados['nome']; ?>">

    <input type="text" name="cpf" value="<?php echo $dados['cpf']; ?>">

    <input type="text" name="telefone" value="<?php echo $dados['telefone']; ?>">

    <input type="email" name="email" value="<?php echo $dados['email']; ?>">

    <input type="text" name="endereco" value="<?php echo $dados['endereco']; ?>">

    <button type="submit">
        Atualizar
    </button>

</form>

</div>

</div>

</div>

</body>

</html>