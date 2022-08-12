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

    $sql = "SELECT idusuarios FROM usuarios WHERE email = '$_SESSION[fieldEmail]'";
    $result = $conexao->query($sql);
    $user_data = mysqli_fetch_assoc($result);
    $iduser = $user_data['idusuarios'];

    $sql = "SELECT senha FROM usuarios WHERE idusuarios = '$iduser'";
    $result = $conexao->query($sql);
    $user_data = mysqli_fetch_assoc($result);
    $senha_atual = $user_data['senha'];
    $senha_atual_entrada = $_POST['fieldSenhaAtual'];
    $nova_senha = $_POST['fieldNovaSenha'];
    $nova_senha_confirma = $_POST['fieldNovaSenhaConfirma'];

    if(isset($_POST['update']))
    {
        if($senha_atual == $senha_atual_entrada)
        {
            if($nova_senha == $nova_senha_confirma)
            {
                $sqlUpdate = "UPDATE usuarios SET senha='$nova_senha' WHERE idusuarios = '$iduser'";
                $result = $conexao->query($sqlUpdate);
                echo '<script>alert("Senha Alterada com Sucesso!!")</script>';
                header('Location: areaCliente.php');
            }
            else
            {
                header('Location: clienteAlterarSenha.php');
                echo '<script>alert("Nova senha nao confere, digite novamente!!")</script>';
            }
        }
        else
        {
            header('Location: clienteAlterarSenha.php');
            echo '<script>alert("Senha atual errada!!")</script>';
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
        <title>Inside Sports : Alteracao Senha</title>
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
                                    <a href="clientePedidos.php" class="list-group-item list-group-item-action">
                                        <i class="bi-truck fs-6"></i> Pedidos
                                    </a>
                                    <a href="clienteFavoritos.php" class="list-group-item list-group-item-action">
                                        <i class="bi-heart fs-6"></i> Favoritos
                                    </a>
                                    <a href="clienteAlterarSenha.php" class="list-group-item list-group-item-actiont bg-Amarelo text-light">
                                        <i class="bi-lock fs-6"></i> Alterar Senha
                                    </a>
                                    <a href="deslogarConta.php" class="list-group-item list-group-item-action">
                                        <i class="bi-door-open fs-6"></i> Sair
                                    </a>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="container">
                                    <h3 class>Alterar Senha</h3>
                                </div>
                                <form action="clienteAlterarSenha.php" method="POST" class="col-sm-12 col-md-8 col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" id="fieldSenhaAtual" name="fieldSenhaAtual" class="form-control" placeholder=" " autofocus>
                                        <label for="txtSenhaAtual">Digite aqui sua senha atual</label>
                                    </div>
        
                                    <div class="form-floating mb-3">
                                        <input type="password" id="fieldNovaSenha" name="fieldNovaSenha" class="form-control" placeholder=" ">
                                        <label for="txtSenha">Digite aqui sua nova senha</label>
                                    </div>
            
                                    <div class="form-floating mb-3">
                                        <input type="password" id="fieldNovaSenhaConfirma" name="fieldNovaSenhaConfirma" class="form-control" placeholder=" ">
                                        <label for="txtConfSenha">Digite novamente aqui a nova senha</label>
                                    </div>
            
                                    <input type="submit" name="update" id="submit" class="btn btn-lg btn-Amarelo" value="Alterar Senha"/>
                                </form>
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
