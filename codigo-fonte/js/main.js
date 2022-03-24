/*Este documento trata-se de todo o javascript
aplicado no projeto TecSell. Tentarei sempre que
possivel descrever a funcionalidade de cada trecho.*/

function categoria(){
    /*-------------------categoria.php-------------------*/
    //masks para campo
    $('.money').mask('000000'); //dinheiro
    //para liberar o botão de filtragem de preço deve-se primeiro inserir um min. ou max.
    submit(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
    $('#inputMin, #inputMax').keyup(submit); //ao escrever um valor no campo min. ou max. a função submit verifica se os campos estão preenchidos ou não
    function submit() {
        if ($('#inputMin').val().length > 0 || $('#inputMax').val().length > 0)
        {
            $(".money_btn[type=submit]").prop("disabled", false);
        }
        else
        {
            $(".money_btn[type=submit]").prop("disabled", true);
        }
    }
}

function categoriacelulares(){

    $('.interna').mask('0000');
    $('.ram').mask('00');
    $('.traseira').mask('000');
    $('.frontal').mask('000');

    submitinterna(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
    $('#inputMinInterna, #inputMaxInterna').keyup(submitinterna); //ao escrever um valor no campo min. ou max. a função submit verifica se os campos estão preenchidos ou não
    function submitinterna() {
      if ($('#inputMinInterna').val().length > 0 || $('#inputMaxInterna').val().length > 0)
      {
          $(".interna_btn[type=submit]").prop("disabled", false);
      }
      else
      {
          $(".interna_btn[type=submit]").prop("disabled", true);
      }
    }

    submitram();
    $('#inputMinRam, #inputMaxRam').keyup(submitram); //ao escrever um valor no campo min. ou max. a função submit verifica se os campos estão preenchidos ou não
    function submitram() {
      if ($('#inputMinRam').val().length > 0 || $('#inputMaxRam').val().length > 0)
      {
          $(".ram_btn[type=submit]").prop("disabled", false);
      }
      else
      {
          $(".ram_btn[type=submit]").prop("disabled", true);
      }
    }

    submitprincipal();
    $('#inputMinPrincipal, #inputMaxPrincipal').keyup(submitprincipal); //ao escrever um valor no campo min. ou max. a função submit verifica se os campos estão preenchidos ou não
    function submitprincipal() {
      if ($('#inputMinPrincipal').val().length > 0 || $('#inputMaxPrincipal').val().length > 0)
      {
          $(".principal_btn[type=submit]").prop("disabled", false);
      }
      else
      {
          $(".principal_btn[type=submit]").prop("disabled", true);
      }
    }

    submitfrontal();
    $('#inputMinFrontal, #inputMaxFrontal').keyup(submitfrontal); //ao escrever um valor no campo min. ou max. a função submit verifica se os campos estão preenchidos ou não
    function submitfrontal() {
        if ($('#inputMinFrontal').val().length > 0 || $('#inputMaxFrontal').val().length > 0)
        {
            $(".frontal_btn[type=submit]").prop("disabled", false);
        }
        else
        {
            $(".frontal_btn[type=submit]").prop("disabled", true);
        }
    }

    $('#inputMarca').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputMarca').val() == 0)
        {
            $('#inputLinha').prop('disabled', true);
            $('#inputLinha').prop('value', 0);
            $('#inputModelo').prop('disabled', true);
            $('#inputModelo').prop('value', 0);
        }
        else
        {
            $('#inputLinha').prop('disabled', false);
        }
    });

    $('#inputLinha').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputLinha').val() == 0)
        {
            $('#inputModelo').prop('disabled', true);
            $('#inputModelo').prop('value', 0);
        }
        else
        {
            $('#inputModelo').prop('disabled', false);
        }
    });

    $('#money_btn, #todos, #novo, #usado, #interna_btn, #ram_btn, #principal_btn, #frontal_btn').bind("click", filtragem);
    $('#inputMarca, #inputLinha, #inputModelo').bind("change", filtragem);
    function filtragem() {
        if ($('#inputMin').val()!='')
        {
            var minmoney = $('#inputMin').val();
        }
        else
        {
            var minmoney = "0";
        }

        if ($('#inputMax').val()!='')
        {
            var maxmoney = $('#inputMax').val();
        }
        else
        {
            var maxmoney = "999999";
        }

        if ($('#inputMinInterna').val()!='')
        {
            var mininterna = $('#inputMinInterna').val();
        }
        else
        {
            var mininterna = "0";
        }

        if ($('#inputMaxInterna').val()!='')
        {
            var maxinterna = $('#inputMaxInterna').val();
        }
        else
        {
            var maxinterna = "9999";
        }

        if ($('#inputMinRam').val()!='')
        {
            var minram = $('#inputMinRam').val();
        }
        else
        {
            var minram = "0";
        }

        if ($('#inputMaxRam').val()!='')
        {
            var maxram = $('#inputMaxRam').val();
        }
        else
        {
            var maxram = "99";
        }

        if ($('#inputMinPrincipal').val()!='')
        {
            var minprincipal = $('#inputMinPrincipal').val();
        }
        else
        {
            var minprincipal = "0";
        }

        if ($('#inputMaxPrincipal').val()!='')
        {
            var maxprincipal = $('#inputMaxPrincipal').val();
        }
        else
        {
            var maxprincipal = "999";
        }

        if ($('#inputMinFrontal').val()!='')
        {
            var minfrontal = $('#inputMinFrontal').val();
        }
        else
        {
            var minfrontal = "0";
        }

        if ($('#inputMaxFrontal').val()!='')
        {
            var maxfrontal = $('#inputMaxFrontal').val();
        }
        else
        {
            var maxfrontal = "999";
        }
        var estado = $('input[name=estado-produto]:checked').val();
        var marca = $('#inputMarca').val();
        var linha = $('#inputLinha').val();
        var modelo = $('#inputModelo').val();

        var categoriaFiltro = 5;
        $.post("c_filtros.php",
        {
            categoriaFiltro : categoriaFiltro,
            minmoney : minmoney,
            maxmoney : maxmoney,
            estado : estado,
            marca : marca,
            linha : linha,
            modelo : modelo,
            mininterna : mininterna,
            maxinterna : maxinterna,
            minram : minram,
            maxram : maxram,
            minprincipal : minprincipal,
            maxprincipal : maxprincipal,
            minfrontal : minfrontal,
            maxfrontal : maxfrontal
        },function(dados)
        {
          if(dados == 1)
          {
            alert(dados);
          }
          else
          {
            $('#conteudo').html(dados);
          }
        }); 
    }

    $("#inputMarca").change(function(){
        marcacelular = $("#inputMarca").val();
        $.post("c_combobox.php",
        {
            marcacelular : marcacelular

        },function(dados)
        {
            $('#inputLinha').html('<option selected value="0">---</option>'+dados);
            $('#inputModelo').html('<option selected value="0">---</option>');
        });
    });
    $("#inputLinha").change(function(){
        linhacelular = $("#inputLinha").val();
        $.post("c_combobox.php",
        {
            linhacelular : linhacelular

        },function(dados)
        {
            $('#inputModelo').html('<option selected value="0">---</option>'+dados);
        });
    });
}

