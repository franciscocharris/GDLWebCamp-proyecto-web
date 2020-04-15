<?php

require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost:8081/udemy/gdlwebcan/');

$apiContext = new \PayPal\Rest\ApiContext(
	new \PayPal\Auth\OauthTokenCredential(
		
		'AdwcTap2fBPAVsFUUqwpzq10qhkBbhQJMILYh1ppNW_58KND3psiWgLPsYS_f8K1SE-_1NNCo3Tb-GW3',//Cliente id
		'EJqmJc99THKCso_vR7e4RMqOVFXaScsggaelDMt7Bhu3UzjxRy-fsjxGtiBER4eid9zpiJjJKyIg3TOE'//secret
			
	)
);