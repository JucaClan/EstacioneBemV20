<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    echo "Você não está logado.";
    die();
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('classes/Usuario.class.php');

    $u = new Usuario();
    $u->senha = strip_tags($_POST['senha']);
    $u->id = $_SESSION['usuario']['id'];

    // Verificar se a nova senha é igual a senha anterior ou se o campo está vazio:
    if ($_POST['senha'] != $_POST['confirmarSenha'] || $u->senha == "") {
        header('Location: ../index.php?falha=editarsenha');
        die();
    }

    if ($u->EditarSenha() == 1) {
        // Redirecionar de volta para login:
        header('Location: ../index.php?sucesso=editarsenha');
        die();
    } else {
        header('Location: ../index.php?falha=editarsenha');
        die();
    }
}
