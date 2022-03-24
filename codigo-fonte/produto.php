<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  }
  
  include('header.php');
  include('menu_busca.php');
  $produto = $_GET['cod_produto'];

  $sql = "select * from cadastro_produto where cod_produto='$produto'";
  $resultado = $conexao->query($sql);
  $linha = $resultado->fetch_object();

  $sql2 = "select endereco_foto from fotos_produto where cod_produto = $produto limit 1";
  $resultado2 = $conexao->query($sql2);
  $linha2 = $resultado2->fetch_object();

  $quantidade2 = $resultado2->num_rows;

  $sql3 = "select endereco_foto from fotos_produto where cod_produto= $produto limit 1, 100";
  $resultado3 = $conexao->query($sql3);

  $quantidade3 = $resultado3->num_rows;

  $sql4 = "select * from cadastro_usuarios where email_usuario = '$linha->email_usuario'";
  $resultado4 = $conexao->query($sql4);
  $linha4 = $resultado4->fetch_object();

  $categoria = $linha->cod_categoria_produto;
  $sql5 = "select nome_categoria from categorias where cod_categoria='$categoria'";
  $resultado5 = $conexao->query($sql5);
  
  $nomeCategoria = $resultado5->fetch_object()->nome_categoria;
?>
<script>
  $(document).ready(function() {
    produto();
  })
