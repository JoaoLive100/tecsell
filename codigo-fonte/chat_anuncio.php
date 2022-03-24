<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
  
    if(isset($_SESSION["logado_usuario"]) && $_SESSION['logado_usuario'] == "sim")
    {
    include('header.php');
    include('menu_busca.php');
    $anuncio = $_GET['cod_produto'];
    $meuemail = $_SESSION["email_usuario"]; 
    $sql = "select * from cadastro_produto where cod_produto='$anuncio'";
    $resultado = $conexao->query($sql);
    $linha = $resultado->fetch_object();

    $emailvendedor = $linha->email_usuario;

    $sql2 = "select * from cadastro_usuarios where email_usuario = '$linha->email_usuario'";
    $resultado2 = $conexao->query($sql2);
    $linha2 = $resultado2->fetch_object();

    $sql3 = "select endereco_foto from fotos_produto where cod_produto = '$anuncio' limit 1";
    $resultado3 = $conexao->query($sql3);
    $linha3 = $resultado3->fetch_object();

?>
<script>
  $(document).ready(function() {
    chatanuncio();
    var codanuncio = "<?php echo "$anuncio"?>";
    var meuemail = "<?php echo "$meuemail"?>";
    var emaildestino = "<?php echo "$emailvendedor"?>";
    chat();
    setTimeout(function(){ $("#conversa").scrollTop($("#conversa")[0].scrollHeight); }, 100);
    var refreshTimer = setInterval(function(){chat()},5000);
    function chat() {
      $.post("c_chat.php",
      {
          codanuncio : codanuncio,
          meuemail : meuemail,
          emaildestino : emaildestino

      },function(dados)
      {
        console.log(dados);
        $('#conversa').html(dados);
      });
    }
    $("#btn_enviar").click(function(){
        var mensagem = $("#mensagem").val();
        if($("#mensagem").val().length < 1)
        {
        }
        else
        {
          $.post("c_chat.php",
          {
              codanuncio : codanuncio,
              meuemail : meuemail,
              emaildestino : emaildestino,
              mensagem : mensagem

          },function(dados)
          {
            console.log(dados);
            $('#mensagem').val('');
            $('#conversa').html(dados);
            $("#conversa").scrollTop($("#conversa")[0].scrollHeight);
          });
        }
    });
  })
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
</style>
<div class="container">
  <div class="row">
    <div class="col-lg-7 mx-auto mt-3">
      <div class="card" >
        <div class="card-header p-2">
          <div class="row">
            <div class="col-lg-12 pl-4">
              <div class="d-inline">
                <img class="rounded-circle d-inline" src="<?php echo "$linha2->foto_usuario"?>" style="width:55px;height:55px;">
                <h6 class="d-inline ml-3"><?php echo "$linha2->nome_usuario $linha2->sobrenome_usuario";?></h6>
              </div>
              <div class="d-inline float-right">
                <a href="perfil_vendedor.php?email_vendedor=<?php echo "$linha->email_usuario"?>" class="btn btn-link btn-sm">Ver perfil</a>
                <a href="produto.php?cod_produto=<?php echo "$linha->cod_produto"?>" class="btn btn-link btn-sm">Ver anúncio</a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body" style="height: 25rem;">
          <div class="col-lg-12">
            <div class="card" style="background-color: rgba(0,0,0,.03);">
              <div class="row">
                <div style="width: 70px; height: 50px;" class="p-1 pl-3 d-inline">
                <?php
                  if(isset($linha3->endereco_foto))
                  {
                      echo "<img src=\"$linha3->endereco_foto\" class=\"test\">";
                  }
                  else
                  {
                      echo "<img src=\"fotos/sistema/produtosemfoto.jpg\" class=\"test\">";
                  }
                ?>
                </div>
                <div class="p-1 d-inline mt-2">
                  <div class="pl-3"><?php echo "$linha->nome_produto | R$ $linha->preco_produto,00"?></div>
                </div>
              </div>
            </div>
            <div id="conversa" class="mt-3">
            </div>
          </div>
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
<?php
    include("footer.php");
    }
    else
    {
        header("Location:login.php");
    }
?>