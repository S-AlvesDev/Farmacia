<?php

session_start();

include("../config/conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios
WHERE email = '$email'
AND senha = '$senha'";

$resultado = mysqli_query($conn, $sql);

if(mysqli_num_rows($resultado) > 0) {

    $dados = mysqli_fetch_assoc($resultado);

    $_SESSION['email'] = $dados['email'];

    $_SESSION['cargo'] = $dados['cargo'];

    header("Location: ../view/dashboard.php");

}

else {

    echo "Email ou senha incorretos";

}

?>