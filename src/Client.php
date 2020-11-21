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
     * Init Orange Money Payment
     * 
     * @throws \Exception
     * @param string $api
     * @return string PayToken To save befor performing others actions
     */
    public static function init(string $api = self::API_MP) 
    {
        if ($api != self::API_MP) throw new \Exception(sprintf('Invalid API : "%s"', $api));

        Core::setAccessToken(Core::getAccessToken()->get_access_token());
        $response = Core::init($api);
        return $response->get_data()['payToken'];
    }

    /**
     * Perform payment action
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
     * Get Payment status
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
     * Set Orange Money API parameters
     * 
     * @param array $configs
     * @return void
     */
    public static function setConfig(array $configs)
    {
        if (array_key_exists('env', $configs)) Core::setEnv($configs['env']);
        if (array_key_exists('client_id', $configs)) Core::setClientId($configs['client_id']);
        if (array_key_exists('client_secret', $configs)) Core::setClientSecret($configs['client_secret']);
        if (array_key_exists('om_app_id', $configs)) Core::setOmAppId($configs['om_app_id']);
        if (array_key_exists('om_app_secret', $configs)) Core::setOmAppSecret($configs['om_app_secret']);
        if (array_key_exists('pin', $configs)) Core::setPin($configs['pin']);
        if (array_key_exists('channel_user_msisdn', $configs)) Core::setChannelUserMsisdn($configs['channel_user_msisdn']);
    }
}