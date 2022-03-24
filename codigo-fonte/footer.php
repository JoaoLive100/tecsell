<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    include('conexao.php');
?>
<style>
    #logo-footer {
        padding: 20px;
    }
    a {
        color: black;
    }
</style>
<div id="footer" class="mt-5">
    <div id="logo-footer" class="bg-light">
        <p align="center" class="mt-3">Desenvolvido por Tecsell. Todos os direitos reservados.</p>
    </div>
</div>