<?php

include("../config/conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM vendas WHERE id = '$id'";

$resultado = mysqli_query($conn, $sql);

$dados = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar Venda</title>

    <link rel="stylesheet" href="../styles/dashboard.css?v=4">

</head>

<body>

<div class="overlay">

<div class="content">

<div class="welcome-box">

<h2>Editar Venda</h2>

<form action="../controller/atualizar_venda.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

    <input type="text" name="produto" value="<?php echo $dados['produto']; ?>">

    <input type="text" name="cliente" value="<?php echo $dados['cliente']; ?>">

    <input type="text" name="quantidade" value="<?php echo $dados['quantidade']; ?>">

    <input type="text" name="total" value="<?php echo $dados['total']; ?>">

    <button type="submit">
        Atualizar
    </button>

</form>

</div>

</div>

</div>

</body>

</html>