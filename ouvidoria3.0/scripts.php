    
<script>

    var table;
    function setTable(tbl) {
        table = tbl;
    }

    $(document).ready(function () {

        $('#submit').click(function () {
            $.ajax({
                url: 'Ouvidoria_Controller.php?act=insert',
                type: 'POST',
                data: $('#submit_form').serialize(),
                success: function (data) {
                        /* $('#echos').html(data); 
                        toastr["success"]("Seu numero de protocole é OVD000"+data);*/
         alert("ANOTE SEU PROTICOLO: OVD000"+data+".\n\Caso tenha inserio um email válido entraremos em contato via email!");
         toastr["success"]("Mensagem enviada com sucesso!");
                       enviarEmail();
                },
            });
        });

        $('#sbmit_frmedit').click(function () {
            $.ajax({
                url: 'Ouvidoria_Controller.php?act=update',
                type: 'POST',
                data: $('#frmedit').serialize(),
                success: function (data) {
                    if (data != "") {
                        $('#echos').html(data);
                        toastr["error"](data);
                    } else {
                        toastr["success"]("Salvo com sucesso!");
                    }
                },
            });
        });
    });

    function  locate() {
        $.ajax({
            url: 'Ouvidoria_Controller.php?act=locate',
            type: 'POST',
            data: {tbl: table},
            beforeSend: function () {
                $("#tbody").html("Carregando...");
            },
            success: function (data) {
                if (data != "") {
                    $("#tbody").html(data);
                } else {
                    $("#tbody").html("Nenhum Registro Encontrado!");
                }
            },
        });
    }
    ;

       

    function deletar(id) {
        if (confirm("TEM CERTEZA QUE DESEJA EXCLUIR ESSE REGISTRO?")) {
            $.ajax({
                url: "Ouvidoria_Controller.php?act=delete",
                type: "POST",
                data: {id: id, tbl: "clientes"},
                success: function (data) {
                    toastr["success"]("Excluido com sucesso!");
                    auxiliar();
                }
            });
        }
        ;
    }

    function vizualizar(id) {
        $.ajax({
            url: "Ouvidoria_Controller.php?act=edit",
            type: "POST",
            data: {
                id: id,
                tbl: 'ouvidoria'},
            success: function (data) {
                $("#modal-body").html(data);
            },
        });
    }
    ;

    function auxiliar() {
        $.ajax({
            url: 'Ouvidoria_Controller.php?act=locate',
            type: 'POST',
            data: {tbl: "ouvidoria"},
            success: function (data) {
                $('#tbody').html(data)
            },
        })
    }

  /*  function enviarEmail() {
        $.ajax({
            url: 'email.php',
            type: 'POST',
            data: $('#submit_form').serialize(),
            success: function (data) {
                $('#echos').html(data)
            },
        })
     }*/

    function setValueInput() {
        document.getElementById("nome").value = "Anonimo";
        document.getElementById("nome").placeholder = "Anonimo";
        $("#row-1").hide("slow");
        $("#row-3").hide("slow");
    }

    function resetValueInput() {
        document.getElementById("nome").value = "";
        document.getElementById("nome").placeholder = "Digite seu nome";
        $("#row-1").show("slow");
        $("#row-3").show("slow");
    }

    function changeStatus(id) {
        
        var id = id;
         
        $("#i"+id).removeClass("fa fa-bookmark").addClass("fa fa-bookmark-o").css({'color': '#d6d6d6'});
        $('#tr'+id).css({'font-weight': 'normal'});
        $('#tr'+id).css({'background-color': '#ffffff'});
         
        $.ajax({
            url: 'Ouvidoria_Controller.php?act=cs',
            type: 'POST',
            data: {id: id, tbl: "ouvidoria"},
            success: function (data) {
            }
        }) 
}

function loading(){
    var pb = document.createElement("progress");
        document.getElementById('loading').appendChild(pb);
        
        /* var img = document.createElement("IMG");
        img.src = "loading_100_x_100.gif";
        document.getElementById('loading').appendChild(img);  */
}
</script>


