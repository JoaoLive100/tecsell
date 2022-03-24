<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  }
  
  include('header.php');
  include('menu_busca.php');
  $email = $_GET['email_vendedor'];
  $sql = "select * from cadastro_usuarios where email_usuario='$email'";
  $resultado = $conexao->query($sql);
  $linha = $resultado->fetch_object();

  $data = $linha->data_cadastro_usuario;
  $novadata = date('d/m/Y H:i', strtotime($data));

  $sql2="select * from cadastro_produto where email_usuario='$email' and status_produto='Ativo' order by data_cadastro_produto desc";
  $resultado2 = $conexao->query($sql2);
?>
<script>
  $(document).ready(function() {
    perfilvendedor();
  })
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
      <h2><?php echo "$linha->nome_usuario $linha->sobrenome_usuario"; ?></h2>
    </div>
    <div class="col-lg-5">
      <div class="card h-150 p-4">
        <div class="col-lg-12" align="center">
          <img class="rounded-circle" src="<?php echo"$linha->foto_usuario"?>" style="width:150px;height:150px;">
        </div>
        <div class="col-lg-12 mt-3">
          <h6><?php echo"Email: $linha->email_usuario"?></h6>
          <h6><?php echo"Nome: $linha->nome_usuario $linha->sobrenome_usuario"?></h6>
          <h6><?php echo"Telefone: $linha->telefone_usuario"?></h6>
          <h6><?php echo"Data de Cadastro: $novadata"?></h6>
        </div>
      </div>
    </div>
    <div class="col-lg-7">
      <div class="card h-150 p-4">
        <div class="row">
          <div class="col-lg-12 mb-3">
            <h4>Anúncios de <?php echo"$linha->nome_usuario";?></h4>
          </div>
        <?php
        if($resultado2->num_rows > 0)
        {
          while($linha2 = $resultado2->fetch_object())
          {
            $data = $linha2->data_cadastro_produto;
            $novadata = date('d/m/Y H:i', strtotime($data));

            $cep = $linha2->localizacao_produto;
            $url = "https://viacep.com.br/ws/".$cep."/json/";
            $data = file_get_contents($url);
            $resposta = json_decode($data);
            $cidade = $resposta->{'localidade'};
            $uf = $resposta->{'uf'};

            $sql3="select endereco_foto from fotos_produto where cod_produto = $linha2->cod_produto limit 1";
            $resultado3 = $conexao->query($sql3);
            $linha3 = $resultado3->fetch_object();
            echo "<div class=\"col-lg-6 col-md-6 mb-4\">
                    <a href=\"produto.php?cod_produto=$linha2->cod_produto\" class=\"link_anuncio\">
                        <div class=\"card h-100\">";
                        if(isset($linha3->endereco_foto))
                        {
                            echo "<img class=\"card-img-top p-4\" src=\"$linha3->endereco_foto\" alt=\"\">";
                        }
                        else
                        {
                            echo "<img class=\"card-img-top p-4\" src=\"fotos/sistema/produtosemfoto.jpg\" alt=\"\">";
                        }
                      echo "<div class=\"card-body\">
                                <h5>R$ $linha2->preco_produto,00</h5>
                                <h6 class=\"card-title\">$linha2->nome_produto</h6>
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
        }
        else
        {
          echo "<div class=\"col-lg-12 mt-5 mb-5\" align=\"center\">
                  <span>Não possui anúncios</span>
                </div>";
        }
        ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  include("footer.php");
?>