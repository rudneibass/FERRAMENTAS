<meta charset="UTF-8">

<!-- BOOTSTRAP 4 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- FONT AWSOME -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- TOAST-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" crossorigin="anonymous">
<script src="paginacao.js"></script>


<style>
    h2 {margin: 5px 5px 5px 5px }
    .border{border: 1px solid; border-color: #dfe3ee;}
    .box-shadow{ -webkit-box-shadow: 10px 10px 20px -12px rgba(0,0,0,0.75);}

    .border-bottom{ border-bottom: 1px solid #dfe3ee}
    .border-bottom-top{ border-bottom: 1px solid #dfe3ee; border-top: 1px solid #dfe3ee}

    /*     div {border: 1px solid }  */

    /*  #toast-container {
       min-width: 10%;
       top: 50%;
       right: 50%;
       transform: translateX(50%) translateY(50%);
   } */
    .size-12{font-size: 12px;}
    .size-14{font-size: 14px;}
    .size-12, i{color : #5f6368}

</style>

<?php
setlocale(LC_TIME, 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$date = date("Y/m/d h:i:s");
?>
<body onload="find()">
    <div><br/><br/><br/></div>

    <div class="container border box-shadow">

        <br />
        <div class="chit-chat-heading">OUVIDORIA</div>    
        <br />
        <form id="pesquisa">
            <input type="hidden" id="act_post_ajax" name="act_post_ajax" value="find">
            <input type="hidden" id="tbl" name="tbl" value="ouvidoria">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Protocolo</label>
                        <input type="text" name="o_id" class="form-control" id="id" placeholder="Numero do Protocolo">
                    </div>    
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label><i class="fa fa-user"></i>&nbsp;Nome do Cidadao</label>
                        <input type="text" name="o_nome" class="form-control" id="nome" placeholder="Digite o nome">
                    </div>    
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label><i class="fa fa-calendar"></i>&nbsp;Data Inicial</label>
                        <input type="date" name="o_data_ini" class="form-control" id="data_ini" placeholder="Digite data inicial">
                    </div>    
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label><i class="fa fa-calendar"></i>&nbsp;Data Final</label>
                        <input type="date" name="o_data_fim" class="form-control" id="data_fim" placeholder="Digite data final">
                    </div>
                </div>

                <div class="col-md-1">
                    <div class="form-group">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <button type="button" id="pesquisar" class="btn btn-success" onclick="find()">pesquisar</button>
                    </div>
                </div>

            </div><!-- row -->
        </form>

      
        <div class="row">
            <div class="col-md-10">       
            </div>        
            <div class="col-md-2">

                <span id="numeracao" class="size-14"></span>&nbsp;&nbsp;
                <!-- <i class="fa fa-chevron-circle-left" style="font-size: 24px" id="proximo" disabled></i> -->
                <i class="fa fa-chevron-left" style="font-size: 15px;" id="anterior" disabled style="font-size: 24px;"></i>&nbsp;&nbsp;
              <!-- <i class="fa fa-chevron-circle-right" style="font-size: 24px" id="proximo" disabled></i> -->
                <i class="fa fa-chevron-right" style="font-size: 15px" id="proximo" disabled></i>

            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table-hover" style="width:100%">
                    <tr>
                        <th></th>
                        <th></th> 
                        <th></th>
                        <th></th>
                        <th></th> 
                    </tr>
                </table>
                <div class="row">
                    <div class="col-md-4"><br/><span class="size-12"><?php echo strftime("%A, %d de %B de %Y", strtotime($date)) ?></span><br/></div>
                    <div class="col-md-4"><br/><span class="size-12"><center>Termos de Servios</center></span><br/></div>
                    <div class="col-md-4"><span class="size-12"><br/><center>Copyright - Todos os direitos são reservados</center></span><br/></div>
                </div>

            </div><!-- row2 -->
        </div><!-- CONTAINER -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Manifestação Publica</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Imprimir</button> 
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="echos"></div>
</body>