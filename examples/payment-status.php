<?php

include '../vendor/autoload.php';

use Patrickmaken\OcmAPI\Client as OMClient;

// Setting API configs
OMClient::setConfig([
    'client_id' => 'P9zCumpe07eXeqz1d03cshfO0JMa',
    'client_secret' => 'CkEsxrAZA22cMns81xL29CzHAlIa',
    'om_app_id' => 'APPLICATIONPROD',
    'om_app_secret' => 'APPLICATION2020',
    'channel_user_msisdn' => '694221100',
    'pin' => '1234',
]);

$payToken = 'MP2011215D78B851CF9A415B887C';

$paymentResponse = OMClient::paymentStatus($payToken);

var_dump($paymentResponse);