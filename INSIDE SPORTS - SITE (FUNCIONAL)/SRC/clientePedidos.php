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
        <title>Inside Sports : Pedidos</title>
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
                        <h1>Minha Conta</h1>
                        <div class="row gx-3">
                            <div class="col-4">
                            <div class="list-group mb-3">
                                    <a href="areaCliente.php" class="list-group-item list-group-item-action">
                                        <i class="bi bi-emoji-smile fs-6"></i> Boas Vindas
                                    </a>
                                    <a href="dadosClientes.php" class="list-group-item list-group-item-action">
                                        <i class="bi-person fs-6"></i> Dados Pessoais
                                    </a>
                                    <a href="clienteContato.php" class="list-group-item list-group-item-action">
                                        <i class="bi-mailbox fs-6"></i> Contato
                                    </a>
                                    <a href="clienteEndereco.php" class="list-group-item list-group-item-action">
                                        <i class="bi-house-door fs-6"></i> Endereco
                                    </a>
                                    <a href="clientePedidos.php" class="list-group-item list-group-item-action bg-Amarelo text-light">
                                        <i class="bi-truck fs-6"></i> Pedidos
                                    </a>
                                    <a href="clienteFavoritos.php" class="list-group-item list-group-item-action">
                                        <i class="bi-heart fs-6"></i> Favoritos
                                    </a>
                                    <a href="clienteAlterarSenha.php" class="list-group-item list-group-item-actiont">
                                        <i class="bi-lock fs-6"></i> Alterar Senha
                                    </a>
                                    <a href="deslogarConta.php" class="list-group-item list-group-item-action">
                                        <i class="bi-door-open fs-6"></i> Sair
                                    </a>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="container">
                                    <h3>Pedidos</h3>
                                </div>
                                <form class="row mb-3">
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-floating">
                                            <select class="form-select">
                                                <option value="30" selected>Últimos 30 dias</option>
                                                <option value="60">Últimos 60 dias</option>
                                                <option value="90">Últimos 90 dias</option>
                                                <option value="180">Últimos 180 dias</option>
                                                <option value="360">Últimos 360 dias</option>
                                                <option value="9999">Todo o período</option>
                                            </select>
                                            <label>Mostrar os Pedidos dos</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select">
                                                <option value="1" selected>Mais recentes primeiro</option>
                                                <option value="2">Mais antigos primeiro</option>
                                            </select>
                                            <label>Ordenar Por</label>
                                        </div>
                                    </div>
                                </form>
                                <div class="accordion" id="divPeidosDetalhado">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button
                                                class="accordion-button collapsed"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#pedido00010"
                                            >
                                                <b>Pedido 00010</b>
                                                <span class="mx-1">(realizado em 11/02/2022)</span>
                                            </button>
                                        </h2>
                                        <div id="pedido00010" class="accordion-collapse collapse" data-bs-parent="#divPeidosDetalhado">
                                            <div class="accordion-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Produto</th>
                                                            <th class="text-end">R$ Unit</th>
                                                            <th class="text-center">Quantidade</th>
                                                            <th class="text-end">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th>Camisa Paris Saint Germant</th>
                                                            <th class="text-end">250,00</th>
                                                            <th class="text-center">1</th>
                                                            <th class="text-end">250,00</th>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th class="text-end" colspan="3">Valor do(s) Produto(s):</th>
                                                            <td class="text-end">250,00</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-end" colspan="3">Valor do Frete:</th>
                                                            <td class="text-end">15,00</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-end" colspan="3">Forma de Pagamento:</th>
                                                            <td class="text-end">Credito VISA 1x A vista</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-end" colspan="3">Valor a Pagar:</th>
                                                            <td class="text-end">265,00</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button
                                                class="accordion-button collapsed"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#pedido00011"
                                            >
                                                <b>Pedido 00011</b>
                                                <span class="mx-1">(realizado em 11/03/2022)</span>
                                            </button>
                                        </h2>
                                        <div id="pedido00011" class="accordion-collapse collapse" data-bs-parent="#divPeidosDetalhado">
                                            <div class="accordion-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Produto</th>
                                                            <th class="text-end">R$ Unit</th>
                                                            <th class="text-center">Quantidade</th>
                                                            <th class="text-end">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th>Camisa Paris Saint Germant</th>
                                                            <th class="text-end">250,00</th>
                                                            <th class="text-center">1</th>
                                                            <th class="text-end">250,00</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Chuteira Nike</th>
                                                            <th class="text-end">180,00</th>
                                                            <th class="text-center">1</th>
                                                            <th class="text-end">180,00</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Tenis Addidas</th>
                                                            <th class="text-end">180,00</th>
                                                            <th class="text-center">1</th>
                                                            <th class="text-end">180,00</th>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th class="text-end" colspan="3">Valor do(s) Produto(s):</th>
                                                            <td class="text-end">620,00</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-end" colspan="3">Valor do Frete:</th>
                                                            <td class="text-end">15,00</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-end" colspan="3">Forma de Pagamento:</th>
                                                            <td class="text-end">Credito VISA 1x A vista</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-end" colspan="3">Valor a Pagar:</th>
                                                            <td class="text-end">635,00</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button
                                                class="accordion-button collapsed"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#pedido00012"
                                            >
                                                <b>Pedido 00012</b>
                                                <span class="mx-1">(realizado em 11/02/2022)</span>
                                            </button>
                                        </h2>
                                        <div id="pedido00012" class="accordion-collapse collapse" data-bs-parent="#divPeidosDetalhado">
                                            <div class="accordion-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Produto</th>
                                                            <th class="text-end">R$ Unit</th>
                                                            <th class="text-center">Quantidade</th>
                                                            <th class="text-end">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th>Camisa Paris Saint Germant</th>
                                                            <th class="text-end">250,00</th>
                                                            <th class="text-center">2</th>
                                                            <th class="text-end">500,00</th>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th class="text-end" colspan="3">Valor do(s) Produto(s):</th>
                                                            <td class="text-end">250,00</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-end" colspan="3">Valor do Frete:</th>
                                                            <td class="text-end">GRATIS</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-end" colspan="3">Forma de Pagamento:</th>
                                                            <td class="text-end">Credito VISA 5x Sem Juros</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-end" colspan="3">Valor a Pagar:</th>
                                                            <td class="text-end">500,00</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
            <script src="../javascript/index.js" charset="utf-8"></script>
            <script src="../javascript/jqueryIndex.js" charset="utf-8"></script>
        </body>
    </html>