function categoriatablets(){

    $('.interna').mask('0000');
    $('.ram').mask('00');
    $('.traseira').mask('000');
    $('.frontal').mask('000');

    submitinterna(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
    $('#inputMinInterna, #inputMaxInterna').keyup(submitinterna); //ao escrever um valor no campo min. ou max. a função submit verifica se os campos estão preenchidos ou não
    function submitinterna() {
      if ($('#inputMinInterna').val().length > 0 || $('#inputMaxInterna').val().length > 0)
      {
          $(".interna_btn[type=submit]").prop("disabled", false);
      }
      else
      {
          $(".interna_btn[type=submit]").prop("disabled", true);
      }
    }

    submitram();
    $('#inputMinRam, #inputMaxRam').keyup(submitram); //ao escrever um valor no campo min. ou max. a função submit verifica se os campos estão preenchidos ou não
    function submitram() {
      if ($('#inputMinRam').val().length > 0 || $('#inputMaxRam').val().length > 0)
      {
          $(".ram_btn[type=submit]").prop("disabled", false);
      }
      else
      {
          $(".ram_btn[type=submit]").prop("disabled", true);
      }
    }

    submitprincipal();
    $('#inputMinPrincipal, #inputMaxPrincipal').keyup(submitprincipal); //ao escrever um valor no campo min. ou max. a função submit verifica se os campos estão preenchidos ou não
    function submitprincipal() {
      if ($('#inputMinPrincipal').val().length > 0 || $('#inputMaxPrincipal').val().length > 0)
      {
          $(".principal_btn[type=submit]").prop("disabled", false);
      }
      else
      {
          $(".principal_btn[type=submit]").prop("disabled", true);
      }
    }

    submitfrontal();
    $('#inputMinFrontal, #inputMaxFrontal').keyup(submitfrontal); //ao escrever um valor no campo min. ou max. a função submit verifica se os campos estão preenchidos ou não
    function submitfrontal() {
        if ($('#inputMinFrontal').val().length > 0 || $('#inputMaxFrontal').val().length > 0)
        {
            $(".frontal_btn[type=submit]").prop("disabled", false);
        }
        else
        {
            $(".frontal_btn[type=submit]").prop("disabled", true);
        }
    }
    $('#inputMarca').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputMarca').val() == 0)
        {
            $('#inputLinha').prop('disabled', true);
            $('#inputLinha').prop('value', 0);
            $('#inputModelo').prop('disabled', true);
            $('#inputModelo').prop('value', 0);
        }
        else
        {
            $('#inputLinha').prop('disabled', false);
        }
    });

    $('#inputLinha').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputLinha').val() == 0)
        {
            $('#inputModelo').prop('disabled', true);
            $('#inputModelo').prop('value', 0);
        }
        else
        {
            $('#inputModelo').prop('disabled', false);
        }
    });

    $('#money_btn, #todos, #novo, #usado, #interna_btn, #ram_btn, #principal_btn, #frontal_btn').bind("click", filtragem);
    $('#inputMarca, #inputLinha, #inputModelo').bind("change", filtragem);
    function filtragem() {
        if ($('#inputMin').val()!='')
        {
            var minmoney = $('#inputMin').val();
        }
        else
        {
            var minmoney = "0";
        }

        if ($('#inputMax').val()!='')
        {
            var maxmoney = $('#inputMax').val();
        }
        else
        {
            var maxmoney = "999999";
        }

        if ($('#inputMinInterna').val()!='')
        {
            var mininterna = $('#inputMinInterna').val();
        }
        else
        {
            var mininterna = "0";
        }

        if ($('#inputMaxInterna').val()!='')
        {
            var maxinterna = $('#inputMaxInterna').val();
        }
        else
        {
            var maxinterna = "9999";
        }

        if ($('#inputMinRam').val()!='')
        {
            var minram = $('#inputMinRam').val();
        }
        else
        {
            var minram = "0";
        }

        if ($('#inputMaxRam').val()!='')
        {
            var maxram = $('#inputMaxRam').val();
        }
        else
        {
            var maxram = "99";
        }

        if ($('#inputMinPrincipal').val()!='')
        {
            var minprincipal = $('#inputMinPrincipal').val();
        }
        else
        {
            var minprincipal = "0";
        }

        if ($('#inputMaxPrincipal').val()!='')
        {
            var maxprincipal = $('#inputMaxPrincipal').val();
        }
        else
        {
            var maxprincipal = "999";
        }

        if ($('#inputMinFrontal').val()!='')
        {
            var minfrontal = $('#inputMinFrontal').val();
        }
        else
        {
            var minfrontal = "0";
        }

        if ($('#inputMaxFrontal').val()!='')
        {
            var maxfrontal = $('#inputMaxFrontal').val();
        }
        else
        {
            var maxfrontal = "999";
        }
        var estado = $('input[name=estado-produto]:checked').val();
        var marca = $('#inputMarca').val();
        var linha = $('#inputLinha').val();
        var modelo = $('#inputModelo').val();

        var categoriaFiltro = 4;
        $.post("c_filtros.php",
        {
            categoriaFiltro : categoriaFiltro,
            minmoney : minmoney,
            maxmoney : maxmoney,
            estado : estado,
            marca : marca,
            linha : linha,
            modelo : modelo,
            mininterna : mininterna,
            maxinterna : maxinterna,
            minram : minram,
            maxram : maxram,
            minprincipal : minprincipal,
            maxprincipal : maxprincipal,
            minfrontal : minfrontal,
            maxfrontal : maxfrontal
        },function(dados)
        {
          if(dados == 1)
          {
            alert(dados);
          }
          else
          {
            $('#conteudo').html(dados);
          }
        }); 
    }

    $("#inputMarca").change(function(){
        marcatablet = $("#inputMarca").val();
        $.post("c_combobox.php",
        {
            marcatablet : marcatablet

        },function(dados)
        {
            $('#inputLinha').html('<option selected value="0">---</option>'+dados);
            $('#inputModelo').html('<option selected value="0">---</option>');
        });
    });
    $("#inputLinha").change(function(){
        linhatablet = $("#inputLinha").val();
        $.post("c_combobox.php",
        {
            linhatablet : linhatablet

        },function(dados)
        {
            $('#inputModelo').html('<option selected value="0">---</option>'+dados);
        });
    });

}

function categorialaptops(){
    $('.interna').mask('0000');
    $('.ram').mask('00');

    submitRAM(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
    $('#inputRAM').keyup(submitRAM); //ao escrever um valor no campo min. ou max. a função submit verifica se os campos estão preenchidos ou não
    $('#inputtipoRAM').change(submitRAM); //ao escrever um valor no campo min. ou max. a função submit verifica se os campos estão preenchidos ou não
    function submitRAM() {
      if ($('#inputRAM').val().length < 1 || $('#inputtipoRAM').val() == 0)
      {
          $("#ram_btn").prop("disabled", true);
      }
      else
      {
          $("#ram_btn").prop("disabled", false);
      }
    }

    submitProc();
    $('#inputmarcaProc, #inputmodeloProc').change(submitProc);
    function submitProc() {
        if($('#inputmarcaProc').val() == 0 || $('#inputmodeloProc').val() == 0)
        {
            $('#proc_btn').prop("disabled", true);
        }
        else
        {
            $('#proc_btn').prop("disabled", false);
        }
    }
    $('#inputmarcaProc').change(function (){
        if($('#inputmodeloProc').val() != 0)
        {
            $('#inputmodeloProc').prop('value', 0);
        }
        if ($('#inputmarcaProc').val() == 0)
        {
            $('#inputmodeloProc').prop('disabled', true);
            $('#inputmodeloProc').prop('value', 0);
        }
        else
        {
            $('#inputmodeloProc').prop('disabled', false);
        }
    });

    submitssd();
    $('#inputMinSSD, #inputMaxSSD').keyup(submitssd); //ao escrever um valor no campo min. ou max. a função submit verifica se os campos estão preenchidos ou não
    function submitssd() {
      if ($('#inputMinSSD').val().length > 0 || $('#inputMaxSSD').val().length > 0)
      {
          $("#SSD_btn").prop("disabled", false);
      }
      else
      {
          $("#SSD_btn").prop("disabled", true);
      }
    }

    submithd();
    $('#inputMinHD, #inputMaxHD').keyup(submithd); //ao escrever um valor no campo min. ou max. a função submit verifica se os campos estão preenchidos ou não
    function submithd() {
      if ($('#inputMinHD').val().length > 0 || $('#inputMaxHD').val().length > 0)
      {
          $("#HD_btn").prop("disabled", false);
      }
      else
      {
          $("#HD_btn").prop("disabled", true);
      }
    }

    $('#inputMarca').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputMarca').val() == 0)
        {
            $('#inputLinha').prop('disabled', true);
            $('#inputLinha').prop('value', 0);
            $('#inputModelo').prop('disabled', true);
            $('#inputModelo').prop('value', 0);
        }
        else
        {
            $('#inputLinha').prop('disabled', false);
        }
    });

    $('#inputLinha').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputLinha').val() == 0)
        {
            $('#inputModelo').prop('disabled', true);
            $('#inputModelo').prop('value', 0);
        }
        else
        {
            $('#inputModelo').prop('disabled', false);
        }
    });


    $("#inputMarca").change(function(){
        marcalaptops = $("#inputMarca").val();
        $.post("c_combobox.php",
        {
            marcalaptops : marcalaptops

        },function(dados)
        {
            $('#inputLinha').html('<option selected value="0">---</option>'+dados);
            $('#inputModelo').html('<option selected value="0">---</option>');
        });
    });
    $("#inputLinha").change(function(){
        linhalaptops = $("#inputLinha").val();
        $.post("c_combobox.php",
        {
            linhalaptops : linhalaptops

        },function(dados)
        {
            $('#inputModelo').html('<option selected value="0">---</option>'+dados);
        });
    });

    $('#money_btn, #todos, #novo, #usado, #ram_btn, #proc_btn, #SSD_btn, #HD_btn, .check_note').bind("click", filtragem);
    $('#inputMarca, #inputLinha, #inputModelo').bind("change", filtragem);
    function filtragem() {
        if ($('#inputMin').val()!='')
        {
            var minmoney = $('#inputMin').val();
        }
        else
        {
            var minmoney = "0";
        }

        if ($('#inputMax').val()!='')
        {
            var maxmoney = $('#inputMax').val();
        }
        else
        {
            var maxmoney = "999999";
        }

        if ($('#inputRAM').val()!='')
        {
            var minram = $('#inputRAM').val();
        }
        else
        {
            var minram = "0";
        }

        
        if ($('#inputMinSSD').val()!='')
        {
            var minssd = $('#inputMinSSD').val();
        }
        else
        {
            var minssd = "0";
        }

        if ($('#inputMaxSSD').val()!='')
        {
            var maxssd = $('#inputMaxSSD').val();
        }
        else
        {
            var maxssd = "99999";
        }

        
        if ($('#inputMinHD').val()!='')
        {
            var minhd = $('#inputMinHD').val();
        }
        else
        {
            var minhd = "0";
        }

        if ($('#inputMaxHD').val()!='')
        {
            var maxhd = $('#inputMaxHD').val();
        }
        else
        {
            var maxhd = "9999";
        }
        var estado = $('input[name=estado-produto]:checked').val();
        var marca = $('#inputMarca').val();
        var linha = $('#inputLinha').val();
        var modelo = $('#inputModelo').val();
        var tiporam = $('#inputtipoRAM').val();
        var marcaproc = $('#inputmarcaProc').val();
        var modeloproc = $('#inputmodeloProc').val();

        if($("#2em1").is(':checked') == true)
        {
            var check2em1 = "sim";
        }
        else
        {
            var check2em1 = "0";
        }
        if($("#gamer").is(':checked') == true)
        {
            var checkgamer = "sim";
        }
        else
        {
            var checkgamer = "0";
        }
        if($("#ultrabook").is(':checked') == true)
        {
            var checkultrabook = "sim";
        }
        else
        {
            var checkultrabook = "0";
        }
        if($("#placadevideo").is(':checked') == true)
        {
            var checkplacadevideo = "sim";
        }
        else
        {
            var checkplacadevideo = "0";
        }
        if($("#windows").is(':checked') == true)
        {
            var checkwindows = "sim";
        }
        else
        {
            var checkwindows = "0";
        }
        if($("#linux").is(':checked') == true)
        {
            var checklinux = "sim";
        }
        else
        {
            var checklinux = "0";
        }
        if($("#macos").is(':checked') == true)
        {
            var checkmacos = "sim";
        }
        else
        {
            var checkmacos = "0";
        }
        if($("#usbc").is(':checked') == true)
        {
            var checkusbc = "sim";
        }
        else
        {
            var checkusbc = "0";
        }
        if($("#ssd").is(':checked') == true)
        {
            var checkssd = "sim";
        }
        else
        {
            var checkssd = "0";
        }

        var categoriaFiltro = 2;
        $.post("c_filtros.php",
        {
            categoriaFiltro : categoriaFiltro,
            minmoney : minmoney,
            maxmoney : maxmoney,
            estado : estado,
            marca : marca,
            linha : linha,
            modelo : modelo,
            tiporam : tiporam,
            minram : minram,
            marcaproc : marcaproc,
            modeloproc : modeloproc,
            minssd : minssd,
            maxssd : maxssd,
            minhd : minhd,
            maxhd : maxhd,
            check2em1 : check2em1,
            checkgamer : checkgamer,
            checkultrabook : checkultrabook,
            checkplacadevideo : checkplacadevideo,
            checkwindows : checkwindows,
            checklinux : checklinux,
            checkmacos : checkmacos,
            checkusbc : checkusbc,
            checkssd : checkssd
        },function(dados)
        {
          if(dados == 1)
          {
            alert(dados);
          }
          else
          {
            $('#conteudo').html(dados);
          }
        }); 
    }
}


