<?php

// Verificar a sessão:
    session_start();
    if (!isset($_SESSION['usuario'])) {
        echo "Falha! Você precisa estar logado(a).";
        die();
    }

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    require_once('classes/Estacionamento.class.php');
    $v = new Estacionamento();
    $v->placa = strip_tags($_POST['placa']);
    $v->celular = strip_tags($_SESSION['usuario']['telefone']);
    $v->data_entrada = strip_tags(date("Y-m-d H:i:s", time()));
    $v->convenio = strip_tags($_POST['convenio']);
    $v->id_usuario = strip_tags($_SESSION['usuario']['id']);
    $v->id_tipo = strip_tags($_POST['id_tipo']);
    $v->observacoes = strip_tags($_POST['observacoes']);

     // Verificar por dados inválidos:
        if(strlen($v->placa) !=7 || $v->id_tipo == "" || $v->convenio == ""){
          header('Location: ../index.php?falha=registroveiculo');
          
            die();
        }

        if ($v->Cadastrar() == 1) {
           header('Location: ../index.php?sucesso=registroveiculo');
         
            die();

        } else {
           header('Location: ../index.php?falha=registroveiculo');
           
            die();
        }
}
?>