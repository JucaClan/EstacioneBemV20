<?php

// Verificar se a sessão existe:
session_start();
if (!isset($_SESSION['usuario'])) {
    echo "Você não está logado.";
    die();
}

function atualizarSessao()
{
    $u = new Usuario();
    $u->email = $_POST['email'];
    $u->senha = $_SESSION['usuario']['senha'];
    $_SESSION['usuario'] = $u->Logar()[0];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('classes/Usuario.class.php');

    $u = new Usuario();
    $u->nome = strip_tags($_POST['nome']);
    $u->email = strip_tags($_POST['email']);
    $u->telefone = strip_tags($_POST['telefone']);
    $u->id = strip_tags($_SESSION['usuario']['id']);

    // Verificar por dados inválidos:
    if ($u->nome == "" || $u->email == "" || $u->telefone == "") {
        header('Location: ../index.php?falha=editarusuario');
        die();
    }

    // Verificar se está chegando uma foto do formulário:
    if ($_FILES['foto']['size'] > 0) {
        $destino = "../fotos/";
        // Obter o hash do arquivo:
        $novo_nome = hash_file('md5', $_FILES['foto']['tmp_name']);
        // Obter a extensão do arquivo:
        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        // Montar o novo nome do arquivo:
        $novo_nome = $novo_nome . "." . $extensao;

        // Mover o arquivo para a pasta:
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $destino . $novo_nome)) {
            $u->foto = $novo_nome;
            if ($u->EditarComFoto() == 1) {
                header('Location: ../index.php?sucesso=editarusuario');
                $_SESSION['usuario']['foto'] = $u->foto;
                $_SESSION['usuario']['nome'] = $u->nome;
                $_SESSION['usuario']['email'] = $u->email;
                $_SESSION['usuario']['telefone'] = $u->telefone;
                die();
            } else {
                header('Location: ../index.php?falha=editarusuario');
                die();
            }
        } else {
            echo "Falha ao mover a imagem.";
        }
    } else {
        // Editarr sem foto:
        if ($u->EditarSemFoto() == 1) {
            // Redirecionar de volta para login:

            header('Location: ../index.php?sucesso=editarusuario');
            $_SESSION['usuario']['nome'] = $u->nome;
            $_SESSION['usuario']['email'] = $u->email;
            $_SESSION['usuario']['telefone'] = $u->telefone;
            die();
        } else {
            header('Location: ../index.php?falha=editarusuario');
            die();
        }
    }
} else {
    echo "Erro. A página deve ser carregada por POST.";
}