function criar_conta(){
    /*-------------------criar_conta.php-------------------*/
    //masks para campos
    $("#inputCelularCriar").mask("(00) 000000000"); //celular
    $("#inputCpfCriar").mask("000.000.000-00"); //cpf

    //esconder avisos de erro 
    esconderCriar(); //ao carregar a página a função esconder esconde os avisos de erro
    function esconderCriar(){
        $('#nomeHelpCriar').css('visibility','hidden');
        $('#sobrenomeHelpCriar').css('visibility','hidden');
        $('#cpfHelpCriar').css('visibility','hidden');
        $('#emailHelpCriar').css('visibility','hidden');
        $('#celularHelpCriar').css('visibility','hidden');
        $('#senhaHelpCriar').css('visibility','hidden');
    }

    //para liberar o botão de cadastro deve-se preencher todos os campos do formulário de cadastro
    submitCriar(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
    $('#inputNomeCriar, #inputSobrenomeCriar, #inputCpfCriar, #inputEmailCriar, #inputPasswordCriar, #inputCelularCriar').keyup(submitCriar); //ao escrever um valor nos campos do formulário a função submit verifica se os campos estão preenchidos ou não
    function submitCriar(){
        if ($('#inputNomeCriar').val().length > 0 &&
            $('#inputSobrenomeCriar').val().length > 0 &&
            $('#inputCpfCriar').val().length > 13 &&
            $('#inputEmailCriar').val().length > 0 &&
            $('#inputCelularCriar').val().length > 12 &&
            $('#inputPasswordCriar').val().length > 5) {
            $("#btn_confirma_criar").prop("disabled", false);
        }
        else {
            $("#btn_confirma_criar").prop("disabled", true);
        }
    }

    //caso os campos não estiverem preenchidos o sistema alertara o usuario indicando onde se encontra a irregularidade 
    $('#inputNomeCriar').keyup(function (){ //verifica se o campo nome está preenchido, se não, ativa o aviso de erro
        if ($('#inputNomeCriar').val().length < 1)
        {
            $('#inputNomeCriar').css('border', '1px red solid');
            $('#nomeHelpCriar').css('visibility','');
        }
        else
        {
            $('#inputNomeCriar').css('border', '');
            $('#nomeHelpCriar').css('visibility','hidden');
        }
    });
    $('#inputSobrenomeCriar').keyup(function (){ //verifica se o campo sobrenome está preenchido, se não, ativa o aviso de erro
        if ($('#inputSobrenomeCriar').val().length < 1)
        {
            $('#inputSobrenomeCriar').css('border', '1px red solid');
            $('#sobrenomeHelpCriar').css('visibility','');
        }
        else
        {
            $('#inputSobrenomeCriar').css('border', '');
            $('#sobrenomeHelpCriar').css('visibility','hidden');
        }
    });
    $('#inputCpfCriar').keyup(function (){ //verifica se o campo cpf está preenchido, se não, ativa o aviso de erro
        if ($('#inputCpfCriar').val().length < 14)
        {
            $('#inputCpfCriar').css('border', '1px red solid');
            $('#cpfHelpCriar').css('visibility','');
        }
        else
        {
            $('#inputCpfCriar').css('border', '');
            $('#cpfHelpCriar').css('visibility','hidden');
        }
    });
    $('#inputEmailCriar').keyup(function (){ //verifica se o campo email está preenchido, se não, ativa o aviso de erro
        if ($('#inputEmailCriar').val().length < 1)
        {
            $('#inputEmailCriar').css('border', '1px red solid');
            $('#emailHelpCriar').css('visibility','');
        }
        else
        {
            $('#inputEmailCriar').css('border', '');
            $('#emailHelpCriar').css('visibility','hidden');
        }
    });
    $('#inputCelularCriar').keyup(function (){ //verifica se o campo celular está preenchido, se não, ativa o aviso de erro
        if ($('#inputCelularCriar').val().length < 13)
        {
            $('#inputCelularCriar').css('border', '1px red solid');
            $('#celularHelpCriar').css('visibility','');
        }
        else
        {
            $('#inputCelularCriar').css('border', '');
            $('#celularHelpCriar').css('visibility','hidden');
        }
    });
    $('#inputPasswordCriar').keyup(function (){ //verifica se o campo senha está preenchido, se não, ativa o aviso de erro
        if ($('#inputPasswordCriar').val().length < 6)
        {
            $('#inputPasswordCriar').css('border', '1px red solid');
            $('#senhaHelpCriar').css('visibility','');
        }
        else
        {
            $('#inputPasswordCriar').css('border', '');
            $('#senhaHelpCriar').css('visibility','hidden');
        }
    });

    //upload do formulario para o banco de dados
    $("#btn_confirma_criar").click(function(){
        var nome = $("#inputNomeCriar").val();
        var sobrenome = $("#inputSobrenomeCriar").val();
        var cpf = $("#inputCpfCriar").val();
        var celular = $("#inputCelularCriar").val();
        var email = $("#inputEmailCriar").val();
        var senha = $("#inputPasswordCriar").val();
        $.post("c_cadastro.php",
        {
            nome : nome,
            sobrenome : sobrenome,
            cpf : cpf,
            celular : celular,
            email : email,
            senha : senha
        },function(dados)
            {
            if(dados == 0)
            {
                $('#inputEmailCriar').css('border', '1px red solid');
                $('#emailHelp2Criar').css('visibility','visible');
                $('#inputEmailCriar').keyup(function (){
                    $('#inputEmailCriar').css('border', '');
                    $('#emailHelp2Criar').css('visibility','hidden');
                });
            }
            else
            {
               window.location.href = "cadastro_success.php";
            }
        });
    });
}

function login(){
    /*-------------------login.php-------------------*/
    //esconder avisos de erro
    esconderLogin(); //ao carregar a página a função esconder esconde os avisos de erro
    function esconderLogin(){
        $('#emailHelpLogin').css('visibility','hidden');
        $('#senhaHelpLogin').css('visibility','hidden');
        $('#emailErrorLogin').hide();
        $('#senhaErrorLogin').hide();
    }

    //para liberar o botão de login deve-se preencher todos os campos do formulário de login
    submitLogin(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
    $('#inputEmailLogin, #inputPasswordLogin').keyup(submitLogin);//ao escrever um valor nos campos do formulário a função submit verifica se os campos estão preenchidos ou não
    function submitLogin(){
        if ($('#inputEmailLogin').val().length > 0 &&
            $('#inputPasswordLogin').val().length > 0) {
            $("#btn_entrar_login").prop("disabled", false);
        }
        else {
            $("#btn_entrar_login").prop("disabled", true);
        }
    }

    //caso os campos não estiverem preenchidos o sistema alertara o usuario indicando onde se encontra a irregularidade 
    $('#inputEmailLogin').keyup(function (){ //verifica se o campo email está preenchido, se não, ativa o aviso de erro
        if ($('#inputEmailLogin').val().length < 1)
        {
            $('#inputEmailLogin').css('border', '1px red solid');
            $('#emailHelpLogin').css('visibility','');
        }
        else
        {
            $('#inputEmailLogin').css('border', '');
            $('#emailHelpLogin').css('visibility','hidden');
        }
    });
    $('#inputPasswordLogin').keyup(function (){ //verifica se o campo senha está preenchido, se não, ativa o aviso de erro
        if ($('#inputPasswordLogin').val().length < 1)
        {
            $('#inputPasswordLogin').css('border', '1px red solid');
            $('#senhaHelpLogin').css('visibility','');
        }
        else
        {
            $('#inputPasswordLogin').css('border', '');
            $('#senhaHelpLogin').css('visibility','hidden');
        }
    });

    //submit dos valores para o sistema de autenticação
    $("#btn_entrar_login").click(function(){
    var email = $("#inputEmailLogin").val();
    var senha = $("#inputPasswordLogin").val();

    $.post("c_login.php",
    {
        email : email,
        senha : senha
    },function(dados)
        {
        if(dados == 0)
        {
            $('#loginErrorLogin').css('visibility','visible');
            $('#inputEmailLogin').keyup(function (){
            $('#loginErrorLogin').css('visibility','hidden');
            });
            $('#inputPasswordLogin').keyup(function (){
            $('#loginErrorLogin').css('visibility','hidden');
            });
        }
        else
        {
            window.history.back();
        }
        });
    });
}

function recuperar(){
    /*-------------------login.php-------------------*/
    $("#inputCodigoRecuperar").mask("0000"); //cpf
    //esconder avisos de erro
    esconderRecuperar(); //ao carregar a página a função esconder esconde os avisos de erro
    function esconderRecuperar(){
        $('#emailHelp').css('visibility','hidden');
        $('#erro').hide();
        $('#sucesso').hide();
        $('#inserircodigo').hide();
        $('#novasenha').hide();
    }
    //para liberar o botão de login deve-se preencher todos os campos do formulário de login
    submitRecuperar(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
    $('#inputEmailRecuperar').keyup(submitRecuperar);//ao escrever um valor nos campos do formulário a função submit verifica se os campos estão preenchidos ou não
    function submitRecuperar(){
        if ($('#inputEmailRecuperar').val().length > 0){
            $("#btn_recuperar").prop("disabled", false);
        }
        else {
            $("#btn_recuperar").prop("disabled", true);
        }
    }
    //caso os campos não estiverem preenchidos o sistema alertara o usuario indicando onde se encontra a irregularidade 
    $('#inputEmailRecuperar').keyup(function (){ //verifica se o campo email está preenchido, se não, ativa o aviso de erro
        if ($('#inputEmailRecuperar').val().length < 1)
        {
            $('#inputEmailRecuperar').css('border', '1px red solid');
            $('#emailHelp').css('visibility','');
        }
        else
        {
            $('#inputEmailRecuperar').css('border', '');
            $('#emailHelp').css('visibility','hidden');
        }
    });
    //submit dos valores para o sistema de autenticação
    $("#btn_recuperar").click(function(){
        var email = $("#inputEmailRecuperar").val();
    
        $.post("c_recuperar.php",
        {
            email : email

        },function(dados)
            {
            if(dados == 0)
            {
                $('#normal').hide();
                $('#erro').show();
            }
            else
            {
                $("#inseriremail").hide();
                $("#inserircodigo").show();
                $('#codigoHelp').css('visibility','hidden');
                $("#erroCodigo").hide();
                //para liberar o botão de login deve-se preencher todos os campos do formulário de login
                submitCodigo(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
                $('#inputCodigoRecuperar').keyup(submitCodigo);//ao escrever um valor nos campos do formulário a função submit verifica se os campos estão preenchidos ou não
                function submitCodigo(){
                    if ($('#inputCodigoRecuperar').val().length > 3){
                        $("#btn_codigo").prop("disabled", false);
                    }
                    else {
                        $("#btn_codigo").prop("disabled", true);
                    }
                }
                //caso os campos não estiverem preenchidos o sistema alertara o usuario indicando onde se encontra a irregularidade 
                $('#inputCodigoRecuperar').keyup(function (){ //verifica se o campo email está preenchido, se não, ativa o aviso de erro
                    if ($('#inputCodigoRecuperar').val().length < 4)
                    {
                        $('#inputCodigoRecuperar').css('border', '1px red solid');
                        $('#codigoHelp').css('visibility','');
                    }
                    else
                    {
                        $('#inputCodigoRecuperar').css('border', '');
                        $('#codigoHelp').css('visibility','hidden');
                    }
                });
                console.log(dados);
            }
        });
    });
    //submit dos valores para o sistema de autenticação
    $("#btn_codigo").click(function(){
        var codigo = $("#inputCodigoRecuperar").val();
        var emailcodigo = $("#inputEmailRecuperar").val();
        $.post("c_codigo.php",
        {
            emailcodigo : emailcodigo,
            codigo : codigo

        },function(dados)
            {
                console.log(dados);
            if(dados == 0)
            {
                $('#normalCodigo').hide();
                $('#erroCodigo').show();
            }
            else
            {
                $("#inserircodigo").hide();
                $("#novasenha").show();
                $("#senha1Help").css('visibility','hidden');
                $("#senha2Help").css('visibility','hidden');
                $("#verifyError").css('visibility','hidden');
                //para liberar o botão de login deve-se preencher todos os campos do formulário de login
                submitNovaSenha(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
                $('#senha1, #senha2').keyup(submitNovaSenha);//ao escrever um valor nos campos do formulário a função submit verifica se os campos estão preenchidos ou não
                function submitNovaSenha(){
                    if ($('#senha1').val().length > 5 && $('#senha2').val().length > 5){
                        $("#btn_alterar").prop("disabled", false);
                    }
                    else {
                        $("#btn_alterar").prop("disabled", true);
                    }
                }
                //caso os campos não estiverem preenchidos o sistema alertara o usuario indicando onde se encontra a irregularidade 
                $('#senha1').keyup(function (){ //verifica se o campo nome está preenchido, se não, ativa o aviso de erro
                    if ($('#senha1').val().length < 6)
                    {
                        $('#senha1').css('border', '1px red solid');
                        $('#senha1Help').css('visibility','');
                    }
                    else
                    {
                        $('#senha1').css('border', '');
                        $('#senha1Help').css('visibility','hidden');
                    }
                });
                //caso os campos não estiverem preenchidos o sistema alertara o usuario indicando onde se encontra a irregularidade 
                $('#senha2').keyup(function (){ //verifica se o campo nome está preenchido, se não, ativa o aviso de erro
                    if ($('#senha2').val().length < 6)
                    {
                        $('#senha2').css('border', '1px red solid');
                        $('#senha2Help').css('visibility','');
                    }
                    else
                    {
                        $('#senha2').css('border', '');
                        $('#senha2Help').css('visibility','hidden');
                    }
                });
            }
        });
    });
    //submit dos valores para o sistema de autenticação
    $("#btn_alterar").click(function(){
        var codigo = $("#inputCodigoRecuperar").val();
        var email = $("#inputEmailRecuperar").val();
        var senha1 = $("#senha1").val();
        var senha2 = $("#senha2").val();
        $.post("c_alterarsenha.php",
        {
            email : email,
            codigo : codigo,
            senha1 : senha1,
            senha2 : senha2

        },function(dados)
            {
                console.log(dados);
            if(dados == 0)
            {
                $("#verifyError").css('visibility','');
            }
            else
            {
                alert("Senha alterada com sucesso! Favor realizar o login novamente.")
                window.location.href = "index.php";
            }
        });
    });
}

function vender(){
    /*-------------------vender.php-------------------*/
    $("input[type=button]").prop("disabled", true);
    $("input:radio[name='categoria']").change(function(){
		if ($("input[name='categoria']:checked"))
		{
			$("input[type=button]").prop("disabled", false);
		}
		else
		{
			$("input[type=button]").prop("disabled", true);
		}
	});

    $("#btn_continuar").click(function(){
        var selecionado = $("input[name='categoria']:checked").val().toLowerCase();
        window.location.href = selecionado+".php";
    });
}

function meuperfil() {
    $("#inputCelular").mask("(00) 000000000"); //celular
    $("#inputCpf").mask("000.000.000-00"); //cpf

    //esconder avisos de erro 
    esconder(); //ao carregar a página a função esconder esconde os avisos de erro
    function esconder(){
        $('#nomeHelp').css('visibility','hidden');
        $('#sobrenomeHelp').css('visibility','hidden');
        $('#cpfHelp').css('visibility','hidden');
        $('#celularHelp').css('visibility','hidden');

        $('#senhaHelp').css('visibility','hidden');
        $('#senha2Help').css('visibility','hidden');
        $('#senhaError').css('visibility','hidden');
        $('#senha3Help').css('visibility','hidden');
        $('#senha4Help').css('visibility','hidden');
        $('#verifyError').css('visibility','hidden');
    }

    //para liberar o botão de cadastro deve-se preencher todos os campos do formulário de cadastro
    submit(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
    $('#inputNome, #inputSobrenome, #inputCpf, #inputCelular').bind("change keyup", submit); //ao escrever um valor nos campos do formulário a função submit verifica se os campos estão preenchidos ou não
    function submit(){
        if ($('#inputNome').val().length > 0 &&
            $('#inputSobrenome').val().length > 0 &&
            $('#inputCpf').val().length > 13 &&
            $('#inputCelular').val().length > 12) {
            $("#btn_salvar").prop("disabled", false);
        }
        else {
            $("#btn_salvar").prop("disabled", true);
        }
    }
    //para liberar o botão de cadastro deve-se preencher todos os campos do formulário de cadastro
    submit1(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
    $('#inputatualPassword, #inputnovaPassword').bind("change keyup", submit1); //ao escrever um valor nos campos do formulário a função submit verifica se os campos estão preenchidos ou não
    function submit1(){
        if ($('#inputatualPassword').val().length > 5 &&
        $('#inputnovaPassword').val().length > 5) {
        $("#btn_alterar").prop("disabled", false);
        }
        else {
            $("#btn_alterar").prop("disabled", true);
        }
    }
    //para liberar o botão de cadastro deve-se preencher todos os campos do formulário de cadastro
    submit2(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
    $('#senha1, #senha2').bind("change keyup", submit2); //ao escrever um valor nos campos do formulário a função submit verifica se os campos estão preenchidos ou não
    function submit2(){
        if ($('#senha1').val().length > 5 &&
        $('#senha2').val().length > 5) {
        $("#btn_desativar").prop("disabled", false);
        }
        else {
            $("#btn_desativar").prop("disabled", true);
        }
    }

    //caso os campos não estiverem preenchidos o sistema alertara o usuario indicando onde se encontra a irregularidade 
    $('#inputNome').keyup(function (){ //verifica se o campo nome está preenchido, se não, ativa o aviso de erro
        if ($('#inputNome').val().length < 1)
        {
            $('#inputNome').css('border', '1px red solid');
            $('#nomeHelp').css('visibility','');
        }
        else
        {
            $('#inputNome').css('border', '');
            $('#nomeHelp').css('visibility','hidden');
        }
    });
    $('#inputSobrenome').keyup(function (){ //verifica se o campo sobrenome está preenchido, se não, ativa o aviso de erro
        if ($('#inputSobrenome').val().length < 1)
        {
            $('#inputSobrenome').css('border', '1px red solid');
            $('#sobrenomeHelp').css('visibility','');
        }
        else
        {
            $('#inputSobrenome').css('border', '');
            $('#sobrenomeHelp').css('visibility','hidden');
        }
    });
    $('#inputCpf').keyup(function (){ //verifica se o campo cpf está preenchido, se não, ativa o aviso de erro
        if ($('#inputCpf').val().length < 14)
        {
            $('#inputCpf').css('border', '1px red solid');
            $('#cpfHelp').css('visibility','');
        }
        else
        {
            $('#inputCpf').css('border', '');
            $('#cpfHelp').css('visibility','hidden');
        }
    });
    $('#inputCelular').keyup(function (){ //verifica se o campo celular está preenchido, se não, ativa o aviso de erro
        if ($('#inputCelular').val().length < 13)
        {
            $('#inputCelular').css('border', '1px red solid');
            $('#celularHelp').css('visibility','');
        }
        else
        {
            $('#inputCelular').css('border', '');
            $('#celularHelp').css('visibility','hidden');
        }
    });

    $('#inputatualPassword').keyup(function (){ //verifica se o campo senha está preenchido, se não, ativa o aviso de erro
        if ($('#inputatualPassword').val().length < 6)
        {
            $('#inputatualPassword').css('border', '1px red solid');
            $('#senhaHelp').css('visibility','');
        }
        else
        {
            $('#inputatualPassword').css('border', '');
            $('#senhaHelp').css('visibility','hidden');
        }
    });
    $('#inputnovaPassword').keyup(function (){ //verifica se o campo senha está preenchido, se não, ativa o aviso de erro
        if ($('#inputnovaPassword').val().length < 6)
        {
            $('#inputnovaPassword').css('border', '1px red solid');
            $('#senha2Help').css('visibility','');
        }
        else
        {
            $('#inputnovaPassword').css('border', '');
            $('#senha2Help').css('visibility','hidden');
        }
    });

    $('#senha1').keyup(function (){ //verifica se o campo senha está preenchido, se não, ativa o aviso de erro
        if ($('#senha1').val().length < 6)
        {
            $('#senha1').css('border', '1px red solid');
            $('#senha3Help').css('visibility','');
        }
        else
        {
            $('#senha1').css('border', '');
            $('#senha3Help').css('visibility','hidden');
        }
    });
    $('#senha2').keyup(function (){ //verifica se o campo senha está preenchido, se não, ativa o aviso de erro
        if ($('#senha2').val().length < 6)
        {
            $('#senha2').css('border', '1px red solid');
            $('#senha4Help').css('visibility','');
        }
        else
        {
            $('#senha2').css('border', '');
            $('#senha4Help').css('visibility','hidden');
        }
    });

    //submit dos valores para o sistema de autenticação
    $("#btn_salvar").click(function(){
        var nome = $("#inputNome").val();
        var sobrenome = $("#inputSobrenome").val();
        var cpf = $("#inputCpf").val();
        var telefone = $("#inputCelular").val();
    
        $.post("c_meuperfil.php",
        {
            nome : nome,
            sobrenome : sobrenome,
            cpf : cpf,
            telefone : telefone
        },function(dados)
            {
            if(dados == 0)
            {
                console.log(dados);
            }
            else
            {
                alert("Dados atualizados com sucesso, para visualizar novas informações atualize a página!");
                console.log(dados);
            }
        });
    });

    //submit dos valores para o sistema de autenticação
    $("#btn_desativar").click(function(){
        var senha1 = $("#senha1").val();
        var senha2 = $("#senha2").val();

        $.post("c_meuperfil.php",
        {
            senha1 : senha1,
            senha2 : senha2
        },function(dados)
            {
            if(dados == 0)
            {
                $('#verifyError').css('visibility','visible');
                $('#senha1').keyup(function (){
                    $('#verifyError').css('visibility','hidden');
                });
                $('#senha2').keyup(function (){
                    $('#verifyError').css('visibility','hidden');
                });
                console.log(dados);
            }
            else
            {
                window.location.href = "sair.php";
                alert("Conta desativada! Você será redirecionado para home.")
                console.log(dados);
            }
        }); 
    });

    //submit dos valores para o sistema de autenticação
    $("#btn_alterar").click(function(){
        var senhaatual = $("#inputatualPassword").val();
        var novasenha= $("#inputnovaPassword").val();

        $.post("c_meuperfil.php",
        {
            senhaatual : senhaatual,
            novasenha : novasenha
        },function(dados)
            {
            if(dados == 0)
            {
                $('#senhaError').css('visibility','visible');
                $('#inputatualPassword').keyup(function (){
                    $('#senhaError').css('visibility','hidden');
                });
                $('#inputnovaPassword').keyup(function (){
                    $('#senhaError').css('visibility','hidden');
                });
                console.log(dados);
            }
            else
            {
                window.location.href = "sair.php";
                alert("Senha atualizada! Você devera fazer o login novamente.");
                console.log(dados);
            }
        }); 
    });

    //upload da foto de perfil
    $("input[type=file]").change(function(){
        var fd = new FormData();
        var files = $('#fotoperfil')[0].files;
        if(files.length > 0 ){
            fd.append('foto',files[0]);
            $.ajax({
                url: 'c_meuperfil.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response != 0){
                        console.log(response);
                        alert('Foto atualizada com sucesso!');
                        $("#perfil").attr("src",response); 
                    }
                    else{
                    console.log(response);
                    alert('Arquivo não enviado');
                    }
                },
            });
        }
        else{
            alert("Por favor, selecione uma foto.");
        }
    });
}
function celulares(){
    /*-------------------celulares.php-------------------*/
    $('.money').mask('0000000');
    $('.cep').mask('00000-000');
    $('.interna').mask('0000');
    $('.ram').mask('00');
    $('.traseira').mask('000');
    $('.frontal').mask('000');

    //esconder avisos de erro 
    esconder(); //ao carregar a página a função esconder esconde os avisos de erro
    function esconder(){
        $('#tituloHelp').css('visibility','hidden');
        $('#precoHelp').css('visibility','hidden');
        $('#estadoHelp').css('visibility','hidden');
        $('#localizacaoHelp').css('visibility','hidden');
        $('#descricaoHelp').css('visibility','hidden');
        $('#marcaHelp').css('visibility','hidden');
        $('#modeloHelp').css('visibility','hidden');
        $('#linhaHelp').css('visibility','hidden');
        $('#internaHelp').css('visibility','hidden');
        $('#RAMHelp').css('visibility','hidden');
    }

    //para liberar o botão de cadastro deve-se preencher todos os campos do formulário de cadastro
    submit(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
    $('#inputTitulo, #inputPreco, #inputEstado, #inputLocalizacao, #inputDescricao, #inputMarca, #inputModelo, #inputLinha, #inputInterna, #inputRAM').bind("change keyup", submit); //ao escrever um valor nos campos do formulário a função submit verifica se os campos estão preenchidos ou não
    function submit(){
        if ($('#inputTitulo').val().length > 0 &&
            $('#inputPreco').val().length > 0 &&
            $('#inputEstado').val() != 0 &&
            $('#inputLocalizacao').val().length > 8 &&
            $('#inputDescricao').val().length > 0 &&
            $('#inputMarca').val() != 0 &&
            $('#inputModelo').val()!= 0 &&
            $('#inputLinha').val() != 0 &&
            $('#inputInterna').val() > 0 &&
            $('#inputRAM').val() > 0) {
            $("#btn_celular").prop("disabled", false);
        }
        else {
            $("#btn_celular").prop("disabled", true);
        }
    }

    //caso os campos não estiverem preenchidos o sistema alertara o usuario indicando onde se encontra a irregularidade 
    $('#inputTitulo').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputTitulo').val().length < 1)
        {
            $('#inputTitulo').css('border', '1px red solid');
            $('#tituloHelp').css('visibility','');
        }
        else
        {
            $('#inputTitulo').css('border', '');
            $('#tituloHelp').css('visibility','hidden');
        }
    });
    $('#inputPreco').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputPreco').val().length < 1)
        {
            $('#inputPreco').css('border', '1px red solid');
            $('#precoHelp').css('visibility','');
        }
        else
        {
            $('#inputPreco').css('border', '');
            $('#precoHelp').css('visibility','hidden');
        }
    });
    $('#inputEstado').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputEstado').val() == 0)
        {
            $('#inputEstado').css('border', '1px red solid');
            $('#estadoHelp').css('visibility','');
        }
        else
        {
            $('#inputEstado').css('border', '');
            $('#estadoHelp').css('visibility','hidden');
        }
    });
    $('#inputLocalizacao').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputLocalizacao').val().length < 9)
        {
            $('#inputLocalizacao').css('border', '1px red solid');
            $('#localizacaoHelp').css('visibility','');
        }
        else
        {
            $('#inputLocalizacao').css('border', '');
            $('#localizacaoHelp').css('visibility','hidden');
        }
    });
    $('#inputDescricao').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputDescricao').val().length < 1)
        {
            $('#inputDescricao').css('border', '1px red solid');
            $('#descricaoHelp').css('visibility','');
        }
        else
        {
            $('#inputDescricao').css('border', '');
            $('#descricaoHelp').css('visibility','hidden');
        }
    });
    $('#inputMarca').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputMarca').val() == 0)
        {
            $('#inputMarca').css('border', '1px red solid');
            $('#marcaHelp').css('visibility','');
            $('#inputLinha').prop('disabled', true);
            $('#inputLinha').prop('value', 0);
            $('#inputModelo').prop('disabled', true);
            $('#inputModelo').prop('value', 0);
        }
        else
        {
            $('#inputMarca').css('border', '');
            $('#marcaHelp').css('visibility','hidden');
            $('#inputLinha').prop('disabled', false);
        }
    });
    $('#inputLinha').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputLinha').val() == 0)
        {
            $('#inputLinha').css('border', '1px red solid');
            $('#linhaHelp').css('visibility','');
            $('#inputModelo').prop('disabled', true);
            $('#inputModelo').prop('value', 0);
        }
        else
        {
            $('#inputLinha').css('border', '');
            $('#linhaHelp').css('visibility','hidden');
            $('#inputModelo').prop('disabled', false);
        }
    });
    $('#inputModelo').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputModelo').val() == 0)
        {
            $('#inputModelo').css('border', '1px red solid');
            $('#modeloHelp').css('visibility','');
        }
        else
        {
            $('#inputModelo').css('border', '');
            $('#modeloHelp').css('visibility','hidden');
        }
    });
    $('#inputInterna').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputInterna').val() < 1)
        {
            $('#inputInterna').css('border', '1px red solid');
            $('#internaHelp').css('visibility','');
        }
        else
        {
            $('#inputInterna').css('border', '');
            $('#internaHelp').css('visibility','hidden');
        }
    });
    $('#inputRAM').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputRAM').val() < 1)
        {
            $('#inputRAM').css('border', '1px red solid');
            $('#RAMHelp').css('visibility','');
        }
        else
        {
            $('#inputRAM').css('border', '');
            $('#RAMHelp').css('visibility','hidden');
        }
    });
    $("#inputMarca").change(function(){
        marcacelular = $("#inputMarca").val();
        $.post("c_combobox.php",
        {
            marcacelular : marcacelular

        },function(dados)
        {
            $('#inputLinha').html('<option selected value="0">---</option>'+dados);
            $('#inputModelo').html('<option selected value="0">---</option>');
            $('#inputModelo').prop('disabled', true);
        });
    });
    $("#inputLinha").change(function(){
        linhacelular = $("#inputLinha").val();
        $.post("c_combobox.php",
        {
            linhacelular : linhacelular

        },function(dados)
        {
            $('#inputModelo').html('<option selected value="0">---</option>'+dados);
        });
    });    
}

