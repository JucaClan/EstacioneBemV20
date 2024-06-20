<?php

// Verificar se a sessão existe:
session_start();
if (!isset($_SESSION['usuario'])) {
    echo "Você não está logado.";
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('classes/Servico.class.php');

    $serv = new Servico();
    $serv->valor = [strip_tags($_POST['servicoavulso']), strip_tags($_POST['servicomensal'])];

    // Verificar por dados inválidos: 
    if (strlen($serv->valor[0]) == "" || strlen($serv->valor[1]) == "") {
        header('Location: ../index.php');
        die();
    }
   
     if ($serv->Editar() > 0) {
          header('Location: ../index.php?sucesso=editarvalor');
         die();
     } else {
          header('Location: ../index.php?falha=editarvalor');
          die();
     }
} else {
    echo "Erro. A página deve ser carregada por POST.";
}