<!DOCTYPE html>
<html>

<head>

    <title>Login - Farmácia</title>

    <link rel="stylesheet" href="../styles/style.css">

</head>

<body>

    <div class="container">

        <div class="card">

            <img src="../img/logo.jpg" alt="Farmácia" class="logo">

            <form action="../controller/login.php" method="POST">

                <label>Email</label>

                <input
                type="text"
                name="email"
                placeholder="Digite seu Email">

                <label>Senha</label>

                <div class="password-box">

                    <input
                    type="password"
                    name="senha"
                    placeholder="Digite sua Senha">

                </div>

                <button type="submit">
                    Login
                </button>

            </form>

            <p class="signup">
                Não tem uma conta?
                <a href="registro.php">Registre-se</a>
            </p>

        </div>

    </div>

</body>

</html>