<?php

// Verificar se a sessão existe:
session_start();
if(!isset($_SESSION['usuario'])){
    echo "Você não está logado.";
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('classes/Estacionamento.class.php');

    $v = new Estacionamento();
    $v->placa = strip_tags($_POST['placa']);
    $v->celular = strip_tags($_POST['celular']);
    $v->convenio = strip_tags($_POST['convenio']);
    $v->id_tipo = strip_tags($_POST['id_tipo']);
    $v->observacoes = strip_tags($_POST['observacoes']);

    // Verificar por dados inválidos:
        if(strlen($v->placa) !=7 || $v->celular == ""){
            header('Location: ../index.php');
            die();
        }

        if($v->Editar() === 1){
            header ('Location: ../index.php?sucesso=editarveiculo');
            die();
        }
        else{
            header ('Location: ../index.php?falha=editarveiculo');
            die();
        }

}
else{
    echo "Erro. A página deve ser carregada por POST.";
}

?>