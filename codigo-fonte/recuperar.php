<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    include('header.php');
    include('menu_busca.php');
?>
<style>
  .nvb{
    height: 0px;
    visibility: hidden;
    display: none;
  }
  small {
      color: red;
  }
</style>
<script>
  $(document).ready(function() {
    recuperar();
  })
</script>
<div id="recuperar" class="col-4 mx-auto central">
  <div>
    <h2><span>Esqueci minha senha</span></h2>
  </div>
  <div class="card h-100 p-4">
    <div class="form-row">
      <div class="form-group col-md-12" id="inseriremail">
        <label for="inputEmailRecuperar">Email do Cadastro</label>
        <input type="email" name="email" maxlength="100" class="form-control" id="inputEmailRecuperar" placeholder="Email" required>
        <small id="emailHelp" class="form-text">Preencha o Email</small>
        <div id="normal" class="alert alert-secondary text-justify mt-4">
            Ao prosseguir, será enviado um código de alteração de senha para o seu email.
        </div>
        <div id="erro" class="alert alert-danger text-justify mt-4">
            Esse E-mail não está cadastrado no sistema! Tente novamente.
        </div>
        <div>
            <input value="Continuar" type="button" id="btn_recuperar" class="btn btn-secondary mt-3 btn-lg"></input>
        </div>
      </div>
      <div class="form-group col-md-12" id="inserircodigo">
        <label for="inputCodigoRecuperar">Código de alteração de senha</label>
        <input type="text" name="codigo" maxlength="4" class="form-control" id="inputCodigoRecuperar" placeholder="Código" required>
        <small id="codigoHelp" class="form-text">Preencha o Código</small>
        <div id="normalCodigo" class="alert alert-success text-justify mt-4">
            O código de recuperação foi enviado para o E-mail informado. Insira acima o código recebido. 
        </div>
        <div id="erroCodigo" class="alert alert-danger text-justify mt-4">
            O código está errado! Tente novamente.
        </div>
        <div>
            <input value="Continuar" type="button" id="btn_codigo" class="btn btn-secondary mt-3 btn-lg"></input>
        </div>
      </div>
      <div class="form-group col-md-12" id="novasenha">
        <div class="form-group col-md-12">
            <label for="senha1">Nova senha</label>
            <input type="password" name="senha1" maxlength="20" class="form-control" id="senha1" placeholder="Nova senha" required>
            <small id="senha1Help" class="form-text">Use de 6 a 20 caracteres</small>
        </div>
        <div class="form-group col-md-12">
            <label for="senha2">Confirme sua nova senha</label>
            <input type="password" maxlength="20" name="senha2" class="form-control" id="senha2" placeholder="Confirme a nova senha" required>
            <small id="senha2Help" class="form-text">Use de 6 a 20 caracteres</small>
            <small id="verifyError" class="form-text error">As senhas não conferem</small>
        </div>
        <div>
            <input value="Alterar" type="button" id="btn_alterar" class="btn btn-secondary mt-3 btn-lg"></input>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  include("footer.php");
?>