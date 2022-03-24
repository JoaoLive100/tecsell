<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
	if(isset($_SESSION["logado_usuario"]) && $_SESSION['logado_usuario'] == "sim")
	{
        
        include("conexao.php");
        $anuncio = $_POST["codanuncio"];
        $meuemail = $_POST["meuemail"];
        $emaildestino = $_POST["emaildestino"];

        $sql = "select * from chatanuncio where cod_anuncio = '$anuncio' and email_comprador = '$meuemail' and email_vendedor = '$emaildestino' and status_chat='Ativo'";
        $resultado = $conexao->query($sql);
        if($resultado->num_rows > 0)
        {
            $linha = $resultado->fetch_object();
            $codchat = $linha->cod_chat;

            if(isset($_POST["mensagem"]))
            {
                $mensagem = $_POST["mensagem"];
                $sql2 = "insert into mensagenschat (cod_chat, remetente_chat, destinatario_chat, corpo_mensagem) values ('$codchat','$meuemail','$emaildestino','$mensagem')";
                $resultado2 = $conexao->query($sql2);
               // header("refresh: 1;");
            }

            $sql = "select * from mensagenschat where cod_chat='$codchat'";
            $resultado = $conexao->query($sql);
            while($linha = $resultado->fetch_object())
            {
                $data = $linha->data_envio;
                $novadata = date('d/m/Y H:i', strtotime($data));
                if($linha->remetente_chat == $meuemail)
                {
                    echo "
                        <div class=\"mensagem\" align=\"right\">
                            <span class=\"remetente bg-success d-inline-block\">$linha->corpo_mensagem<div align=\"right\"><small>$novadata</small></div></span>
                        </div>
                            ";
                }
                else
                {
                    echo "
                        <div class=\"mensagem\" align=\"left\">
                            <span class=\"destinatario bg-warning d-inline-block\">$linha->corpo_mensagem<div align=\"right\"><small>$novadata</small></div></span>
                        </div>
                            ";
                }
            }
        }
        else
        {
            if(isset($_POST["mensagem"]))
            {
                $sql2 = "insert into chatanuncio (cod_anuncio, email_vendedor, email_comprador) values ('$anuncio','$emaildestino','$meuemail')";
                $resultado = $conexao->query($sql2);
                $codchat = $conexao->insert_id;

                if(isset($_POST["mensagem"]))
                {
                    $mensagem = $_POST["mensagem"];
                    $sql2 = "insert into mensagenschat (cod_chat, remetente_chat, destinatario_chat, corpo_mensagem) values ('$codchat','$meuemail','$emaildestino','$mensagem')";
                    $resultado2 = $conexao->query($sql2);
                }

                $sql = "select * from mensagenschat where cod_chat='$codchat'";
                $resultado = $conexao->query($sql);
                while($linha = $resultado->fetch_object())
                {
                    $data = $linha->data_envio;
                    $novadata = date('d/m/Y H:i', strtotime($data));
                    if($linha->remetente_chat == $meuemail)
                    {
                        echo "
                            <div class=\"mensagem\" align=\"right\">
                                <span class=\"remetente bg-success d-inline-block\">$linha->corpo_mensagem<div align=\"right\"><small>$novadata</small></div></span>
                            </div>
                                ";
                    }
                    else
                    {
                        echo "
                            <div class=\"mensagem\" align=\"left\">
                                <span class=\"destinatario bg-warning d-inline-block\">$linha->corpo_mensagem<div align=\"right\"><small>$novadata</small></div></span>
                            </div>
                                ";
                    }
                }
            }
        }
	}
	else
	{
		header("Location:login.php");
	}
?>