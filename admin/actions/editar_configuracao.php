<?php

// Verificar se a sessão existe:
session_start();
if (!isset($_SESSION['usuario'])) {
    echo "Você não está logado.";
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('classes/Configuracao.class.php');

    $config = new Configuracao();
    $config->valor = [strip_tags($_POST['nomeestacionamento']), strip_tags($_POST['totalvagas'])];

    // Verificar por dados inválidos: 
    if (strlen($config->valor[0]) == "" || strlen($config->valor[1]) == "") {
        header('Location: ../index.php');
        die();
    }

    if ($config->Editar() > 0) {
        header('Location: ../index.php?sucesso=editarconfig');
        die();
    } else {
        header('Location: ../index.php?falha=editarconfig');
        die();
    }
} else {
    echo "Erro. A página deve ser carregada por POST.";
}
