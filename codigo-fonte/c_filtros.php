<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}

    include("conexao.php");

    if(isset($_POST["categoriaFiltro"]) && $_POST["categoriaFiltro"] == 0)
    {
        $categoriaFiltro = $_POST["categoriaFiltro"];
        $minmoney = $_POST["minmoney"];
        $maxmoney = $_POST["maxmoney"];
        $estado = $_POST["estado"];
        $palavra = $_POST["palavra"];

        $parte1="";
        $parte2="";

        if(isset($_POST["minmoney"]) && isset($_POST["maxmoney"]))
        {
            $parte1=" and (preco_produto between $minmoney and $maxmoney)";
        }
        if(isset($_POST["estado"]))
        {
            if($estado == 1)
            {
                $parte2=" and (estado_produto='Novo' or estado_produto='Usado')";
            }
            if($estado == 2)
            {
                $parte2=" and (estado_produto='Novo')";
            }
            if($estado == 3)
            {
                $parte2=" and (estado_produto='Usado')";
            }
        }
        $sql = "select * from cadastro_produto where nome_produto like '%$palavra%' and status_produto = 'Ativo' $parte1 $parte2";

    }
    if(isset($_POST["categoriaFiltro"]) && $_POST["categoriaFiltro"] == 4)
    {
        $categoriaFiltro = $_POST["categoriaFiltro"];
        $minmoney = $_POST["minmoney"];
        $maxmoney = $_POST["maxmoney"];
        $estado = $_POST["estado"];
        $marca = $_POST["marca"];
        $linha = $_POST["linha"];
        $modelo = $_POST["modelo"];
        $mininterna = $_POST["mininterna"];
        $maxinterna = $_POST["maxinterna"];
        $minram = $_POST["minram"];
        $maxram = $_POST["maxram"];
        $minprincipal = $_POST["minprincipal"];
        $maxprincipal = $_POST["maxprincipal"];
        $minfrontal = $_POST["minfrontal"];
        $maxfrontal = $_POST["maxfrontal"];

        $parte1="";
        $parte2="";
        $parte3="";
        $parte4="";
        $parte5="";
        $parte6="";
        $parte7="";
        $parte8="";
        $parte9="";

        if(isset($_POST["minmoney"]) && isset($_POST["maxmoney"]))
        {
            $parte1=" and (cadastro_produto.preco_produto between $minmoney and $maxmoney)";
        }
        if(isset($_POST["estado"]))
        {
            if($estado == 1)
            {
                $parte2=" and (cadastro_produto.estado_produto='Novo' or cadastro_produto.estado_produto='Usado')";
            }
            if($estado == 2)
            {
                $parte2=" and (cadastro_produto.estado_produto='Novo')";
            }
            if($estado == 3)
            {
                $parte2=" and (cadastro_produto.estado_produto='Usado')";
            }
        }
        if(isset($_POST["marca"]))
        {
            if($marca == 0)
            {
                $parte3="";
            }
            else
            {
                $parte3 = " and (fichatec_tablets.cod_marca_tablet='$marca')";
            }
        }
        if(isset($_POST["linha"]))
        {
            if($linha == 0)
            {
                $parte4="";
            }
            else
            {
                $parte4 = " and (fichatec_tablets.cod_linha_tablet='$linha')";
            }
        }
        if(isset($_POST["modelo"]))
        {
            if($modelo == 0)
            {
                $parte5="";
            }
            else
            {
                $parte5 = " and (fichatec_tablets.cod_modelo_tablet='$modelo')";
            }
        }
        if(isset($_POST["mininterna"]) && isset($_POST["maxinterna"]))
        {
            $parte6 = " and (fichatec_tablets.memoria_interna between $mininterna and $maxinterna)";
        }
        if(isset($_POST["minram"]) && isset($_POST["maxram"]))
        {
            $parte7 = " and (fichatec_tablets.memoria_ram between $minram and $maxram)";
        }
        if(isset($_POST["minprincipal"]) && isset($_POST["maxprincipal"]))
        {
            $parte8 = " and (fichatec_tablets.camera_traseira between $minprincipal and $maxprincipal)";
        }
        if(isset($_POST["minfrontal"]) && isset($_POST["maxfrontal"]))
        {
            $parte9 = " and (fichatec_tablets.camera_frontal between $minfrontal and $maxfrontal)";
        }
        $sql = "select * from cadastro_produto, fichatec_tablets where cadastro_produto.cod_categoria_produto='$categoriaFiltro' and cadastro_produto.status_produto='Ativo' $parte1 $parte2 and (fichatec_tablets.cod_produto = cadastro_produto.cod_produto) $parte3 $parte4 $parte5 $parte6 $parte7 $parte8 $parte9";
    }
    if(isset($_POST["categoriaFiltro"]) && $_POST["categoriaFiltro"] == 5)
    {
        $categoriaFiltro = $_POST["categoriaFiltro"];
        $minmoney = $_POST["minmoney"];
        $maxmoney = $_POST["maxmoney"];
        $estado = $_POST["estado"];
        $marca = $_POST["marca"];
        $linha = $_POST["linha"];
        $modelo = $_POST["modelo"];
        $mininterna = $_POST["mininterna"];
        $maxinterna = $_POST["maxinterna"];
        $minram = $_POST["minram"];
        $maxram = $_POST["maxram"];
        $minprincipal = $_POST["minprincipal"];
        $maxprincipal = $_POST["maxprincipal"];
        $minfrontal = $_POST["minfrontal"];
        $maxfrontal = $_POST["maxfrontal"];

        $parte1="";
        $parte2="";
        $parte3="";
        $parte4="";
        $parte5="";
        $parte6="";
        $parte7="";
        $parte8="";
        $parte9="";

        if(isset($_POST["minmoney"]) && isset($_POST["maxmoney"]))
        {
            $parte1=" and (cadastro_produto.preco_produto between $minmoney and $maxmoney)";
        }
        if(isset($_POST["estado"]))
        {
            if($estado == 1)
            {
                $parte2=" and (cadastro_produto.estado_produto='Novo' or cadastro_produto.estado_produto='Usado')";
            }
            if($estado == 2)
            {
                $parte2=" and (cadastro_produto.estado_produto='Novo')";
            }
            if($estado == 3)
            {
                $parte2=" and (cadastro_produto.estado_produto='Usado')";
            }
        }
        if(isset($_POST["marca"]))
        {
            if($marca == 0)
            {
                $parte3="";
            }
            else
            {
                $parte3 = " and (fichatec_celulares.cod_marca_celular='$marca')";
            }
        }
        if(isset($_POST["linha"]))
        {
            if($linha == 0)
            {
                $parte4="";
            }
            else
            {
                $parte4 = " and (fichatec_celulares.cod_linha_celular='$linha')";
            }
        }
        if(isset($_POST["modelo"]))
        {
            if($modelo == 0)
            {
                $parte5="";
            }
            else
            {
                $parte5 = " and (fichatec_celulares.cod_modelo_celular='$modelo')";
            }
        }
        if(isset($_POST["mininterna"]) && isset($_POST["maxinterna"]))
        {
            $parte6 = " and (fichatec_celulares.memoria_interna between $mininterna and $maxinterna)";
        }
        if(isset($_POST["minram"]) && isset($_POST["maxram"]))
        {
            $parte7 = " and (fichatec_celulares.memoria_ram between $minram and $maxram)";
        }
        if(isset($_POST["minprincipal"]) && isset($_POST["maxprincipal"]))
        {
            $parte8 = " and (fichatec_celulares.camera_traseira between $minprincipal and $maxprincipal)";
        }
        if(isset($_POST["minfrontal"]) && isset($_POST["maxfrontal"]))
        {
            $parte9 = " and (fichatec_celulares.camera_frontal between $minfrontal and $maxfrontal)";
        }
        $sql = "select * from cadastro_produto, fichatec_celulares where cadastro_produto.cod_categoria_produto='$categoriaFiltro' and cadastro_produto.status_produto='Ativo' $parte1 $parte2 and (fichatec_celulares.cod_produto = cadastro_produto.cod_produto) $parte3 $parte4 $parte5 $parte6 $parte7 $parte8 $parte9";
    }
    if(isset($_POST["categoriaFiltro"]) && $_POST["categoriaFiltro"] == 2)
    {
        $categoriaFiltro = $_POST["categoriaFiltro"];
        $minmoney = $_POST["minmoney"];
        $maxmoney = $_POST["maxmoney"];
        $estado = $_POST["estado"];
        $marca = $_POST["marca"];
        $linha = $_POST["linha"];
        $modelo = $_POST["modelo"];
        $tiporam = $_POST["tiporam"];
        $minram = $_POST["minram"];
        $marcaproc = $_POST["marcaproc"];
        $modeloproc = $_POST["modeloproc"];
        $minssd = $_POST["minssd"];
        $maxssd = $_POST["maxssd"];
        $minhd = $_POST["minhd"];
        $maxhd = $_POST["maxhd"];
        $check2em1 = $_POST["check2em1"];
        $checkgamer= $_POST["checkgamer"];
        $checkultrabook = $_POST["checkultrabook"];
        $checkplacadevideo = $_POST["checkplacadevideo"];
        $checkwindows = $_POST["checkwindows"];
        $checklinux = $_POST["checklinux"];
        $checkmacos = $_POST["checkmacos"];
        $checkusbc = $_POST["checkusbc"];
        $checkssd = $_POST["checkssd"];
        
        $parte1="";
        $parte2="";
        $parte3="";
        $parte4="";
        $parte5="";
        $parte6="";
        $parte7="";
        $parte8="";
        $parte9="";
        $parte10="";
        $parte11="";
        $parte12="";
        $parte13="";
        $parte14="";
        $parte15="";
        $parte16="";
        $parte17="";
        $parte18="";

        if(isset($_POST["minmoney"]) && isset($_POST["maxmoney"]))
        {
            $parte1=" and (cadastro_produto.preco_produto between $minmoney and $maxmoney)";
        }
        if(isset($_POST["estado"]))
        {
            if($estado == 1)
            {
                $parte2=" and (cadastro_produto.estado_produto='Novo' or cadastro_produto.estado_produto='Usado')";
            }
            if($estado == 2)
            {
                $parte2=" and (cadastro_produto.estado_produto='Novo')";
            }
            if($estado == 3)
            {
                $parte2=" and (cadastro_produto.estado_produto='Usado')";
            }
        }
        if(isset($_POST["marca"]))
        {
            if($marca == 0)
            {
                $parte3="";
            }
            else
            {
                $parte3 = " and (fichatec_notebooks.cod_marca_notebook='$marca')";
            }
        }
        if(isset($_POST["linha"]))
        {
            if($linha == 0)
            {
                $parte4="";
            }
            else
            {
                $parte4 = " and (fichatec_notebooks.cod_linha_notebook='$linha')";
            }
        }
        if(isset($_POST["modelo"]))
        {
            if($modelo == 0)
            {
                $parte5="";
            }
            else
            {
                $parte5 = " and (fichatec_notebooks.cod_modelo_notebook='$modelo')";
            }
        }
        if(isset($_POST["tiporam"]) && isset($_POST["minram"]))
        {
            if($tiporam == 0)
            {
                $parte6 = " and (fichatec_notebooks.qntd_memoria_ram between $minram and 999999)";
            }
            else
            {
                $parte6 = " and (fichatec_notebooks.tipo_memoria_ram='$tiporam') and (fichatec_notebooks.qntd_memoria_ram between $minram and 999999)";
            }
        }
        if(isset($_POST["marcaproc"]) && isset($_POST["modeloproc"]))
        {
            if($marcaproc == 0 || $modeloproc == 0)
            {
                $parte7 = "";
            }
            else
            {
                $parte7 = " and (fichatec_notebooks.marca_processador='$marcaproc') and (fichatec_notebooks.modelo_processador='$modeloproc')";
            }
        }
        if(isset($_POST["minssd"]) && isset($_POST["maxssd"]))
        {
            $parte8 = " and (fichatec_notebooks.armazenamento_ssd between $minssd and $maxssd)";
        }
        if(isset($_POST["minhd"]) && isset($_POST["maxhd"]))
        {
            $parte9 = " and (fichatec_notebooks.armazenamento_hd between $minhd and $maxhd)";
        }
        if(isset($_POST["check2em1"]))
        {
            if($check2em1 == "0")
            {
                $parte10 = "";
            }
            else
            {
                $parte10 = " and (fichatec_notebooks.doisemum='$check2em1')";
            }
        }
        if(isset($_POST["checkgamer"]))
        {
            if($checkgamer == "0")
            {
                $parte11 = "";
            }
            else
            {
                $parte11 = " and (fichatec_notebooks.gamer='$checkgamer')";
            }
        }
        if(isset($_POST["checkultrabook"]))
        {
            if($checkultrabook == "0")
            {
                $parte12 = "";
            }
            else
            {
                $parte12 = " and (fichatec_notebooks.ultrabook='$checkultrabook')";
            }
        }
        if(isset($_POST["checkplacadevideo"]))
        {
            if($checkplacadevideo == "0")
            {
                $parte13 = "";
            }
            else
            {
                $parte13 = " and (fichatec_notebooks.placa_de_video='$checkplacadevideo')";
            }
        }
        if(isset($_POST["checkwindows"]))
        {
            if($checkwindows == "0")
            {
                $parte14 = "";
            }
            else
            {
                $parte14 = " and (fichatec_notebooks.windows='$checkwindows')";
            }
        }
        if(isset($_POST["checklinux"]))
        {
            if($checklinux == "0")
            {
                $parte15 = "";
            }
            else
            {
                $parte15 = " and (fichatec_notebooks.linux='$checklinux')";
            }
        }
        if(isset($_POST["checkmacos"]))
        {
            if($checkmacos == "0")
            {
                $parte16 = "";
            }
            else
            {
                $parte16 = " and (fichatec_notebooks.macOS='$checkmacos')";
            }
        }
        if(isset($_POST["checkusbc"]))
        {
            if($checkusbc == "0")
            {
                $parte17 = "";
            }
            else
            {
                $parte17 = " and (fichatec_notebooks.USB_C='$checkusbc')";
            }
        }
        if(isset($_POST["checkssd"]))
        {
            if($checkssd == "0")
            {
                $parte18 = "";
            }
            else
            {
                $parte18 = " and (fichatec_notebooks.SSD='$checkssd')";
            }
        }
        $sql = "select * from cadastro_produto, fichatec_notebooks where cadastro_produto.cod_categoria_produto='$categoriaFiltro' and cadastro_produto.status_produto='Ativo' $parte1 $parte2 and (fichatec_notebooks.cod_produto = cadastro_produto.cod_produto) $parte3 $parte4 $parte5 $parte6 $parte7 $parte8 $parte9 $parte10 $parte11 $parte12 $parte13 $parte14 $parte15 $parte16 $parte17 $parte18";
    }
    if(!isset($_POST["categoriaFiltro"]))
    {
        $categoria = $_POST["categoria"];
        $sql = "select * from cadastro_produto where cod_categoria_produto='$categoria' and status_produto='Ativo'";
    }
    $resultado = $conexao->query($sql);
    $valor = $resultado->num_rows;
    echo "<div class=\"col-12\">Foram encontratos $valor resultados para sua busca</div>";
    while($linha = $resultado->fetch_object())
    {
        $sql2="select endereco_foto from fotos_produto where cod_produto = $linha->cod_produto limit 1";
        $resultado2 = $conexao->query($sql2);
        $linha2 = $resultado2->fetch_object();

        $data = $linha->data_cadastro_produto;
        $novadata = date('d/m/Y H:i', strtotime($data));

        $cep = $linha->localizacao_produto;
        $url = "https://viacep.com.br/ws/".$cep."/json/";
        $data = file_get_contents($url);
        $resposta = json_decode($data);
        $cidade = $resposta->{'localidade'};
        $uf = $resposta->{'uf'};
        echo "<div class=\"col-lg-4 col-md-6 mb-4\">
                <a href=\"produto.php?cod_produto=$linha->cod_produto\" class=\"link_anuncio\">
                    <div class=\"card h-100\">";
                    if(isset($linha2->endereco_foto))
                    {
                        echo "<img class=\"card-img-top p-4\" src=\"$linha2->endereco_foto\" alt=\"\">";
                    }
                    else
                    {
                        echo "<img class=\"card-img-top p-4\" src=\"fotos/sistema/produtosemfoto.jpg\" alt=\"\">";
                    }
                echo "<div class=\"card-body\">
                            <h5>R$ $linha->preco_produto,00</h5>
                            <h6 class=\"card-title\">$linha->nome_produto</h6>
                        </div>
                        <div class=\"card-footer\">
                            <div>
                                <small>$novadata</small>
                            </div>
                            <div>
                                <small>$cidade - $uf</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>";
    }

    /*if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(isset($_POST["min"]) || isset($_POST["max"]))
    {
        $min = $_POST["min"];
        $max = $_POST["max"];
    }
    else
    {
        echo "0";
    }*/
?>