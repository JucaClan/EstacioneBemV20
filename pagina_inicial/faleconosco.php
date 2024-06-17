<!DOCTYPE html>
<html lang="pt-br">


<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Estacione Bem</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <style>
        #termos_e_condicoes,
        #politica_de_privacidade {
            display: none;
        }

        .titulo {
            color: white;
            font-weight: bold;
            font-size: 35px;
        }

        .titulofeedback {
            color: white;
            font-weight: bold;
            font-size: 20px;
        }

        .corbotao {
            background-color: #f5821f;
            color: black;
            border-color: black;
        }

        .corbotao:hover {
            color: #f5821f;
            background-color: white;
            border-color: white;
        }
    </style>
</head>
<!-- body -->

<body class="main-layout">
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container-fluid">
                <div class="row bg-light">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12 logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.php"><img src="images/logo.png" alt="#" width="200px" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Início</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href=" ../admin/login.php">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- banner -->
    <section class="banner_main">
        <div class="container-fluid">
            <div class="row d_flex">
                <div class="col-md-7">
                    <div class="text-bg">
                        <div class="padding_lert">
                            <h1>Fale <br> Conosco! <br> <i class="bi bi-telephone-fill"></i></h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 bah">
                    <div class="bann_img">
                        <figure><img src="images/bann_img.png" alt="#" /></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->

    <!--  footer -->
    <footer>
        <div class="footer">
            <h1 class="titulo mb-5"> Quer enviar um feedback sobre o nosso trabalho? Fique à vontade! </h1>

            <div class="container pb-5 ">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label titulofeedback">Título da Mensagem</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Título do Feedback">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label titulofeedback">Sua Mensagem</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="9" placeholder="Digite sua mensagem"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary corbotao" type="submit">Enviar</button>
            </div>

            <div class="row rodape-1 pb-3 pt-5 border-bottom ">
                <div class="col-md-4 col-12">
                    <a class="" href="faleconosco.php">Fale Conosco</a>
                </div>
                <div class="col-md-4 col-12">
                    <a class="" href="politica.php">Termos de Uso</a>
                </div>
                <div class="col-md-4 col-12">
                    <a class="" href="politica.php">Política de Privacidade</a>
                </div>
            </div>

            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Copyright 2024. Todos os Direitos Reservados</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        // Alternar entre formulários login x cadastro:
        $("#privacidade").click(function() {
            $("#termos_e_condicoes").hide();
            $("#politica_de_privacidade").fadeIn();
        });
        $("#termos").click(function() {
            $("#politica_de_privacidade").hide();
            $("#termos_e_condicoes").fadeIn();
        });
    </script>
</body>




</html>