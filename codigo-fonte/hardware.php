<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
	
	if(isset($_SESSION["logado_usuario"]) && $_SESSION['logado_usuario'] == "sim")
	{
		include('header.php');
		include('menu_busca.php');
?>
<style>
.nvb{
height: 0px;
visibility: hidden;
display: none;
}
.image_container {
	height: 120px;
	width: 48%;
	background-color: gray;
	border-radius: 6px;
	overflow: hidden;
	margin: 2px;
	border: 1px solid gray;
}
.image_container img {
	height: 100%;
	width: auto;
	object-fit: cover;
}
.image_container span {
	top: -6px;
	right: 8px;
	color: red;
	font-size: 28px;
	font-weight: normal;
	cursor: pointer;
}
small{
    color: red;
}
</style>
<script>
    $(document).ready(function() {
        hardware();
    })
</script>
<div class="container">
	<div class="row">
        <div class="col-lg-12 mt-5">
            <h2>Cadastrar Anúncio</h2>
            <div class="card h-150 p-4">
                <div id="div_cel" class="form-row">
                    <div class="col-lg-12">
                        <h4>2. Hardware: preencha os dados referentes ao seu produto</h4>
                    </div>
                    <div class="col-5">
                        <div class="col-12 mt-5 form-group">
                            <label for="inputFotos">Fotos (Adicione até 6 fotos)</label>
                            <div class="border rounded p-4">
                                <form class="form" action="#" method="post" id="form" enctype="multipart/form-data">
                                    <input type="file" id="foto" multiple="" accept="image/png, image/jpeg" class="d-none">
                                    <button class="btn btn-link" type="button" onclick="document.getElementById('foto').click()">Selecionar <i class="far fa-plus-square"></i></button>
                                </form>
                                <div class="card-body d-flex flex-wrap justify-content-start" id="container">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7 row">
                        <div class="col-12 mt-5 form-group">
                            <label for="inputTitulo">Título</label>
                            <input type="text" maxlength="150" class="form-control" name="inputTitulo" id="inputTitulo" placeholder="Título do anúncio" required>
                            <small id="tituloHelp" class="form-text">Preencha o Título</small>
                        </div>
                        <div class="col-4 form-group">
                            <label for="inputPreco">Preço (R$)</label>
                            <input type="text" maxlength="13" class="form-control money" name="inputPreco" id="inputPreco" placeholder="Preço do produto" required>
                            <small id="precoHelp" class="form-text">Preencha o Preço</small>
                        </div>
                        <div class="col-3 form-group">
                            <label for="inputEstado">Estado</label>
                            <select class="form-control" id="inputEstado">
                                <option selected value="0">---</option>
                                <option value="Novo">Novo</option>
                                <option value="Usado">Usado</option>
                            </select>
                            <small id="estadoHelp" class="form-text">Selecione o Estado</small>
                        </div>
                        <div class="col-5 form-group">
                            <label for="inputLocalizacao">Localização (CEP)</label>
                            <input type="text" maxlength="9" class="form-control cep" name="inputLocalizacao" id="inputLocalizacao" placeholder="Localização do anúncio" required>
                            <small id="localizacaoHelp" class="form-text">Preencha o CEP corretamente</small>
                        </div>
                        <div class="col-12 form-group">
                            <label for="inputDescricao">Descrição</label>
                            <textarea class="form-control" maxlength="10000" name="inputDescricao" id="inputDescricao" placeholder="Descrição do anúncio" rows="5" required></textarea>
                            <small id="descricaoHelp" class="form-text">Preencha a Descrição</small>
                        </div>
                        <div class="col-12 form-group">
                            <label for="inputTipo">Que tipo de Hardware você deseja anunciar?</label>
                            <select class="form-control" id="inputTipo">
                                <option selected value="0">---</option>
                                <option value="1">Processador</option>
                                <option value="2">Memória RAM</option>
                                <option value="3">Placa Mãe</option>
                                <option value="4">Placa de Vídeo</option>
                                <option value="5">Fonte de Alimentação</option>
                                <option value="6">HD</option>
                                <option value="7">SSD</option>
                            </select>
                        </div>
                        <div class="col-12 form-group">
                            <div id="processador" class="divs">
                                <div class="col-lg-12 row mx-auto">
                                    <div class="col-6">
                                        
                                    </div>
                                </div>
                            </div>
                            <div id="memoria-ram" class="divs">
                                <div class="col-lg-12 row mx-auto">
                                </div>
                            </div>
                            <div id="placa-mae" class="divs">
                                <div class="col-lg-12 row mx-auto">
                                </div>
                            </div>
                            <div id="placa-de-video" class="divs mt-3">
                                <div class="col-lg-12 row mx-auto">
                                    <div class="alert alert-secondary mb-5 text-justify" role="alert">
                                    Observação: Na próxima etapa você deverá preencher dados relacionados a sua placa de vídeo.
                                    Se desejar informar mais detalhes a respeito do produto, como: frequência de operação e boost, 
                                    resolução máxima, consumo, resfriamento, formatos de conexão, estado
                                    de uso, e outros, use o campo descrição. Quanto mais detalhes você informar, maior será
                                    a chance de encontrar um comprador. Campos marcados com um * deverão ser preenchidos.
                                    </div>
                                    <label for="marca-placa-de-video" class="col-4">Marca
                                        <select id="marca-placa-de-video" class="form-control">
                                            <option selected value="0">---</option>
                                            <option value="Pcyes">Pcyes</option>
                                            <option value="Asus">Asus</option>
                                            <option value="Nvidia">Nvidia</option>
                                            <option value="Gigabyte">Gigabyte</option>
                                            <option value="Galax">Galax</option>
                                            <option value="Evga">Evga</option>
                                            <option value="Zotac">Zotac</option>
                                            <option value="MSI">MSI</option>
                                        </select>
                                    </label>
                                    <label for="linha-placa-de-video" class="col-4">Linha
                                        <select id="linha-placa-de-video" class="form-control">
                                            <option selected value="0">---</option>
                                            <option value="1">teste</option>
                                        </select>
                                    </label>
                                    <label for="modelo-placa-de-video" class="col-4">Modelo
                                        <select id="modelo-placa-de-video" class="form-control">
                                            <option selected value="0">---</option>
                                            <option value="1">teste</option>
                                        </select>
                                    </label>
                                    <label for="tipo-vram-placa-de-video" class="col-3">Tipo Vram
                                        <select id="tipo-vram-placa-de-video" class="form-control">
                                            <option selected value="0">---</option>
                                            <option value="1">teste</option>
                                        </select>
                                    </label>
                                    <label for="vram-placa-de-video" class="col-4">Qtd. Vram
                                        <input type="text" id="vram-placa-de-video" class="form-control" placeholder="Vram">
                                    </label>
                                    <label for="interface-placa-mae" class="col-5">Interface da placa mãe
                                        <select id="interface-placa-mae" class="form-control">
                                            <option selected value="0">---</option>
                                            <option value="1">teste</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div id="fonte-de-alimentacao" class="divs">
                                <div class="col-lg-12 row mx-auto">
                                </div>
                            </div>
                            <div id="hd" class="divs">
                                <div class="col-lg-12 row mx-auto">
                                </div>
                            </div>
                            <div id="ssd" class="divs">
                                <div class="col-lg-12 row mx-auto">
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="text-right mt-5">
                    <input value="Cadastrar" type="submit" id="btn_hardware" class="btn btn-secondary mt-4 btn-lg col-3"></input>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var fotos = [];
    $("input[type=file]").change(function(){
        var tamanho = fotos.length;

        if (tamanho > 5){
            alert("Você pode inserir até 6 fotos!");
        }
        else
        {
            selecionarFotos();
        }
    });
    function selecionarFotos(){
        var foto = document.getElementById('foto').files;
        for (i=0;i < foto.length; i++)
        {
            fotos.push({
              name : foto[i].name,
              url : URL.createObjectURL(foto[i]),
              file : foto[i],
            })
        }
        $("#foto").val('');
        document.getElementById('container').innerHTML = mostrarFotos();
    }
    function mostrarFotos(){
        var foto = "";
        fotos.forEach((i) => {
            foto += `<div class="image_container d-flex justify-content-center position-relative">
                        <img src="`+ i.url +`" alt="fotos">
                        <span class="position-absolute" onclick="deletarFoto(`+ fotos.indexOf(i) +`)">&times;</span>
                    </div>`;
        })
        return foto;
    }
    function deletarFoto(e) {
        fotos.splice(e, 1);
        document.getElementById('container').innerHTML = mostrarFotos();
    }
    function get_image_data() {
        var titulo = $("#inputTitulo").val();
        var preco = $("#inputPreco").val();
        var estado = $("#inputEstado").val();
        var localizacao = $("#inputLocalizacao").val();
        var descricao = $("#inputDescricao").val();
   	  	var form = new FormData()
            for (let index = 0; index < fotos.length; index++) {
                form.append("file[" + index + "]", fotos[index]['file']);
            }
            form.append("titulo", titulo);
            form.append("preco", preco);
            form.append("estado", estado);
            form.append("localizacao", localizacao);
            form.append("descricao", descricao);
            return form;
   	}
    //upload do formulario para o banco de dados     
    $("#btn_hardware").click(function (e) {
       e.preventDefault();
        $.ajax({
            url: "c_hardware.php",
            type: "POST",
            processData: false,
            contentType: false,
            cache: false,
            data: get_image_data(),
            success: function (d) {
                if(d == 0)
                {
                    alert("preencha os dados corretamente!");
                }
                else
                {
                window.location.href = "cadastro_success.php";
                }
            }
        });
    });
</script>
<?php
    include("footer.php");
	}
	else
	{
		header("Location:login.php");
	}
?>