<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
	include('header.php');
    include('menu_busca.php')
?>
<style>
.card-img-top {
    width: 100%;
    height: 200px;
    object-fit: contain;
}
</style>
<html>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="fotos/sistema/banner1.jpeg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="fotos/sistema/banner2.jpeg" alt="Second slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="row central">
                <?php
                    $sql="select cod_categoria, nome_categoria, foto_categoria from categorias where status_categoria='Ativo' order by nome_categoria";
                    $resultado = $conexao->query($sql);
                    while($linha = $resultado->fetch_object())
                    {
                    echo    "<div class=\"col-lg-2 col-md-6 mb-4\">
                                <a href=\"categoria.php?cod_categoria=$linha->cod_categoria\">
                                    <img class=\"rounded-circle\" src=\"$linha->foto_categoria\" alt=\"\">
                                    <div class=\"abc\" align=\"center\"><h6>$linha->nome_categoria</h6></div>
                                </a>
                            </div>";
                    }
                ?>
                </div>
                <div>
                    <span><h2>Anúncios Recentes</h2></span>
                </div>
                <div class="row">
                    <?php 
                    $sql="select * from cadastro_produto where status_produto='Ativo' order by data_cadastro_produto desc limit 20";
                    $resultado = $conexao->query($sql);
                    while($linha = $resultado->fetch_object())
                    {
                    $sql2="select endereco_foto from fotos_produto where cod_produto = $linha->cod_produto limit 1";
                    $resultado2 = $conexao->query($sql2);
                    $linha2 = $resultado2->fetch_object();
                    
                    $data = $linha->data_cadastro_produto;
                    $novadata = date('d/m/Y H:i', strtotime($data));

                    $cep = $linha->localizacao_produto;
                    $url = "https://viacep.com.br/ws/".$cep."/json/";
                    $data = file_get_contents($url);
                    $resposta = json_decode($data);
                    $cidade = $resposta->{'localidade'};
                    $uf = $resposta->{'uf'};
                    echo "<div class=\"col-lg-3 col-md-6 mb-4\">
                            <a href=\"produto.php?cod_produto=$linha->cod_produto\" class=\"link_anuncio\">
                                <div class=\"card h-100\">";
                                if(isset($linha2->endereco_foto))
                                {
                                    echo "<img class=\"card-img-top p-4\" src=\"$linha2->endereco_foto\" alt=\"\">";
                                }
                                else
                                {
                                    echo "<img class=\"card-img-top p-4\" src=\"fotos/sistema/produtosemfoto.jpg\" alt=\"\">";
                                }
                              echo "<div class=\"card-body\">
                                        <h5>R$ $linha->preco_produto,00</h5>
                                        <h6 class=\"card-title\">$linha->nome_produto</h6>
                                    </div>
                                    <div class=\"card-footer\">
                                        <div>
                                            <small>$novadata</small>
                                        </div>
                                        <div>
                                            <small>$cidade - $uf</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                          </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
<?php
    include("footer.php");
?>