function computadores() {
    /*-------------------computadores.php-------------------*/
    $('.money').mask('0000000');
    $('.cep').mask('00000-000');

    //esconder avisos de erro 
    esconder(); //ao carregar a página a função esconder esconde os avisos de erro
    function esconder(){
        $('#tituloHelp').css('visibility','hidden');
        $('#precoHelp').css('visibility','hidden');
        $('#estadoHelp').css('visibility','hidden');
        $('#localizacaoHelp').css('visibility','hidden');
        $('#descricaoHelp').css('visibility','hidden');
    }

    //para liberar o botão de cadastro deve-se preencher todos os campos do formulário de cadastro
    submit(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
    $('#inputTitulo, #inputPreco, #inputEstado, #inputLocalizacao, #inputDescricao').bind("change keyup", submit); //ao escrever um valor nos campos do formulário a função submit verifica se os campos estão preenchidos ou não
    function submit(){
        if ($('#inputTitulo').val().length > 0 &&
            $('#inputPreco').val().length > 0 &&
            $('#inputEstado').val() != 0 &&
            $('#inputLocalizacao').val().length > 8 &&
            $('#inputDescricao').val().length > 0) {
            $("#btn_computador").prop("disabled", false);
        }
        else {
            $("#btn_computador").prop("disabled", true);
        }
    }

    //caso os campos não estiverem preenchidos o sistema alertara o usuario indicando onde se encontra a irregularidade 
    $('#inputTitulo').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputTitulo').val().length < 1)
        {
            $('#inputTitulo').css('border', '1px red solid');
            $('#tituloHelp').css('visibility','');
        }
        else
        {
            $('#inputTitulo').css('border', '');
            $('#tituloHelp').css('visibility','hidden');
        }
    });
    $('#inputPreco').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputPreco').val().length < 1)
        {
            $('#inputPreco').css('border', '1px red solid');
            $('#precoHelp').css('visibility','');
        }
        else
        {
            $('#inputPreco').css('border', '');
            $('#precoHelp').css('visibility','hidden');
        }
    });
    $('#inputEstado').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputEstado').val() == 0)
        {
            $('#inputEstado').css('border', '1px red solid');
            $('#estadoHelp').css('visibility','');
        }
        else
        {
            $('#inputEstado').css('border', '');
            $('#estadoHelp').css('visibility','hidden');
        }
    });
    $('#inputLocalizacao').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputLocalizacao').val().length < 9)
        {
            $('#inputLocalizacao').css('border', '1px red solid');
            $('#localizacaoHelp').css('visibility','');
        }
        else
        {
            $('#inputLocalizacao').css('border', '');
            $('#localizacaoHelp').css('visibility','hidden');
        }
    });
    $('#inputDescricao').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputDescricao').val().length < 1)
        {
            $('#inputDescricao').css('border', '1px red solid');
            $('#descricaoHelp').css('visibility','');
        }
        else
        {
            $('#inputDescricao').css('border', '');
            $('#descricaoHelp').css('visibility','hidden');
        }
    });
}

