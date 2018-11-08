/**
 * Capturar itens do banco de dados
 */
function find() {
      $("tr").remove();
    //Capturar Dados Usando Método AJAX do jQuery
    $.ajax({
        url: 'dados.php',
        cache: false,
        type: 'POST',
        data: $('#pesquisa').serialize(),
        dataType: "json",
       
        error: function () {
            $("#echos").html("Há algum problema com a fonte de dados");
        },
        success: function (retorno) {
            if (retorno[0].erro) {
                $("#echos").html(retorno[0].erro);
            } else {
                
                var tamanhoPagina = 5;
                var pagina = 0;
                
                function paginar() {
                    var tbody = $('table > tbody');
                    for (var i = pagina * tamanhoPagina; i < retorno.length && i < (pagina + 1) * tamanhoPagina; i++) {
                        if (retorno[i].o_status != '1') {
                            tbody.append(
                                    $('<tr id=' + i + ' style="background-color: #F4F7F7" onclick="vizualizar(' + retorno[i].id + ');changeStatus(' + retorno[i].id + ')" data-toggle="modal" data-target="#exampleModal">')
                                    .append($('<td>').append('<input type="checkbox"><b>&nbsp;&nbsp;Protocolo:&nbsp' + retorno[i].id))
                                    .append($('<td>').append('<i class="fa fa-bookmark" style="color: #F7CA4C"></i>&nbsp;<b>' + retorno[i].nome_cliente))
                                    .append($('<td>').append('<b>' + retorno[i].email_cliente))
                                    .append($('<td>').append('<span class="size-12"><b>' + retorno[i].data_cadastro))
                                    )
                        } else {
                            tbody.append(
                                    $('<tr id=' + i + ' onclick="vizualizar(' + retorno[i].id + ');changeStatus(' + retorno[i].id + ')" data-toggle="modal" data-target="#exampleModal">')
                                    .append($('<td>').append('<input type="checkbox">&nbsp;&nbsp;Protocolo:&nbsp' + retorno[i].id))
                                    .append($('<td>').append('<i class="fa fa-bookmark-o" style="color: #D6D6D6"></i>&nbsp;' + retorno[i].nome_cliente))
                                    .append($('<td>').append(retorno[i].email_cliente))
                                    .append($('<td>').append('<span class="size-12">'+retorno[i].data_cadastro))
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
