<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
	if(isset($_POST["email"]))
	{
		include("conexao.php");
		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$cpf = $_POST['cpf'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$celular = $_POST['celular'];

		$sql = "select count(*) from cadastro_usuarios where email_usuario = '$email'";
		$resultado = $conexao->query($sql);
		$linha = $resultado->fetch_row();
		if ($linha[0] > 0)
		{
			echo "0";
		}
		else
		{
			$sql = "insert into cadastro_usuarios (cpf_usuario, nome_usuario, sobrenome_usuario, telefone_usuario, email_usuario, senha_usuario)
			values('$cpf','$nome','$sobrenome','$celular','$email',sha1('$senha'))";
			$resultado = $conexao->query($sql);
			echo "1";
		}
	}
	else
	{
		header('Location: login.php');
	}
?>