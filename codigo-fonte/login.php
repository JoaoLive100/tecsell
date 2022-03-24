<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  }
  include('header.php');
  include('menu_busca.php')
?>
<style>
  .nvb{
    height: 0px;
    visibility: hidden;
    display: none;
  }
  small{
    color: red;
  }
  .error{
    visibility: hidden;
  }
</style>
<script>
  $(document).ready(function() {
    login();
  })
</script>
<div id="login" class="col-4 mx-auto central">
  <div>
    <h2><span>Login</span></h2>
  </div>
  <div class="card h-100 p-4">
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="inputEmailLogin">Email</label>
        <input type="email" name="email" maxlength="100" class="form-control" id="inputEmailLogin" placeholder="Email" required>
        <small id="emailHelpLogin" class="form-text">Preencha o Email</small>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="inputCpfLogin">Senha</label>
        <input type="password" maxlength="20" name="senha" class="form-control" id="inputPasswordLogin" placeholder="Senha" required>
        <small id="senhaHelpLogin" class="form-text">Preencha a Senha</small>
        <small id="loginErrorLogin" class="form-text error">O Email ou Senha estão incorretos</small>
      </div>
    </div>
    <div class="form-row mx-auto">
      <a href="criar_conta.php" class="btn btn-link btn-sm">Abrir conta</a>
      <a href="recuperar.php" class="btn btn-link btn-sm">Esqueci minha senha</a>
    </div>
  </div>
  <div>
    <input value="Entrar" type="button" id="btn_entrar_login" class="btn btn-secondary mt-4 btn-lg col-5"></input>
  </div>
</div>
<?php
  include("footer.php");
?>