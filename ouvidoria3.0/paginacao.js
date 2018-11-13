
function find() {
      $("tr").remove();

    $.ajax({
        url: 'Ouvidoria_Controller.php?act=locate',
        cache: false,
        type: 'POST',
        data: $('#pesquisa').serialize(),
        dataType: "json",
        beforeSend: function () {
            $("h3").html("Carregando..."); //Carregando
        },
        error: function () {
            $("#echos").html("Erro no Ajax");
        },
        success: function (retorno) {
            if (retorno[0].erro) {
                $("#echos").html(retorno[0].erro);
            } else {
                
                var tamanhoPagina = 10;
                var pagina = 0;
                
                function paginar() {
                    var tbody = $('table > tbody');
                    for (var i = pagina * tamanhoPagina; i < retorno.length && i < (pagina + 1) * tamanhoPagina; i++) {
                        if (retorno[i].o_status != '1') {
                            tbody.append(
                                    $('<tr id="tr' + retorno[i].o_id +'" style="background-color: #F4F7F7; font-weight: bold"" onclick="vizualizar(' + retorno[i].o_id + ');changeStatus(' + retorno[i].o_id + ')" data-toggle="modal" data-target="#exampleModal">')
                                    .append($('<td>').append('<input type="checkbox">&nbsp;&nbsp;Protocolo:&nbsp' + retorno[i].o_id))
                                    .append($('<td>').append('<i id="i'+retorno[i].o_id+'" class="fa fa-bookmark" style="color: #F7CA4C"></i>&nbsp;' + retorno[i].o_nome))
                                    .append($('<td>').append(retorno[i].o_assunto))
                                    .append($('<td>').append('<span class="size-12">'+retorno[i].o_data_formatada))
                                    )
                        } else {
                            tbody.append(
                                    $('<tr id=' + i + ' onclick="vizualizar(' + retorno[i].o_id + ');" data-toggle="modal" data-target="#exampleModal">')
                                    .append($('<td>').append('<input type="checkbox">&nbsp;&nbsp;Protocolo:&nbsp' + retorno[i].o_id))
                                    .append($('<td>').append('<i class="fa fa-bookmark-o" style="color: #D6D6D6"></i>&nbsp;' + retorno[i].o_nome))
                                    .append($('<td>').append(retorno[i].o_assunto))
                                    .append($('<td>').append('<span class="size-12">'+retorno[i].o_data_formatada))
                                    )
                        }

                    }
                    $("h3").remove();
                    $('#numeracao').text('Página ' + (pagina + 1) + ' de ' + Math.ceil(retorno.length / tamanhoPagina));
                }

                function ajustarBotoes() {
                    $('#proximo').prop('disabled', retorno.length <= tamanhoPagina || pagina >= Math.ceil(retorno.length / tamanhoPagina) - 1);
                    $('#anterior').prop('disabled', retorno.length <= tamanhoPagina || pagina == 0);
                }

                $(function () {
                    $('#proximo').click(function () {
                        if (pagina < retorno.length / tamanhoPagina - 1) {
                            $("tr").remove();
                            pagina++;
                            paginar();
                            ajustarBotoes();
                        }
                    });
                    $('#anterior').click(function () {
                        
                        if (pagina >= 1) {
                            $("tr").remove();
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
