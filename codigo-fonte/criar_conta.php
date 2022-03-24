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
  small{
    color: red;
  }
  .email{
    visibility: hidden;
  }
</style>
<script>
  $(document).ready(function() {
    criar_conta();
  })
</script>
<div id="cadastro" class="col-8 mx-auto central">
  <div>
    <h2><span>Cadastro</span></h2>
  </div>
  <div class="card h-100 p-4">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputNomeCriar">Nome</label>
        <input type="text" maxlength="30" class="form-control" name="inputNomeCriar" id="inputNomeCriar" placeholder="Nome" required>
        <small id="nomeHelpCriar" class="form-text">Preencha o Nome</small>
      </div>
      <div class="form-group col-md-6">
        <label for="inputSobrenomeCriar">Sobrenome</label>
        <input type="text" maxlength="40" class="form-control" name="inputSobrenomeCriar" id="inputSobrenomeCriar" placeholder="Sobrenome" required>
        <small id="sobrenomeHelpCriar" class="form-text">Preencha o Sobrenome</small>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCpfCriar">CPF</label>
        <input type="text" maxlength="14" class="form-control" name="inputCpfCriar" id="inputCpfCriar" placeholder="CPF" required>
        <small id="cpfHelpCriar" class="form-text">Preencha corretamente o CPF</small>
      </div>
      <div class="form-group col-md-6">
        <label for="inputCelularCriar">Telefone</label>
        <input type="text" maxlength="14" class="form-control" name="inputCelularCriar" id="inputCelularCriar" placeholder="Telefone" required>
        <small id="celularHelpCriar" class="form-text">Preencha corretamente o Telefone</small>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmailCriar">Email</label>
        <input type="email" maxlength="100" class="form-control" name="inputEmailCriar" id="inputEmailCriar" placeholder="Email" required>
        <small id="emailHelpCriar" class="form-text">Preencha o Email</small>
        <small id="emailHelp2Criar" class="form-text email">Esse Email já está cadastrado</small>
      </div>
      <div class="form-group col-md-6">
        <label for="inputPasswordCriar">Senha</label>
        <input type="password" maxlength="20" class="form-control" name="inputPasswordCriar" id="inputPasswordCriar" placeholder="Senha" required>
        <small id="senhaHelpCriar" class="form-text">Use de 6 a 20 caracteres</small>
      </div>
    </div>
    <div class="form-row">
      <a href="login.php" class="btn btn-link btn-sm">Já tenho uma conta</a>
    </div>
  </div>
  <input value="Continuar" type="button" id="btn_confirma_criar" class="btn btn-secondary mt-4 btn-lg col-4"></input>
</div>
<?php
  include("footer.php");
?>