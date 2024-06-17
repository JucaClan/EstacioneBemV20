<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Entrar</title>


</head>

<body>
    <!-- partial:index.partial.html -->
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <!-- Design by foolishdeveloper.com -->
        <title>Glassmorphism login Form Tutorial in html css</title>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
        <!--Stylesheet-->
        <style media="screen">
            *,
            *:before,
            *:after {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }

            body {
                background-color: #080710;
            }

            .background {

                width: 724px;
                height: 500px;
                position: absolute;
                transform: translate(-50%, -50%);
                left: 42%;
                top: 60%;
            }

            .background .shape {
                height: 200px;
                width: 200px;
                position: absolute;
                border-radius: 50%;
            }

            .shape:first-child {
                background: linear-gradient(#1845ad,
                        #23a2f6);
                left: -80px;
                top: -80px;
            }

            .shape:last-child {
                background: linear-gradient(to right,
                        #ff512f,
                        #f5821f);
                right: -30px;
                bottom: -80px;
            }

            form {
                height: 680px;
                width: 400px;
                background-color: rgba(255, 255, 255, 0.13);
                position: absolute;
                transform: translate(-50%, -50%);
                top: 50%;
                left: 50%;
                border-radius: 10px;
                backdrop-filter: blur(10px);
                border: 2px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
                padding: 50px 35px;
            }

            form * {
                font-family: 'Poppins', sans-serif;
                color: #ffffff;
                letter-spacing: 0.5px;
                outline: none;
                border: none;
            }

            form h3 {
                font-size: 32px;
                font-weight: 500;
                line-height: 42px;
                text-align: center;
            }

            label {
                display: block;
                margin-top: 30px;
                font-size: 16px;
                font-weight: 500;
            }

            input {
                display: block;
                height: 50px;
                width: 100%;
                background-color: rgba(255, 255, 255, 0.07);
                border-radius: 3px;
                padding: 0 10px;
                margin-top: 8px;
                font-size: 14px;
                font-weight: 300;
            }

            ::placeholder {
                color: rgb(229, 229, 229);
            }

            button a:hover,
            a.cadastrar:hover {
                padding: 18px 135px;
                border-radius: 5px;
                background-color: #e78229;
                text-decoration: underline;
            }

            .social {
                margin-top: 30px;
                display: flex;
            }

            .social div {
                background: #d49054;
                width: 150px;
                border-radius: 3px;
                padding: 5px 10px 10px 5px;
                background-color: rgba(255, 255, 255, 0.27);
                color: #eaf0fb;
                text-align: center;
            }

            .social div:hover {
                text-decoration: underline;
            }

            .social .fb {
                margin-left: 25px;
            }

            .social i {
                margin-right: 4px;
            }

            .botao {
                margin-top: 50px;
                width: 100%;
                background-color: #f5821f;
                color: white;
                padding: 15px;
                font-size: 18px;
                font-weight: 600;
                border-radius: 5px;
                cursor: pointer;
                display: block;
                text-align: center;
                text-decoration: none;
            }
        </style>
    </head>

    <body>
        <div class="background">
            <img src=" ../Imagens/Marca Dagua2.png" alt="Marca D'água" width="1024px">
        </div>
        <form action="actions/valida_login.php" method="POST">
            <h3><img src=" ../Imagens/logo.png" alt="Logotipo" width="250px"></h3>

            <label for="username">Usuário</label>
            <input type="text" placeholder="Insira seu e-mail " id="usuario" name="email">

            <label for="password">Senha</label>
            <input type="password" placeholder="Insira sua senha" id="senha" name="senha">

            <button class="botao" type="submit">Entrar</button>
            <a class="botao" href="cadastro.php">Cadastre-se</a>

        </form>
    </body>

    </html>
    <!-- partial -->

</body>

<script>
    // Alternar entre formulários login x cadastro:
    $("#btnCadastroToggle").click(function() {
        $("#formLogin").hide();
        $("#formCadastro").fadeIn();
        $("#titulo").text('Cadastro');
    });
    $("#btnLoginToggle").click(function() {
        $("#formCadastro").hide();
        $("#formLogin").fadeIn();
        $("#titulo").text('Login');
    });
</script>
<?php

include_once('includes/alertas.include.php');

?>

</html>