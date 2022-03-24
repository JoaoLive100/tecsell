<?php
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  }
  if(isset($_POST['email']) && isset($_POST['codigo']) && isset($_POST['senha1']) && isset($_POST['senha2']))
  {
      $email = $_POST['email'];
      $codigoinserido = $_POST['codigo'];
      $senha1 = $_POST['senha1'];
      $senha2 = $_POST['senha2'];

      if($senha1 == $senha2)
      {
        include("conexao.php");
        $sql = "select cod_recuperacao from cadastro_usuarios where email_usuario = '$email' and cod_recuperacao = '$codigoinserido' and status_usuario='Ativo'";
        $resultado = $conexao->query($sql);

        if($resultado->num_rows > 0)
        {
            $sql2 = "update cadastro_usuarios set senha_usuario = sha1('$senha2') where email_usuario = '$email' and cod_recuperacao = '$codigoinserido'";
            $resultado = $conexao->query($sql2);
            $sql3 = "update cadastro_usuarios set cod_recuperacao = '0' where email_usuario = '$email' and cod_recuperacao = '$codigoinserido'";
            $resultado = $conexao->query($sql3);
            echo "1";
        }
        else
        {
            echo "0";
        }
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