</script>
<style>
.figuras {
    width: 100%;
    height: 500px;
    object-fit: contain;
    background-color: gray;
}
</style>
<div class="container">
  <div class="row">
    <div class="col-lg-12 mt-5">
      <h2><?php echo "Anúncio nº $linha->cod_produto"; ?></h2>
    </div>
    <div class="col-lg-12">
      <div class="card h-150 p-4">
        <div class="row">
          <div class="col-lg-7">
          <?php
            if($quantidade2 == 0 && $quantidade3 == 0)
            {
              echo "<div>
                      <img class=\"figuras\" src=\"fotos/sistema/produtosemfoto.jpg\">
                    </div>";
            }
            if($quantidade2 == 1 && $quantidade3 == 0)
            {
              echo "<div>
                      <img class=\"figuras\" src=\"$linha2->endereco_foto\">
                    </div>";
            }
            if($quantidade2 == 1 && $quantidade3 > 0)
            {
              echo "<div id=\"carouselExampleIndicators\" class=\"carousel slide\" data-ride=\"carousel\">
                      <ol class=\"carousel-indicators\">
                        <li data-target=\"#carouselExampleIndicators\" data-slide-to=\"0\" class=\"active\"></li>";
              for($contador = 1; $contador <= $quantidade3; $contador++)
              {
                echo "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"$contador\"></li>";
              }
                echo "</ol>
                      <div class=\"carousel-inner\" role=\"listbox\">
                        <div class=\"carousel-item active\">
                            <img class=\"d-block img-fluid figuras\" src=\"$linha2->endereco_foto\">
                        </div>";
                        while($linha3 = $resultado3->fetch_object())
                        {
                          echo "<div class=\"carousel-item\">
                                  <img class=\"d-block img-fluid figuras\" src=\"$linha3->endereco_foto\">
                                </div>";
                        }
              echo "</div>
                      <a class=\"carousel-control-prev\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"prev\">
                        <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                        <span class=\"sr-only\">Previous</span>
                      </a>
                      <a class=\"carousel-control-next\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"next\">
                        <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                        <span class=\"sr-only\">Next</span>
                      </a>
                    </div>";
            }
            $data = $linha->data_cadastro_produto;
            $novadata = date('d/m/Y H:i', strtotime($data));

            $cep = $linha->localizacao_produto;
            $url = "https://viacep.com.br/ws/".$cep."/json/";
            $data = file_get_contents($url);
            $resposta = json_decode($data);
            $cidade = $resposta->{'localidade'};
            $uf = $resposta->{'uf'};
          ?>
          </div>
          <div class="col-lg-5">
            <div class="card p-3">
              <h6><?php echo "$linha->estado_produto"; ?></h6>
              <h5><?php echo "$linha->nome_produto"; ?></h5>
              <br>
              <h4><?php echo " R$ $linha->preco_produto,00"; ?></h4>
            </div>
            <div class="card p-3 mt-3">
              <h6><?php echo "Data da publicação: $novadata"; ?></h6>
              <h6><?php echo "Código do anúncio: $linha->cod_produto"; ?></h6>
              <h6><?php echo "Localização do anúncio: $cidade - $uf"; ?></h6>
            </div>
            <div class="card mt-3 p-3">
              <h5 class="mx-auto">Dados do anunciante</h5>
              <?php
              echo "<div class=\"col-lg-12 p-3 row mx-auto\">
                      <div class=\"col-lg-3\">
                        <img class=\"rounded-circle\" src=\"$linha4->foto_usuario\" style=\"width:80px;height:80px;\">
                      </div>
                      <div class=\"col-lg-9\">
                        <h6>Email: $linha4->email_usuario</h6>
                        <h6>Nome: $linha4->nome_usuario $linha4->sobrenome_usuario</h6>
                        <h6>Telefone: $linha4->telefone_usuario</h6>                
                      </div>
                    </div>
                    <div class=\"mx-auto\">";
                    if(isset($_SESSION['email_usuario']))
                    {
                      if($linha4->email_usuario != $_SESSION['email_usuario'])
                      {
                        echo "<a href=\"chat_anuncio.php?cod_produto=$linha->cod_produto\" class=\"btn btn-link btn-sm mx-auto\">Abrir chat</a>";
                        echo  "<a href=\"perfil_vendedor.php?email_vendedor=$linha4->email_usuario\" class=\"btn btn-link btn-sm mx-auto\">Ver mais sobre este vendedor</a>
                        </div>";
                      }
                      else
                      {
                        echo  "<a href=\"perfil_vendedor.php?email_vendedor=$linha4->email_usuario\" class=\"btn btn-link btn-sm mx-auto\">Ver mais sobre este vendedor</a>
                        </div>";
                      }
                    }
                    else
                    {
                      echo "<a href=\"chat_anuncio.php?cod_produto=$linha->cod_produto\" class=\"btn btn-link btn-sm mx-auto\">Abrir chat</a>";
                      echo  "<a href=\"perfil_vendedor.php?email_vendedor=$linha4->email_usuario\" class=\"btn btn-link btn-sm mx-auto\">Ver mais sobre este vendedor</a>
                      </div>";
                    }
              echo  "</div>";
              ?>
            </div>  
          </div>
          <div class="col-lg-12">
            <div class="card p-3 mt-3">
              <div class="col-lg-12">
                <div class="card p-3 mt-3">
                  <h5 class="mx-auto"><?php echo "Descrição do produto"; ?></h5>
                  <p class= "text-justify"><?php echo "$linha->descricao_produto"; ?></p>
                </div>
              </div>
              <?php
                if($nomeCategoria == "Celulares")
                {
                  $sql_fichatec_celulares = "select * from fichatec_celulares where cod_produto = '$linha->cod_produto'"; 
                  $resultado_fichatec_celulares = $conexao->query($sql_fichatec_celulares);
                  $linha_fichatec_celulares = $resultado_fichatec_celulares->fetch_object();

                  $codmarca = $linha_fichatec_celulares->cod_marca_celular;
                  $codlinha = $linha_fichatec_celulares->cod_linha_celular;
                  $codmodelo = $linha_fichatec_celulares->cod_modelo_celular;

                  $sql_marca_celulares = "select nome_marca_celular from marca_celulares where cod_marca_celular='$codmarca'";
                  $resultado_marca_celulares = $conexao->query($sql_marca_celulares);
                  $linha_marca_celulares = $resultado_marca_celulares->fetch_object();

                  $sql_linha_celulares  = "select nome_linha_celular from linha_celulares where cod_linha_celular='$codlinha'";
                  $resultado_linha_celulares = $conexao->query($sql_linha_celulares);
                  $linha_linha_celulares = $resultado_linha_celulares->fetch_object();

                  $sql_modelo_celulares = "select nome_modelo_celular from modelo_celulares where cod_modelo_celular='$codmodelo'";
                  $resultado_modelo_celulares = $conexao->query($sql_modelo_celulares);
                  $linha_modelo_celulares = $resultado_modelo_celulares->fetch_object();
                  echo "<div class=\"col-lg-12\">
                          <div class=\"card p-3 mt-3\">
                            <h5 class=\"mx-auto\">Ficha técnica do celular</h5>
                            <div class=\"row\">
                              <div class=\"col-lg-4\">
                                <div class=\"card p-3 mt-3\">
                                  <h6 class=\"mx-auto\"><i class=\"fas fa-mobile-alt\"></i> Definição</h6>
                                  <hr>
                                  <h6 class=\"\">Marca: $linha_marca_celulares->nome_marca_celular</h6>
                                  <h6 class=\"\">Linha: $linha_linha_celulares->nome_linha_celular</h6>
                                  <h6 class=\"\">Modelo: $linha_modelo_celulares->nome_modelo_celular</h6>
                                </div>
                              </div>
                              <div class=\"col-lg-4\">
                                <div class=\"card p-3 mt-3\">
                                  <h6 class=\"mx-auto\"><i class=\"fas fa-memory\"></i> Memória</h6>
                                  <hr>
                                  <h6 class=\"\">Memória Interna (GB): $linha_fichatec_celulares->memoria_interna</h6>
                                  <h6 class=\"\">Memória RAM (GB): $linha_fichatec_celulares->memoria_ram</h6>
                                </div>
                              </div>
                              <div class=\"col-lg-4\">
                                <div class=\"card p-3 mt-3\">
                                  <h6 class=\"mx-auto\"><i class=\"fas fa-camera\"></i> Câmeras</h6>
                                  <hr>
                                  <h6 class=\"\">Principal traseira (Mpx): $linha_fichatec_celulares->camera_traseira</h6>
                                  <h6 class=\"\">Principal frontal (Mpx): $linha_fichatec_celulares->camera_frontal</h6>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>";
                }
                if($nomeCategoria == "Computadores")
                {
                }
                if($nomeCategoria == "Hardware")
                {
                }
                if($nomeCategoria == "Laptops")
                {
                  $sql_fichatec_notebooks = "select * from fichatec_notebooks where cod_produto = '$linha->cod_produto'"; 
                  $resultado_fichatec_notebooks = $conexao->query($sql_fichatec_notebooks);
                  $linha_fichatec_notebooks = $resultado_fichatec_notebooks->fetch_object();

                  $codmarca = $linha_fichatec_notebooks->cod_marca_notebook;
                  $codlinha = $linha_fichatec_notebooks->cod_linha_notebook;
                  $codmodelo = $linha_fichatec_notebooks->cod_modelo_notebook;

                  $sql_marca_notebooks = "select nome_marca_notebook from marca_notebook where cod_marca_notebook='$codmarca'";
                  $resultado_marca_notebooks = $conexao->query($sql_marca_notebooks);
                  $linha_marca_notebooks = $resultado_marca_notebooks->fetch_object();

                  $sql_linha_notebooks  = "select nome_linha_notebook from linha_notebook where cod_linha_notebook='$codlinha'";
                  $resultado_linha_notebooks = $conexao->query($sql_linha_notebooks);
                  $linha_linha_notebooks = $resultado_linha_notebooks->fetch_object();

                  $sql_modelo_notebooks = "select nome_modelo_notebook from modelo_notebook where cod_modelo_notebook='$codmodelo'";
                  $resultado_modelo_notebooks = $conexao->query($sql_modelo_notebooks);
                  $linha_modelo_notebooks = $resultado_modelo_notebooks->fetch_object();
                  echo "<div class=\"col-lg-12\">
                          <div class=\"row\">
                            <div class=\"col-lg-8\">
                              <div class=\"card p-3 mt-3\">
                                <h5 class=\"mx-auto\">Ficha técnica do laptop</h5>
                                <div class=\"row\">
                                  <div class=\"col-lg-6\">
                                    <div class=\"card p-3 mt-3\">
                                      <h6 class=\"mx-auto\"><i class=\"fas fa-mobile-alt\"></i> Definição</h6>
                                      <hr>
                                      <h6 class=\"\">Marca: $linha_marca_notebooks->nome_marca_notebook</h6>
                                      <h6 class=\"\">Linha: $linha_linha_notebooks->nome_linha_notebook</h6>
                                      <h6 class=\"\">Modelo: $linha_modelo_notebooks->nome_modelo_notebook</h6>
                                    </div>
                                  </div>
                                  <div class=\"col-lg-6\">
                                    <div class=\"card p-3 mt-3\">
                                      <h6 class=\"mx-auto\"><i class=\"fas fa-memory\"></i> Memória RAM</h6>
                                      <hr>
                                      <h6 class=\"\">Tipo: $linha_fichatec_notebooks->tipo_memoria_ram</h6>
                                      <h6 class=\"\">Memória RAM (GB): $linha_fichatec_notebooks->qntd_memoria_ram</h6>
                                    </div>
                                  </div>
                                  <div class=\"col-lg-6\">
                                    <div class=\"card p-3 mt-3\">
                                      <h6 class=\"mx-auto\"><i class=\"fas fa-microchip\"></i> Processador</h6>
                                      <hr>
                                      <h6 class=\"\">Marca: $linha_fichatec_notebooks->marca_processador</h6>
                                      <h6 class=\"\">Modelo: $linha_fichatec_notebooks->modelo_processador</h6>
                                    </div>
                                  </div>
                                  <div class=\"col-lg-6\">
                                  <div class=\"card p-3 mt-3\">
                                    <h6 class=\"mx-auto\"><i class=\"fas fa-hdd\"></i> Armazenamento</h6>
                                    <hr>
                                    <h6 class=\"\">HD (GB): $linha_fichatec_notebooks->armazenamento_hd</h6>
                                    <h6 class=\"\">SSD (GB): $linha_fichatec_notebooks->armazenamento_ssd</h6>
                                  </div>
                                </div>
                                </div>
                              </div>
                            </div>
                            <div class=\"col-lg-4\">
                              <div class=\"card p-3 mt-3\">
                                <h5 class=\"mx-auto\">Outras caracteristicas</h5>
                                <div class=\"row\">
                                  <div class=\"col-lg-12\">
                                    <div class=\"card p-3 mt-3\">
                                      <h6 class=\"\">2 em 1: $linha_fichatec_notebooks->doisemum</h6>
                                      <h6 class=\"\">Gamer: $linha_fichatec_notebooks->gamer</h6>
                                      <h6 class=\"\">Ultrabook: $linha_fichatec_notebooks->ultrabook</h6>
                                      <h6 class=\"\">Placa de vídeo: $linha_fichatec_notebooks->placa_de_video</h6>
                                      <h6 class=\"\">Windows: $linha_fichatec_notebooks->windows</h6>
                                      <h6 class=\"\">Linux: $linha_fichatec_notebooks->linux</h6>
                                      <h6 class=\"\">MacOS: $linha_fichatec_notebooks->macOS</h6>
                                      <h6 class=\"\">USB C: $linha_fichatec_notebooks->USB_C</h6>
                                      <h6 class=\"\">SSD: $linha_fichatec_notebooks->SSD</h6>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>";
                }
                if($nomeCategoria == "Tablets")
                {
                  $sql_fichatec_tablets = "select * from fichatec_tablets where cod_produto = '$linha->cod_produto'"; 
                  $resultado_fichatec_tablets = $conexao->query($sql_fichatec_tablets);
                  $linha_fichatec_tablets = $resultado_fichatec_tablets->fetch_object();

                  $codmarca = $linha_fichatec_tablets->cod_marca_tablet;
                  $codlinha = $linha_fichatec_tablets->cod_linha_tablet;
                  $codmodelo = $linha_fichatec_tablets->cod_modelo_tablet;

                  $sql_marca_tablets = "select nome_marca_tablet from marca_tablets where cod_marca_tablet='$codmarca'";
                  $resultado_marca_tablets = $conexao->query($sql_marca_tablets);
                  $linha_marca_tablets = $resultado_marca_tablets->fetch_object();

                  $sql_linha_tablets  = "select nome_linha_tablet from linha_tablets where cod_linha_tablet='$codlinha'";
                  $resultado_linha_tablets = $conexao->query($sql_linha_tablets);
                  $linha_linha_tablets = $resultado_linha_tablets->fetch_object();

                  $sql_modelo_tablets = "select nome_modelo_tablet from modelo_tablets where cod_modelo_tablet='$codmodelo'";
                  $resultado_modelo_tablets = $conexao->query($sql_modelo_tablets);
                  $linha_modelo_tablets = $resultado_modelo_tablets->fetch_object();
                  echo "<div class=\"col-lg-12\">
                          <div class=\"card p-3 mt-3\">
                            <h5 class=\"mx-auto\">Ficha técnica do celular</h5>
                            <div class=\"row\">
                              <div class=\"col-lg-4\">
                                <div class=\"card p-3 mt-3\">
                                  <h6 class=\"mx-auto\"><i class=\"fas fa-mobile-alt\"></i> Definição</h6>
                                  <hr>
                                  <h6 class=\"\">Marca: $linha_marca_tablets->nome_marca_tablet</h6>
                                  <h6 class=\"\">Linha: $linha_linha_tablets->nome_linha_tablet</h6>
                                  <h6 class=\"\">Modelo: $linha_modelo_tablets->nome_modelo_tablet</h6>
                                </div>
                              </div>
                              <div class=\"col-lg-4\">
                                <div class=\"card p-3 mt-3\">
                                  <h6 class=\"mx-auto\"><i class=\"fas fa-memory\"></i> Memória</h6>
                                  <hr>
                                  <h6 class=\"\">Memória Interna (GB): $linha_fichatec_tablets->memoria_interna</h6>
                                  <h6 class=\"\">Memória RAM (GB): $linha_fichatec_tablets->memoria_ram</h6>
                                </div>
                              </div>
                              <div class=\"col-lg-4\">
                                <div class=\"card p-3 mt-3\">
                                  <h6 class=\"mx-auto\"><i class=\"fas fa-camera\"></i> Câmeras</h6>
                                  <hr>
                                  <h6 class=\"\">Principal traseira (Mpx): $linha_fichatec_tablets->camera_traseira</h6>
                                  <h6 class=\"\">Principal frontal (Mpx): $linha_fichatec_tablets->camera_frontal</h6>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>";
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  include("footer.php");
?>