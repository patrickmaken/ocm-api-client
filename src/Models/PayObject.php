<?php

namespace Patrickmaken\OcmAPI\Models;

class PayObject {

    /**
     * Client phone number at format 6xxxxxxxx
     * 
     * @property string
     */
    public $subscriberMsisdn;
    
    /**
     * Transaction amount
     * 
     * @property int
     */
    public $amount;
    
    /**
     * @property string
     */
    public $description;
    
    /**
     * Payment Identifier
     * 
     * @property string
     */
    public $orderId;
    
    /**
     * Notification URL
     *
     * @property string
     */
    public $notifUrl;
    
    /**
     * @return array
     */
    public function toArray() 
    {
        return [
            'subscriberMsisdn' => $this->subscriberMsisdn,
            'amount' => strval($this->amount),
            'description' => $this->description,
            'orderId' => $this->orderId,
            'notifUrl' => $this->notifUrl,
        ];
    }
    
}