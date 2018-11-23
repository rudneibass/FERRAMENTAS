<?php

header("Content-Type: text/html; charset=utf-8", true);
setlocale(LC_TIME, 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
require("crud.class.php");

if ($_GET['act'] == "locate") {
    $table = $_POST['tbl'];
    $crud = new CRUD();
    
    $con = mysqli_connect("localhost", "root", "", "esic") or print(mysql_error());

    if (!$con) {
        echo '[{"erro": "Não foi possível conectar ao banco"';
        echo '}]';
    } else {

        if ($_POST['o_id'] != "" && $_POST['o_nome'] == "") { $sql = "SELECT * FROM ouvidoria WHERE o_id =" . $_POST['o_id'] . "";}

        if ($_POST['o_id'] != "" && $_POST['o_nome'] != "") { $sql = "SELECT * FROM ouvidoria WHERE o_id LIKE '%" . $_POST['o_id'] . "%' AND o_nome  LIKE '%" . $_POST['o_nome'] . "%' ORDER BY o_id DESC";}

        if ($_POST['o_nome'] != "" && $_POST['o_id'] == "") {$sql = "SELECT * FROM ouvidoria WHERE o_nome  LIKE '%" . $_POST['o_nome'] . "%' ORDER BY o_id DESC";}
        
        if ($_POST['o_data_ini'] != "" && $_POST['o_data_fim'] == "") {$sql = "SELECT * FROM ouvidoria WHERE o_data_cadastro LIKE '%" . $_POST['o_data_ini'] . "%' ORDER BY o_id DESC";}
        
        if ($_POST['o_data_ini'] != "" && $_POST['o_data_fim'] != "") {$sql = "SELECT * FROM ouvidoria WHERE o_data_cadastro BETWEEN '" . $_POST['o_data_ini'] . "' AND '" . $_POST['o_data_fim'] . "' ORDER BY o_id DESC";}

        if ($_POST['o_nome'] == "" && $_POST['o_id'] == "" && $_POST['o_data_ini'] == "" && $_POST['o_data_fim'] == "") {$sql = "SELECT * FROM ouvidoria ORDER BY o_id desc";}

        if ($_POST['o_nome'] != "" && $_POST['o_id'] != "" && $_POST['o_data_ini'] != "" && $_POST['o_data_fim'] != "") {echo 'NÃO É PERMITIDO PESQUISAR PREENCHENDO TODOS OS CAMPOS AO MESMO TEMPO!';}

      
        $result = mysqli_query($con, $sql);
        $n = mysqli_num_rows($result);

        //POSTGRES $sql = "SELECT * FROM clientes ORDER BY id"; $result = pg_query($sql); //Executar a SQL $n = pg_num_rows($result); //Número de Linhas retornadas

        if (!$result) {
            //Caso não haja retorno
            echo '[{"erro": "Há algum erro com a busca. Não retorna resultados"';
            echo '}]';
        } else if ($n < 1) {
            //Caso não tenha nenhum item
            echo '[{"erro": "Não há nenhum dado cadastrado"';
            echo '}]';
        } else {

            //Mesclar resultados em um array
            for ($i = 0; $i < $n; $i++) {
                //MYSQL
                $dados[] = mysqli_fetch_assoc($result);

                //POSTGRES $dados[] = pg_fetch_assoc($result, $i);
            }
            echo json_encode($dados, JSON_PRETTY_PRINT);
        }
    }
}

if (isset($_GET) && $_GET['act'] == "edit") {
    $table = $_POST['tbl'];
    $id = $_POST['id'];

    $crud = new CRUD();
    $select = $crud->select('*', 'ouvidoria', 'WHERE o_id=?', array($id));
    foreach ($select as $data) {
        $date = $data['o_data_cadastro'];
        echo '<div>
                        <i class="fa fa-user-circle"  style="font-size:24px"></i>&nbsp;<span><b>De:&nbsp;</b>' . $data['o_nome'] . '</span><span><</span>' . $data['o_email'] . '<span>></span><br/>
                        <span ><b>Enviado:</b>&nbsp;' . strftime("%A, %d de %B de %Y", strtotime($date)) . '</span><br/>
                        <span ><b>Protocolo:&nbsp;</b></span>00000' . $data['o_id'] . '<br/>
                        <span ><b>Fone:&nbsp;</b></span>' . $data['o_fone'] . '<br />
                        <span ><b>Assunto:&nbsp;</b></span>' . $data['o_assunto'] . '<br /><br />
                        <span><b>Mensagem:&nbsp;</b></span>' . $data['o_mensagem'] . '</span><br/>
                     </div>
                     <br />
                     <div style="border-top: 1px solid #d6d6d6">
                        <br />
                        <form action="relatorio.php" method="POST" >
                            <input type="hidden" name="o_id" value="' . $data['o_id'] . '">
                            <input type="hidden" name="tbl" value="ouvidoria">
                            <div class="row">
                               <div class="col-1"></div>
                               <div class="col-6" id="loading" style="padding-top: 10px"></div>
                               <div class="col-5">
                                  <button type="submit" class="btn btn-success" onclick="loading();">Imprimir</button> 
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div> 
                            </div>
                        </form>   
                     </div>';
    }
}

if ($_GET['act'] == "delete") {
    $table = $_POST['tbl'];
    $id = $_POST['id'];

    $crud = new CRUD();
    $delete = $crud->delete($table, 'WHERE ID=?', array($id));
}

if (isset($_GET) && $_GET['act'] == "insert") {

    $val = new Validacao();
    $val->set($_POST['o_mensagem'], '"Mensagem"')->obrigatorio();
    $val->set($_POST['o_assunto'], '"Assunto"')->obrigatorio();
    $val->set($_POST['o_nome'], '"Nome"')->obrigatorio();
  
    $post = $_POST;
    $table = $_POST['tbl'];

    if ($val->validar()) {
        $crud = new CRUD();
       print $crud->Insert($post, $table);
    } else {
        foreach ($val->getErrors() as $erro) {
            echo "$erro <br />";
        }
    }
};

if (isset($_GET) && $_GET['act'] == "update") {
    $val = new Validacao();
    $val->set($_POST['nome_cliente'], 'Nome')->obrigatorio();
    $val->set($_POST['cidade_cliente'], 'Cidade')->obrigatorio();
    $val->set($_POST['email_cliente'], 'E-mail')->email();
    $val->set($_POST['telefone_cliente'], 'Telefone')->telefone();

    $post = $_POST;
    $table = $_POST['tbl'];
    $id = $_POST['id'];

    if ($val->validar()) {
        $fields = null;
        $values = null;
        foreach ($post as $campo => $valor) {
            $fields .= $campo . "=?,";
            $values .= $valor . ",";
        }
        $prep = substr($fields, 0, strlen($fields) - 1);
        $values = substr($values, 0, strlen($values) - 1);

        
        $crud = new Crud();
        $update = $crud->update($table, $prep . ' WHERE ID =' . $id . '', explode(',', $values));
        $update->rowCount();
        #print $update->rowCount() < 1 ? 'Nenhum dado novo inserido' : 'Alguns dados foram alterados';
    } else {
        foreach ($val->getErrors() as $erro) {
            echo "$erro <br />";
        }
    }
}

if (isset($_GET) && $_GET['act'] == "cs") {

    $table = $_POST['tbl'];
    $prep = "o_status=?";
    $exec = array(1);
    $id = $_POST['id'];

    $crud = new Crud();
    $update = $crud->update($table, $prep . 'WHERE o_id = ' . $id . '', $exec);
}
?>