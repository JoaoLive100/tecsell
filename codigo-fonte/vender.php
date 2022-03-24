<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
	
	if(isset($_SESSION["logado_usuario"]) && $_SESSION['logado_usuario'] == "sim")
	{
		include('header.php');
		include('menu_busca.php');
?>
<style>
.nvb{
height: 0px;
visibility: hidden;
display: none;
}

/* HIDE RADIO */
#div_cat [type=radio] { 
position: absolute;
opacity: 0;
width: 0;
height: 0;
}

/* IMAGE STYLES */
#div_cat [type=radio] + img {
cursor: pointer;
}

/* CHECKED STYLES */
#div_cat [type=radio]:checked + img{
	opacity : 0.20;
}
</style>
<script>
    $(document).ready(function() {
        vender();
    })
</script>
<div class="container">
	<div class="row">
        <div class="col-lg-12 mt-5">
            <h2>Cadastrar Anúncio</h2>
            <div class="card h-150 p-4">
                <div id="div_cat">
                    <h4>1. Selecione a categoria principal do seu produto</h4>
                    <div id="div_cat" class="row central">
                        <?php
                                $sql="select cod_categoria, nome_categoria, foto_categoria from categorias where status_categoria='Ativo' order by nome_categoria";
                                $resultado = $conexao->query($sql);
                                while($linha = $resultado->fetch_object())
                                {
                                        echo   "<div class=\"col-lg-2 col-md-6\">
                                                    <label>
                                                        <input type=\"radio\" name=\"categoria\" value=\"$linha->nome_categoria\">
                                                        <img class=\"rounded-circle\" src=\"$linha->foto_categoria\" alt=\"\">
                                                        <h6 class=\"abc\" align=\"center\">$linha->nome_categoria</h6></input>
                                                    </label>
                                                </div>";
                                }
                        ?>
                    </div>
                    <div class="text-right">
                        <input value="Continuar" type="button" id="btn_continuar" class="btn btn-secondary mt-4 btn-lg col-3"></input>
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