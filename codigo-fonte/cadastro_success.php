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
</style>
<div class="col-4 mx-auto central" align="center">
  <div class="card h-100 p-4">
    <div class="m-4">
      <img src="icons/png/check.png">
    </div>
    <div>
      <h4><span>Cadastrado com sucesso!</span></h4>
    </div>
    <div>
      <a href="index.php" class="btn btn-secondary mt-5 btn-lg col-6">Continuar</a>
    </div>
  </div>
</div>
<?php
  include("footer.php");
?>