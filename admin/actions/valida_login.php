<?php

// Verificar se a página foi carregada por POST:
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('classes/Usuario.class.php');
        $u = new Usuario;
        $u->email = $_POST['email'];
        $u->senha = $_POST['senha'];
        $resultado = $u->Logar();

        if(count($resultado) == 1){
            session_start();
            $_SESSION['usuario'] = $resultado[0];
            header('Location: ../index.php');
            die();
        }
        else{
            header('Location: ../login.php?falha=falhalogin');
            die();
        }
            
    }else{
        echo "<h3>A página deve ser carregada por POST</h3>";
    }

?>