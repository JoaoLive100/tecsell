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
        computadores();
    })
</script>
<div class="container">
	<div class="row">
        <div class="col-lg-12 mt-5">
            <h2>Cadastrar Anúncio</h2>
            <div class="card h-150 p-4">
                <div id="div_cel" class="form-row">
                    <div class="col-lg-12">
                        <h4>2. Computadores: preencha os dados referentes ao seu produto</h4>
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
                        <div class="alert alert-secondary mb-5 text-justify" role="alert">
                            Observação: Na próxima etapa você deverá preencher dados relacionados ao seu computador.
                             Se desejar informar mais detalhes a respeito de periféricos, marca de componentes, estado
                             de uso, e outros, use o campo descrição. Quanto mais detalhes você informar, maior será
                                a chance de encontrar um comprador. Campos marcados com um * deverão ser preenchidos.
                        </div>
                        <div class="col-12 mb-3">
                            <label for="inputFichaTecnica">Ficha Técnica</label>
                        </div>
                        <div class="col-12 row mx-auto">
                            <div class="col-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="2" style="text-align:center;">Memória RAM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Tipo*</th>
                                            <td>
                                                <select class="form-control" id="inputtipoRAM" name="inputtipoRAM">
                                                    <option selected value="0">---</option>
                                                    <option value="DDR">DDR</option>
                                                    <option value="DDR1">DDR1</option>
                                                    <option value="DDR2">DDR2</option>
                                                    <option value="DDR3">DDR3</option>
                                                    <option value="DDR4">DDR4</option>

                                                </select>
                                                <small id="tipoRAMHelp" class="form-text">Preencha o campo</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Quantidade (GB)*</th>
                                            <td>
                                                <input type="text" class="form-control ram" name="inputRAM" id="inputRAM" placeholder="RAM" required>    
                                                <small id="RAMHelp" class="form-text">Preencha o campo</small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="2" style="text-align:center;">Processador</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Marca*</th>
                                            <td>
                                                <select class="form-control" id="inputmarcaProc" name="inputmarcaProc">
                                                    <option selected value="0">---</option>
                                                    <option value="Intel">Intel</option>
                                                    <option value="AMD">AMD</option>
                                                    <?php
                                                    ?>
                                                </select>
                                                <small id="procmarcaHelp" class="form-text">Preencha o campo</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Modelo*</th>
                                            <td>
                                                <select class="form-control" id="inputmodeloProc" disabled="true" name="inputmodeloProc">
                                                    <option selected value="0">---</option>
                                                    <option value="i3">teste</option>
                                                    <option value="i5">teste</option>
                                                    <option value="i7">teste</option>
                                                    <option value="i9">teste</option>
                                                    <option value="Ryzen 3">Ryzen 3</option>
                                                    <option value="Ryzen 5">Ryzen 5</option>
                                                    <option value="Ryzen 7">Ryzen 7</option>
                                                    <option value="Ryzen 9">Ryzen 9</option>
                                                    <?php
                                                    ?>
                                                </select>    
                                                <small id="procmodeloHelp" class="form-text">Preencha o campo</small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 row mx-auto">
                            <div class="col-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="2" style="text-align:center;">Armazenamento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">HD</th>
                                            <td>
                                                <input type="text" class="form-control hd" name="inputHD" id="inputHD" placeholder="HD" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">SSD</th>
                                            <td>
                                                <input type="text" class="form-control ssd" name="inputSSD" id="inputSSD" placeholder="SSD" required>    
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <small id="armazenamentoHelp" class="form-text">Preencha HD ou SSD</small>
                            </div>
                            <div class="col-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="2" style="text-align:center;">Outras Caracteristicas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="">
                                                    <input type="checkbox" id="2em1"> 2 em 1
                                                </label><br>
                                                <label for="">
                                                    <input type="checkbox" id="gamer"> Gamer
                                                </label><br>
                                                <label for="">
                                                    <input type="checkbox" id="ultrabook"> Ultrabook
                                                </label><br>
                                                <label for="">
                                                    <input type="checkbox" id="placadevideo"> Placa de vídeo
                                                </label><br>
                                                <label for="">
                                                    <input type="checkbox" id="windows"> Windows
                                                </label><br>
                                            </td>
                                            <td>
                                                <label for="">
                                                    <input type="checkbox" id="linux"> Linux
                                                </label><br>
                                                <label for="">
                                                    <input type="checkbox" id="macos"> MacOS
                                                </label><br>
                                                <label for="">
                                                    <input type="checkbox" id="usbc"> USB C
                                                </label><br>
                                                <label for="">
                                                    <input type="checkbox" id="ssd"> SSD
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-5">
                    <input value="Cadastrar" type="submit" id="btn_computador" class="btn btn-secondary mt-4 btn-lg col-3"></input>
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
    $("#btn_computador").click(function (e) {
       e.preventDefault();
        $.ajax({
            url: "c_computador.php",
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