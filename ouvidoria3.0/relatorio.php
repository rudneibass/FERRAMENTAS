<?php

setlocale(LC_TIME, 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
require 'Crud.class.php';
$table = $_POST['tbl'];

$crud = new Crud();
$result = $crud->select("*", $table, "WHERE o_id =".$_POST['o_id'], array()); 
$html = null;

foreach($result as $data){
    $date = $data['o_data_cadastro'];
    $html .= '<div class="b-bottom"><br/>---------- Forwarded message ---------<br /><span><b>De:</b>'.$data['o_nome'].',</span><span>--'.$data['o_email'].'--, </span><span> '.$data['o_fone'].' </span><br />';
    $html .= '<span style="font-weight: bold;">Data: </span>'. strftime("%A, %d de %B de %Y", strtotime($date)).'<br />';
    $html .= '<span style="font-weight: bold;">Assunto: </span>'.$data['o_assunto'].'<br /><br /><br />';
    $html .= '<span style="font-weight: bold;">MENSAGEM: </span>'.$data['o_mensagem'].'<br /></div>';
}

        
        use Dompdf\Dompdf;
	require_once("dompdf/autoload.inc.php");
	$dompdf = new DOMPDF();	
	$dompdf->load_html('
                
                        <style>  
                        span{font-family: Arial, Helvetica, sans-serif; font-size: 12px;} 
                        .td{width: 550px;}
                        .b-bottom{border-bottom: 1px solid;}
                        </style>
                        
                        <table class="b-bottom">
                            <tr>
                                <td class="td">
                                    <span><b>Entidade:</b> Camara Municipal de Teste</span><br />
                                    <span><b>Sistema:</b> Ouvidoria </span><br />
                                    <span><b>Relatório:</b> Manifestação Publica </span>
                                </td>
                                <td>
                                    <img src="logo.png"  height="80px">
                                </td>
                            </tr>
                        </table>
			'.$html.'
                ');
	$dompdf->render();
	$dompdf->stream(
		"relatorio_celke.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);  

?>