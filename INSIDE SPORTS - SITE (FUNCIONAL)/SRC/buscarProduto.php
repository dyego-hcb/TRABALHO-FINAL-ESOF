<?php
    include_once('config.php');

    if(isset($_POST["nomeProduto"]))
    {
        $marcaTenisBusca = $_POST["nomeProduto"];
        $sql_busca = "SELECT * FROM tenis WHERE marcaTenis LIKE '%$marcaTenisBusca%'";
    }
    else
    {
        $sql_busca = "SELECT * FROM tenis ORDER BY marcaTenis LIMIT 12";
    }

    $result = $conexao->query($sql_busca);
    $numRows = mysqli_num_rows($result);

    if($numRows>0)
    {
        while($busca_data = mysqli_fetch_assoc($result))
        {
                echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2'>
                    <div class='card text-center bg-light'>
                        <a href='#' class='position-absolute end-0 p-2 text-Amarelo'>
                            <i class='bi-suit-heart' style='font-size: 24px; line-height: 24px;'></i>
                        </a>";
                        echo "<img
                            src='../img/IMAGENS INSIDE/Chuteira masculina/Chuteira masculina 1.jpg'
                            id=".$busca_data['idTenis']."
                            class='card-img-top'
                            alt='...'
                            onmouseout='trocaImgOut(".$busca_data['idTenis'].")'
                            onmouseenter='trocaImgEnter(".$busca_data['idTenis'].")'
                            >";
                        echo "<div class='card-header'>
                            R$ 160,00
                            </div>";
                        echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>".$busca_data['modeloTenis']."</h5>";
                            echo "<p class='card-text truncar-3l'>".$busca_data['detalhesTenis']."</p>";
                        echo "</div>";
                        echo "<div class='card-footer'>
                            <a href='cart.php' class='btn btn-Amarelo mt-2 d-block'>Adicionar ao Carrinho</a>
                            <small class='text-success'>32 unidades em estoque</small>
                        </div>
                    </div>
                </div>";
        }
    }
    else
    {
        echo "<p>Produto nao encontrado !! :(</p>";
    }
    echo $json
?>