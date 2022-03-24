<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(isset($_POST['emailcodigo']) && isset($_POST['codigo']))
    {
        $emailinserido = $_POST['emailcodigo'];
        $codigoinserido = $_POST['codigo'];
        
        include("conexao.php");

        $sql = "select email_usuario, cod_recuperacao from cadastro_usuarios where email_usuario = '$emailinserido' and cod_recuperacao = '$codigoinserido' and status_usuario ='Ativo'";

        $resultado = $conexao->query($sql);

        if($resultado->num_rows > 0)
        {
            echo "1";
        }
        else
        {
            echo "0";
        }
    }
    else
    {
        header('Location: login.php');
    }
?>