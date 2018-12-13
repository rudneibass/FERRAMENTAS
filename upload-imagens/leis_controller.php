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

class UploadImagem{
public $width; // Definida no arquivo index.php, será a largura máxima da nossa imagem
public $height; // Definida no arquivo index.php, será a altura máxima da nossa imagem
protected $tipos = array("jpeg", "png", "gif"); // Nossos tipos de imagem disponíveis para este exemplo
 
// Função que irá redimensionar nossa imagem
protected function redimensionar($caminho, $nomearquivo){
// Determina as novas dimensões
$width = $this->width;
$height = $this->height;
 
// Pegamos a largura e altura originais, além do tipo de imagem
list($width_orig, $height_orig, $tipo, $atributo) = getimagesize($caminho.$nomearquivo);
 
// Se largura é maior que altura, dividimos a largura determinada pela original e multiplicamos a altura pelo resultado, para manter a proporção da imagem
if($width_orig > $height_orig){
$height = ($width/$width_orig)*$height_orig;
// Se altura é maior que largura, dividimos a altura determinada pela original e multiplicamos a largura pelo resultado, para manter a proporção da imagem
} elseif($width_orig < $height_orig) {
$width = ($height/$height_orig)*$width_orig;
} // -> fim if
// Criando a imagem com o novo tamanho
$novaimagem = imagecreatetruecolor($width, $height);
switch($tipo){
 
// Se o tipo da imagem for gif
case 1:
// Obtém a imagem gif original
$origem = imagecreatefromgif($caminho.$nomearquivo);
// Copia a imagem original para a imagem com novo tamanho
imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
// Envia a nova imagem gif para o lugar da antiga
imagegif($novaimagem, $caminho.$nomearquivo);
break;
 
// Se o tipo da imagem for jpg
case 2:
// Obtém a imagem jpg original
$origem = imagecreatefromjpeg($caminho.$nomearquivo);
// Copia a imagem original para a imagem com novo tamanho
imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
// Envia a nova imagem jpg para o lugar da antiga
imagejpeg($novaimagem, $caminho.$nomearquivo);
break;
 
// Se o tipo da imagem for png
case 3:
// Obtém a imagem png original
$origem = imagecreatefrompng($caminho.$nomearquivo);
// Copia a imagem original para a imagem com novo tamanho
imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
// Envia a nova imagem png para o lugar da antiga
imagepng($novaimagem, $caminho.$nomearquivo);
break;
} // -> fim switch
 
// Destrói a imagem nova criada e já salva no lugar da original
imagedestroy($novaimagem);
// Destrói a cópia de nossa imagem original
imagedestroy($origem);
} // -> fim function redimensionar()
 
protected function tirarAcento($texto){
    // array com letras acentuadas
    $com_acento = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ',);
    // array com letras correspondentes ao array anterior, porém sem acento
    $sem_acento = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y',);
    // procuramos no nosso texto qualquer caractere do primeiro array e substituímos pelo seu correspondente presente no 2º array
    $final = str_replace($com_acento, $sem_acento, $texto);
    // array com pontuação e acentos
    $com_pontuacao = array('´','`','¨','^','~',' ','-');
    // array com substitutos para o array anterior
    $sem_pontuacao = array('','','','','','_','_');
    // procuramos no nosso texto qualquer caractere do primeiro array e substituímos pelo seu correspondente presente no 2º array
    $final = str_replace($com_pontuacao, $sem_pontuacao, $final);
    // retornamos a variável com nosso texto sem pontuações, acentos e letras acentuadas
    return $final;
} // -> fim function tirarAcento()
 
// Função que irá fazer o upload da imagem
public function salvar($caminho, $file){
 
// Retiramos acentos, espaços e hífens do nome da imagem
$file['name'] = $this->tirarAcento(($file['name']));
// Atribuímos caminho e nome da imagem a uma variável apenas
$uploadfile = $caminho.$file['name'];
 
// Guardamos na variável tipo o formato do arquivo enviado
$tipo = strtolower(end(explode('/', $file['type'])));
// Verifica se a imagem enviada é do tipo jpeg, png ou gif
if (array_search($tipo, $this->tipos) === false) {
$mensagem = "<font color='#F00'>Envie apenas imagens no formato jpeg, png ou gif!</font>";
return $mensagem;
}
 
// Se a imagem temporária não for movida para onde a variável com caminho e nome indica, exibiremos uma mensagem de erro
else if (!move_uploaded_file($file['tmp_name'], $uploadfile)) {
switch($file['error']){
case 1:
$mensagem = "<font color='#F00'>O tamanho do arquivo é maior que o tamanho permitido.</font>";
break;
case 2:
$mensagem = "<font color='#F00'>O tamanho do arquivo é maior que o tamanho permitido.</font>";
break;
case 3:
$mensagem = "<font color='#F00'>O upload do arquivo foi feito parcialmente.</font>";
case 4:
$mensagem = "<font color='#F00'>Não foi feito o upload de arquivo.</font>";
break;
} // -> fim switch
 
// Se a imagem temporária for movida
} /* -> fim if */ else{
 
// Pegamos sua largura e altura originais
list($width_orig, $height_orig) = getimagesize($uploadfile);
 
//Comparamos sua largura e altura originais com as desejadas
if($width_orig > $this->width || $height_orig > $this->height){
 
// Chamamos a função que redimensiona a imagem
$this->redimensionar($caminho, $file['name']);
} // -> fim if
 
// Exibiremos uma mensagem de sucesso
$mensagem = "<a href='".$uploadfile."'><font color='#070'>Upload realizado com sucesso!</font><a>";
} // -> fim else
 
// Retornamos a mensagem com o erro ou sucesso
return $mensagem;
 
} // -> fim function salvar()
} // -> fim classe
?>