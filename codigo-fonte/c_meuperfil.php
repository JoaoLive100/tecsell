<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
	if(isset($_SESSION["logado_usuario"]) && $_SESSION['logado_usuario'] == "sim")
	{
        $email_usuario = $_SESSION['email_usuario'];
        include("conexao.php");
        if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['cpf']) && isset($_POST['telefone']))
        {
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $cpf = $_POST['cpf'];
            $telefone = $_POST['telefone'];        

            $sql = "update cadastro_usuarios set nome_usuario = '$nome', sobrenome_usuario = '$sobrenome',
            cpf_usuario = '$cpf', telefone_usuario = '$telefone' where email_usuario = '$email_usuario'";

            $resultado = $conexao->query($sql);
            echo "1";
        }
        if(isset($_FILES['foto']))
        {
            $fileName=$_FILES['foto']['name'];
            $fileTmpName=$_FILES['foto']['tmp_name'];
            $fileType=$_FILES['foto']['type'];

            if($fileType == "image/jpeg")
            {
                $novoNome = "foto_".date("dmYhis").rand(1000, 1999).".jpg";
            }
            if($fileType == "image/png")
            {
                $novoNome = "foto_".date("dmYhis").rand(1000, 1999).".png";
            }

            $caminho = "./fotos/usuarios/".$novoNome;
	
            move_uploaded_file($fileTmpName, $caminho);
            
            $sql="update cadastro_usuarios set foto_usuario = '$caminho' where email_usuario = '$email_usuario'";
            $resultado = $conexao->query($sql);
            $sql2="select foto_usuario from cadastro_usuarios where email_usuario = '$email_usuario'";
            $resultado2 = $conexao->query($sql2);
            $linha = $resultado2->fetch_object();
            echo "$linha->foto_usuario";
        }
        if(isset($_POST['senhaatual']) && isset($_POST['novasenha']))
        {
            $senhaatual = sha1($_POST['senhaatual']);
            $novasenha = $_POST['novasenha'];

            $sql = "select senha_usuario from cadastro_usuarios where email_usuario = '$email_usuario'";
            $resultado = $conexao->query($sql);
            if($resultado->num_rows > 0)
            {
                $linha = $resultado->fetch_object();
                if($linha->senha_usuario == $senhaatual)
                {
                    $sql2 = "update cadastro_usuarios set senha_usuario = sha1('$novasenha') where email_usuario = '$email_usuario'";
                    $resultado = $conexao->query($sql2);
                    echo "1";
                }
                else
                {
                    echo "0";
                }
            }
            else
            {
                echo "erro!";
            }
        }
        if(isset($_POST['senha1']) && isset($_POST['senha2']))
        {
            $senha1 = sha1($_POST['senha1']);
            $senha2 = sha1($_POST['senha2']);

            if($senha1 == $senha2)
            {
                $sql = "select senha_usuario from cadastro_usuarios where email_usuario = '$email_usuario'";
                $resultado = $conexao->query($sql);
                if($resultado->num_rows > 0)
                {
                    $linha = $resultado->fetch_object();
                    if($linha->senha_usuario == $senha1)
                    {
                        $sql2 = "update cadastro_usuarios set status_usuario = 'Bloqueado' where email_usuario = '$email_usuario'";
                        $resultado2 = $conexao->query($sql2);
                        $sql3 = "update cadastro_produto set status_produto = 'Bloqueado' where email_usuario = '$email_usuario'";
                        $resultado3 = $conexao->query($sql3);
                        echo "1";
                    }
                    else
                    {
                        echo "0";
                    }
                }
            }
            else
            {
                echo "0";
            }
        }

	}
	else
	{
		header("Location:login.php");
	}
?>