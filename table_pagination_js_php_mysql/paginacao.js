/**
 * Capturar itens do banco de dados
 */
function find() {
      $("tr").remove();
    //Capturar Dados Usando Método AJAX do jQuery
    $.ajax({
        url: 'dados.php',
        cache: false,
        dataType: "json",
        beforeSend: function () {
            $("h2").html("Carregando..."); //Carregando
        },
        error: function () {
            $("h2").html("Há algum problema com a fonte de dados");
        },
        success: function (retorno) {
            if (retorno[0].erro) {
                $("h2").html(retorno[0].erro);
            } else {
                
                var tamanhoPagina = 5;
                var pagina = 0;
                
                function paginar() {
                    var tbody = $('table > tbody');
                    for (var i = pagina * tamanhoPagina; i < retorno.length && i < (pagina + 1) * tamanhoPagina; i++) {
                        if (retorno[i][4] != '1') {
                            tbody.append(
                                    $('<tr id=' + i + ' style="background-color: #F4F7F7" onclick="vizualizar(' + retorno[i].id + ');changeStatus(' + retorno[i].id + ')" data-toggle="modal" data-target="#exampleModal">')
                                    .append($('<td>').append('<input type="checkbox"><b>&nbsp;&nbsp;Protocolo:&nbsp' + retorno[i].id))
                                    .append($('<td>').append('<i class="fa fa-bookmark" style="color: #F7CA4C"></i>&nbsp;<b>' + retorno[i].nome_cliente))
                                    .append($('<td>').append('<b>' + retorno[i].email_cliente))
                                    .append($('<td>').append('<b>' + retorno[i].pais_cliente))
                                    )
                        } else {
                            tbody.append(
                                    $('<tr id=' + i + ' onclick="vizualizar(' + retorno[i].id + ');changeStatus(' + retorno[i].id + ')" data-toggle="modal" data-target="#exampleModal">')
                                    .append($('<td>').append('<input type="checkbox">&nbsp;&nbsp;Protocolo:&nbsp' + retorno[i].id))
                                    .append($('<td>').append('<i class="fa fa-bookmark-o" style="color: #D6D6D6"></i>&nbsp;' + retorno[i].nome_cliente))
                                    .append($('<td>').append(retorno[i].email_cliente))
                                    .append($('<td>').append(retorno[i].pais.cliente))
                                    )
                        }

                    }
                    $('#numeracao').text('Página ' + (pagina + 1) + ' de ' + Math.ceil(retorno.length / tamanhoPagina));
                }

                function ajustarBotoes() {
                    $('#proximo').prop('disabled', retorno.length <= tamanhoPagina || pagina >= Math.ceil(retorno.length / tamanhoPagina) - 1);
                    $('#anterior').prop('disabled', retorno.length <= tamanhoPagina || pagina == 0);
                }

                $(function () {
                    $('#proximo').click(function () {
                        $("tr").remove();
                        if (pagina < retorno.length / tamanhoPagina - 1) {
                            pagina++;
                            paginar();
                            ajustarBotoes();
                        }
                    });

                    $('#anterior').click(function () {
                        $("tr").remove();
                        if (pagina > 0) {
                            pagina--;
                            paginar();
                            ajustarBotoes();
                        }
                    });
                    paginar();
                    ajustarBotoes();
                });
            }
        }
    });
}

/*
 var json_ajax;
 var json = {
 '0': '{ "codBanco":"085","banco":"cecred","cedente":"Aluno 2","datas":"2017/08/30","nosso_numero":"00042200000000099","cedente_cnpj":"06624079975","agencia":"01066","codigo_cedente":"00042200","conta_corrente":"00042200","carteira":"01","pagador":"Aluno 2","convenio":"testes","cod_convenio":"106004","valor":"1600","documento":"99","instrucoes":"Após o vencimento cobrar R$ 0,05 ao dia."}',
 '1': '{ "codBanco":"085","banco":"cecred","cedente":"Aluno 2","datas":"2017/08/30","nosso_numero":"00042200000000099","cedente_cnpj":"06624079975","agencia":"01066","codigo_cedente":"00042200","conta_corrente":"00042200","carteira":"01","pagador":"Aluno 2","convenio":"testes","cod_convenio":"106004","valor":"1600","documento":"99","instrucoes":"Após o vencimento cobrar R$ 0,05 ao dia." }'
 };
 
 var array = Object.keys(json).map(i => JSON.parse(json[Number(i)]));
 
 var boletos = array.map(entrada => {
 return {
 'valor': entrada.valor,
 'nosso_numero': entrada.nosso_numero,
 'numero_documento': entrada.documento,
 'cedente': entrada.cedente,
 'cedente_cnpj': entrada.cedente_cnpj,
 'agencia': entrada.agencia,
 'codigo_cedente': entrada.codigo_cedente,
 }
 });
 
 console.log(boletos);
 console.log(boletos.length);
 */