<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
	if(isset($_SESSION["logado_usuario"]) && $_SESSION['logado_usuario'] == "sim")
	{
        if(isset($_POST['chat']) && isset($_SESSION['email_usuario']))
        {
            $meuemail = $_SESSION['email_usuario'];
            $codchat = $_POST['chat'];
    
            include("conexao.php");
            $sql = "select * from chatanuncio where cod_chat = '$codchat'";
            $resultado = $conexao->query($sql);
            if($resultado->num_rows > 0)
            {
                $linha = $resultado->fetch_object();
                if($linha->email_vendedor == $meuemail)
                {
                    $receptor = $linha->email_comprador;
                }
                else
                {
                    $receptor = $linha->email_vendedor;
                }
                $sql2 = "select * from cadastro_usuarios where email_usuario = '$receptor'";
                $resultado2 = $conexao->query($sql2);
                $linha2 = $resultado2->fetch_object();

                $anuncio = $linha->cod_anuncio;
                $sql3 = "select endereco_foto from fotos_produto where cod_produto = '$anuncio' limit 1";
                $resultado3 = $conexao->query($sql3);
                $linha3 = $resultado3->fetch_object();

                $sql4 = "select * from cadastro_produto where cod_produto='$anuncio'";
                $resultado4 = $conexao->query($sql4);
                $linha4 = $resultado4->fetch_object();

        echo "    <div class=\"card-header p-2\">
                    <div class=\"row\">
                      <div class=\"col-lg-12 pl-4\">
                        <div class=\"d-inline\">
                          <img class=\"rounded-circle d-inline\" src=\"$linha2->foto_usuario\" style=\"width:55px;height:55px;\">
                          <h6 class=\"d-inline ml-3\">$linha2->nome_usuario $linha2->sobrenome_usuario</h6>
                        </div>
                        <div class=\"d-inline float-right\">
                          <a href=\"perfil_vendedor.php?email_vendedor=$linha2->email_usuario\" class=\"btn btn-link btn-sm\">Ver perfil</a>
                          <a href=\"produto.php?cod_produto=$linha->cod_anuncio\" class=\"btn btn-link btn-sm\">Ver anúncio</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class=\"card-body\">
                    <div class=\"col-lg-12\">
                      <div class=\"card\" style=\"background-color: rgba(0,0,0,.03);\">
                        <div class=\"row\">
                          <div style=\"width: 70px; height: 50px;\" class=\"p-1 pl-3 d-inline\">";
                          if(isset($linha3->endereco_foto))
                          {
                              echo "<img src=\"$linha3->endereco_foto\" class=\"test\">";
                          }
                          else
                          {
                              echo "<img src=\"fotos/sistema/produtosemfoto.jpg\" class=\"test\">";
                          }
                  echo "  </div>
                          <div class=\"p-1 d-inline mt-2\">
                            <div class=\"pl-3\">$linha4->nome_produto | R$ $linha4->preco_produto,00</div>
                          </div>
                        </div>
                      </div>
                      <div id=\"conversa\" class=\"mt-3\">";
                        if(isset($_POST["mensagem"]))
                        {
                            $mensagem = $_POST["mensagem"];
                            $sql6 = "insert into mensagenschat (cod_chat, remetente_chat, destinatario_chat, corpo_mensagem) values ('$codchat','$meuemail','$receptor','$mensagem')";
                            $resultado6 = $conexao->query($sql6);
                          // header("refresh: 1;");
                        }
                        $sql5 = "select * from mensagenschat where cod_chat='$codchat'";
                        $resultado5 = $conexao->query($sql5);
                        while($linha5 = $resultado5->fetch_object())
                        {
                            $data = $linha5->data_envio;
                            $novadata = date('d/m/Y H:i', strtotime($data));
                            if($linha5->remetente_chat == $meuemail)
                            {
                                echo "
                                    <div class=\"mensagem\" align=\"right\">
                                        <span class=\"remetente bg-success d-inline-block\">$linha5->corpo_mensagem<div align=\"right\"><small>$novadata</small></div></span>
                                    </div>
                                        ";
                            }
                            else
                            {
                                echo "
                                    <div class=\"mensagem\" align=\"left\">
                                        <span class=\"destinatario bg-warning d-inline-block\">$linha5->corpo_mensagem<div align=\"right\"><small>$novadata</small></div></span>
                                    </div>
                                        ";
                            }
                        }
                echo "</div>
                    </div>
                  </div>
                </div>
              </div>";
            }
            else
            {
                echo "erro";
            }
        }
	}
	else
	{
		header("Location:login.php");
	}
?>