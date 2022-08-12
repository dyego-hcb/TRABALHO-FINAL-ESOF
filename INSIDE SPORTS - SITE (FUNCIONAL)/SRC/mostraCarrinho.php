<?php foreach (
                                $_SESSION['carrinho']
                                as $idProdutoCarrinhoAtualizado
                            ) {
                                $exibir_carrinho = "SELECT * FROM tenis WHERE idTenis = '$idProdutoCarrinho'";
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
                                                        <button class='btn btn-outline-dark btn-sm' type='button' id='buttonRemove'>
                                                            <i class='bi-caret-down' id='buttonRemove' style='font-size: 16px; line-height: 16px; color: #f7cb15;'></i>
                                                        </button>
                                                        <input
                                                            type='text'
                                                            class='form-control text-center border-dark'
                                                            id='qntdCarrinho'
                                                            value='1'
                                                        >
                                                        <button class='btn btn-outline-dark btn-sm' type='button' id='buttonAdd'>
                                                            <i class='bi-caret-up' id='buttonAdd' style='font-size: 16px; line-height: 16px; color: #f7cb15;'></i>
                                                        </button>
                                                        <button class='btn btn-outline-danger border-dark btn-sm' type='button'>
                                                            <i class='bi-trash' style='font-size: 16px; line-height: 16px;'></i>
                                                        </button>
                                                    </div>
                                                    <div class='text-end mt-2'>
                                                        <samll class='text-secondary'>Ate 12x s/ juros.</samll><br>
                                                        <span class='text-dark'>Valor item: R$ 250,00</span>
                                                    </div>
                                                </div>
                                                </div>
                                            </li>
                                            <li class='list-group-item py-3'>
                                                <div class='text-end'>
                                            <h4 class='text-dark mb-3'>
                                                Valor Total: R$ 250,00
                                            </h4>
                                            <a href='home.php' class='btn btn-outline-success btn-lg'>Continuar Comprando</a>
                                            <a href='fechamentoItens.php' class='btn btn-Amarelo btn-lg ms-2 mt-xs-3'>Finalizar Compra</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>";
                            } ?>