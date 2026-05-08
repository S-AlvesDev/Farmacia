<?php

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}

if($_SESSION['cargo'] != 'operador') {

    echo "Apenas operadores podem acessar.";

    exit;

}

include("../config/conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Acesso</title>

    <link rel="stylesheet" href="../styles/dashboard.css?v=9">

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

            <h2>Gerenciar Acessos</h2>

            <table>

                <tr>

                    <th>ID</th>

                    <th>Email</th>

                    <th>Cargo</th>

                    <th>Alterar</th>

                </tr>

                <?php

                $sql = "SELECT * FROM usuarios";

                $resultado = mysqli_query($conn, $sql);

                while($dados = mysqli_fetch_assoc($resultado)) {

                ?>

                <tr>

                    <td>
                        <?php echo $dados['id']; ?>
                    </td>

                    <td>
                        <?php echo $dados['email']; ?>
                    </td>

                    <td>
                        <?php echo $dados['cargo']; ?>
                    </td>

                    <td>

                    <?php if($dados['email'] == 'jonatas.lopes@escolar.ifrn.edu.br') { ?>

                        Desenvolvedor

                    <?php } else { ?>

                        <form action="../controller/alterar_cargo.php" method="POST">

                            <input
                            type="hidden"
                            name="id"
                            value="<?php echo $dados['id']; ?>">

                            <select name="cargo">

                                <option value="visitante">
                                    Visitante
                                </option>

                                <option value="membro">
                                    Membro
                                </option>

                                <option value="operador">
                                    Operador
                                </option>

                            </select>

                            <button type="submit">
                                Salvar
                            </button>

                        </form>

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