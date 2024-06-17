<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('classes/Usuario.class.php');

    $u = new Usuario();
    $u->nome = strip_tags($_POST['nome']);
    $u->email = strip_tags($_POST['email']);
    $u->telefone = strip_tags($_POST['telefone']);
    $u->senha = strip_tags($_POST['senha']);

    // Verificar por dados inválidos:
    if ($u->nome == "" || $u->email == "" || $u->senha == "") {
        header('Location: ../login.php?falha=cadastrousuario');

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
            if ($u->CadastrarComFoto() == 1) {
                header('Location: ../login.php?sucesso=cadastrousuario');
                die();
            } else {
                header('Location: ../login.php?falha=cadastrousuario');
                die();
            }
        } else {
            echo "Falha ao mover a imagem.";
        }
    } else {
        // Cadastrar sem foto:
        if ($u->CadastrarSemFoto() == 1) {
            // Redirecionar de volta para login:
            header('Location: ../login.php?sucesso=cadastrousuario');
            die();
        } else {
            header('Location: ../login.php?falha=cadastrousuario');
            die();
        }
    }
} else {
    echo 'Erro. A página deve ser carregada por POST';
}
