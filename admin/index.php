<?php
// Painel de administração
require_once('actions/classes/Estacionamento.class.php');
require_once('actions/classes/FilaDeServico.class.php');
require_once('actions/classes/Registro.class.php');
require_once('actions/classes/Tipo.class.php');
require_once('actions/classes/Servico.class.php');
require_once('actions/classes/Usuario.class.php');
require_once('actions/classes/Configuracao.class.php');

session_start();
// Verificar se a sessão não existe:
if (!isset($_SESSION['usuario'])) {
    // Voltar ao login:
    header('Location: login.php');
    die();
}

// Puxar os tipos:
$t = new Tipo();
$tipos = $t->Listar();

$u = new Usuario();

$serv = new Servico();
$listserv = $serv->Listar();

//PEGAR PRIMEIRO NÚMERO
$PrimeiroNome = (explode(" ", $_SESSION['usuario']['nome']));


$e = new Estacionamento();
$list = $e->Listar();
$list_mensalistas = $e->ListarMensalistas();
$list_avulsos = $e->ListarAvulsos();
$vagaslivres = $e->ObterVagasLivres();

$c = new Configuracao();
$config = $c->Listar();

//teste diferenças entre horas

// $originalTime = new DateTimeImmutable("2024-06-10 19:40:49");
// $targedTime = new DateTimeImmutable("2024-06-12 19:45:43");
// $interval = $originalTime->diff($targedTime);
// echo $interval->format("%H:%I:%S (Full days: %a)"), "\n";


// $time2 = "2024-06-15 15:25:21";
// $time1 = "2024-06-15 16:45:09";
// $hourdiff = round((strtotime($time1) - strtotime($time2))/3600, 1);
// echo sprintf ("Horas ".$hourdiff."\n");
// echo ($hourdiff*8.0);



?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel de controle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">

</head>


