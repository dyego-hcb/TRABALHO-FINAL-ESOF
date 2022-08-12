<?php
    if(isset($_POST['submit']))
    {
        include_once('config.php');

        #DADOS DO NOVO USUARIO
        $nome = $_POST['fieldNome'];
        $email = $_POST['fieldEmail'];
        $senha = $_POST['fieldSenha'];
        $telefone = $_POST['fieldTell'];
        $cpf = $_POST['fieldCpf'];
        $data_nasc = $_POST['fieldNascimento'];
        $senha_confirmar = $_POST['fieldSenhaConfirmar'];

        #FAZ BUSCA SE EXISTE ALGUM EMAIL JA CADASTRADO
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $conexao->query($sql);

        #SE TIVER ENTRA AQUI CASO NAO ENTRA PARA VERIFICACAO DO CPF E SENHAS
        if(mysqli_num_rows($result) > 0)
        {
            header('Location: cadastrarUsuario.php');
            echo '<script>alert("Email ja cadastrado!!")</script>';
        }
        else
        {
            $sql = "SELECT * FROM usuarios WHERE cpf = '$cpf'";
            $result = $conexao->query($sql);
            #VERIFICA SE EXISTE CPF CADASTRADO, CASO EXISTA NAO CADASTRA E MOSTRA O ALERTA
            if(mysqli_num_rows($result) > 0)
            {
                header('Location: cadastrarUsuario.php');
                echo '<script>alert("CPF ja cadastrado, insira um cpf valido!!")</script>';   
            }
            #CASO NAO EXISTA, ENTRA AQUI E VERIFICA AS SENHAS SE SAO IGUAIS
            else
            {
                #SE AS SENHAS CONFEREM CADASTRA, CASO NAO, NAO REALIZA CADASTRO
                if($senha == $senha_confirmar)
                {
                    $result = mysqli_query($conexao, "INSERT INTO usuarios (email, senha, nome, cpf, data_nascimento, telefone)
                    VALUES ('$email','$senha','$nome','$cpf','$data_nasc','$telefone')");
                
                    #PEGANDO ID DO NOVO USUARIO PARA CADASTRAR O ENDERECO 
                    $sql = "SELECT idusuarios FROM usuarios WHERE email = '$email'";
                    $result = $conexao->query($sql);
                    $user_data = mysqli_fetch_assoc($result);
                
                    #DADOS DO ENDERECO DO NOVO USUARIO
                    $cep = $_POST['fieldCep'];
                    $rua = $_POST['fieldRua'];
                    $bairro = $_POST['fieldBairro'];
                    $cidade = $_POST['fieldCidadde'];
                    $numero = $_POST['fieldNumeroCasa'];
                    $complemento = $_POST['fieldComplemento'];
                    $observacao = $_POST['fieldObservacao'];
                    $id_user_endereco = $user_data['idusuarios'];

                    $result = mysqli_query($conexao, "INSERT INTO endereco (CEP, rua, bairro, cidade, numero, complemento, observacao, id_user_endereco)
                    VALUES ('$cep','$rua','$bairro','$cidade','$numero','$complemento', '$observacao', '$id_user_endereco')");
                    echo '<script>alert("Cadastro feito com sucesso!!")</script>';
                    header('Location: loginUsuario.php');
                }
                else
                {
                    header('Location: cadastrarUsuario.php');
                    echo '<script>alert("Senhas nao conferem, digite novamente !!")</script>';
                }
            }
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
                                    <a href="loginUsuario.php" class="nav-link text-white">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a href="cadastrarUsuario.php" class="nav-link text-white">Cadastrar</a>
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
                        <h1>Informe seus dados, por favor</h1>
                        <hr>
                        <form action="cadastrarUsuario.php" method="POST" class="mt-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <fieldset class="row gx-3">
                                        <legend>Dados Pessoais</legend>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" id="fieldNome" name="fieldNome" placeholder=" " autofocus required/>
                                            <label for="txtNome">Nome</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-6 col-xl-4">
                                            <input class="form-control" type="text" id="fieldCpf" name="fieldCpf" placeholder=" " required/>
                                            <label for="txtCPF">CPF</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-6 col-xl-4">
                                            <input class="form-control" type="date" id="fieldNascimento" name="fieldNascimento" placeholder=" " required/>
                                            <label for="txtDataNascimento" class="d-inline d-sm-none d-md-inline d-lg-none">Data
                                                Nascimento</label>
                                            <label for="txtDataNascimento" class="d-none d-sm-inline d-md-none d-lg-inline">Data
                                                de Nascimento</label>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Contatos</legend>
                                        <div class="form-floating mb-3 col-md-8">
                                            <input class="form-control" type="email" id="fieldEmail" name="fieldEmail" placeholder=" " required/>
                                            <label for="txtEmail">E-mail</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-6">
                                            <input class="form-control" placeholder=" " type="text" name="fieldTell" id="fieldTell" />
                                            <label for="txtTelefone">Telefone</label>
                                        </div>
                                    </fieldset>
                                    <fieldset class="row gx-3">
                                        <legend>Senha de Acesso</legend>
                                        <div class="form-floating mb-3 col-lg-6">
                                            <input class="form-control" type="password" id="fieldSenha" name="fieldSenha" placeholder=" " required/>
                                            <label for="txtSenha">Senha</label>
                                        </div>
                                        <div class="form-floating mb-3 col-lg-6">
                                            <input class="form-control" type="password" id="fieldSenhaConfirmar" name="fieldSenhaConfirmar" placeholder=" " required/>
                                            <label class="form-label" for="txtConfirmacaoSenha">Confirmação da Senha</label>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <fieldset class="row gx-3">
                                        <legend>Endereço</legend>
                                        <div class="form-floating mb-3 col-md-6 col-lg-4">
                                            <input class="form-control" type="text" id="fieldCep" name="fieldCep" placeholder=" " required/>
                                            <label for="txtCEP">CEP</label>
                                        </div>
                                        <div class="mb-3 col-md-6 col-lg-8 align-self-end">
                                            <textarea class="form-control text-muted bg-light"
                                                style="height: 58px; font-size: 14px;"
                                                disabled>Digite o CEP para buscarmos o endereço.</textarea>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" id="fieldRua" name="fieldRua" placeholder=" " required/>
                                            <label for="txtReferencia">Rua</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" id="fieldBairro" name="fieldBairro" placeholder=" " required/>
                                            <label for="txtReferencia">Bairo</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" id="fieldCidadde" name="fieldCidadde" placeholder=" " required/>
                                            <label for="txtReferencia">Cidade</label>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-floating mb-3 col-md-4">
                                            <input class="form-control" type="text" id="fieldNumeroCasa" name="fieldNumeroCasa" placeholder=" " required/>
                                            <label for="txtNumero">Número</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-8">
                                            <input class="form-control" type="text" id="fieldComplemento" name="fieldComplemento" placeholder=" " required/>
                                            <label for="txtComplemento">Complemento</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control" type="text" id="fieldObservacao" name="fieldObservacao" placeholder=" " required/>
                                            <label for="txtReferencia">Observacao Ex: Deixar com a vizinha ao lado</label>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <hr />
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Desejo receber informações sobre promoções.
                                </label>
                            </div>
                            <div class="mb-3 text-left">
                            <input type="submit" name="submit" id="submit" class="btn btn-lg btn-Amarelo" value="Cadastrar-se"/>
                                <a class="btn btn-lg btn-light btn-outline-danger" href="home.php">Cancelar</a>
                            </div>
                        </form>
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
