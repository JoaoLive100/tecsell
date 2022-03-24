<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  }
  
	include('header.php');
  include('menu_busca.php');
  $categoria = $_GET['cod_categoria'];
  $sql = "select nome_categoria from categorias where cod_categoria='$categoria'";
  $resultado = $conexao->query($sql);
  $nomeCategoria = $resultado->fetch_object()->nome_categoria;
?>
<script>
  $(document).ready(function() {
    categoria();
    carregaconteudo();
    function carregaconteudo() {
        var categoria = <?php echo "$categoria";?>;
        $.post("c_filtros.php",
        {
          categoria : categoria
        },function(dados)
        {
            if(dados == 0)
            {
                
            }
            else
            {
               $('#conteudo').html(dados);
            }
        });
    }
    if(<?php echo "$categoria";?> == 1)
    {
      categoriacomputadores();
    }
    if(<?php echo "$categoria";?> == 2)
    {
      categorialaptops();
    }
    if(<?php echo "$categoria";?> == 3)
    {
      categoriahardware();
    }
    if(<?php echo "$categoria";?> == 4)
    {
      categoriatablets();
    }
    if(<?php echo "$categoria";?> == 5)
    {
      categoriacelulares();
    }
  })
</script>
<style>
.card-img-top {
    width: 100%;
    height: 200px;
    object-fit: contain;
}
</style>
<div class="container">
  <div class="row">
    <div class="col-lg-12 mt-5">
    <h2><?php echo "$nomeCategoria"?></h2>
    </div>
    <div class="col-lg-3">
      <div class="list-group">
        <div class="list-group-item">
          <h6>Preço</h6>
          <div class="form-row">
            <div class="form-group col-lg-4">
              <input type="text" id="inputMin" class="form-control form-control-sm money" placeholder="Min.">
            </div>
            <div class="form-group col-lg-4">
              <input type="text" id="inputMax" class="form-control form-control-sm money" placeholder="Máx.">
            </div>
            <div class="form-group col-lg-4">
              <button class="btn btn-sm btn-outline-secondary my-2 my-sm-0 money_btn" id="money_btn" type="submit"><i class="fas fa-search"></i></button>
            </div>
          </div>
          <h6>Estado</h6>
          <div class="form-row">
            <div class="form-group col-lg-12">
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="todos" value="1" type="radio" name="estado-produto" checked>
                <label class="form-check-label" for="inlineRadio1"><small>Todos</small></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="novo" value="2" type="radio" name="estado-produto">
                <label class="form-check-label" for="inlineRadio1"><small>Novo</small></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="usado" value="3" type="radio" name="estado-produto">
                <label class="form-check-label" for="inlineRadio1"><small>Usado</small></label>
              </div>
            </div>
          </div>
          <hr>
        <?php
          if($nomeCategoria == "Celulares")
          {
            echo "<h6>Marca</h6>
                  <div class=\"form-row mb-2\">
                    <select class=\"form-control\" id=\"inputMarca\">
                      <option selected value=\"0\">---</option>";
                      $sql = "select * from marca_celulares where status_marca_celular='Ativo' order by nome_marca_celular";
                      $resultado = $conexao->query($sql);
                      while($linha = $resultado->fetch_object())
                      {
                          echo "<option value=\"$linha->cod_marca_celular\">$linha->nome_marca_celular</option>";
                      }
            echo "  </select>
                  </div>
                  <h6>Linha</h6>
                  <div class=\"form-row mb-2\">
                    <select class=\"form-control\" id=\"inputLinha\" disabled=\"true\">
                      <option selected value=\"0\">---</option>";
            echo "  </select>
                  </div>
                  <h6>Modelo</h6>
                  <div class=\"form-row mb-2\">
                    <select class=\"form-control\" id=\"inputModelo\" disabled=\"true\">
                      <option selected value=\"0\">---</option>";
            echo "  </select>
                  </div>
                  <hr>
                  <h6>Memória interna (GB)</h6>
                  <div class=\"form-row\">
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMinInterna\" class=\"form-control form-control-sm interna\" placeholder=\"Min.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMaxInterna\" class=\"form-control form-control-sm interna\" placeholder=\"Máx.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <button class=\"btn btn-sm btn-outline-secondary my-2 my-sm-0 interna_btn\" id=\"interna_btn\" type=\"submit\"><i class=\"fas fa-search\"></i></button>
                    </div>
                  </div>
                  <h6>Memória RAM (GB)</h6>
                  <div class=\"form-row\">
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMinRam\" class=\"form-control form-control-sm ram\" placeholder=\"Min.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMaxRam\" class=\"form-control form-control-sm ram\" placeholder=\"Máx.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <button class=\"btn btn-sm btn-outline-secondary my-2 my-sm-0 ram_btn\" id=\"ram_btn\" type=\"submit\"><i class=\"fas fa-search\"></i></button>
                    </div>
                  </div>
                  <hr>
                  <h6>Câmera Principal (Mpx)</h6>
                  <div class=\"form-row\">
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMinPrincipal\" class=\"form-control form-control-sm traseira\" placeholder=\"Min.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMaxPrincipal\" class=\"form-control form-control-sm traseira\" placeholder=\"Máx.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <button class=\"btn btn-sm btn-outline-secondary my-2 my-sm-0 principal_btn\" id=\"principal_btn\" type=\"submit\"><i class=\"fas fa-search\"></i></button>
                    </div>
                  </div>
                  <h6>Câmera Frontal (Mpx)</h6>
                  <div class=\"form-row\">
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMinFrontal\" class=\"form-control form-control-sm frontal\" placeholder=\"Min.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMaxFrontal\" class=\"form-control form-control-sm frontal\" placeholder=\"Máx.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <button class=\"btn btn-sm btn-outline-secondary my-2 my-sm-0 frontal_btn\" id=\"frontal_btn\" type=\"submit\"><i class=\"fas fa-search\"></i></button>
                    </div>
                  </div>";
          }
          if($nomeCategoria == "Computadores")
          {
          }
          if($nomeCategoria == "Hardware")
          {
          }
          if($nomeCategoria == "Laptops")
          {
            echo "<h6>Marca</h6>
                  <div class=\"form-row mb-2\">
                    <select class=\"form-control\" id=\"inputMarca\">
                      <option selected value=\"0\">---</option>";
                      $sql = "select * from marca_notebook where status_marca_notebook='Ativo' order by nome_marca_notebook";
                      $resultado = $conexao->query($sql);
                      while($linha = $resultado->fetch_object())
                      {
                          echo "<option value=\"$linha->cod_marca_notebook\">$linha->nome_marca_notebook</option>";
                      }
            echo "  </select>
                  </div>
                  <h6>Linha</h6>
                  <div class=\"form-row mb-2\">
                    <select class=\"form-control\" id=\"inputLinha\" disabled=\"true\">
                      <option selected value=\"0\">---</option>";
            echo "  </select>
                  </div>
                  <h6>Modelo</h6>
                  <div class=\"form-row mb-2\">
                    <select class=\"form-control\" id=\"inputModelo\" disabled=\"true\">
                      <option selected value=\"0\">---</option>";
            echo "  </select>
                  </div>
                  <hr>
                  <h6>Memória RAM</h6>
                  <div class=\"row\">
                    <div class=\"form-row mb-2 col-12\">
                      <select class=\"form-control form-control-sm col-5\" id=\"inputtipoRAM\" name=\"inputtipoRAM\">
                        <option selected value=\"0\">---</option>
                        <option value=\"DDR\">DDR</option>
                        <option value=\"DDR1\">DDR1</option>
                        <option value=\"DDR2\">DDR2</option>
                        <option value=\"DDR3\">DDR3</option>
                        <option value=\"DDR4\">DDR4</option>
                      </select>
                      <div class=\"form-group mb-2 col-5\">
                        <input type=\"text\" class=\"form-control form-control-sm ram\" id=\"inputRAM\" placeholder=\"Min. RAM\"> 
                      </div>
                      <div class=\"form-group col-2\">
                        <button class=\"btn btn-sm btn-outline-secondary my-2 my-sm-0 ram_btn\" id=\"ram_btn\" type=\"submit\"><i class=\"fas fa-search\"></i></button>
                      </div>
                    </div>
                  </div>
                  <h6>Processador</h6>
                  <div class=\"row\">
                    <div class=\"form-row mb-2 col-12\">
                      <select class=\"form-control form-control-sm col-5\" id=\"inputmarcaProc\" name=\"inputmarcaProc\">
                        <option selected value=\"0\">---</option>
                        <option value=\"Intel\">Intel</option>
                        <option value=\"AMD\">AMD</option>
                      </select>
                      <select class=\"form-control form-control-sm col-5\" id=\"inputmodeloProc\" name=\"inputmodeloProc\" disabled>
                        <option selected value=\"0\">---</option>
                        <option value=\"i3\">i3</option>
                        <option value=\"i5\">i5</option>
                        <option value=\"i7\">i7</option>
                        <option value=\"i9\">i9</option>
                        <option value=\"Ryzen 3\">Ryzen 3</option>
                        <option value=\"Ryzen 5\">Ryzen 5</option>
                        <option value=\"Ryzen 7\">Ryzen 7</option>
                        <option value=\"Ryzen 9\">Ryzen 9</option>
                      </select>
                      <div class=\"form-group col-2\">
                        <button class=\"btn btn-sm btn-outline-secondary my-2 my-sm-0 proc_btn\" id=\"proc_btn\" type=\"submit\"><i class=\"fas fa-search\"></i></button>
                      </div>
                    </div>
                  </div>
                  <h6>Armazenamento SSD</h6>
                  <div class=\"form-row\">
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMinSSD\" class=\"form-control form-control-sm interna\" placeholder=\"Min.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMaxSSD\" class=\"form-control form-control-sm interna\" placeholder=\"Máx.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <button class=\"btn btn-sm btn-outline-secondary my-2 my-sm-0 SSD_btn\" id=\"SSD_btn\" type=\"submit\"><i class=\"fas fa-search\"></i></button>
                    </div>
                  </div>
                  <h6>Armazenamento HD</h6>
                  <div class=\"form-row\">
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMinHD\" class=\"form-control form-control-sm interna\" placeholder=\"Min.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMaxHD\" class=\"form-control form-control-sm interna\" placeholder=\"Máx.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <button class=\"btn btn-sm btn-outline-secondary my-2 my-sm-0 HD_btn\" id=\"HD_btn\" type=\"submit\"><i class=\"fas fa-search\"></i></button>
                    </div>
                  </div>
                  <h6>Outras Caracteristicas</h6>
                  <input type=\"checkbox\" id=\"2em1\" class=\"check_note\">
                  <label for=\"vehicle1\">2 em 1</label><br>
                  <input type=\"checkbox\" id=\"gamer\" class=\"check_note\">
                  <label for=\"vehicle1\">Gamer</label><br>
                  <input type=\"checkbox\" id=\"ultrabook\" class=\"check_note\">
                  <label for=\"vehicle1\">Ultrabook</label><br>
                  <input type=\"checkbox\" id=\"placadevideo\" class=\"check_note\">
                  <label for=\"vehicle1\">Placa de vídeo</label><br>
                  <input type=\"checkbox\" id=\"windows\" class=\"check_note\">
                  <label for=\"vehicle1\">Windows</label><br>
                  <input type=\"checkbox\" id=\"linux\" class=\"check_note\">
                  <label for=\"vehicle1\">Linux</label><br>
                  <input type=\"checkbox\" id=\"macos\" class=\"check_note\">
                  <label for=\"vehicle1\">MacOS</label><br>
                  <input type=\"checkbox\" id=\"usbc\" class=\"check_note\">
                  <label for=\"vehicle1\">USB C</label><br>
                  <input type=\"checkbox\" id=\"ssd\" class=\"check_note\">
                  <label for=\"vehicle1\">SSD</label>";
          }
          if($nomeCategoria == "Tablets")
          {
            echo "<h6>Marca</h6>
            <div class=\"form-row mb-2\">
              <select class=\"form-control\" id=\"inputMarca\">
                <option selected value=\"0\">---</option>";
                $sql = "select * from marca_tablets where status_marca_tablet='Ativo' order by nome_marca_tablet";
                $resultado = $conexao->query($sql);
                while($linha = $resultado->fetch_object())
                {
                    echo "<option value=\"$linha->cod_marca_tablet\">$linha->nome_marca_tablet</option>";
                }
            echo "  </select>
                  </div>
                  <h6>Linha</h6>
                  <div class=\"form-row mb-2\">
                    <select class=\"form-control\" id=\"inputLinha\" disabled=\"true\">
                      <option selected value=\"0\">---</option>";
            echo "  </select>
                  </div>
                  <h6>Modelo</h6>
                  <div class=\"form-row mb-2\">
                    <select class=\"form-control\" id=\"inputModelo\" disabled=\"true\">
                      <option selected value=\"0\">---</option>";
            echo "  </select>
                  </div>
                  <hr>
                  <h6>Memória interna (GB)</h6>
                  <div class=\"form-row\">
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMinInterna\" class=\"form-control form-control-sm interna\" placeholder=\"Min.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMaxInterna\" class=\"form-control form-control-sm interna\" placeholder=\"Máx.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <button class=\"btn btn-sm btn-outline-secondary my-2 my-sm-0 interna_btn\" id=\"interna_btn\" type=\"submit\"><i class=\"fas fa-search\"></i></button>
                    </div>
                  </div>
                  <h6>Memória RAM (GB)</h6>
                  <div class=\"form-row\">
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMinRam\" class=\"form-control form-control-sm ram\" placeholder=\"Min.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMaxRam\" class=\"form-control form-control-sm ram\" placeholder=\"Máx.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <button class=\"btn btn-sm btn-outline-secondary my-2 my-sm-0 ram_btn\" id=\"ram_btn\" type=\"submit\"><i class=\"fas fa-search\"></i></button>
                    </div>
                  </div>
                  <hr>
                  <h6>Câmera Principal (Mpx)</h6>
                  <div class=\"form-row\">
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMinPrincipal\" class=\"form-control form-control-sm traseira\" placeholder=\"Min.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMaxPrincipal\" class=\"form-control form-control-sm traseira\" placeholder=\"Máx.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <button class=\"btn btn-sm btn-outline-secondary my-2 my-sm-0 principal_btn\" id=\"principal_btn\" type=\"submit\"><i class=\"fas fa-search\"></i></button>
                    </div>
                  </div>
                  <h6>Câmera Frontal (Mpx)</h6>
                  <div class=\"form-row\">
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMinFrontal\" class=\"form-control form-control-sm frontal\" placeholder=\"Min.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <input type=\"text\" id=\"inputMaxFrontal\" class=\"form-control form-control-sm frontal\" placeholder=\"Máx.\">
                    </div>
                    <div class=\"form-group col-lg-4\">
                      <button class=\"btn btn-sm btn-outline-secondary my-2 my-sm-0 frontal_btn\" id=\"frontal_btn\" type=\"submit\"><i class=\"fas fa-search\"></i></button>
                    </div>
                  </div>";
          }
        ?>
        </div>
      </div>
    </div>
    <div class="col-lg-9">
      <div class="row" id="conteudo">
      </div>
    </div>
  </div>
</div>
<?php
  include("footer.php");
?>