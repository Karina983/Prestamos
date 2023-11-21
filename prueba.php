
<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Reemplaza con tus credenciales de Twilio
$account_sid = 'AC408e539c33b0f6260504a044e123514d';
$auth_token = '51af62ae8a2c28dd10cb6729e7396a7c';
$twilio_number = '+13344589178';

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Número al que quieres enviar el mensaje
    '+526565888489',
    array(
        'from' => $twilio_number,
        'body' => '¡Mensaje de texto enviado!'
    )
);
?>
