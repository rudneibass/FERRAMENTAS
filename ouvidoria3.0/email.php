<?php
	
		$nome     = utf8_decode (strip_tags(trim($_POST['o_nome'])));
		$telefone = utf8_decode (strip_tags(trim($_POST['o_fone'])));
		$email    = utf8_decode (strip_tags(trim($_POST['o_email'])));
		$assunto = utf8_decode (strip_tags(trim($_POST['o_assunto'])));
		$mensagem = utf8_decode (strip_tags(trim($_POST['o_mensagem'])));
			
		//1 – Definimos Para quem vai ser enviado o email
		$para = "rudneixaviernascimento@gmail.com.com";
		// 3 - Definimos o Assunto do email
		$assunto = "(Contato - OUVIDORIA)";
		//4 – Agora definimos a  mensagem que vai ser enviado no e-mail
		$body .= "<br /><br />
					<strong>Nome:</strong> $nome<br /><br />
					<strong>Telefone:</strong> $ddd - $telefone<br /><br />
					<strong>E-mail:</strong> $email<br /><br />
					<strong>Assunto:</strong> $assunto<br /><br />
					<strong>Mensagem:</strong><br /> $mensagem";	
		
		//5 – agora inserimos as codificações corretas e  tudo mais.
		$headers =  "Content-Type:text/html; charset=UTF-8\n";
		$headers .= "From:  diocesanohotel.com.br<no-reply@diocesanohotel.com.br>\n"; //Vai ser mostrado que  o email partiu deste nome e seguido do email
		$headers .= "X-Sender:  <no-reply@diocesanohotel.com.br>\n"; //email do servidor que enviou
		$headers .= "X-Mailer: PHP  v".phpversion()."\n";
		$headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
		$headers .= "Return-Path:  <no-reply@diocesanohotel.com.br>\n"; //caso a msg seja respondida vai para  este email.
		$headers .= "MIME-Version: 1.0\n";
		
		$envio = mail($para, $assunto, $body, $headers);  //função que faz o envio do email.
		
		if ($envio) {
			echo "<script>window.alert('Mensagem enviada!')</script>";
			echo "<script>location.href='contato'</script>";
		}
		else {
			echo "<script>window.alert('A mensagem não foi enviada!')</script>";
			echo "Erro: " . $Email->ErrorInfo;
		}
	
?>
