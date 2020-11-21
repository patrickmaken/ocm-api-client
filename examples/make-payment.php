<?php

include '../vendor/autoload.php';

use Patrickmaken\OcmAPI\Client as OMClient;
use Patrickmaken\OcmAPI\Models\PayObject;

// Setting API configs
OMClient::setConfig([
    'client_id' => 'P9zCumpe07eXeqz1d03cshfO0JMa',
    'client_secret' => 'CkEsxrAZA22cMns81xL29CzHAlIa',
    'om_app_id' => 'APPLICATIONPROD',
    'om_app_secret' => 'APPLICATION2020',
    'channel_user_msisdn' => '694221100',
    'pin' => '1234',
]);

// Init transaction ant getting PayToken
$payToken = OMClient::init();

// Create PayObject
$payObject = new PayObject;
$payObject->subscriberMsisdn = '697452601';
$payObject->amount = 10000;
$payObject->description = 'Payment of train ticket';
$payObject->orderId = 'TK201588962';
$payObject->notifUrl = 'https://myappllication.org/callback_url';

// Perform a new payment
$paymentResponse = OMClient::pay($payObject, $payToken);

var_dump($paymentResponse);