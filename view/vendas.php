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

    <title>Vendas</title>

    <link rel="stylesheet" href="../styles/dashboard.css?v=4">

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

            <div class="welcome-box">

                <h2>Vendas</h2>

                <form action="../controller/vendas.php" method="POST">

                    <input type="text" name="produto" placeholder="Produto">

                    <input type="text" name="cliente" placeholder="Cliente">

                    <input type="text" name="quantidade" placeholder="Quantidade">

                    <input type="text" name="total" placeholder="Total">

                    <button type="submit">
                        Registrar Venda
                    </button>

                </form>

                <table>

                    <tr>

                        <th>ID</th>

                        <th>Produto</th>

                        <th>Cliente</th>

                        <th>Quantidade</th>

                        <th>Total</th>

                        <th>Ações</th>

                    </tr>

                    <?php

                    $sql = "SELECT * FROM vendas";

                    $resultado = mysqli_query($conn, $sql);

                    while($dados = mysqli_fetch_assoc($resultado)) {

                    ?>

                    <tr>

                        <td><?php echo $dados['id']; ?></td>

                        <td><?php echo $dados['produto']; ?></td>

                        <td><?php echo $dados['cliente']; ?></td>

                        <td><?php echo $dados['quantidade']; ?></td>

                        <td>R$ <?php echo $dados['total']; ?></td>

                        <td>

                            <div class="acoes">

                                <a class="btn-editar"
                                href="editar_venda.php?id=<?php echo $dados['id']; ?>">
                                    Editar
                                </a>

                                <a class="btn-excluir"
                                href="../controller/excluir_venda.php?id=<?php echo $dados['id']; ?>">
                                    Excluir
                                </a>

                            </div>

                        </td>

                    </tr>

                    <?php } ?>

                </table>

            </div>

        </div>

    </div>

</body>

</html>