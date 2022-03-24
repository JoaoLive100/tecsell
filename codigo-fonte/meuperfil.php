<?php
	if(!isset($_SESSION)) 
	{ 
			session_start(); 
	}

	include('conexao.php');

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
small{
    color: red;
}
</style>
<script>
    $(document).ready(function() {
        meuperfil();
    })
</script>
<?php
	$sql = "select * from cadastro_usuarios where email_usuario = '$email'";
	$resultado = $conexao->query($sql);
	$linha = $resultado->fetch_object();

	$data = $linha->data_cadastro_usuario;
	$novadata = date('d/m/Y H:i', strtotime($data));
?>
<div class="container mt-5 mx-auto">
	<div class="row">
		<div class="col-4">
			<div class="list-group" id="list-tab" role="tablist">
				<a class="list-group-item list-group-item-action active" id="list-dados-list" data-toggle="list" href="#list-dados" role="tab" aria-controls="home">Meus Dados</a>
				<a class="list-group-item list-group-item-action" id="list-seguranca-list" data-toggle="list" href="#list-seguranca" role="tab" aria-controls="profile">Segurança da conta</a>
			</div>
		</div>
		<div class="col-8">
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="list-dados" role="tabpanel" aria-labelledby="list-dados-list">
					<div class="row">
						<h2 class="col-12">Meus Dados</h2>
						<div class="card col-7 p-4">
							<h4>1. Sobre você</h4>
							<div class="form-row mt-3">
								<div class="form-group col-md-6">
									<label for="inputNome">Nome</label>
									<input type="text" maxlength="30" class="form-control" name="inputNome" id="inputNome" placeholder="Nome" value="<?php echo "$linha->nome_usuario" ?>">
									<small id="nomeHelp" class="form-text">Preencha o Nome</small>
								</div>
								<div class="form-group col-md-6">
									<label for="inputSobrenome">Sobrenome</label>
									<input type="text" maxlength="40" class="form-control" name="inputSobrenome" id="inputSobrenome" placeholder="Sobrenome" value="<?php echo "$linha->sobrenome_usuario" ?>">
									<small id="sobrenomeHelp" class="form-text">Preencha o Sobrenome</small>
								</div>
								<div class="form-group col-md-6">
									<label for="inputCpf">CPF</label>
									<input type="text" maxlength="14" class="form-control" name="inputCpf" id="inputCpf" placeholder="CPF" value="<?php echo "$linha->cpf_usuario" ?>">
									<small id="cpfHelp" class="form-text">Preencha corretamente o CPF</small>
								</div>
								<div class="form-group col-md-6">
									<label for="inputCelular">Telefone</label>
									<input type="text" maxlength="14" class="form-control" name="inputCelular" id="inputCelular" placeholder="Telefone" value="<?php echo "$linha->telefone_usuario" ?>">
									<small id="celularHelp" class="form-text">Preencha corretamente o Telefone</small>
								</div>
								<div class="form-group col-md-6">
									<input value="Salvar alterações" type="button" id="btn_salvar" class="btn btn-secondary btn-lg"></input>
								</div>
							</div>
						</div>
						<div class="card col-5 p-4">
							<h4>2. Sua foto</h4>
							<div class="col-12">
								<form class="form" action="#" method="post" id="form" enctype="multipart/form-data">
									<input type="file" id="fotoperfil" accept="image/png, image/jpeg" class="d-none">
									<img id="perfil" class="img-thumbnail w-100" src="<?php echo "$linha->foto_usuario" ?>" onclick="document.getElementById('fotoperfil').click()" style="cursor: pointer;">
								</form>
							</div>			
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="list-seguranca" role="tabpanel" aria-labelledby="list-seguranca-list">
					<div class="row">
						<h2 class="col-12">Segurança da conta</h2>
						<div class="card col-12 p-4">
								<h4>1. Dados do cadastro</h4>
							<div class="row mt-3">
							<?php
								echo "<div class=\"col-4\">
										<p>Email: $linha->email_usuario</p>
										<p>CPF: $linha->cpf_usuario</p>										
									  </div>
									  <div class=\"col-4\">
										<p>Nome: $linha->nome_usuario</p>
										<p>Sobrenome: $linha->sobrenome_usuario</p>										
									  </div>
									  <div class=\"col-4\">
										<p>Telefone: $linha->telefone_usuario</p>
										<p>Data do cadastro: ".substr($novadata,0,10)."</p>										
									  </div>";
							?>
							</div>
						</div>
						<div class="card col-6 p-4">
							<h4>2. Alteração senha</h4>
							<div class="alert alert-danger mt-3" role="alert">
  								Atenção! Utilize esta função apenas para alterar a sua senha. Você deverá informar sua senha atual e em seguida informar uma nova senha. 
							</div>
							<div class="form-row mt-3">
								<div class="form-group col-md-12">
									<label for="inputatualPassword">Senha atual</label>
									<input type="password" maxlength="20" name="senhaatual" class="form-control" id="inputatualPassword" placeholder="Senha atual" required>
									<small id="senhaHelp" class="form-text">Use de 6 a 20 caracteres</small>
								</div>
								<div class="form-group col-md-12">
									<label for="inputnovaPassword">Nova senha</label>
									<input type="password" maxlength="20" name="senhanova" class="form-control" id="inputnovaPassword" placeholder="Nova senha" required>
									<small id="senha2Help" class="form-text">Use de 6 a 20 caracteres</small>
									<small id="senhaError" class="form-text error">Senha atual incorreta!</small>
								</div>
							</div>
							<div>
								<input value="Alterar senha" type="button" id="btn_alterar" class="btn btn-secondary btn-lg"></input>
							</div>
						</div>
						<div class="card col-6 p-4">
							<h4>3. Desativar sua conta</h4>
							<div class="alert alert-danger mt-3" role="alert">
								Atenção! Seu perfil será desabilitado e anúncios excluídos. A seguir você deverá confirmar alguns dados a fim de prosseguir com esse processo.
							</div>
							<div class="form-row mt-3">
								<div class="form-group col-md-12">
									<label for="inputEmail">Senha</label>
									<input type="password" name="senha1" maxlength="20" class="form-control" id="senha1" placeholder="Senha" required>
									<small id="senha3Help" class="form-text">Use de 6 a 20 caracteres</small>
								</div>
								<div class="form-group col-md-12">
									<label for="inputPassword">Confirme sua senha</label>
									<input type="password" maxlength="20" name="senha2" class="form-control" id="senha2" placeholder="Senha" required>
									<small id="senha4Help" class="form-text">Use de 6 a 20 caracteres</small>
									<small id="verifyError" class="form-text error">As senhas não conferem ou senha incorreta</small>
								</div>
							</div>
							<div>
								<input value="Desativar" type="button" id="btn_desativar" class="btn btn-secondary btn-lg"></input>
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
