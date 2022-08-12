<?php
    session_start();
    include_once('config.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['fieldEmail']) == true) and (!isset($_SESSION['fieldSenha']) == true))
    {
        unset($_SESSION['fieldEmail']);
        unset($_SESSION['fieldSenha']);
        header('Location: loginUsuario.php');
    }
    $sql = "SELECT nome FROM usuarios WHERE email = '$_SESSION[fieldEmail]'";
    $result = $conexao->query($sql);
    $user_data = mysqli_fetch_assoc($result);
    $logado = $user_data['nome'];
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
        <title>Inside Sports : Forma de Pagamento</title>
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
                                        echo "<a class='nav-link text-white' href='areaCliente.php'>Logado como <b>$logado</b></a>";
                                    ?>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="deslogarConta.php">Sair</a>
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
                        <h1>Selecione a Forma de Pagamento</h1>
                        <h3 class="mb-4">
                            Selecione de pagamento e clique em
                            <b>Continuar</b>
                            para prosseguir para
                            <b>concluir seu pedido</b>
                            .
                        </h3>
                        <div class="d-flex justify-content-between flex-wrap border rounded-top pt-4 px-3">
                            <div class="mb-4 mx-2 flex-even">
                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="pagamento"
                                    autocomplete="off"
                                    id="pagCartao"
                                >
                                <label class="btn btn-outline-amarelo p-4 h-100 w-100" for="pagCartao">
                                    <h3>
                                        <b class="text-dark">Cartao de Credito</b>
                                    </h3>
                                    <hr>
                                    <form action="">
                                        <div class="form-floating mb-3">
                                            <input
                                                type="text"
                                                id="txtNomeCartao"
                                                class="form-control"
                                                placeholder=" "
                                                autofocus
                                            >
                                            <label for="txtNomeCartao" class="text-black-50">Nome Impresso no Cartao</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input
                                                type="text"
                                                id="txtNumeroCartao"
                                                class="form-control"
                                                placeholder=" "
                                                autofocus
                                            >
                                            <label for="txtNumeroCartao" class="text-black-50">Numero do Cartao</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input
                                                type="text"
                                                id="txtValidadeCartao"
                                                class="form-control"
                                                placeholder=" "
                                                autofocus
                                            >
                                            <label for="txtValidadeCartao" class="text-black-50">Validade (MM/AA)</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input
                                                type="text"
                                                id="txtCodSeg"
                                                class="form-control"
                                                placeholder=" "
                                                autofocus
                                            >
                                            <label for="txtCodSeg" class="text-black-50">Codigo Seguraca</label>
                                        </div>
                                        <div class="form-floating">
                                            <select id="selParcelas" class="form-select">
                                                <option value="1" selected>A vista</option>
                                                <option value="2">2x Sem Juros</option>
                                                <option value="3">3x Sem Juros</option>
                                                <option value="4">4x Sem Juros</option>
                                                <option value="5">5x Sem Juros</option>
                                                <option value="6">6x Sem Juros</option>
                                                <option value="7">7x Sem Juros</option>
                                                <option value="8">8x Sem Juros</option>
                                                <option value="9">9x Sem Juros</option>
                                                <option value="10">10x Sem Juros</option>
                                                <option value="11">11x Sem Juros</option>
                                                <option value="12">12x Sem Juros</option>
                                            </select>
                                            <label for="selParcelas" class="text-black-50">Parcelamento</label>
                                        </div>
                                    </form>
                                </label>
                            </div>
                            <div class="mb-4 mx-2 flex-even">
                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="pagamento"
                                    autocomplete="off"
                                    id="pagCash"
                                >
                                <label class="btn btn-outline-amarelo p-4 h-100 w-100" for="pagCash">
                                    <h3>
                                        <b class="text-dark">Dinheiro</b>
                                    </h3>
                                    <hr>
                                    <form action="">
                                        <h4>Valor da Compra:
                                            <b>R$250,00</b>
                                        </h4>
                                        <br>
                                        <p>
                                            Se precisar de troco, informe no campo abaixo.
                                        </p>
                                        <div class="form-floating mb-3">
                                            <input
                                                type="text"
                                                id="txtTroco"
                                                class="form-control"
                                                placeholder=" "
                                                autofocus
                                            >
                                            <label for="txtTroco" class="text-black-50">Precisa de troco para quanto ?</label>
                                        </div>
                                    </form>
                                </label>
                            </div>
                        </div>
                        <div class="text-end border boder-top-0 rounded-bottom-3 p-4 pb-0">
                            <a href="fechamentoEndereco.php" class="btn btn-outline-success btn-lg mb-4">Voltar ao Endereco</a>
                            <a href="fechamentoPedido.php" class="btn btn-Amarelo btn-lg ms-2 mb-4">Finalizar</a>
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
            <script src="../javascript/index.js" charset="utf-8"></script>
            <script src="../javascript/jqueryIndex.js" charset="utf-8"></script>
        </body>
    </html>
