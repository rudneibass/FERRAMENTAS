<?php
	include ('mpdf/mpdf.php');

$link = mysqli_connect("localhost", "root", "", "site_municipal") or print(mysql_error());
$sql = "SELECT * FROM ouvidoria WHERE o_id=49";
$result = mysqli_query($link, $sql);
$html = null;
foreach($result as $data){
    $html .= '<span style="font-weight: bold;">PROTOCOLO: </span>'.$data['o_id'].'<br />';
    $html .= '<span style="font-weight: bold;">NOME: </span>'.$data['o_nome'].'<br />';
    $html .= '<span style="font-weight: bold;">EMAIL: </span>'.$data['o_email'].'<br />';
    $html .= '<span style="font-weight: bold;">FONE: </span>'.$data['o_fone'].'<br />';
    $html .= '<span style="font-weight: bold;">ASSUNTO: </span>'.$data['o_assunto'].'<br />';
    $html .= '<span style="font-weight: bold;">MENSAGEM: </span>'.$data['o_mensagem'].'<br />';
}


	$pagina = 
		"
                 <style> 
                    span{font-color: red}
                 </style>
                    
                        <span><b>Entidade:</b> Camara Municipal de Teste</span><br />
                        <span><b>Sistema:</b> Ouvidoria </span><br />
                        <span><b>Relatório:</b> Manifestação Publica </span><hr />
			'.$html.'
                ";

$arquivo = "Cadastro01.pdf";

$mpdf = new mPDF();
$mpdf->WriteHTML($pagina);

$mpdf->Output($arquivo, 'I');

// I - Abre no navegador
// F - Salva o arquivo no servido
// D - Salva o arquivo no computador do usuário
?>