function hardware() {
    /*-------------------hardware.php-------------------*/
    $('.money').mask('0000000');
    $('.cep').mask('00000-000');

    //esconder avisos de erro 
    esconder(); //ao carregar a página a função esconder esconde os avisos de erro
    function esconder(){
        $('#tituloHelp').css('visibility','hidden');
        $('#precoHelp').css('visibility','hidden');
        $('#estadoHelp').css('visibility','hidden');
        $('#localizacaoHelp').css('visibility','hidden');
        $('#descricaoHelp').css('visibility','hidden');
    }
    esconderdivs();
    function esconderdivs(){
        $('.divs').hide();
    }
    //para liberar o botão de cadastro deve-se preencher todos os campos do formulário de cadastro
    submit(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
    $('#inputTitulo, #inputPreco, #inputEstado, #inputLocalizacao, #inputDescricao').bind("change keyup", submit); //ao escrever um valor nos campos do formulário a função submit verifica se os campos estão preenchidos ou não
    function submit(){
        if ($('#inputTitulo').val().length > 0 &&
            $('#inputPreco').val().length > 0 &&
            $('#inputEstado').val() != 0 &&
            $('#inputLocalizacao').val().length > 8 &&
            $('#inputDescricao').val().length > 0) {
            $("#btn_hardware").prop("disabled", false);
        }
        else {
            $("#btn_hardware").prop("disabled", true);
        }
    }

    //caso os campos não estiverem preenchidos o sistema alertara o usuario indicando onde se encontra a irregularidade 
    $('#inputTitulo').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputTitulo').val().length < 1)
        {
            $('#inputTitulo').css('border', '1px red solid');
            $('#tituloHelp').css('visibility','');
        }
        else
        {
            $('#inputTitulo').css('border', '');
            $('#tituloHelp').css('visibility','hidden');
        }
    });
    $('#inputPreco').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputPreco').val().length < 1)
        {
            $('#inputPreco').css('border', '1px red solid');
            $('#precoHelp').css('visibility','');
        }
        else
        {
            $('#inputPreco').css('border', '');
            $('#precoHelp').css('visibility','hidden');
        }
    });
    $('#inputEstado').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputEstado').val() == 0)
        {
            $('#inputEstado').css('border', '1px red solid');
            $('#estadoHelp').css('visibility','');
        }
        else
        {
            $('#inputEstado').css('border', '');
            $('#estadoHelp').css('visibility','hidden');
        }
    });
    $('#inputLocalizacao').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputLocalizacao').val().length < 9)
        {
            $('#inputLocalizacao').css('border', '1px red solid');
            $('#localizacaoHelp').css('visibility','');
        }
        else
        {
            $('#inputLocalizacao').css('border', '');
            $('#localizacaoHelp').css('visibility','hidden');
        }
    });
    $('#inputDescricao').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputDescricao').val().length < 1)
        {
            $('#inputDescricao').css('border', '1px red solid');
            $('#descricaoHelp').css('visibility','');
        }
        else
        {
            $('#inputDescricao').css('border', '');
            $('#descricaoHelp').css('visibility','hidden');
        }
    });
    $('#inputTipo').change(function (){
        if ($('#inputTipo').val() == 1)
        {
            $('.divs').hide();
            $('#processador').show();
        }
        if ($('#inputTipo').val() == 2)
        {
            $('.divs').hide();
            $('#memoria-ram').show();
        }
        if ($('#inputTipo').val() == 3)
        {
            $('.divs').hide();
            $('#placa-mae').show();
        }
        if ($('#inputTipo').val() == 4)
        {
            $('.divs').hide();
            $('#placa-de-video').show();
        }
        if ($('#inputTipo').val() == 5)
        {
            $('.divs').hide();
            $('#fonte-de-alimentacao').show();
        }
        if ($('#inputTipo').val() == 6)
        {
            $('.divs').hide();
            $('#hd').show();
        }
        if ($('#inputTipo').val() == 7)
        {
            $('.divs').hide();
            $('#ssd').show();
        }
    });
}

