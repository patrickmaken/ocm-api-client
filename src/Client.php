<?php

namespace Patrickmaken\OcmAPI;

use Patrickmaken\OcmAPI\Models\PaymentResponse;
use Patrickmaken\OcmAPI\Models\PayObject;

class Client
{
    public const ENV_PROD = 'prod';
    public const ENV_TEST = 'test';
    protected const API_MP = 'mp';

    /**
     * Initier une transaction Orange Money
     * 
     * @throws \Exception
     * @param string $api
     * @return string PayToken à sauvegarder avant d'effectuer les autres opérations
     */
    public static function init(string $api = self::API_MP) 
    {
        if ($api != self::API_MP) throw new \Exception(sprintf('Invalid API : "%s"', $api));

        Core::setAccessToken(Core::getAccessToken()->get_access_token());
        $response = Core::init($api);
        return $response->get_data()['payToken'];
    }

    /**
     * Effectuer une transaction Orange Money
     * 
     * @throws \Exception
     * @param \Patrickmaken\OcmAPI\Models\PayObject $payObject
     * @param string $PayToken
     * @param string $api
     * @return \Patrickmaken\OcmAPI\Models\PaymentResponse
     */
    public static function pay(PayObject $payObject, string $PayToken, string $api = self::API_MP)
    {
        if ($api != self::API_MP) throw new \Exception(sprintf('Invalid API : "%s"', $api));

        Core::setAccessToken(Core::getAccessToken()->get_access_token());
        $result = Core::pay($payObject, $PayToken, $api);
        return new PaymentResponse($result->get_data());
    }

    /**
     * Renvoi le statut d'un paiement
     * 
     * @throws \Exception
     * @param string $PayToken
     * @param string $api
     * @return \Patrickmaken\OcmAPI\Models\PaymentResponse
     */
    public static function paymentStatus(string $PayToken, string $api = self::API_MP) 
    {
        if ($api != self::API_MP) throw new \Exception(sprintf('Invalid API : "%s"', $api));

        Core::setAccessToken(Core::getAccessToken()->get_access_token());
        $result = Core::paymentStatus($PayToken, $api);
        return new PaymentResponse($result->get_data());
    }

    /**
     * @param array $configs
     * @return void
     */
    public static function setConfig(array $configs)
    {
        if (array_key_exists('env', $configs)) Core::setEnv($configs['env']);
        if (array_key_exists('client_id', $configs)) Core::setClientId($configs['client_id']);
        if (array_key_exists('client_secret', $configs)) Core::setSecret($configs['client_secret']);
        if (array_key_exists('access_token', $configs)) Core::setAccessToken($configs['access_token']);
        if (array_key_exists('om_app_id', $configs)) Core::setOmAppId($configs['om_app_id']);
        if (array_key_exists('om_app_secret', $configs)) Core::setOmAppSecret($configs['om_app_secret']);
        if (array_key_exists('pin', $configs)) Core::setOmAppSecret($configs['pin']);
        if (array_key_exists('channel_user_msisdn', $configs)) Core::setChannelUserMsisdn($configs['channel_user_msisdn']);
    }
}