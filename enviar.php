<?php
require('vendor/autoload.php');

function notempty($array){
	$response = [];
	foreach ($array as $key => $item){
		if(!empty($item)){
			$response[$key] = $item;
		}
	}

	if(count($response) == 3){
		return $response;
	}else{
		return false;
	}
}


$data = notempty($_POST);

if($data){
	//Pegando variáveis de configuração
	$dotenv = new Dotenv\Dotenv(__DIR__);
	$dotenv->load();

	//Configurando PHPMailer
	$mailer = new PHPMailer();
	$mailer->isSMTP();
	$mailer->charset = 'utf8';
	$mailer->SMTPAuth = true;
	$mailer->SMTPSecure = 'tls';
	$mailer->Host       = getenv('SMTP_HOST');
	$mailer->Port       = getenv('SMTP_PORT');
	$mailer->Username   = getenv('SMTP_USERNAME');
	$mailer->Password   = getenv('SMTP_PASSWORD');

    //Configurando informações de envio
	$mailer->setFrom(getenv('SMTP_FROM'), getenv('SMTP_NAME'));
	$mailer->addAddress(getenv('SMTP_EMAIL'), getenv('SMTP_NAME'));
	$mailer->Subject = '[ENTRAR EM CONTATO - SEMPRE]';
	$mailer->isHTML(true);
    $mailer->Body = "
    <table border='1px'>
		<thead>
			<tr>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Telefone</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>".$data['nome']."</td>
				<td>".$data['email']."</td>
				<td>".$data['telefone']."</td>
			</tr>
		</tbody>
	</table>";
	$mailer->AltBody = 'nome:'.$data['nome'].' , e-mail: '.$data['email'].', Telefone: '.$data['telefone'];

    //Verificação de envio
	if (!$mailer->send()) {
		header('Location:/error.html');
	} else {
		header('Location:/sucesso.html');
	}

}else{

	header('Location:/error.html');
	
}
