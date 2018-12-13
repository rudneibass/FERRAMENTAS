<?php

header("Content-Type: text/html; charset=utf-8", true);
setlocale(LC_TIME, 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
//require("crud.class.php");

if ($_GET['act'] == "locate") {
    $con = mysqli_connect("localhost", "root", "", "esic") or print(mysql_error());
    if (!$con) {
        echo '[{"erro": "Não foi possível conectar ao banco"';
        echo '}]';
    } else {
        if (isset($_POST['id'])) {
            $sql = "SELECT * FROM leis where id=" . $_POST['id'] . "";
        } else {
            $sql = "SELECT * FROM leis ORDER BY id desc";
        }

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

            if (!isset($_POST['id'])) {
                //Mesclar resultados em um array
                for ($i = 0; $i < $n; $i++) {
                    //MYSQL
                    $dados[] = mysqli_fetch_assoc($result);

                    //POSTGRES $dados[] = pg_fetch_assoc($result, $i);
                }
            } else {
                $dados = mysqli_fetch_assoc($result);
            }
            echo json_encode($dados, JSON_PRETTY_PRINT);
        }
    }
}


if (isset($_GET) && $_GET['act'] == "insert") {

    $val = new Validacao();
    $val->set($_POST['resumo'], 'Resumo')->obrigatorio();
    $val->set($_POST['tipo'], 'Tipo')->obrigatorio();
    $val->set($_POST['numero_lei'], 'Numero da Lei')->obrigatorio();


    $post = $_POST;
    $table = $_POST['tbl'];

    if ($val->validar()) {
        $crud = new CRUD();
        print $crud->Insert($post, $table);
    } else {
        foreach ($val->getErrors() as $erro) {
            echo "$erro <br />";
        }
        die;
    }
};

if (isset($_GET) && $_GET['act'] == "update") {

    $val = new Validacao();
    $val->set($_POST['resumo'], 'Resumo')->obrigatorio();
    $val->set($_POST['tipo'], 'Tipo')->obrigatorio();
    $val->set($_POST['numero_lei'], 'Numero da Lei')->obrigatorio();


    $post = $_POST;
    $table = $_POST['tbl'];
    $id = $_GET['id'];

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

if ($_GET['act'] == "delete") {
    $table = $_POST['tbl'];
    $id = $_POST['id'];

    $crud = new CRUD();
    $delete = $crud->delete($table, 'WHERE ID=?', array($id));
}

if (isset($_GET) && $_GET['act'] == "upload") {
    include_once 'conn.php';

    $arquivos = $_FILES['arquivo'];
    $indice = count(array_filter($arquivos["name"]));
    $id_lei = $_POST['id_lei'];

    if ($indice <= 0) {
        echo "Você não selecionaou nenhum imagem";
    } else {
        for ($i = 0; $i < $indice; $i++) {

            $enviar = move_uploaded_file($arquivos["tmp_name"][$i], "img/" . $arquivos["name"][$i]);

            $nome = $arquivos["name"][$i];
            $tamanho = $arquivos["size"][$i];
            $caminho = "img/" . $arquivos["name"][$i];

            $sql = "INSERT INTO leis_detalhe (id_lei, nome, caminho, tamanho, data) VALUES ('$id_lei','$nome','$caminho','$tamanho', now())";
            $result = $conn->query($sql)or die(mysqli_errno());

            if ($enviar == true) {
                $mensagem = "Enviado com sucesso";
            } else {
                $mensagem = "Houve um erro ao enviar os arquivos, contate o administrador!";
            }
        }

        echo $mensagem;
    }
}


//$uploaddir = 'img/';
//$uploadfile = $uploaddir . $_FILES['arquivo']['name'];
//
//if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)){
//echo "Arquivo Enviado<br/>";
//
//$con = mysqli_connect("localhost", "root", "", "esic") or print(mysql_error());
//$sql = "update servidor set foto ='servidores/".$uploadfile."' where id=".$_POST['id']."";
//$result = mysqli_query($con, $sql)or die(mysqli_error($con));
//
//echo '<img class="img-thumbnail" src="servidores/'.$uploadfile.'" width="200">';
//}
//
//else {echo "Arquivo não enviado";}
//
//
//}
?>