<body class="bg-dark text-light">
    <div class="row conteudo">
        <div class="col-md-12 col-xs-6">
            <!-- MENU LATERAL -->

            <nav class="navbar navbar-dark bg-black ">
                <div class="container-fluid">
                    <a class="navbar-brand fs-2 fw-bold" href="#" id="Titulo">Estacione Bem</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                        <div class="offcanvas-header">
                            <h3 class="offcanvas-title" id="Titulo">Estacione Bem</h3>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 nav-pills">
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-white " aria-current="page" id="Painel">
                                        <svg class="bi pe-none me-2" width="16" height="16">
                                            <use xlink:href="#home"></use>
                                        </svg>
                                        Painel
                                    </a>
                                </li>
                                <li>
                                    <a href="#" id="RegistroEntrada" class="nav-link text-white">
                                        <svg class="bi pe-none me-2 " width="16" height="16">
                                            <use xlink:href="#entrada"></use>
                                        </svg>
                                        Registro de entrada
                                    </a>
                                </li>
                                <li>
                                    <a href="#" id="MovimentacoesDoDia" class="nav-link text-white">
                                        <svg class="bi pe-none me-2" width="16" height="16">
                                            <use xlink:href="#movimentacoes"></use>
                                        </svg>
                                        Movimentações
                                    </a>
                                </li>
                                <li>
                                    <a href="#" id="Avulso" class="nav-link text-white">
                                        <svg class="bi pe-none me-2" width="16" height="16">
                                            <use xlink:href="#mensalistas"></use>
                                        </svg>
                                        Diárias Avulsas
                                    </a>
                                </li>
                                <li>
                                    <a href="#" id="Mensalistas" class="nav-link text-white">
                                        <svg class="bi pe-none me-2" width="16" height="16">
                                            <use xlink:href="#mensalistas"></use>
                                        </svg>
                                        Mensalistas
                                    </a>
                                </li>
                                <li>
                                    <a href="#" id="HistoricoFinanceiro" class="nav-link text-white">
                                        <svg class="bi pe-none me-2" width="16" height="16">
                                            <use xlink:href="#HistóricoFinanceiro"></use>
                                        </svg>
                                        Histórico financeiro
                                    </a>
                                </li>
                                <li>
                                    <a href="#" id="ControleDeVagas" class="nav-link text-white">
                                        <svg class="bi pe-none me-2" width="16" height="16">
                                            <use xlink:href="#ControleDeVagas"></use>
                                        </svg>
                                        Configurações
                                    </a>
                                </li>
                                <hr>
                            </ul>

                            <div class="dropdown p-4 ">

                                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="fotos/<?= $_SESSION['usuario']['foto']; ?>" alt="Foto" width="32" height="32" class="rounded-circle me-2">
                                    <strong><?= ($PrimeiroNome[0]) ?></strong>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                    <li><a class="dropdown-item" href="#" type="button" data-bs-toggle="modal" data-bs-target="#modalPerfil">Perfil</a></li>
                                    <li><a class="dropdown-item" href="#" type="button" data-bs-toggle="modal" data-bs-target="#modalEditarPerfil">Editar perfil</a></li>
                                    <li><a class="dropdown-item" href="#" type="button" data-bs-toggle="modal" data-bs-target="#modalEditarSenha">Editar Senha</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="actions/sair.php">Sair</a></li>
                                </ul>

                            </div>
                        </div>
                        <ul>
                            <br>
                            <a href="../pagina_inicial/index.php" id="voltarpinicial" class="nav-link text-white">
                                <svg class="bi pe-none" width="16" height="16">
                                    <use xlink:href="#"></use>
                                </svg>
                                <i class="bi bi-arrow-return-left"></i> Voltar a Página Inicial
                            </a>
                        </ul>
                    </div>
            </nav>

            <!-- PAINEL -->
            <div class="row m-4 justify-content-center">
                <div id="painel" class="col-md-9 col-sm-9 m-3 border">
                    <form class="m-3" action="">
                        <h2 class="mb-4 fw-bolder">Posição atual</h2>
                        <hr>
                        <p class="mb-4 fs-6 opacity-75">Status do estacionamento e versionamento</p>
                        <table class="table">
                            <tr class="table-dark">
                                <th scope="col">CAIXA</th>

                                <td scope="col">Aberto - 10/05/2024 19:30</td>
                            </tr>
                            <tr class="table-dark">
                                <th scope="row">LOCAL</th>
                                <td>Estacione Bem</td>
                            </tr>
                            <tr class="table-dark">
                                <th scope="row">VERSÃO</th>
                                <td>1.0</td>
                            </tr>
                            <tr class="table-dark">
                                <th scope="row">NÍVEL DE ACESSO</th>
                                <td>Administrador</td>
                            </tr>
                            <tr class="table-dark">
                                <th scope="row">ENTRADAS</th>
                                <td>R$ 0,00</td>
                            </tr>
                        </table>
                    </form>
                </div>

                <!-- REGISTRO DE ENTRADA -->
                <div id="entrada" class="col-md-9 col-sm-9 container-md m-2 border">
                    <form class="m-3" action="actions/registrar_veiculo.php" method="POST">

                        <h2 class="mb-4 fw-bolder">Registrar entrada</h2>
                        <p class="mb-4 fs-5 opacity-75">Dados do Veículo</p>
                        <div class="row mb-3">
                            <div class="col-sm-3 col-md-3">
                                <label for="placa" class="form-label fw-bolder">Placa</label>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <input type="text" class="form-control" id="placa" name="placa" placeholder="AAA-1A11">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 col-sm-3">
                                <label for="tipo" class="form-label fw-bolder">Tipo de veículo</label>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <select class="form-select" aria-label="Default select example" id="id_tipo" name="id_tipo">
                                    <option selected>Selecione</option>
                                    <?php foreach ($tipos as $_listartipos) { ?>
                                        <option value="<?= $_listartipos['id']; ?>"><?= $_listartipos['tipo']; ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row fw-bolder">
                            <div class="col-md-3 col-sm-3 mb-2">
                                <label for="tipoDeConvenio" class="form-label ">Tipo De Convênio:</label>
                            </div>
                            <div class="col mb-2">
                                <?php foreach ($listserv as $convenio) { ?>
                                    <input class="form-check-input" type="radio" name="convenio" id="convenio" value="<?= $convenio['id']; ?>">
                                    <label class="form-check-label" for="convenio">
                                        <?= $convenio['servico']; ?>
                                    </label>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 m-3 form-check">
                                <input type="checkbox" id="avarias" class="form-check-input" onclick="MostrarObservacao()">
                                <label class="form-check- fw-bolder" for="observacoes">Possui avarias</label>
                                <!-- Abrir caixa de observações -->
                                <div class="form-floating" id="observacoes" style="display:none">
                                    <textarea class="form-control" name="observacoes" placeholder="Digite as observações/avarias do seu veículo." id="observacoes" style="height: 100px"></textarea>
                                    <label for="observacoes">Avarias</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary m-2 botao border">Registrar</button>
                    </form>
                </div>
                <!-- MOVIMENTAÇÕES -->
                <div id="movimentacoes" class="row justify-content-center">
                    <div class="col-md-9 col-sm-9 container-md m-2 p-3 border">
                        <form class="row" action="">
                            <hr>
                            <h2 class="mb-4 fw-bolder">Movimentações</h2>
                            <p class="mb-4 fs-6 opacity-75 "><span class="fw-bolder">Período</span>
                                <br>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="">
                                    Aberto
                                </label>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Cancelado
                                </label>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Fechado
                                </label>
                            </p>

                            <table class="table">
                                <tr class="table-dark">
                                    <th scope="col">STATUS</th>

                                    <td scope="col">Aberto - 10/05/2024 19:30</td>
                                </tr>
                                <tr class="table-dark">
                                    <th scope="row">AVULSO</th>
                                    <td>1</td>
                                </tr>
                                <tr class="table-dark">
                                    <th scope="row">MENSALISTA</th>
                                    <td>0</td>
                                </tr>
                                <tr class="table-dark">
                                    <th scope="row">ENTRADAS</th>
                                    <td>R$ 0,00</td>
                                </tr>
                                <tr class="table-dark">
                                    <th scope="row"> A RECEBER</th>
                                    <td>R$ 0,00</td>
                                </tr>
                                <tr class="table-dark">
                                    <th scope="row"> CAIXA</th>
                                    <td>R$ 0,00</td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <!-- HISTÓRICO DE MOVIMENTAÇÕES -->
                    <div class="col-md-9 col-sm-9 container-md m-2 p-3 border">
                        <form class="row" action="">
                            <h2 class="mb-4 fw-bolder">Histórico Movimentações</h2>
                            <p class="mb-4 fs-6 opacity-75 "><span class="fw-bolder">Período</span>
                                <br>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="todos" onclick="Listar('todos')" >
                                <label class="form-check-label" for="">
                                    Todos
                                </label>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" onclick="Listar()">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Dia
                                </label>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" onclick="Listar()">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Mês
                                </label>
                            </p>


                            <table class="table" id="ListarTodos">
                                <thead>
                                    <tr class="table-dark">
                                        <th scope="col">Ticket</th>
                                        <th scope="col">Placa</th>
                                        <th scope="col">Convênio</th>
                                        <th scope="col">Entrada</th>
                                        <th scope="col">Saída</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                              
                                <tbody >
                                    
                                    <?php foreach ($list as $mens) { ?>
                                    <tr class="table-dark">
                                    <th scope="row"><?= $mens['id'];?></th>
                                    <td><?= $mens['placa'];?></td>
                                    <td><?= $mens['convenio'];?></td>

                                    
                                    <td><?= $mens['data_entrada'];?></td>
                                    <td><?= $mens['data_saida'];?></td>
                                    
                                    <td><?php  $dataSaida=$mens['data_saida'];
                                    if((($dataSaida != ""))){
                                        $difHora = round((strtotime($mens['data_saida']) - strtotime($mens['data_entrada']))/3600, 1);
                                        echo ("R$ ".$difHora*8);
                                        
                                    }else{
                                    echo("");                                  
                                     }
                                    ?></td>                               
                                   </tr>
                                <?php } ?> 
                                </tbody>

                            </table>
                        </form>
                    </div>
                </div>
                  <!-- Diaria Avulsa -->
                  <div id="avulso" class="col-md-9 col-sm-9 container-md m-2 p-3 border">
                    <form class="row" action="">
                        <hr>
                        <h2 class="mb-4 fw-bolder">Diária Avulsa</h2>
                        
                        <table class="table">
                           
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">Ticket</th>
                                    <th scope="col">Placa</th>
                                    <th scope="col">Entrada</th>
                                    <th scope="col">Saída</th>
                                    <th scope="col">Observações</th>
                                    <th scope="col">Total a pagar</th>
                                    <th scope="col">Pagamento</th>

                                </tr>
                            </thead>
                          
                            <tbody>
                            <?php foreach ($list_avulsos as $mens) { ?>
                                <tr class="table-dark">
                                    <th scope="row"><?= $mens['id'];?></th>
                                    <td><?= $mens['placa'];?></td>
                                    <td><?= $mens['data_entrada'];?></td>
                                    <td><?= $mens['data_saida'];?></td>
                                    <td><?= $mens['observacoes']; ?></td>

                                    <td><?php  $dataSaida=$mens['data_saida'];
                                    if((($dataSaida != ""))){
                                        $difHora = round((strtotime($mens['data_saida']) - strtotime($mens['data_entrada']))/3600, 1);
                                        echo ("R$ ".$difHora*8);
                                        
                                    }else{
                                    echo("");                                  
                                     }
                                    ?></td>

                                    <td><?php if(($mens['pago'] === 1)){
                                        echo("Pago");
                                    }else{
                                        echo(" Pendente");
                                    }
                                    ?></td>
                                </tr>
                                <?php } ?>
                                
                            </tbody>
                            
                        </table>
                    </form>
                </div>

                <!-- Mensalistas -->
                <div id="mensalistas" class="col-md-9 col-sm-9 col-xs-9 container-md m-2 p-3 border">
                    <form class="row" action="">
                        <hr>
                        <h2 class="mb-4 fw-bolder">Mensalistas</h2>
                        <p class="mb-4 fs-6 opacity-75 fw-bold "><span class="fw-bolder">Situação</span>
                            <br>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Ativo
                            </label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Inativo
                            </label>
                        </p>

                        <table class="table">

                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">Ticket</th>
                                    <th scope="col">Placa</th>
                                    <th scope="col">Última entrada</th>
                                    <th scope="col">Última saída</th>
                                    <th scope="col">Observações</th>
                                    <th scope="col">Mensalidade</th>
                                </tr>
                            </thead>

                            <tbody >
                                <?php foreach ($list_mensalistas as $mens) { ?>
                                    <tr class="table-dark">
                                        <th scope="row"><?= $mens['id']; ?></th>
                                        <td><?= $mens['placa']; ?></td>
                                        <td><?= $mens['data_entrada']; ?></td>
                                        <td><?= $mens['data_saida']; ?></td>
                                        <td><?= $mens['observacoes']; ?></td>
                                        <td><?php if (($mens['pago'] === 1)) {
                                                echo ("Pagamento em dia");
                                            } else {
                                                echo ("Pagamento pendente");
                                            }
                                            ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </form>
                </div>

                <!-- CONFIGURAÇÕES -->
                <div id="controleDeVagas" class="row justify-content-center">
                    <div class="col-md-6 container-md m-2 p-3">
                        <div class="card bg-dark text-light border-white p-4">
                            <h2 class="mt-3 negrito">Configurações<br> </h2>
                            <hr>
                            <table class="table mt-3">
                                <?php foreach ($config as $listconfig) { ?>
                                    <tr class="table-dark">
                                        <td class="negrito"><?= $listconfig['nome_configuracao']; ?></td>
                                        <td><?= $listconfig['valor']; ?></td>
                                    </tr>
                                <?php } ?>
                                <button type="button" class="btn btn-primary botao border" data-bs-toggle="modal" data-bs-target="#modalVagas">
                                    Editar
                                </button>
                            </table>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modalVagas" tabindex="-1" aria-labelledby="modalVagasLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-black" id="modalVagasLabel">Editar Vagas</h1>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table mt-3">
                                            <tr>
                                                <th scope="col">Total de vagas</th>
                                                <td> <input type="text" id="totalvagas" name="totalvagas"> </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Vagas livres</th>
                                                <td> <input type="text" id="vagaslivres" name="vagaslivres"> </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Vagas ocupadas</th>
                                                <td> <input type="text" id="vagasocupadas" name="vagasocupadas"> </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary f5821f" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary botao border">Salvar mudanças</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Histórico financeiro (TESTE) -->
                <div class="col-sm-9 col-md-9 m-o justify-content-center" id="relatorio" style="width:100%;max-width:700px"></div>
            </div>
        </div>
        <!-- FOOTER -->
        <div class="footer">Copyright 2024. Todos os Direitos Reservados</div>
    </div>
    <!-- Modal's -->

    <!-- Perfil -->
    <div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="modalperfilLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalperfilnLabel">Perfil</h1>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card p-4 bg-dark text-light">
                        <div class=" image d-flex flex-column justify-content-center align-items-center">
                            <img src="fotos/<?= $_SESSION['usuario']['foto']; ?>" alt="Foto" width="100" class="rounded-circle" /></button>
                            <span class="name mt-3"><?= $_SESSION['usuario']['nome']; ?></span>
                            <span class="idd"><?= $_SESSION['usuario']['email']; ?></span>
                            <div class="text mt-3"> <span>Administrador do Estacionamento<br> </div>
                            <div class=" px-2 rounded mt-4 date "> <span class="join">Ingressou em Junho, 2024</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Editar Perfil -->
    <div class="modal fade" id="modalEditarPerfil" tabindex="-1" aria-labelledby="modaleditarPerfilLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modaleditarPerfilnLabel">Perfil</h1>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="actions/editar_usuario.php" method="POST">
                        <div class=" d-flex justify-content-center align-items-center mb-3">
                            <h4 class="text-center">Configurações do perfil</h4>
                        </div>
                        <div class="image d-flex flex-column justify-content-center align-items-center">
                            <div class="d-flex flex-column align-items-center text-center p-1 ">
                                <img class="rounded-circle" width="150px" src="fotos/<?= $_SESSION['usuario']['foto']; ?>" alt="Foto">
                                <span class="font-weight-bold"><?= $_SESSION['usuario']['nome']; ?></span>
                                <span class="text-light"><?= $_SESSION['usuario']['email']; ?></span><span> </span>
                            </div>

                        </div>
                        <div class="mb-3 d-flex flex-column justify-content-center ">
                            <a>Editar Foto</a>
                            <input type="file" id="fotoProduto" name="foto">
                        </div>
                        <div class="mb-3 d-flex flex-column justify-content-center ">
                            <label for="username">Nome Completo</label>
                            <input value="<?= $_SESSION['usuario']['nome'] ?>" type="text" placeholder="Insira outro nome completo" id="nome" name="nome">
                        </div>
                        <div class="mb-3 d-flex flex-column justify-content-center">
                            <label for="email">Email</label>
                            <input value="<?= $_SESSION['usuario']['email'] ?>" type="email" placeholder="Insira seu novo email" id="email" name="email">
                        </div>
                        <div class="mb-3 d-flex flex-column justify-content-center">
                            <label for="tel">Telefone</label>
                            <input value="<?= $_SESSION['usuario']['telefone'] ?>" type="text" placeholder="Insira seu novo número de telefone celular" id="telefone" name="telefone">
                        </div>
                        <br>

                        <div class="cadastrar mb-3 d-flex flex-column justify-content-center">
                            <button type="submit" class="btn btn-primary botao border" href="#">Editar perfil</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Editar senha -->
    <div class="modal fade" id="modalEditarSenha" tabindex="-1" aria-labelledby="modalEditarSenhaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Senha</h1>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="actions/editar_senha.php" method="POST">
                        <div class="mb-3 d-flex flex-column justify-content-center">
                            <label for="password">Nova Senha</label>
                            <input type="password" placeholder="Insira sua nova senha" id="senha" name="senha">
                        </div>
                        <div class="mb-3 d-flex flex-column justify-content-center">
                            <label for="password">Confirmar Nova Senha</label>
                            <input type="password" placeholder="Insira sua nova senha" id="confirmarSenha" name="confirmarSenha">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary botao border">Salvar Nova Senha</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- teste relatorio -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <script>
        //esconder telas
        $("#entrada").hide();
        $("#movimentacoes").hide();
        $("#mensalistas").hide();
        $("#relatorio").hide();
        $("#controleDeVagas").hide();
        $("#avulso").hide();
        //
        
        // Alternar entre telas:
        $("#RegistroEntrada").click(function() {
            $("#painel").hide();
            $("#movimentacoes").hide();
            $("#entrada").fadeIn();
            $("#mensalistas").hide();
            $("#relatorio").hide();
            $("#controleDeVagas").hide();
            $("#avulso").hide();

        });
        $("#Painel").click(function() {
            $("#painel").fadeIn();
            $("#movimentacoes").hide();
            $("#entrada").hide();
            $("#mensalistas").hide();
            $("#relatorio").hide();
            $("#controleDeVagas").hide();
            $("#avulso").hide();
        });
        $("#MovimentacoesDoDia").on("click", function() {
            $("#movimentacoes").fadeIn();
            $("#movimentacoesHoje").fadeIn();
            $("#painel").hide();
            $("#entrada").hide();
            $("#mensalistas").hide();
            $("#relatorio").hide();
            $("#controleDeVagas").hide();
            $("#avulso").hide();
        });
        $("#Mensalistas").on("click", function() {
            $("#movimentacoes").hide();
            $("#movimentacoesHoje").hide();
            $("#painel").hide();
            $("#entrada").hide();
            $("#relatorio").hide();
            $("#mensalistas").fadeIn();
            $("#controleDeVagas").hide();
            $("#avulso").hide();
        });

        $("#HistoricoFinanceiro").on("click", function() {
            $("#movimentacoes").hide();
            $("#movimentacoesHoje").hide();
            $("#painel").hide();
            $("#entrada").hide();
            $("#mensalistas").hide();
            $("#controleDeVagas").hide();
            $("#relatorio").fadeIn();
            $("#avulso").hide();

        });

        $("#ControleDeVagas").on("click", function() {
            $("#movimentacoes").hide();
            $("#movimentacoesHoje").hide();
            $("#painel").hide();
            $("#entrada").hide();
            $("#mensalistas").hide();
            $("#relatorio").hide();
            $("#controleDeVagas").fadeIn();
            $("#avulso").hide();
        });

        $("#Avulso").on("click", function() {
            $("#movimentacoes").hide();
            $("#movimentacoesHoje").hide();
            $("#painel").hide();
            $("#entrada").hide();
            $("#mensalistas").hide();
            $("#relatorio").hide();
            $("#controleDeVagas").hide();
            $("#avulso").fadeIn();

        });
        //
    function Listar() {
    var checkBox = document.getElementById("todos");
    // Se o checkbox estiver marcado
    if (document.getElementById("todos").checked == true) {
        $("#ListarTodos").fadeIn();
            } else {
                $("#ListarTodos").hide();

            }
    }

        //teste RELATÓRIO FINANCEIRO
        const xArray = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];
        const yArray = [30, 490, 900, 560, 150, 490, 440, 240, 1500, 490, 450, 460, 470];
        const data = [{
            x: xArray,
            y: yArray,
            type: "bar",
            orientation: "v",
            marker: {
                color: "rgba(0,0,255,0.6)"
            }
        }];

        const layout = {
            title: "Histórico financeiro",
            xaxis: {
                title: "Mês"
            },
            yaxis: {
                title: "Real"
            },
        };

        function MostrarObservacao() {
            // Pegar o checkbox
            var checkBox = document.getElementById("avarias");
            // Pegar o texto inserido
            var text = document.getElementById("observacoes");

            // Se o checkbox estiver marcado, mostrar a caixa de texto
            if (checkBox.checked == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }

         

        Plotly.newPlot("relatorio", data, layout);
    </script>

    <?php

    include_once('includes/alertas.include.php');

    ?>

</body>

</html>