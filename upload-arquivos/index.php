<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" crossorigin="anonymous">

        <!-- BOOTSTRAP JS  4.0  -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- BOOTSTRAP CSS 4.0 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <style>
            .anexo{padding: 0px 0px 0px 0px; border: 1px solid #D8D8D8; margin-bottom: 10px;}
            .name_anexo {font-weight: bold;}
            .size_anexo {font-size: 90%;}
            small {color: #999}

            .remover{
                background:red; 
                border:red;
                color: white;
                margin-top: 10px;
            }
            fa fa-trash {color: white;}

            #toast-container {
                margin-top:7%; 
                margin-right:40%; 

            }

            .toast-success, .toast-error {
                min-width: 100%
            } 
            .modal-header{
                background-color: #4CAF50;
                color:white;
            }
            .col-8 .card .card-body, .col-4 .card .card-body {
                min-height: 30%;
            }

            .card-header {background-color: #fff;}
        </style>

    </head>

    <body>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload-arquivos">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="upload-arquivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Envio de Arquivos e Midias</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="card">
                                    <h5 class="card-header">Escolha de Arquivos</h5>
                                    <div class="card-body">
                                        <form id="meuForm" enctype="multipart/form-data">
                                            <div class="custom-file">
                                                <input type="file" name="arquivo[]" id="arquivo" class="custom-file-input" multiple/>
                                                <label class="custom-file-label" for="customFile">Seleccionar</label>
                                            </div>
                                            <input type="hidden" name="id_lei" id="id_lei" value="50">
                                            <br />
                                            <br />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card">
                                    <h5 class="card-header">Arquivos</h5>
                                    <div class="card-body" id="anexos">

                                    </div>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>               
                        <button class="btn btn-success" id="enviar"><i class="fa fa-cloud-upload"></i>&nbsp;Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<script>
    $('#enviar').on('click', function (e)
    {
        e.preventDefault();
        var form = $('form')[0];
        var formData = new FormData(form);

        $.ajax({
            url: 'leis_controller.php?act=upload',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                toastr["success"](data);
                $('#div-anexos').remove();
                
            }
        });
    });

    var fileInput = document.getElementById('arquivo');
    fileInput.addEventListener('change', function (event) {
        var input = event.target;

        for (var i = 0; i < input.files.length; i++) {
//            $('#lista').append('<li>').append(input.files[i].name);
            console.log(input.files[i]);
            $('#anexos').append(
                    $('<div class="row anexo"  id="' + i + '">')
                    .append($('<div class="col-9">').append('<span class="name_anexo">' + input.files[i].name + '</span><br /><span class="size_anexo">' + input.files[i].size + ' bytes</span> <small class="type_anexo">' + input.files[i].type + '</small>'))
                    .append($('<div class="col-3">').append('<button class="remover" onclick="remover(' + i + ')"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Remover</button>'))
//                   $('<tr>')
//                   .append($('<td style="width: 90%">').append('<span id="name_anexo">' + input.files[i].name + '</span><br /><span id="size_anexo">' + input.files[i].size + '</span> <span id="type_anexo">' + input.files[i].type + '</span>'))
//                   .append($('<td>').append('<button>Excluir</button>')) 
            )
        }
    });

    function remover(id) {
        document.getElementById(id).remove();
    }

</script>

