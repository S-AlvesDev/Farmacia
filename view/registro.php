<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Farmácia</title>

    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>

    <div class="container">

        <div class="card">

            <img src="../img/logo.jpg" alt="Farmácia" class="logo">

            <form action="../controller/registro.php" method="POST">

                <label>Nome</label>
                <input type="text" name="nome" placeholder="Digite seu Nome" required>

                <label>Email</label>
                <input type="email" name="email" placeholder="Digite seu Email" required>

                <label>Senha</label>

                <div class="password-box">
                    <input type="password" name="senha" placeholder="Digite sua Senha" required>
                </div>

                <button type="submit">
                    Registrar
                </button>

            </form>

            <p class="signup">
                Já tem conta?
                <a href="login.php">Entrar</a>
            </p>

        </div>

    </div>

</body>

</html>