function laptops() {
    /*-------------------laptops.php-------------------*/
    $('.money').mask('0000000');
    $('.cep').mask('00000-000');
    $('.ram').mask('000');
    $('.hd').mask('0000');
    $('.ssd').mask('0000');

    //esconder avisos de erro 
    esconder(); //ao carregar a página a função esconder esconde os avisos de erro
    function esconder(){
        $('#tituloHelp').css('visibility','hidden');
        $('#precoHelp').css('visibility','hidden');
        $('#estadoHelp').css('visibility','hidden');
        $('#localizacaoHelp').css('visibility','hidden');
        $('#descricaoHelp').css('visibility','hidden');
        $('#marcaHelp').css('visibility','hidden');
        $('#modeloHelp').css('visibility','hidden');
        $('#linhaHelp').css('visibility','hidden');
        $('#tipoRAMHelp').css('visibility','hidden');
        $('#RAMHelp').css('visibility','hidden');
        $('#procmarcaHelp').css('visibility','hidden');
        $('#procmodeloHelp').css('visibility','hidden');
        $('#armazenamentoHelp').css('visibility','hidden');
        
    }

    //para liberar o botão de cadastro deve-se preencher todos os campos do formulário de cadastro
    submit(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
    $('#inputTitulo, #inputPreco, #inputEstado, #inputLocalizacao, #inputDescricao, #inputMarca, #inputLinha, #inputModelo, #inputtipoRAM, #inputRAM, #inputmarcaProc, #inputmodeloProc, #inputHD, #inputSSD').bind("change keyup", submit); //ao escrever um valor nos campos do formulário a função submit verifica se os campos estão preenchidos ou não
    function submit(){
        if ($('#inputTitulo').val().length > 0 &&
            $('#inputPreco').val().length > 0 &&
            $('#inputEstado').val() != 0 &&
            $('#inputLocalizacao').val().length > 8 &&
            $('#inputDescricao').val().length > 0 &&
            $('#inputMarca').val() != 0 &&
            $('#inputLinha').val() != 0 &&
            $('#inputModelo').val() != 0 &&
            $('#inputtipoRAM').val() != 0 &&
            $('#inputRAM').val() > 0 &&
            $('#inputmarcaProc').val() != 0 &&
            $('#inputmodeloProc').val() != 0 &&
            ($('#inputHD').val() > 0 || $('#inputSSD').val() > 0)) {
            $("#btn_laptop").prop("disabled", false);
        }
        else {
            $("#btn_laptop").prop("disabled", true);
        }
    }

    //caso os campos não estiverem preenchidos o sistema alertara o usuario indicando onde se encontra a irregularidade 
    $('#inputTitulo').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputTitulo').val().length < 1)
        {
            $('#inputTitulo').css('border', '1px red solid');
            $('#tituloHelp').css('visibility','');
        }
        else
        {
            $('#inputTitulo').css('border', '');
            $('#tituloHelp').css('visibility','hidden');
        }
    });
    $('#inputPreco').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputPreco').val().length < 1)
        {
            $('#inputPreco').css('border', '1px red solid');
            $('#precoHelp').css('visibility','');
        }
        else
        {
            $('#inputPreco').css('border', '');
            $('#precoHelp').css('visibility','hidden');
        }
    });
    $('#inputEstado').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputEstado').val() == 0)
        {
            $('#inputEstado').css('border', '1px red solid');
            $('#estadoHelp').css('visibility','');
        }
        else
        {
            $('#inputEstado').css('border', '');
            $('#estadoHelp').css('visibility','hidden');
        }
    });
    $('#inputLocalizacao').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputLocalizacao').val().length < 9)
        {
            $('#inputLocalizacao').css('border', '1px red solid');
            $('#localizacaoHelp').css('visibility','');
        }
        else
        {
            $('#inputLocalizacao').css('border', '');
            $('#localizacaoHelp').css('visibility','hidden');
        }
    });
    $('#inputDescricao').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputDescricao').val().length < 1)
        {
            $('#inputDescricao').css('border', '1px red solid');
            $('#descricaoHelp').css('visibility','');
        }
        else
        {
            $('#inputDescricao').css('border', '');
            $('#descricaoHelp').css('visibility','hidden');
        }
    });
    $('#inputMarca').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputMarca').val() == 0)
        {
            $('#inputMarca').css('border', '1px red solid');
            $('#marcaHelp').css('visibility','');
            $('#inputLinha').prop('disabled', true);
            $('#inputLinha').prop('value', 0);
            $('#inputModelo').prop('disabled', true);
            $('#inputModelo').prop('value', 0);
        }
        else
        {
            $('#inputMarca').css('border', '');
            $('#marcaHelp').css('visibility','hidden');
            $('#inputLinha').prop('disabled', false);
        }
    });
    $('#inputLinha').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputLinha').val() == 0)
        {
            $('#inputLinha').css('border', '1px red solid');
            $('#linhaHelp').css('visibility','');
            $('#inputModelo').prop('disabled', true);
            $('#inputModelo').prop('value', 0);
        }
        else
        {
            $('#inputLinha').css('border', '');
            $('#linhaHelp').css('visibility','hidden');
            $('#inputModelo').prop('disabled', false);
        }
    });
    $('#inputModelo').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputModelo').val() == 0)
        {
            $('#inputModelo').css('border', '1px red solid');
            $('#modeloHelp').css('visibility','');
        }
        else
        {
            $('#inputModelo').css('border', '');
            $('#modeloHelp').css('visibility','hidden');
        }
    });
    $('#inputtipoRAM').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputtipoRAM').val() == 0)
        {
            $('#inputtipoRAM').css('border', '1px red solid');
            $('#tipoRAMHelp').css('visibility','');
        }
        else
        {
            $('#inputtipoRAM').css('border', '');
            $('#tipoRAMHelp').css('visibility','hidden');
        }
    });
    $('#inputRAM').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputRAM').val().length < 1)
        {
            $('#inputRAM').css('border', '1px red solid');
            $('#RAMHelp').css('visibility','');
        }
        else
        {
            $('#inputRAM').css('border', '');
            $('#RAMHelp').css('visibility','hidden');
        }
    });
    $('#inputmarcaProc').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputmarcaProc').val() == 0)
        {
            $('#inputmarcaProc').css('border', '1px red solid');
            $('#procmarcaHelp').css('visibility','');
            $('#inputmodeloProc').prop('disabled', true);
            $('#inputmodeloProc').prop('value', 0);
        }
        else
        {
            $('#inputmarcaProc').css('border', '');
            $('#procmarcaHelp').css('visibility','hidden');
            $('#inputmodeloProc').prop('disabled', false);
        }
    });
    $('#inputmodeloProc').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputmodeloProc').val() == 0)
        {
            $('#inputmodeloProc').css('border', '1px red solid');
            $('#procmodeloHelp').css('visibility','');
        }
        else
        {
            $('#inputmodeloProc').css('border', '');
            $('#procmodeloHelp').css('visibility','hidden');
        }
    });
    $('#inputHD, #inputSSD').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputHD').val().length < 1 && $('#inputSSD').val().length < 1)
        {
            $('#inputHD, #inputSSD').css('border', '1px red solid');
            $('#armazenamentoHelp').css('visibility','');
        }
        else
        {
            $('#inputHD, #inputSSD').css('border', '');
            $('#armazenamentoHelp').css('visibility','hidden');
        }
    });
    $("#inputMarca").change(function(){
        $("#inputModelo").html('<option selected value="0">---</option>');
        marcalaptops = $("#inputMarca").val();
        $.post("c_combobox.php",
        {
            marcalaptops : marcalaptops

        },function(dados)
        {
            $('#inputLinha').html('<option selected value="0">---</option>'+dados);
            $('#inputModelo').html('<option selected value="0">---</option>');
            $('#inputModelo').prop('disabled', true);
        });
    });
    $("#inputLinha").change(function(){
        linhalaptops = $("#inputLinha").val();
        $.post("c_combobox.php",
        {
            linhalaptops : linhalaptops

        },function(dados)
        {
            $('#inputModelo').html('<option selected value="0">---</option>'+dados);
        });
    }); 
}

