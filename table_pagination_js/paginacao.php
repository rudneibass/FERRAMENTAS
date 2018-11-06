
<script>
    var dados;
    var tamanhoPagina = 10;
    var pagina = 0;

   /* FUNÇÃO COMNETADA POIS FUTURAMENTE IREI PEGAR OS DADOS DO PHP ATRAVES DO AJAX.
	  NO MOMENTO ESTOU CRIANDO O ARRAY DE DADOS NO PROPRIO SCRIPT COMO OBSERVA-SE NA 
	  VARIAVEL "dados"	
     function find() {
        $.ajax({
            url: 'Ouvidoria_Controller.php?act=locate',
            type: 'POST',
            data: $('#pesquisa').serialize(),
            beforeSend: function () {
                $("#tbody").html("Carregando...");
            },
            success: function (data) {
               dados = data;
              /* $('#echos').append(dados); 
            },
        });
    }; */

   var dados = [
        ['0', 'Maria Das Dores', '6-Critica', '01 de nov', '0'],
        ['1', 'Jose da Silva', '6-Denuncia', '01 de nov', '0'],
        ['2', 'Joao da costa', '6-Critica', '01 de nov', '0'],
        ['3', 'Arimateia gusmão', '6-Critica', '01 de nov', '1'],
        ['4', 'Clodovil Hernandes', '6-Critica', '01 de nov', '1'],
        ['5', 'Djavan', '6-Critica', '01 de nov', '1'],
        ['6', 'Coelho Neto', '6-Critica', '01 de nov', '1'],
        ['7', 'Cassioto', '6-Critica', '01 de nov', '1'],
        ['8', 'Cazalbé', '6-Critica', '01 de nov', '1'],
        ['9', 'Normando Lero', '6-Critica', '01 de nov', '1'],
        ['10', 'Professor Raimundo', '6-Critica', '01 de nov', '1'],
        ['11', 'Pires do Jegue', '6-Critica', '01 de nov', '0'],
        ['12', 'Cassetinho dos teclados', '6-Critica', '01 de nov', '0'],
        ['13', 'Iraildo Benga', '6-Critica', '01 de nov', '0'],
        ['14', 'Maria Das Dores', '6-Critica', '01 de nov', '0'],
        ['15', 'Jose da Silva', '6-Denuncia', '01 de nov', '0'],
        ['16', 'Joao da costa', '6-Critica', '01 de nov', '0'],
        ['17', 'Arimateia gusmão', '6-Critica', '01 de nov', '1'],
        ['18', 'Clodovil Hernandes', '6-Critica', '01 de nov', '1'],
        ['19', 'Djavan', '6-Critica', '01 de nov', '1'],
        ['20', 'Coelho Neto', '6-Critica', '01 de nov', '1'],
        ['21', 'Cassioto', '6-Critica', '01 de nov', '1'],
        ['22', 'Cazalbé', '6-Critica', '01 de nov', '1'],
        ['23', 'Normando Lero', '6-Critica', '01 de nov', '1'],
        ['24', 'Professor Raimundo', '6-Critica', '01 de nov', '1'],
        ['25', 'Pires do Jegue', '6-Critica', '01 de nov', '0'],
        ['26', 'Cassetinho dos teclados', '6-Critica', '01 de nov', '0'],
        ['27', 'Iraildo Benga', '6-Critica', '01 de nov', '0']
    ]; 
    
    
    function paginar() {
       var tbody = $('table > tbody'); 

        for (var i = pagina * tamanhoPagina; i < dados.length && i < (pagina + 1) * tamanhoPagina; i++) {
            console.log(dados[i][1]);
            if (dados[i][4] != '1') {
                tbody.append(
                        $('<tr id='+i+ ' style="background-color: #F4F7F7" onclick="vizualizar(' + dados[i][0] + ');changeStatus(' + dados[i][0] + ')" data-toggle="modal" data-target="#exampleModal">')
                        .append($('<td>').append('<input type="checkbox"><b>&nbsp;&nbsp;Protocolo:&nbsp' + dados[i][0]))
                        .append($('<td>').append('<i class="fa fa-bookmark" style="color: #F7CA4C"></i>&nbsp;<b>' + dados[i][1]))
                        .append($('<td>').append('<b>' + dados[i][2]))
                        .append($('<td>').append('<b>' + dados[i][3]))
                        )
            } else {
                tbody.append(
                        $('<tr id='+i+ ' onclick="vizualizar(' + dados[i][0] + ');changeStatus(' + dados[i][0] + ')" data-toggle="modal" data-target="#exampleModal">')
                        .append($('<td>').append('<input type="checkbox">&nbsp;&nbsp;Protocolo:&nbsp' + dados[i][0]))
                        .append($('<td>').append('<i class="fa fa-bookmark-o" style="color: #D6D6D6"></i>&nbsp;' + dados[i][1]))
                        .append($('<td>').append(dados[i][2]))
                        .append($('<td>').append(dados[i][3]))
                        )
            }

        }
        $('#numeracao').text('Página ' + (pagina + 1) + ' de ' + Math.ceil(dados.length / tamanhoPagina));
    }



    function ajustarBotoes() {
        $('#proximo').prop('disabled', dados.length <= tamanhoPagina || pagina >= Math.ceil(dados.length / tamanhoPagina) - 1);
        $('#anterior').prop('disabled', dados.length <= tamanhoPagina || pagina == 0);
    }



    $(function () {
        $('#proximo').click(function () {
            $("tr").remove();
            if (pagina < dados.length / tamanhoPagina - 1) {
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
</script>