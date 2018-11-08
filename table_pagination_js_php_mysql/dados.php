<?php
//Definir formato de arquivo
header('Content-Type:' . "text/plain");

#$host = "localhost"; // IP do Banco
#$user = "postgres"; // Usuário
#$pswd = "1t4rg3t"; // Senha
#$dbname = "banco"; // Banco
#$con = null; // Conexão
#$con = @pg_connect("host=$host user=$user password=$pswd dbname=$dbname") or die (pg_last_error($con));

$con = mysqli_connect("localhost", "root", "", "crud") or print(mysql_error());

if (!$con) {
    echo '[{"erro": "Não foi possível conectar ao banco"';
    echo '}]';
} else {
//mysql
    $sql = "SELECT * FROM clientes ORDER BY id";
    $result = mysqli_query($con, $sql);
    $n = mysqli_num_rows($result);
    
    //POSTGRES
    #$sql = "SELECT * FROM clientes ORDER BY id";
    #$result = pg_query($sql); //Executar a SQL
    #$n = pg_num_rows($result); //Número de Linhas retornadas
    
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
            
            //POSTGRES
            #$dados[] = pg_fetch_assoc($result, $i);
        }

        echo json_encode($dados, JSON_PRETTY_PRINT);
    }
}
?>