function tablets() {
    /*-------------------tablets.php-------------------*/
    $('.money').mask('0000000');
    $('.cep').mask('00000-000');
    $('.interna').mask('0000');
    $('.ram').mask('00');
    $('.traseira').mask('000');
    $('.frontal').mask('000');

    //esconder avisos de erro 
    esconder(); //ao carregar a página a função esconder esconde os avisos de erro
    function esconder(){
        $('#tituloHelp').css('visibility','hidden');
        $('#precoHelp').css('visibility','hidden');
        $('#estadoHelp').css('visibility','hidden');
        $('#localizacaoHelp').css('visibility','hidden');
        $('#descricaoHelp').css('visibility','hidden');
        $('#marcaHelp').css('visibility','hidden');
        $('#modeloHelp').css('visibility','hidden');
        $('#linhaHelp').css('visibility','hidden');
        $('#internaHelp').css('visibility','hidden');
        $('#RAMHelp').css('visibility','hidden');
    }

    //para liberar o botão de cadastro deve-se preencher todos os campos do formulário de cadastro
    submit(); //ao carregar a página a função submit verifica se os campos estão preenchidos ou não
    $('#inputTitulo, #inputPreco, #inputEstado, #inputLocalizacao, #inputDescricao, #inputMarca, #inputModelo, #inputLinha, #inputInterna, #inputRAM').bind("change keyup", submit); //ao escrever um valor nos campos do formulário a função submit verifica se os campos estão preenchidos ou não
    function submit(){
        if ($('#inputTitulo').val().length > 0 &&
            $('#inputPreco').val().length > 0 &&
            $('#inputEstado').val() != 0 &&
            $('#inputLocalizacao').val().length > 8 &&
            $('#inputDescricao').val().length > 0 &&
            $('#inputMarca').val() != 0 &&
            $('#inputModelo').val()!= 0 &&
            $('#inputLinha').val() != 0 &&
            $('#inputInterna').val() > 0 &&
            $('#inputRAM').val() > 0) {
            $("#btn_tablet").prop("disabled", false);
        }
        else {
            $("#btn_tablet").prop("disabled", true);
        }
    }

    //caso os campos não estiverem preenchidos o sistema alertara o usuario indicando onde se encontra a irregularidade 
    $('#inputTitulo').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputTitulo').val().length < 1)
        {
            $('#inputTitulo').css('border', '1px red solid');
            $('#tituloHelp').css('visibility','');
        }
        else
        {
            $('#inputTitulo').css('border', '');
            $('#tituloHelp').css('visibility','hidden');
        }
    });
    $('#inputPreco').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputPreco').val().length < 1)
        {
            $('#inputPreco').css('border', '1px red solid');
            $('#precoHelp').css('visibility','');
        }
        else
        {
            $('#inputPreco').css('border', '');
            $('#precoHelp').css('visibility','hidden');
        }
    });
    $('#inputEstado').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputEstado').val() == 0)
        {
            $('#inputEstado').css('border', '1px red solid');
            $('#estadoHelp').css('visibility','');
        }
        else
        {
            $('#inputEstado').css('border', '');
            $('#estadoHelp').css('visibility','hidden');
        }
    });
    $('#inputLocalizacao').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputLocalizacao').val().length < 9)
        {
            $('#inputLocalizacao').css('border', '1px red solid');
            $('#localizacaoHelp').css('visibility','');
        }
        else
        {
            $('#inputLocalizacao').css('border', '');
            $('#localizacaoHelp').css('visibility','hidden');
        }
    });
    $('#inputDescricao').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputDescricao').val().length < 1)
        {
            $('#inputDescricao').css('border', '1px red solid');
            $('#descricaoHelp').css('visibility','');
        }
        else
        {
            $('#inputDescricao').css('border', '');
            $('#descricaoHelp').css('visibility','hidden');
        }
    });
    $('#inputMarca').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputMarca').val() == 0)
        {
            $('#inputMarca').css('border', '1px red solid');
            $('#marcaHelp').css('visibility','');
            $('#inputLinha').prop('disabled', true);
            $('#inputLinha').prop('value', 0);
            $('#inputModelo').prop('disabled', true);
            $('#inputModelo').prop('value', 0);
        }
        else
        {
            $('#inputMarca').css('border', '');
            $('#marcaHelp').css('visibility','hidden');
            $('#inputLinha').prop('disabled', false);
        }
    });
    $('#inputLinha').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputLinha').val() == 0)
        {
            $('#inputLinha').css('border', '1px red solid');
            $('#linhaHelp').css('visibility','');
            $('#inputModelo').prop('disabled', true);
            $('#inputModelo').prop('value', 0);
        }
        else
        {
            $('#inputLinha').css('border', '');
            $('#linhaHelp').css('visibility','hidden');
            $('#inputModelo').prop('disabled', false);
        }
    });
    $('#inputModelo').change(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputModelo').val() == 0)
        {
            $('#inputModelo').css('border', '1px red solid');
            $('#modeloHelp').css('visibility','');
        }
        else
        {
            $('#inputModelo').css('border', '');
            $('#modeloHelp').css('visibility','hidden');
        }
    });
    $('#inputInterna').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputInterna').val() < 1)
        {
            $('#inputInterna').css('border', '1px red solid');
            $('#internaHelp').css('visibility','');
        }
        else
        {
            $('#inputInterna').css('border', '');
            $('#internaHelp').css('visibility','hidden');
        }
    });
    $('#inputRAM').keyup(function (){ //verifica se o campo está preenchido, se não, ativa o aviso de erro
        if ($('#inputRAM').val() < 1)
        {
            $('#inputRAM').css('border', '1px red solid');
            $('#RAMHelp').css('visibility','');
        }
        else
        {
            $('#inputRAM').css('border', '');
            $('#RAMHelp').css('visibility','hidden');
        }
    });
    $("#inputMarca").change(function(){
        marcatablet = $("#inputMarca").val();
        $.post("c_combobox.php",
        {
            marcatablet : marcatablet

        },function(dados)
        {
            $('#inputLinha').html('<option selected value="0">---</option>'+dados);
            $('#inputModelo').html('<option selected value="0">---</option>');
            $('#inputModelo').prop('disabled', true);
        });
    });
    $("#inputLinha").change(function(){
        linhatablet = $("#inputLinha").val();
        $.post("c_combobox.php",
        {
            linhatablet : linhatablet

        },function(dados)
        {
            $('#inputModelo').html('<option selected value="0">---</option>'+dados);
        });
    });    
}
function chatanuncio(){
}