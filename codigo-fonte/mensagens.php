<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
  
    if(isset($_SESSION["logado_usuario"]) && $_SESSION['logado_usuario'] == "sim")
    {
    include('header.php');
    include('menu_busca.php');

    $meuemail = $_SESSION["email_usuario"]; 
    $sql = "select * from chatanuncio where email_vendedor = '$meuemail' or email_comprador = '$meuemail'";
    $resultado = $conexao->query($sql);
?>
<script>
  $(document).ready(function() {
    chatanuncio();
    var chat;
    $('.list-dados').click(function() {
      chat = $(this).attr("value");
      chatr();
      setTimeout(function(){ $("#conversa").scrollTop($("#conversa")[0].scrollHeight); }, 500);
      var refreshTimer = setInterval(function(){chatr()},5000);
      function chatr() {
        $.post("c_mensagens.php",
        {
          chat : chat
        },function(dados)
        {
          console.log(dados);
          $('#conteudo-chat').html(dados);
          $("#conversa").scrollTop($("#conversa")[0].scrollHeight);
        });
      }
    });
    $("#btn_enviar").click(function(){
      var mensagem = $("#mensagem").val();
      if($("#mensagem").val().length < 1)
      {
      }
      else
      {
        $.post("c_mensagens.php",
        {
            chat : chat,
            mensagem : mensagem

        },function(dados)
        {
          console.log(dados);
          $('#mensagem').val('');
          $('#conteudo-chat').html(dados);
          $("#conversa").scrollTop($("#conversa")[0].scrollHeight);
        });
      }
    });
  });
</script>
<style>
.nvb{
  height: 0px;
  visibility: hidden;
  display: none;
}
.test {
    width: 100%;
    height: 100%;
    object-fit: contain;
}
button:focus {
    box-shadow: 0 0 0 0;
    outline: 0;
}
#conversa {
  height: 300px;
  overflow-y: scroll;
}
.remetente {
  padding: 10px;
  border-radius: 10px;
  max-width: 50%;
  text-align: left;
}
.destinatario {
  padding: 10px;
  border-radius: 10px;
  max-width: 50%;
  text-align: left;
}
.mensagem {
  margin-left: 10px;
  margin-right: 10px;
  margin-top: 20px;
  margin-bottom: 20px;
}
.a {
  height: 81px;
}
</style>
<div class="container">
  <div class="row">
    <div class="col-lg-12 mt-5">
      <h2>Chat com o vendedor</h2>
    </div>
    <div class="col-lg-12">
      <div class="card p-3">
        <div class="row">
          <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action active pl-4 pt-4 a" id="list-dados-list" data-toggle="list" href="#introducao" role="tab" aria-controls="home">Introdução</a>
              <?php
              if($resultado->num_rows > 0)
              {
                  while($linha = $resultado->fetch_object())
                  {
                      $cod_chat = $linha->cod_chat;
                      $codanuncio = $linha->cod_anuncio;
                      $sql2 = "select * from cadastro_produto where cod_produto = '$codanuncio' and status_produto = 'Ativo'";
                      $resultado2 = $conexao->query($sql2);
                      $linha2 = $resultado2->fetch_object();
          
                      if($linha->email_vendedor == $meuemail)
                      {
                          $receptor = $linha->email_comprador;
                      }
                      else
                      {
                          $receptor = $linha->email_vendedor;
                      }
          
                      $sql3 = "select * from cadastro_usuarios where email_usuario = '$receptor'";
                      $resultado3 = $conexao->query($sql3);
                      $linha3 = $resultado3->fetch_object();
          
                      $sql4= "select endereco_foto from fotos_produto where cod_produto = $codanuncio limit 1";
                      $resultado4 = $conexao->query($sql4);
                      $linha4 = $resultado4->fetch_object();
          
                      $nomeproduto = substr($linha2->nome_produto, 0, 20);
                      echo "<a class=\"list-group-item list-group-item-action list-dados a\" data-toggle=\"list\" href=\"#list-dados\" value=\"$cod_chat\" role=\"tab\" aria-controls=\"chat\">
                              <div class=\"d-inline float-left mr-3\">";
                              if(isset($linha4->endereco_foto))
                              {
                                  echo "<img class=\"d-inline\" src=\"$linha4->endereco_foto\" style=\"width:55px; height:55px;border-radius:5px;\">";
                              }
                              else
                              {
                                  echo "<img class=\"d-inline\" src=\"fotos/sistema/produtosemfoto.jpg\" style=\"width:55px; height:55px;border-radius:5px;\">";
                              }
                      echo   "</div>
                              <div class=\"d-inline\">
                                      <div>
                                          $nomeproduto... 
                                      </div>
                                      <div>
                                          <small>$linha3->nome_usuario $linha3->sobrenome_usuario</small>
                                      </div>
                              </div>
                            </a>";
                  }
              }
              ?>
            </div>
          </div>
          <div class="col-8">
            <div class="tab-content">
              <div class="tab-pane fade show active" id="introducao" role="tabpanel" aria-labelledby="list-dados-list">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card" style="height: 521px;">
                      <div class="mx-auto mt-5 col-12">
                        <div align="center"><h3>Seja bem vindo!</h3></div>
                        <div align="center" class="mt-3"><h1><span style="color:gray;">Tec</span><span id="logo">sell</span></h1></div>
                        <div class="col-8 text-justify mt-5 mx-auto"><p>Seja bem vindo ao chat TecSell! Aqui você poderá encontrar links de conversas com possiveis compradores e conversas com vendedores. Não compartilhe dados pessoais com estranhos, fique ligado!</p></div>
                        <div class="col-8 text-justify mt-3 mx-auto"><p>Desconfie se alguém pedir informações como seu endereço residencial, número de cartão de crédito/débito, rg, cpf entre outros.</p></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade show" id="list-dados" role="tabpanel" aria-labelledby="list-dados-list">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card" id="conteudo-chat">
                    </div>
                    <div class="card-footer">
                      <div align="center">
                        <input class="form-control col-lg-7 mx-auto d-inline" id="mensagem" type="text" placeholder="Digite uma mensagem...">
                        <button id="btn_enviar" style="border: 0px;"><i class="fas fa-arrow-circle-right fa-lg"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
    include("footer.php");
    }
    else
    {
        header("Location:login.php");
    }
?>