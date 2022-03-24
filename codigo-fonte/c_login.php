<?php
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  if(isset($_POST['email']))
  {
    $email = $_POST['email'];
    $senha = sha1($_POST['senha']);

    include("conexao.php");

    $sql = "select nome_usuario, email_usuario, senha_usuario from cadastro_usuarios where email_usuario = '$email' and status_usuario ='Ativo'";

    $resultado = $conexao->query($sql);

    if($resultado->num_rows > 0)
    {
      $linha = $resultado->fetch_object();

      $senhaBD = $linha->senha_usuario;
      $nome = $linha->nome_usuario;
      $email = $linha->email_usuario;

      if($senha == $senhaBD)
      {
        $_SESSION['logado_usuario'] = "sim";
        $_SESSION['nome_usuario'] = $nome;
        $_SESSION['email_usuario'] = $email;
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