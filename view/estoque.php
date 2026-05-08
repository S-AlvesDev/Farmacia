<?php

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}

include("../config/conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Estoque</title>

    <link rel="stylesheet" href="../styles/dashboard.css?v=2">

</head>

<body>

    <div class="overlay">

        <div class="topbar">

            <img src="../img/logo.jpg" alt="Logo" class="logo">

            <div class="menu">

    <a href="dashboard.php">Início</a>

    <?php if($_SESSION['cargo'] != 'visitante') { ?>

    <a href="clientes.php">Clientes</a>

    <a href="produtos.php">Produtos</a>

    <a href="vendas.php">Vendas</a>

    <a href="fornecedores.php">Fornecedores</a>

    <?php } ?>

    <a href="funcionarios.php">Funcionários</a>

    <a href="estoque.php">Estoque</a>

    <?php if($_SESSION['cargo'] == 'operador') { ?>

    <a href="acesso.php">Acesso</a>

    <?php } ?>

    <a href="../controller/logout.php">Sair</a>

</div>

        </div>

        <div class="content">

            <div class="welcome-box estoque-box">

                <h2>Estoque</h2>

                <table>

                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Validade</th>
                    </tr>

                    <?php

                    $sql = "SELECT * FROM produtos";

                    $resultado = mysqli_query($conn, $sql);

                    while($dados = mysqli_fetch_assoc($resultado)) {

                    ?>

                    <tr>

                        <td><?php echo $dados['id']; ?></td>

                        <td><?php echo $dados['nome']; ?></td>

                        <td>
                            R$ <?php echo $dados['preco']; ?>
                        </td>

                        <td><?php echo $dados['quantidade']; ?></td>

                        <td><?php echo $dados['validade']; ?></td>

                    </tr>

                    <?php } ?>

                </table>

            </div>

        </div>

    </div>

</body>

</html>