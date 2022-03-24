<?php
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  }
  if(isset($_POST['email']))
  {
    $emailinserido = $_POST['email'];

    include("conexao.php");

    $sql = "select email_usuario, nome_usuario from cadastro_usuarios where email_usuario = '$emailinserido' and status_usuario ='Ativo'";

    $resultado = $conexao->query($sql);

    if($resultado->num_rows > 0)
    {
      $linha = $resultado->fetch_object();
      $nome = $linha->nome_usuario;
      $email = $linha->email_usuario;
      $valor = rand(1000, 9999);
      $sql2 = "update cadastro_usuarios set cod_recuperacao = '$valor' where email_usuario = '$email'";
      $resultado = $conexao->query($sql2);

      //envio de email
      $para = $email;
      $assunto = "Tecsell - Redefinir senha";
      $corpo = "O código para redefinição de senha é $valor";
      $headers = "From:tecsellstore@gmail.com";
      mail($para, $assunto, $corpo, $headers);
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