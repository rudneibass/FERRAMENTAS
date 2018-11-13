<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- BOOTSTRAP 4 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- FONT AWSOME -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- TOAST-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" crossorigin="anonymous">



<style>
    h2 {margin: 5px 5px 5px 5px }
    .border{border: 1px solid; border-color: #dfe3ee;}
    .box-shadow{ -webkit-box-shadow: 10px 10px 20px -12px rgba(0,0,0,0.75);}

   /* div {border: 1px solid } */

    #toast-container {
       margin-right:20%; 
       min-width: 60%;
   }
   .toast-success {
       min-width: 100%;
   } 

   
</style>

<?php require 'scripts.php';
setlocale(LC_TIME, 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$date = date("Y/m/d h:i:s");
?>

<div><br/><br/><br/></div>

<div class="container border box-shadow">

    <br />
    <div class="chit-chat-heading"><h5>FORMULÁRIO DE MANIFESTAÇÃO</h5></div>    
    <br />

    <div class="row">
        <div class="col-12" style="border-right: 1px solid #ccc">
            <form id="submit_form" enctype="multipart/form-data">
                <input type="hidden" value="ouvidoria" name="tbl" id="tbl">	
                <input type="hidden" value="<?php echo date("Y/m/d h:i:s") ?>" name="o_data_cadastro" id="data_cadastro">	
                <input type="hidden" value="<?php echo strftime("%A %d de %b", strtotime($date)) ?>" name="o_data_formatada" id="data_formatada">	
                <input type="hidden" value="0" name="o_status" id="o_status">    
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            é anônimo ? 
                            <label class="radio-inline">
                                <input type="radio" name="o_anonimo" id="sim" value="1" onclick="setValueInput()"> sim
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="o_anonimo" id="nao" value="0" onclick="resetValueInput()" checked> não
                            </label>
                        </div>
                    </div>  
                </div>
                
                <div class="row" id="row-1">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                <i class="fa fa-user"></i> Nome <span id="asterisco" style="color:#F00">*</span> 
                            </label>
                            <input type="text" name="o_nome" class="form-control" id="nome" placeholder="Digite seu nome" required>
                        </div>
                    </div>
                
                </div>

                <div class="row" id="row-2">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label><i class="fa fa-envelope"></i> Email</label>&nbsp;<span style="color: #A0A0A0; font-size: 14px">(Caso deseje receber um retorno via email)</span>
                            <input type="email" name="o_email" id="email" class="form-control" placeholder="Digite seu email">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>
                                <i class="fa fa-phone-square"></i> Telefone
                            </label>
                            <input type="text" name="o_fone" id='fone' placeholder="Digite seu contato" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="row" id="row-3">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label><i class="fa fa-home"></i> Endereço</label>
                            <input type="text" name="o_endereco" class="form-control" id="endereco" placeholder="Digite seu endereço">
                        </div>    
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><i class="fa fa-home"></i> Bairro</label>
                            <input type="text" name="o_bairro" class="form-control" id="bairro" placeholder="Digite seu bairro">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><i class="fa fa-filter"></i> Entidade</label>
                            <select name="o_entidade">
                                <option value="">Selecione uma Entidade</option>
                                <option  value='1'>Câmara Municipal</option>                                                
                            </select>                        
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label><i class="fa fa-filter"></i> Assunto <span style="color:#F00">*</span></label><br/>
                            <select name="o_assunto" required="required">
                                <option></option>
                                <option  value='6-Criticas'>Críticas</option><option  value='2-Denuncia'>Denúncias</option><option  value='4-Elogio'>Elogios</option><option  value='1-Reclamacao'>Reclamações</option><option  value='3-Sugestao'>Sugestoes</option><option  value='5-Urgencias'>Urgências</option>                                                </select>
                        </div>
                    </div>

                    <div class="col-md-4" style="display: none">
                        <div class="form-group"><br />
                            <label><i class="fa fa-paperclip" aria-hidden="true" ></i> anexo</label>
                            <input type="text" name="o_anexo" id="anexo">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><i class="fa fa-pencil"></i> Mensagem <span style="color:#F00">*</span></label><br />
                            <textarea name="o_mensagem" id="mensagem" rows="4" cols="150" required></textarea>
                        </div>
                    </div>
                </div>
            </form>
            <button type="button" class="btn btn-primary"  data-dismiss="modal" id="submit">Enviar</button>
        </div>  
    </div>
    <br/>
</div><!-- CONTAINER -->
<div id="echos"></div>
<br />
<br />
<br />
</body>
