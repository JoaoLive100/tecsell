<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  }
  
  include('header.php');
  include('menu_busca.php');
  include('conexao.php');
  $resultBusca = $_GET['mensagem-busca'];
  $sql = "select * from cadastro_produto where nome_produto like '%$resultBusca%' and status_produto = 'Ativo'";
  $resultado = $conexao->query($sql);
  $valor = $resultado->num_rows;
?>
<script>
    $(document).ready(function() {
      categoria();
      resultadobusca();
      function resultadobusca(){
      $('#money_btn, #todos, #novo, #usado').bind("click", filtragem);
      function filtragem() {
        if ($('#inputMin').val()!='')
        {
            var minmoney = $('#inputMin').val();
        }
        else
        {
            var minmoney = "0";
        }

        if ($('#inputMax').val()!='')
        {
            var maxmoney = $('#inputMax').val();
        }
        else
        {
            var maxmoney = "999999";
        }

        var estado = $('input[name=estado-produto]:checked').val();
        var categoriaFiltro = 0;
        var palavra = "<?php echo "$resultBusca";?>";
        $.post("c_filtros.php",
        {
            palavra : palavra,
            categoriaFiltro : categoriaFiltro,
            minmoney : minmoney,
            maxmoney : maxmoney,
            estado : estado
        },function(dados)
        {
          if(dados == 1)
          {
            alert(dados);
          }
          else
          {
            $('#conteudo').html(dados);
          }
        }); 
        }
      }
    });
</script>
<style>
.card-img-top {
width: 100%;
height: 200px;
object-fit: contain;
}
</style>
<div class="container">
  <div class="row">
    <div class="col-lg-12 mt-5">
        <h2><?php echo "Resultados para $resultBusca"?></h2>
    </div>
    <div class="col-lg-3">
      <div class="list-group">
        <div class="list-group-item">
          <h6>Preço</h6>
          <div class="form-row">
            <div class="form-group col-lg-4">
              <input type="text" id="inputMin" class="form-control form-control-sm money" placeholder="Min.">
            </div>
            <div class="form-group col-lg-4">
              <input type="text" id="inputMax" class="form-control form-control-sm money" placeholder="Máx.">
            </div>
            <div class="form-group col-lg-4">
              <button class="btn btn-sm btn-outline-secondary my-2 my-sm-0 money_btn" id="money_btn" type="submit"><i class="fas fa-search"></i></button>
            </div>
          </div>
          <h6>Estado</h6>
          <div class="form-row">
            <div class="form-group col-lg-12">
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="todos" value="1" type="radio" name="estado-produto" checked>
                <label class="form-check-label" for="inlineRadio1"><small>Todos</small></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="novo" value="2" type="radio" name="estado-produto">
                <label class="form-check-label" for="inlineRadio1"><small>Novo</small></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="usado" value="3" type="radio" name="estado-produto">
                <label class="form-check-label" for="inlineRadio1"><small>Usado</small></label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-9">
      <div class="row" id="conteudo">
          <?php
            echo "<div class=\"col-12\">Foram encontratos $valor resultados para sua busca</div>";
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
                echo "<div class=\"col-lg-4 col-md-6 mb-4\">
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
<?php
  include("footer.php");
?>