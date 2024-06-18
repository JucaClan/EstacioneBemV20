<?php

// Verificar se a sessão não existe:
    session_start();
    if(!isset($_SESSION['usuario'])){
        echo "Você não está logado.";
        die();
    }

    if(isset($_GET['id'])){
        // Apagar:
        require_once('classes/Estacionamento.class.php');
        $e = new Estacionamento();
        // Obtendo o id da URL:
        $e->id = $_GET['id'];

        if($e->AtualizarSaida() == 1){
            // Redirecionar de volta ao index.php:
           header('Location: ../index.php?sucesso=registrosaida');
        }else{
            header('Location: ../index.php?falha=registrosaida');
        }
    }else{
        echo "Erro! Informe o ID a ser apagado.";
    }

?>