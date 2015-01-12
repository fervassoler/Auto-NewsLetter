<?php

function trollar($site)
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
    curl_exec($ch);
    curl_close($ch);
}

$email = $_POST['campoEmail'];

$sites = array (

            array('url' => 'http://www.oficinadanet.com.br/newsletter/sucess',
                'campos' => array( 'email' => urlencode($email))
            ),

            array('url' => 'http://www.groupon.com.br/Newsletter.action?nlp=',
                'campos' => array('email' => urlencode($email))
            ),

            array('url' => 'http://www.ciplak.com.br//cadastro-para-newsletter/enviar',
                'campos' => array('newsletter[nome]' => 'trollando', 'newsletter[email]' => urlencode($email), 'newsletter[newsletter_perfil_id]' => '1')
            ),

            array('url' => 'http://www.lwartimpermeabilizantes.com.br/cadastro-para-newsletter/enviar',
                'campos' => array('newsletter[nome]' => 'trollando', 'newsletter[email]' => urlencode($email), 'newsletter[newsletter_perfil_id]' => '1')
            ),
);

foreach ($sites as $site) {
    trollar($site);
    echo"<script>window.location='index.html';alert('sua mensagem foi enviada com sucesso! Estaremos retornando em breve');</script>";
}
?>
