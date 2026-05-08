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

    <title>Funcionários</title>

    <link rel="stylesheet" href="../styles/dashboard.css?v=7">

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

                <h2>Funcionários</h2>

                <?php if($_SESSION['cargo'] != 'visitante') { ?>

                <form action="../controller/funcionarios.php" method="POST">

                    <input type="text" name="nome" placeholder="Nome">

                    <input type="text" name="cpf" placeholder="CPF">

                    <input type="text" name="telefone" placeholder="Telefone">

                    <input type="email" name="email" placeholder="Email">

                    <input type="text" name="endereco" placeholder="Endereço">

                    <button type="submit">
                        Cadastrar
                    </button>

                </form>

                <?php } ?>

                <table>

                    <tr>

                        <th>ID</th>

                        <th>Nome</th>

                        <th>CPF</th>

                        <th>Telefone</th>

                        <th>Email</th>

                        <th>Endereço</th>

                        <th>Ações</th>

                    </tr>

                    <?php

                    $sql = "SELECT * FROM funcionarios";

                    $resultado = mysqli_query($conn, $sql);

                    while($dados = mysqli_fetch_assoc($resultado)) {

                    ?>

                    <tr>

                        <td><?php echo $dados['id']; ?></td>

                        <td><?php echo $dados['nome']; ?></td>

                        <td><?php echo $dados['cpf']; ?></td>

                        <td><?php echo $dados['telefone']; ?></td>

                        <td><?php echo $dados['email']; ?></td>

                        <td><?php echo $dados['endereco']; ?></td>

                        <td>

                            <?php if($_SESSION['cargo'] != 'visitante') { ?>

<div class="acoes">

<a class="btn-editar"
href="editar_funcionario.php?id=<?php echo $dados['id']; ?>">
Editar
</a>

<a class="btn-excluir"
href="../controller/excluir_funcionario.php?id=<?php echo $dados['id']; ?>">
Excluir
</a>

</div>

<?php } ?>

                        </td>

                    </tr>

                    <?php } ?>

                </table>

            </div>

        </div>

    </div>

</body>

</html>