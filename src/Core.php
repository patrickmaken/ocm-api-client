<?php

namespace Patrickmaken\OcmAPI;

use GuzzleHttp\Client;
use Patrickmaken\OcmAPI\Models\Token;
use Patrickmaken\OcmAPI\Models\PayObject;
use Patrickmaken\OcmAPI\Models\OmResponse;
use Patrickmaken\OcmAPI\Client as OcmAPIClient;

class Core 
{
    protected const URL_GET_ACCESS_TOKEN = '/token';
    protected const URL_INIT = '/omcoreapis/1.0.2/%s/init';
    protected const URL_PAY = '/omcoreapis/1.0.2/%s/pay';
    protected const URL_PAYEMENT_STATUS = '/omcoreapis/1.0.2/%s/paymentstatus/%s';

    /**
     * @property string
     */
    protected static $clientId;

    /**
     * @property string
     */
    protected static $clientSecret;

    /**
     * @property string
     */
    protected static $omAppId;

    /**
     * @property string
     */
    protected static $omAppSecret;

    /**
     * @property string
     */
    protected static $accessToken;

    /**
     * @property string
     */
    protected static $pin;

    /**
     * @property string
     */
    protected static $channelUserMsisdn;

    /**
     * @property string
     */
    protected static $env = OcmAPIClient::ENV_PROD;

    /**
     * @throws \Exception
     * @return \Patrickmaken\OcmAPI\Models\Token
     */
    public static function getAccessToken()
    {
        $url = self::getUrl('GET_ACCESS_TOKEN');
        $form_params = [
            'grant_type' => 'client_credentials',
            'client_id' => self::$clientId,
            'client_secret' => self::$clientSecret,
        ];

        $client = self::makeClient(compact('form_params'));
        $result = self::perform($client, $url, 'post', true, true);

        return new Token($result);
    }

    /**
     * @param string $api
     * @throws \Exception
     * @return \Patrickmaken\OcmAPI\Models\OmResponse
     */
    public static function init(string $api)
    {
        $url = sprintf(self::getUrl('INIT'), $api);
        $headers = [
            'Authorization' => self::bearerToken(),
            'X-AUTH-TOKEN' => base64_encode(self::$omAppId.':'.self::$omAppSecret),
            'accept' => 'application/json'
        ];

        $client = self::makeClient(compact('headers'));
        $result = self::perform($client, $url, 'post', true, true);

        return new OmResponse($result);
    }

    /**
     * @throws \Exception
     * @param \Patrickmaken\OcmAPI\Models\PayObject $payObject
     * @param string $PayToken
     * @param string $api
     * @return \Patrickmaken\OcmAPI\Models\OmResponse
     */
    public static function pay(PayObject $payObject, string $PayToken, string $api)
    {
        $url = sprintf(self::getUrl('PAY'), $api);
        $headers = [
            'Authorization' => self::bearerToken(),
            'X-AUTH-TOKEN' => base64_encode(self::$omAppId.':'.self::$omAppSecret),
            'accept' => 'application/json'
        ];
        $json = $payObject->toArray();
        $json['channelUserMsisdn'] = self::$channelUserMsisdn;
        $json['pin'] = self::$pin;
        $json['payToken'] = $PayToken;

        print_r($json);

        $client = self::makeClient(compact('headers', 'json'));
        $result = self::perform($client, $url, 'post', true, true);

        return new OmResponse($result);
    }

    /**
     * @throws \Exception
     * @param string $PayToken
     * @param string $api
     * @return \Patrickmaken\OcmAPI\Models\OmResponse
     */
    public static function paymentStatus(string $PayToken, string $api)
    {
        $url = sprintf(self::getUrl('PAYEMENT_STATUS'), $api, $PayToken);
        $headers = [
            'Authorization' => self::bearerToken(),
            'X-AUTH-TOKEN' => base64_encode(self::$omAppId.':'.self::$omAppSecret),
            'accept' => 'application/json'
        ];

        $client = self::makeClient(compact('headers'));
        $result = self::perform($client, $url, 'get', true, true);

        return new OmResponse($result);
    }

    /**
     * @return string
     */
    protected static function bearerToken()
    {
        return  'Bearer ' . self::$accessToken;
    }

    /**
     * @throws \Exception
     * @return array|null|string
     */
    private static function perform(Client $client, string $url, string $method, $shouldThrowException = false, $jsonResponse = true)
    {
        try {
            $response = $client->$method($url);
            $response = (string)$response->getBody();
            if ($jsonResponse) $response = json_decode($response, true);
        } catch (\Throwable $th) {
            if ($shouldThrowException) throw $th;
            return null;
        }

        return $response;
    }


    /**
     * @param string $key
     * @return string
     */
    private static function getUrl(string $key)
    {
        $url = trim(file_get_contents(dirname(__FILE__, 2) . '/base_url_' . self::$env));
        switch ($key) {
            case 'GET_ACCESS_TOKEN':
                $url .= self::URL_GET_ACCESS_TOKEN;
            break;
            case 'INIT':
                $url .= self::URL_INIT;
            break;
            case 'PAY':
                $url .= self::URL_PAY;
            break;
            case 'PAYEMENT_STATUS':
                $url .= self::URL_PAYEMENT_STATUS;
            break;
        }
        return $url;
    }

    private static function makeClient(array $params = [])
    {
        $options = [
            'timeout'  => 20.0,
            'verify' => false,
        ];
        foreach ($params as $key => $value) $options[$key] = $value;

        return new Client($options);
    }

    
    public static function setClientId(string $value)
    {
        self::$clientId = $value;
    }

    public static function setClientSecret(string $value)
    {
        self::$clientSecret = $value;
    }

    public static function setEnv(string $value)
    {
        self::$env = $value;
    }

    public static function setAccessToken(string $value)
    {
        self::$accessToken = $value;
    }

    public static function setOmAppId(string $value)
    {
        self::$omAppId = $value;
    }

    public static function setOmAppSecret(string $value)
    {
        self::$omAppSecret = $value;
    }

    public static function setPin(string $value)
    {
        self::$pin = $value;
    }

    public static function setChannelUserMsisdn(string $value)
    {
        self::$channelUserMsisdn = $value;
    }

}