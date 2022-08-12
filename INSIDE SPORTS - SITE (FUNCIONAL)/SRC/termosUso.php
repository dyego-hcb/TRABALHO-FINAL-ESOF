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
        <title>Inside Sports : Termos de Uso</title>
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
                        <h2>1. Termos</h2>
                        <p>
                            Ao acessar ao site
                            <a href="home.php">Inside Sports</a>
                            , concorda em cumprir estes termos de serviço, todas as leis e regulamentos aplicáveis ​​e concorda que é responsável pelo cumprimento de todas as leis locais aplicáveis. Se você não concordar com algum desses termos, está proibido de usar ou acessar este site. Os materiais contidos neste site são protegidos pelas leis de direitos autorais e marcas comerciais aplicáveis.
                        </p>
                        <h2>2. Uso de Licença</h2>
                        <p>É concedida permissão para baixar temporariamente uma cópia dos materiais (informações ou software) no site Inside Sports , apenas para visualização transitória pessoal e não comercial. Esta é a concessão de uma licença, não uma transferência de título e, sob esta licença, você não pode:</p>
                        <ol>
                            <li>modificar ou copiar os materiais;</li>
                            <li>usar os materiais para qualquer finalidade comercial ou para exibição pública (comercial ou não comercial);</li>
                            <li>
                                tentar descompilar ou fazer engenharia reversa de qualquer software contido no site Inside Sports;
                            </li>
                            <li>remover quaisquer direitos autorais ou outras notações de propriedade dos materiais; ou</li>
                            <li>
                                transferir os materiais para outra pessoa ou 'espelhe' os materiais em qualquer outro servidor.
                            </li>
                        </ol>
                        <p>Esta licença será automaticamente rescindida se você violar alguma dessas restrições e poderá ser rescindida por Inside Sports a qualquer momento. Ao encerrar a visualização desses materiais ou após o término desta licença, você deve apagar todos os materiais baixados em sua posse, seja em formato eletrônico ou impresso.</p>
                        <h2>3. Isenção de responsabilidade</h2>
                        <ol>
                            <li>Os materiais no site da Inside Sports são fornecidos 'como estão'. Inside Sports não oferece garantias, expressas ou implícitas, e, por este meio, isenta e nega todas as outras garantias, incluindo, sem limitação, garantias implícitas ou condições de comercialização, adequação a um fim específico ou não violação de propriedade intelectual ou outra violação de direitos.</li>
                            <li>Além disso, o Inside Sports não garante ou faz qualquer representação relativa à precisão, aos resultados prováveis ​​ou à confiabilidade do uso dos materiais em seu site ou de outra forma relacionado a esses materiais ou em sites vinculados a este site.</li>
                        </ol>
                        <h2>4. Limitações</h2>
                        <p>Em nenhum caso o Inside Sports ou seus fornecedores serão responsáveis ​​por quaisquer danos (incluindo, sem limitação, danos por perda de dados ou lucro ou devido a interrupção dos negócios) decorrentes do uso ou da incapacidade de usar os materiais em Inside Sports, mesmo que Inside Sports ou um representante autorizado da Inside Sports tenha sido notificado oralmente ou por escrito da possibilidade de tais danos. Como algumas jurisdições não permitem limitações em garantias implícitas, ou limitações de responsabilidade por danos conseqüentes ou incidentais, essas limitações podem não se aplicar a você.</p>
                        <h2>5. Precisão dos materiais</h2>
                        <p>Os materiais exibidos no site da Inside Sports podem incluir erros técnicos, tipográficos ou fotográficos. Inside Sports não garante que qualquer material em seu site seja preciso, completo ou atual. Inside Sports pode fazer alterações nos materiais contidos em seu site a qualquer momento, sem aviso prévio. No entanto, Inside Sports não se compromete a atualizar os materiais.</p>
                        <h2>6. Links</h2>
                        <p>A Inside Sports não analisou todos os sites vinculados ao seu site e não é responsável pelo conteúdo de nenhum site vinculado. A inclusão de qualquer link não implica endosso por Inside Sports do site. O uso de qualquer site vinculado é por conta e risco do usuário.</p>
                    </p>
                    <h3>Modificações</h3>
                    <p>A Inside Sports pode revisar estes termos de serviço do site a qualquer momento, sem aviso prévio. Ao usar este site, você concorda em ficar vinculado à versão atual desses termos de serviço.</p>
                    <h3>Lei aplicável</h3>
                    <p>Estes termos e condições são regidos e interpretados de acordo com as leis do Inside Sports e você se submete irrevogavelmente à jurisdição exclusiva dos tribunais naquele estado ou localidade.</p>
                    <br>
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
