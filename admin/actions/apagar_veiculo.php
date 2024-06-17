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
        $v = new Estacionamento();
        // Obtendo o id da URL:
        $v->id = $_GET['id'];
        if($v->Apagar() == 1){
            // Redirecionar de volta ao index.php:
            header('Location: ../index.php?sucesso=removerveiculo');
            die();
        }else{
            header('Location: ../index.php?falha=removerveiculo');
            die();
        }
    }else{
        echo "Erro! Informe o ID a ser apagado.";
    }

?>