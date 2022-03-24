<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    include('conexao.php');
	if(isset($_SESSION["nome_usuario"]))
	{
		$nome = $_SESSION["nome_usuario"];
	}
	else
	{
		$nome = "Cliente";
	}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="index.php"><h3><span style="color:gray;">Tec</span><span id="logo">sell</span></a></h3>
    <nav class="navbar navbar navbar-expand-lg navbar-light bg-light mx-auto nvb">
        <form action="resultadobusca.php" method="get" class="form-inline my-2 my-lg-0"> <!-- pagina php que irá receber os dados -->
            <input class="form-control mr-sm-2 busca" type="search" name="mensagem-busca" placeholder="Buscar produtos, marcas, entre outros..." aria-label="Search" required>
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </nav>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light nvb">
    <div class="navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mx-auto">
            <li class="nav-item ab"> <!--active para ficar pressionado-->
                <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item dropdown ab">
                <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-list"></i> Categorias</a>
                <ul class="dropdown-menu xy" aria-labelledby="navbarDropdown">
                    <div id="categorias">
                        <?php
                            $sql = "select * from categorias where status_categoria='Ativo' order by nome_categoria";
                            $resultado = $conexao->query($sql);
                            while($linha = $resultado->fetch_object())
                            {
                                echo "<a href=\"categoria.php?cod_categoria=$linha->cod_categoria\"><li class=\"dropdown-item categoria\" valor=\"$linha->nome_categoria\">$linha->nome_categoria</li></a>";
                                echo "<div class=\"dropdown-divider\" style=\"width:200px;\"></div>";
                            }
                        ?>
                    </div>
                    <div id="cateimagem">
                        <img id="cateimagens" class="card-img-top" src="http://placehold.it/280x245" alt="">
                    </div>
                </ul>
            </li>
            <li class="nav-item ab"> <!--active para ficar pressionado-->
                <a class="nav-link" href="vender.php"><i class="fas fa-dollar-sign"></i> Vender</a>
            </li>
            <?php
                if(isset($_SESSION["nome_usuario"]))
                {
                    echo "<li class=\"nav-item dropdown ab\">
                            <a class=\"nav-link dropdown\" href=\"#\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"><i class=\"fas fa-user-circle fa-lg\"></i> $nome</a>
                            <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                                <a href=\"meuperfil.php\"><li class=\"dropdown-item\">Meu Perfil</li></a>
                                <a href=\"meus_anuncios.php\"><li class=\"dropdown-item\">Meus Anúncios</li></a>
                                <a href=\"mensagens.php\"><li class=\"dropdown-item\">Mensagens</li></a>
                                <div class=\"dropdown-divider\" style=\"width:200px;\"></div>
                                <a href=\"sair.php\"><li class=\"dropdown-item\">Sair</li></a>
                            </ul>
                          </li>";
                }
                else
                {
                    echo "<li class=\"nav-item ab\">
                            <a class=\"nav-link\" href=\"criar_conta.php\"><i class=\"fas fa-user-plus\"></i> Crie sua conta</a>
                          </li>";
                    echo "<li class=\"nav-item ab\">
                            <a class=\"nav-link\" href=\"login.php\"><i class=\"fas fa-sign-in-alt\"></i> Login</a>
                          </li>";
                }
            ?>
        </ul>
    </div>
</nav>
<div id="faixa">
</div>
<script>
    $(document).ready(function(){
        $(".categoria").mouseover(function(){
            var valor = $(this).attr("valor");
            $("#cateimagens").attr("src","icons/categorias/"+valor+".png");
        });
    });
</script>