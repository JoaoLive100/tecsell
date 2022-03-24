<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
    if(isset($_POST['marcacelular']))
    {
        include("conexao.php");
        $marca = $_POST['marcacelular'];
        $sql = "select * from linha_celulares where status_linha_celular = 'Ativo' and cod_marca_celular = '$marca'";
        $resultado = $conexao->query($sql);

        while($linha = $resultado->fetch_object())
        {
            echo "<option value=\"$linha->cod_linha_celular\">$linha->nome_linha_celular</option>";
        }
    }
    if(isset($_POST['linhacelular']))
    {
        include("conexao.php");
        $linha = $_POST['linhacelular'];
        $sql = "select * from modelo_celulares where status_modelo_celular = 'Ativo' and cod_linha_celular = '$linha'";
        $resultado = $conexao->query($sql);

        while($linha = $resultado->fetch_object())
        {
            echo "<option value=\"$linha->cod_modelo_celular\">$linha->nome_modelo_celular</option>";
        }
    }
    if(isset($_POST['marcalaptops']))
    {
        include("conexao.php");
        $marca = $_POST['marcalaptops'];
        $sql = "select * from linha_notebook where status_linha_notebook = 'Ativo' and cod_marca_notebook = '$marca'";
        $resultado = $conexao->query($sql);

        while($linha = $resultado->fetch_object())
        {
            echo "<option value=\"$linha->cod_linha_notebook\">$linha->nome_linha_notebook</option>";
        }
    }
    if(isset($_POST['linhalaptops']))
    {
        include("conexao.php");
        $linha = $_POST['linhalaptops'];
        $sql = "select * from modelo_notebook where status_modelo_notebook = 'Ativo' and cod_linha_notebook = '$linha'";
        $resultado = $conexao->query($sql);

        while($linha = $resultado->fetch_object())
        {
            echo "<option value=\"$linha->cod_modelo_notebook\">$linha->nome_modelo_notebook</option>";
        }
    }
    if(isset($_POST['marcatablet']))
    {
        include("conexao.php");
        $marca = $_POST['marcatablet'];
        $sql = "select * from linha_tablets where status_linha_tablet = 'Ativo' and cod_marca_tablet = '$marca'";
        $resultado = $conexao->query($sql);

        while($linha = $resultado->fetch_object())
        {
            echo "<option value=\"$linha->cod_linha_tablet\">$linha->nome_linha_tablet</option>";
        }
    }
    if(isset($_POST['linhatablet']))
    {
        include("conexao.php");
        $linha = $_POST['linhatablet'];
        $sql = "select * from modelo_tablets where status_modelo_tablet = 'Ativo' and cod_linha_tablet = '$linha'";
        $resultado = $conexao->query($sql);

        while($linha = $resultado->fetch_object())
        {
            echo "<option value=\"$linha->cod_modelo_tablet\">$linha->nome_modelo_tablet</option>";
        }
    }
?>