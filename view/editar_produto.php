<?php

include("../config/conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id = '$id'";

$resultado = mysqli_query($conn, $sql);

$dados = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar Produto</title>

    <link rel="stylesheet" href="../styles/dashboard.css?v=3">

</head>

<body>

<div class="overlay">

<div class="content">

<div class="welcome-box">

<h2>Editar Produto</h2>

<form action="../controller/atualizar_produto.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

    <input type="text" name="nome" value="<?php echo $dados['nome']; ?>">

    <input type="text" name="preco" value="<?php echo $dados['preco']; ?>">

    <input type="text" name="quantidade" value="<?php echo $dados['quantidade']; ?>">

    <input type="date" name="validade" value="<?php echo $dados['validade']; ?>">

    <button type="submit">
        Atualizar
    </button>

</form>

</div>

</div>

</div>

</body>

</html>