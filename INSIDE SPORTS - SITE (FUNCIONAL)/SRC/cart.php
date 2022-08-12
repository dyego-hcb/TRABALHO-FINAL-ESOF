<?php
session_start();
include_once 'config.php';
// print_r($_SESSION);
if (
    !isset($_SESSION['fieldEmail']) == true and
    !isset($_SESSION['fieldSenha']) == true
) {
    unset($_SESSION['fieldEmail']);
    unset($_SESSION['fieldSenha']);
    header('Location: loginUsuario.php');
}
$sql = "SELECT nome FROM usuarios WHERE email = '$_SESSION[fieldEmail]'";
$result = $conexao->query($sql);
$user_data = mysqli_fetch_assoc($result);
$logado = $user_data['nome'];

if (!empty($_GET['idProduto'])) {
    $idProdutoCarrinho = $_GET['idProduto'];
    // SE A SESSAO CARRINHO N TIVER SIDO CRIADA, A MESMA E CRIADA
    if (!isset($_SESSION['carrinho_final'])) {
        $_SESSION['carrinho_final'] = array(); //CRIA SESSAO PRA RECEBER UM VETOR POIS SERAO N PRODUTOS
        $countProdutos = sizeof($_SESSION['carrinho_final']);
    }
    // SE A SESSAO TIVER SIDO CRIADA E O ID DO PRODUTO NAO TIVER SIDO PREENCHIDA
    if (!isset($_SESSION['carrinho_final'][$idProdutoCarrinho])) {
        //SERA ADICIONADO 1 PRODUTO AO CARRINHO
        $_SESSION['carrinho_final'][$idProdutoCarrinho] = $idProdutoCarrinho;
        $countProdutos = sizeof($_SESSION['carrinho_final']);
    } else {
    //SE TIVER SIDO PREENCHIDA ADICONA NOVO PROD
        $_SESSION['carrinho_final'][$idProdutoCarrinho] += $idProdutoCarrinho;
        $countProdutos = sizeof($_SESSION['carrinho_final']);
    }

    if($countProdutos == 0)
    {
        $valor_total = 0.00;
    }
    else
    {
        $valor_total = $countProdutos * 160;
    }
}
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
        <title>Inside Sports : Carinho de Compras</title>
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
                                    <?php echo "<a class='nav-link text-white' href='areaCliente.php'>Logado como <b>$logado</b></a>"; ?>
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
                        <h1>Carrinho de Compras</h1>
                            <?php foreach (
                                $_SESSION['carrinho_final']
                                as $idProdutoCarrinhoAtualizado
                            ) {
                                $exibir_carrinho = "SELECT * FROM tenis WHERE idTenis = '$idProdutoCarrinhoAtualizado'";
                                $result = $conexao->query($exibir_carrinho);
                                $carrinho_data = mysqli_fetch_assoc($result);
                                echo "
                                    <ul class='list-group mb-3'>
                                                    <li class='list-group-item py-3'>
                                                    <div class='row g-3'>
                                                    <div class='col-4 col-md-3 col-lg-2'>
                                                    <a href='#'>
                                                        <img src='../img/IMAGENS INSIDE/Chuteira masculina/Chuteira masculina 1.jpg' class='img-thumbnail'>
                                                    </a>
                                                </div>
                                                <div class='col-8 col-md-9 col-lg-7 col-xl-8 text-left aling-self-center'>
                                                <h4>
                                                    <b>
                                                    <a href='#' class='text-decoration-none text-Amarelo'>" .
                                    $carrinho_data['modeloTenis'] .
                                    "</a>
                                                    </b>
                                                </h4>
                                                <h5>" .
                                    $carrinho_data['detalhesTenis'] .
                                    "</h5>
                                                </div>
                                                <div class='col-6 offset-6 col-sm-6 offset-sm-6 col-md-4 offset-md-8 col-lg-3 offset-lg-0 col-xl-2 aling-self-center mt-3'>
                                                    <div class='input-group'>
                                                        <button class='btn btn-outline-dark btn-sm' type='button' id='".$carrinho_data['idTenis']."buttonRemove' onclick='removeItens(this.id)'>
                                                            <i class='bi-caret-down' id='".$carrinho_data['idTenis']."buttonRemove' style='font-size: 16px; line-height: 16px; color: #f7cb15;' onclick='removeItens(this.id)'></i>
                                                        </button>
                                                        <input
                                                            type='text'
                                                            class='form-control text-center border-dark'
                                                            id='".$carrinho_data['idTenis']."qntdCarrinho'
                                                            value='1'
                                                        >
                                                        <button class='btn btn-outline-dark btn-sm' type='button' id='".$carrinho_data['idTenis']."buttonAdd' onclick='addItens(this.id)'>
                                                            <i class='bi-caret-up' id='".$carrinho_data['idTenis']."buttonAdd' style='font-size: 16px; line-height: 16px; color: #f7cb15;' onclick='addItens(this.id)'></i>
                                                        </button>
                                                        <button class='btn btn-outline-danger border-dark btn-sm' type='button'  id='".$carrinho_data['idTenis']."buttonTrash'>
                                                            <i id='".$carrinho_data['idTenis']."buttonTrash' class='bi-trash' style='font-size: 16px; line-height: 16px;'></i>
                                                        </button>
                                                    </div>
                                                    <div class='text-end mt-2'>
                                                        <samll class='text-secondary'>Ate 12x s/ juros.</samll><br>
                                                        <span class='text-dark'>Valor item: R$ 160,00</span>
                                                    </div>
                                                </div>
                                                </div>
                                                </li>";
                            } 
                            echo "<li class='list-group-item py-3'>
                            <div class='text-end'>
                                <h4 class='text-dark mb-3'>
                            Valor Total: R$ ".$valor_total."
                        </h4>
                        <a href='home.php' class='btn btn-outline-success btn-lg'>Continuar Comprando</a>
                        <a href='fechamentoItens.php' class='btn btn-Amarelo btn-lg ms-2 mt-xs-3'>Finalizar Compra</a>
                        </div>
                    </li>
                </ul>
            </div>"
            ?>
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
            <script src="../javascript/jqueryIndex.js" charset="utf-8"></script>
        </body>
    </html>