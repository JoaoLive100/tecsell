<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
	if(isset($_SESSION["logado_usuario"]) && $_SESSION['logado_usuario'] == "sim")
	{
		if(isset($_POST['titulo']))
		{
			$email = $_SESSION['email_usuario'];
			$categoria = 4;
			$titulo = $_POST['titulo'];
			$preco = $_POST['preco'];
			$estado = $_POST['estado'];
			$localizacao = $_POST['localizacao'];
			$descricao = $_POST['descricao'];
			$marca = $_POST['marca'];
			$modelo = $_POST['modelo'];
			$linha = $_POST['linha'];
			$interna = $_POST['interna'];
			$ram = $_POST['ram'];
			$traseira = $_POST['traseira'];
			$frontal = $_POST['frontal'];

			include("conexao.php");
			$sql = "insert into cadastro_produto (email_usuario, localizacao_produto,
			nome_produto, estado_produto, cod_categoria_produto, preco_produto, descricao_produto) 
			values('$email','$localizacao','$titulo','$estado','$categoria','$preco','$descricao')";
			$resultado = $conexao->query($sql);

			$ID_produto = $conexao->insert_id;

			$sql2 = "insert into fichatec_tablets (cod_produto, cod_marca_tablet, cod_linha_tablet,
			cod_modelo_tablet, memoria_interna, memoria_ram, camera_traseira, camera_frontal) 
			values('$ID_produto','$marca','$linha','$modelo','$interna','$ram','$traseira','$frontal')";
			$resultado = $conexao->query($sql2);
			
			if(isset($_FILES['file']))
			{
				$fileName=$_FILES['file']['name'];
				$fileTmpName=$_FILES['file']['tmp_name'];
				$fileType=$_FILES['file']['type'];
				foreach ($fileName as $key => $val) 
				{
					$nome_arquivo = $fileName[$key];
					$tmp_name     = $fileTmpName[$key];
					$tipo         = $fileType[$key];
					
					if($tipo == "image/jpeg")
					{
						$novoNome = "foto_".date("dmYhis").$ID_produto.$key.".jpg";
					}
					if($tipo == "image/png")
					{
						$novoNome = "foto_".date("dmYhis").$ID_produto.$key.".png";
					}
	
					$caminho = "./fotos/produtos/".$novoNome;
	
					move_uploaded_file($tmp_name, $caminho);
					
					$sql3="insert into fotos_produto
						(cod_produto, endereco_foto)
						values('$ID_produto','$caminho')";
	
					$resultado = $conexao->query($sql3);
				}
			}
			
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	else
	{
		header("Location:login.php");
	}
?>