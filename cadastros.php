<?php

function Cadastrar($site)
{
    $url =   $site['url'];
    $fields = $site['campos'];

    $fields_string ="";
    foreach($fields as $key=>$value) {
        $fields_string .= $key.'='.$value.'&'; }
    rtrim($fields_string, '&');
	
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, count($fields));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    echo $fields_string;
	
		if(curl_exec($ch) === false)
		{
			echo 'Curl error: ' . curl_error($ch);
		}
		else
		{
		/*	echo"<script>
				window.location.href='index.html';
				</script>";

			echo	"<script>alert('sua mensagem foi enviada com sucesso! Estaremos retornando em breve');</script>"; */
		}
	
    curl_close($ch);
}

$sites = array();
$email = $_POST['campoEmail'];
$nome = $_POST['campoNome'];;

 $nomesCheck = array('grupon','ciplak','lwart','oficinadanet','omd');
 
 
	 if(isset($_POST['todasOfertas'])){	
		//grupon
		array_push($sites, array('url' => 'http://www.groupon.com.br/Newsletter.action?nlp=','campos' => array('email' => urlencode($email))));
		
		//ciplak
		array_push($sites, array('url' => 'http://www.ciplak.com.br/cadastro-para-newsletter/enviar',
     'campos' => array('newsletter[nome]' => $nome, 'newsletter[email]' => urlencode($email), 'newsletter[newsletter_perfil_id]' => '1')));
	 
		//Lwart
		array_push($sites, array('url' => 'http://www.lwartimpermeabilizantes.com.br/cadastro-para-newsletter/enviar',
     'campos' => array('newsletter[nome]' => $nome, 'newsletter[email]' => urlencode($email), 'newsletter[newsletter_perfil_id]' => '1'))); 
    }
	  elseif(isset($_POST['todosEstudos'])){	
	   //omd
		array_push($sites, array('url' => 'http://www.omd.com.br/newsletter/newsletter-enviado.php',
     'campos' => array('nome' => $nome ,'email' => urlencode($email), 'ddd' => $ddd, 'telefone' => $telefone)));
	 
	  //Oficinadanet
	  array_push($sites, array('url' => 'http://www.oficinadanet.com.br/newsletter/sucess','campos' => array( 'email' => urlencode($email))));
    } 
	  else{
			foreach ($nomesCheck as $nome) {
			  if(isset($_POST[$nome])){	
					switch ($nome) {
						case 'grupon':
							array_push($sites, array('url' => 'http://www.groupon.com.br/Newsletter.action?nlp=','campos' => array('email' => urlencode($email))
								));
							break;
						case 'ciplak':
							array_push($sites, array('url' => 'http://www.ciplak.com.br/cadastro-para-newsletter/enviar',
							'campos' => array('newsletter[nome]' => $nome, 'newsletter[email]' => urlencode($email), 'newsletter[newsletter_perfil_id]' => '1')));
							break;
						case 'lwart':
							array_push($sites, array('url' => 'http://www.lwartimpermeabilizantes.com.br/cadastro-para-newsletter/enviar',
							'campos' => array('newsletter[nome]' => $nome, 'newsletter[email]' => urlencode($email), 'newsletter[newsletter_perfil_id]' => '1')));
							break;
					   case 'omd':
						   array_push($sites, array('url' => 'http://www.omd.com.br/newsletter/newsletter-enviado.php',
							'campos' => array('nome' => $nome ,'email' => urlencode($email), 'ddd' => $ddd, 'telefone' => $telefone)));
						break;
						case 'Oficinadanet':
							array_push($sites, array('url' => 'http://www.oficinadanet.com.br/newsletter/sucess','campos' => array( 'email' => urlencode($email))));
						break;
				  }			
			  }
			}
		}		

foreach ($sites as $site) {

    Cadastrar($site);
     echo"<script>
				window.location.href='index.html';
				alert('sua mensagem foi enviada com sucesso! Estaremos retornando em breve');
			</script>"; 
}
?>
