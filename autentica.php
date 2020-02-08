<?php
session_start();
include('conexao.php');

if ( isset($_POST['usuario']) && isset($_POST['senha']) ) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    # criptografar a senha que FOI DIGITADA
    $senha_cripto = md5($senha);

    $sql = $conn->prepare("SELECT * FROM USUARIOS
                            WHERE usuario = '$usuario' AND senha = '$senha_cripto'");
    $sql->execute();
    $result = $sql->fetchAll();

    if ( sizeof($result) > 0 ) {

        # cria a sessao do usuario logado
        $_SESSION['logado'] = true;
        $_SESSION['nome'] = $result[0]['nome']; # armazena em sessao o nome do usuario que veio do DB

        header('location:index.php');

    } else {
        header('location:login.php?falhou=1');
    }
    
} else {
    header('location:login.php');
}

?>