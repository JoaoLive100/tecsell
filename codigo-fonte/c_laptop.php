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
			$categoria = 2;
			$titulo = $_POST['titulo'];
			$preco = $_POST['preco'];
			$estado = $_POST['estado'];
			$localizacao = $_POST['localizacao'];
			$descricao = $_POST['descricao'];

			$marca = $_POST['marca'];
			$modelo = $_POST['modelo'];
			$linha = $_POST['linha'];
            $tiporam = $_POST['tiporam'];
            $ram = $_POST['ram'];
            $marcaproc = $_POST['marcaproc'];
            $modeloproc = $_POST['modeloproc'];
            $inputhd = $_POST['inputhd'];
            $inputssd = $_POST['inputssd'];
            $check2em1 = $_POST['check2em1'];
            $checkgamer = $_POST['checkgamer'];
            $checkultrabook = $_POST['checkultrabook'];
            $checkplacadevideo = $_POST['checkplacadevideo'];
            $checkwindows = $_POST['checkwindows'];
            $checklinux = $_POST['checklinux'];
            $checkmacos = $_POST['checkmacos'];
            $checkusbc = $_POST['checkusbc'];
            $checkssd = $_POST['checkssd'];

			include("conexao.php");
			$sql = "insert into cadastro_produto (email_usuario, localizacao_produto,
			nome_produto, estado_produto, cod_categoria_produto, preco_produto, descricao_produto) 
			values('$email','$localizacao','$titulo','$estado','$categoria','$preco','$descricao')";
			$resultado = $conexao->query($sql);

			$ID_produto = $conexao->insert_id;

			$sql2 = "insert into fichatec_notebooks (cod_produto, cod_marca_notebook, cod_linha_notebook,
			cod_modelo_notebook, marca_processador, modelo_processador, tipo_memoria_ram, qntd_memoria_ram, 
			armazenamento_hd, armazenamento_ssd, doisemum, gamer, ultrabook, placa_de_video, windows, linux, macOS, 
			USB_C, SSD) 
			values('$ID_produto','$marca','$linha','$modelo','$marcaproc','$modeloproc','$tiporam','$ram','$inputhd','$inputssd',
			'$check2em1','$checkgamer','$checkultrabook','$checkplacadevideo','$checkwindows','$checklinux','$checkmacos','$checkusbc',
			'$checkssd')";
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