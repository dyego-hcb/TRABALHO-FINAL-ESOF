<?php
    session_start();
    include_once('config.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['fieldEmail']) == true) and (!isset($_SESSION['fieldSenha']) == true))
    {
        unset($_SESSION['fieldEmail']);
        unset($_SESSION['fieldSenha']);
        $estaLogado = 0;
    }
    else
    {
        $estaLogado = 1;
        $sql = "SELECT nome FROM usuarios WHERE email = '$_SESSION[fieldEmail]'";
        $result = $conexao->query($sql);
        $user_data = mysqli_fetch_assoc($result);
        $logado = $user_data['nome'];
    }
    $sql_tenis = "SELECT * FROM tenis ORDER BY idTenis DESC";
    $result_tenis = $conexao->query($sql_tenis); 
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="shortcut icon" href="../icone/favicon.ico">
        <title>Inside Sports</title>
    </head>
    <body>
        <div class="d-flex flex-column wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom shadow-sm mb-3">
                <div class="container">
                    <a class="navbar-brand" href="home.php">
                        <img
                            src="../img/INSIDE_SPORTS_LOGO_VETORIZADO.png"
                            width="40"
                            height="40"
                            class="d-inline-block align-items-center"
                            alt=""
                        >
                        <b>Inside Sports</b>
                    </a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target=".navbar-collapse"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav flex-grow-1">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="contact.php">Contato</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="navbarDropdownMenuLink"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Produtos
                                </a>
                                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-white" href="vestuarioMasculino.php">Roupas Masculinas</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-white" href="vestuarioFeminino.php">Roupas Femininas</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-white" href="tenisMasculinos.php">Tenis Masculino</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-white" href="tenisFeminino.php">Tenis Feminino</a>
                                </div>
                            </li>
                        </ul>
                        <div class="align-self-end">
                            <ul class="navbar-nav">
                            <li class="nav-item">
                                    <?php
                                        if($estaLogado == 1)
                                        {
                                            echo "<a class='nav-link text-white' href='areaCliente.php'>Logado como <b>$logado</b></a>";
                                        }
                                        else
                                        {
                                            echo "<a href='loginUsuario.php' class='nav-link text-white'>Login</a>";
                                        }
                                    ?>
                                </li>
                                <li class="nav-item">
                                    <?php
                                        if($estaLogado == 1)
                                        {
                                            echo "<a class='nav-link text-white' href='deslogarConta.php'>Sair</a>";
                                        }
                                        else
                                        {
                                            echo "<a href='cadastrarUsuario.php' class='nav-link text-white'>Cadastrar</a>";   
                                        }
                                    ?>
                                </li>
                                <li class="nav-item">
                                    <span class="badge rounded-pill bg-light text-dark position-absolute ms-4 mt-0" titel="0 Produtos no Carrinho">
                                        <small>0</small>
                                    </span>
                                    <a href="cart.php" class="nav-link text-white">
                                        <i class="bi-cart" style="font-size:24px; line-height: 24px;"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <main class="flex-fill">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <form class="justify-content-center justify-content-md-start mb-3 mb-md-0">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control me-2" name="buscaProduto" id="buscaProduto" placeholder="Digite aqui o que voce procura">
                                        <button class="btn btn-Amarelo" id="buttonBuscarHome" name="buttonBuscarHome" onclick='buscarNomeProduto()'>Buscar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
                                    <form class="d-inline-block">
                                        <select class="form-select form-select-sm">
                                            <option>Ordenar pelo nome</option>
                                            <option>Ordenar pelo menor preço</option>
                                            <option>Ordenar pelo maior preço</option>
                                        </select>
                                    </form>
                                    <nav class="d-inline-block me-3">
                                        <ul class="pagination pagination-sm my-0">
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">4</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">5</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">6</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
        
                        <hr mt-3>
                        
                        <h2>Tenis Feminino</h2>
                        <div class="row g-3" id="resultado">
                            <h2>Tenis Feminino</h2>
                        </div>
        
                        <hr class="mt-3">
        
                        <div class="row pb-3">
                            <div class="col-12">
                                <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
                                    <form class="d-inline-block">
                                        <select class="form-select form-select-sm">
                                            <option>Ordenar pelo nome</option>
                                            <option>Ordenar pelo menor preço</option>
                                            <option>Ordenar pelo maior preço</option>
                                        </select>
                                    </form>
                                    <nav class="d-inline-block me-3">
                                        <ul class="pagination pagination-sm my-0">
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">4</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">5</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">6</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="border-top text-muted">
                    <div class="bg-dark">
                        <div class="container">
                            <h6 class="text-Amarelo text-center pt-2">Formas de Pagamento</h6>
                            <div class="row py-4 d-flex aling-items-center">
                                <div class="col-md-12 text-center">
                                    <img src="../img/IMAGENS INSIDE/Formas de pagamento/fc-american-express.svg" class="mr-4" width="50px">
                                    <img src="../img/IMAGENS INSIDE/Formas de pagamento/fc-amex.svg" class="mr-4" width="50px">
                                    <img src="../img/IMAGENS INSIDE/Formas de pagamento/fc-aura.svg" class="mr-4" width="50px">
                                    <img src="../img/IMAGENS INSIDE/Formas de pagamento/fc-banco-brasil.svg" class="mr-4" width="50px">
                                    <img src="../img/IMAGENS INSIDE/Formas de pagamento/fc-banco-do-brasil.svg" class="mr-4" width="50px">
                                    <img src="../img/IMAGENS INSIDE/Formas de pagamento/fc-bndes-1.svg" class="mr-4" width="50px">
                                    <img src="../img/IMAGENS INSIDE/Formas de pagamento/fc-bndes.svg" class="mr-4" width="50px">
                                    <img src="../img/IMAGENS INSIDE/Formas de pagamento/fc-boleto.svg" class="mr-4" width="50px">
                                    <img src="../img/IMAGENS INSIDE/Formas de pagamento/fc-bradesco.svg" class="mr-4" width="50px">
                                    <img src="../img/IMAGENS INSIDE/Formas de pagamento/fc-caixa-economica-federal.svg" class="mr-4" width="50px">
                                    <img src="../img/IMAGENS INSIDE/Formas de pagamento/fc-caixa-economica.svg" class="mr-4" width="50px">
                                    <img src="../img/IMAGENS INSIDE/Formas de pagamento/fc-cielo.svg" class="mr-4" width="50px">
                                    <hr class="text-Amarelo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row py-3">
                            <div class="col-12 col-md-4 text-center">
                                &copy; 2022 - Inside Sports Ltda ME
                                <br>
                                Rua Olegario Maciel, 221, Patos de Minas - MG
                                <br>
                                CNPJ 12.345.678/0001-21
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <a href="politicasPrivacidade.php" class="text-decoration-none text-dark">Politicas de Privacidade</a>
                                <br>
                                <a href="termosUso.php" class="text-decoration-none text-dark">Termos de Uso</a>
                                <br>
                                <a href="aboutInsideSports.php" class="text-decoration-none text-dark">Quem Somos</a>
                                <br>
                                <a href="trocasDevloucoes.php" class="text-decoration-none text-dark">Trocas e Devolucoes</a>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <a href="contact.php" class="text-decoration-none text-dark">Contato pelo Site</a>
                                <br>
                                Email:
                                <a href="mailto:insideSports@gmail.com" class="text-decoration-none text-dark">insidesportsoficial@gmail.com</a>
                                <br>
                                Telefone:
                                <a href="phone:34999208912" class="text-decoration-none text-dark">(34) 9 9920-8912</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <script src="../javascript/index.js" charset="utf-8"></script>
            <script src="../javascript/ajaxIndex.js" charset="utf-8"></script>
            <script src="../javascript/jqueryIndex.js" charset="utf-8"></script>
        </body>
    </html>