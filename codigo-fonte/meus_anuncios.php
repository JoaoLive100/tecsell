<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
	if(isset($_SESSION['email_usuario']))
	{
		$email = $_SESSION['email_usuario'];
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
.card-img-top {
    width: 100%;
    height: 200px;
    object-fit: contain;
}
</style>
<div class="container mt-5 mx-auto">
	<div class="row">
		<div class="col-4">
			<div class="list-group" id="list-tab" role="tablist">
				<a class="list-group-item list-group-item-action active" id="list-dados-list" data-toggle="list" href="#list-dados" role="tab" aria-controls="home">Anúncios Ativos</a>
				<a class="list-group-item list-group-item-action" id="list-seguranca-list" data-toggle="list" href="#list-seguranca" role="tab" aria-controls="profile">Anúncios Inativos</a>
			</div>
		</div>
		<div class="col-8">
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="list-dados" role="tabpanel" aria-labelledby="list-dados-list">
					<div class="row">
					<?php
						$sql = "select * from cadastro_produto where email_usuario = '$email' and status_produto ='Ativo'";
						$resultado = $conexao->query($sql);

						if($resultado->num_rows > 0)
						{
						echo	"<h2 class=\"col-12\">Meus anúncios ativos</h2>
								<div class=\"card col-12 p-4\">
								<div class=\"row\">";
								while($linha = $resultado->fetch_object())
								{
								  $sql2="select endereco_foto from fotos_produto where cod_produto = $linha->cod_produto limit 1";
								  $resultado2 = $conexao->query($sql2);
								  $linha2 = $resultado2->fetch_object();

								  $data = $linha->data_cadastro_produto;
								  $novadata = date('d/m/Y H:i', strtotime($data));
						  
								  $cep = $linha->localizacao_produto;
								  $url = "https://viacep.com.br/ws/".$cep."/json/";
								  $data = file_get_contents($url);
								  $resposta = json_decode($data);
								  $cidade = $resposta->{'localidade'};
								  $uf = $resposta->{'uf'};
								  echo "<div class=\"col-lg-6 mb-4\">
										  <a href=\"produto.php?cod_produto=$linha->cod_produto\" class=\"link_anuncio\">
											  <div class=\"card h-100\">";
											  if(isset($linha2->endereco_foto))
											  {
												  echo "<img class=\"card-img-top p-4\" src=\"$linha2->endereco_foto\" alt=\"\">";
											  }
											  else
											  {
												  echo "<img class=\"card-img-top p-4\" src=\"fotos/sistema/produtosemfoto.jpg\" alt=\"\">";
											  }
											echo "<div class=\"card-body\">
													  <h5>R$ $linha->preco_produto,00</h5>
													  <h6 class=\"card-title\">$linha->nome_produto</h6>
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
						echo	"</div>
								 </div>";
						}
						else
						{
						echo	"<h2 class=\"col-12\">Meus anúncios ativos</h2>
								<div class=\"card col-12 p-4\">
									<span align=\"center\">Você não possui nenhum anúncio ativo</span>
								</div>";
						}
					?>
					</div>
				</div>
				<div class="tab-pane fade" id="list-seguranca" role="tabpanel" aria-labelledby="list-seguranca-list">
					<div class="row">
					<?php
						$sql = "select * from cadastro_produto where email_usuario = '$email' and status_produto ='Bloqueado'";
						$resultado = $conexao->query($sql);

						if($resultado->num_rows > 0)
						{
						echo	"<h2 class=\"col-12\">Meus anúncios inativos</h2>
								<div class=\"card col-12 p-4\">
								<div class=\"row\">";
								while($linha = $resultado->fetch_object())
								{
								  $sql2="select endereco_foto from fotos_produto where cod_produto = $linha->cod_produto limit 1";
								  $resultado2 = $conexao->query($sql2);
								  $linha2 = $resultado2->fetch_object();

								  $data = $linha->data_cadastro_produto;
								  $novadata = date('d/m/Y H:i', strtotime($data));
						  
								  $cep = $linha->localizacao_produto;
								  $url = "https://viacep.com.br/ws/".$cep."/json/";
								  $data = file_get_contents($url);
								  $resposta = json_decode($data);
								  $cidade = $resposta->{'localidade'};
								  $uf = $resposta->{'uf'};
								  
								  echo "<div class=\"col-lg-6 col-md-6 mb-4\">
										  <a href=\"produto.php?cod_produto=$linha->cod_produto\" class=\"link_anuncio\">
											  <div class=\"card h-100\">";
											  if(isset($linha2->endereco_foto))
											  {
												  echo "<img class=\"card-img-top p-4\" src=\"$linha2->endereco_foto\" alt=\"\">";
											  }
											  else
											  {
												  echo "<img class=\"card-img-top p-4\" src=\"fotos/sistema/produtosemfoto.jpg\" alt=\"\">";
											  }
											echo "<div class=\"card-body\">
													  <h5>R$ $linha->preco_produto,00</h5>
													  <h6 class=\"card-title\">$linha->nome_produto</h6>
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
						echo	"</div>
								 </div>";
						}
						else
						{
						echo	"<h2 class=\"col-12\">Meus anúncios inativos</h2>
								<div class=\"card col-12 p-4\">
									<span align=\"center\">Você não possui nenhum anúncio inativo</span>
								</div>
								";
						}
					?>
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