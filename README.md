# ocm-api-client
Bibliothèque PHP cliente pour les opérations Orange Money

## Requirement

You need **php version >=5.5** to use this library

## Installation

```bash
composer require patrickmaken/ocm-api-client
```

## Usage

Before any operation, you must initialize the client by giving it your Orange Money API parameters: `client_id`, `client_secret`, `om_app_id`, `om_app_secret`, `pin` and `channel_user_msisdn`

### Make payment

```php
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
$payObject->notifUrl = 'https://myapplication.org/callback_url';

// Perform a new payment
$paymentResponse = OMClient::pay($payObject, $payToken);

var_dump($paymentResponse);
```

Output:
```bash
object(Patrickmaken\OcmAPI\Models\PaymentResponse)#30 (14) {
  ["createTime"]=>
  string(10) "1605974925"
  ["subscriberMsisdn"]=>
  string(9) "697452601"
  ["amount"]=>
  int(10000)
  ["payToken"]=>
  string(28) "MP2011215D78B851CF9A415B887C"
  ["txnId"]=>
  string(20) "MP201121.1708.C44634"
  ["txnMode"]=>
  string(11) "TK201588962"
  ["initTxnMessage"]=>
  string(162) "Paiement e la clientele done.The devrez confirmer le paiement en saisissant son code PIN et vous recevrez alors un SMS. Merci dutiliser des services Orange Money."
  ["initTxnStatus"]=>
  string(3) "200"
  ["confirmTxnStatus"]=>
  NULL
  ["confirmTxnMessage"]=>
  NULL
  ["status"]=>
  string(7) "PENDING"
  ["notifUrl"]=>
  string(39) "https://myapplication.org/callback_url"
  ["description"]=>
  string(23) "Payment of train ticket"
  ["channelUserMsisdn"]=>
  string(9) "694221100"
}
```

### Get payment status

```php
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
```

Output:
```bash
object(Patrickmaken\OcmAPI\Models\PaymentResponse)#30 (14) {
  ["createTime"]=>
  string(10) "1605974925"
  ["subscriberMsisdn"]=>
  string(9) "697452601"
  ["amount"]=>
  int(10000)
  ["payToken"]=>
  string(28) "MP2011215D78B851CF9A415B887C"
  ["txnId"]=>
  string(20) "MP201121.1708.C44634"
  ["txnMode"]=>
  string(11) "TK201588962"
  ["initTxnMessage"]=>
  string(162) "Paiement e la clientele done.The devrez confirmer le paiement en saisissant son code PIN et vous recevrez alors un SMS. Merci dutiliser des services Orange Money."
  ["initTxnStatus"]=>
  string(3) "200"
  ["confirmTxnStatus"]=>
  NULL
  ["confirmTxnMessage"]=>
  NULL
  ["status"]=>
  string(7) "PENDING"
  ["notifUrl"]=>
  string(39) "https://myapplication.org/callback_url"
  ["description"]=>
  string(23) "Payment of train ticket"
  ["channelUserMsisdn"]=>
  string(9) "694221100"
}
```

## contacts
+ Email: [patrickmaken@gmail.com](mailto:patrickmaken@gmail.com)
+ Telephone / Whatsapp: [+237 697 27 55 87](https://wa.me/237697275587)