<?php

namespace Patrickmaken\OcmAPI\Models;

class PayObject {

    /**
     * Numéro de téléphone du client au format 6xxxxxxxx
     * 
     * @var string
     */
    public $subscriberMsisdn;
    
    /**
     * Le montant de la transaction
     * 
     * @var int
     */
    public $amount;
    
    /**
     * @var string
     */
    public $description;
    
    /**
     * Un identifiant du paiment
     * 
     * @var string
     */
    public $orderId;
    
    /**
     * L'URL de notification
     *
     * @var string
     */
    public $notifUrl;
    
    /**
     * @return array
     */
    public function toArray() 
    {
        return [
            'subscriberMsisdn' => $this->subscriberMsisdn,
            'amount' => $this->amount,
            'description' => $this->description,
            'orderId' => $this->orderId,
            'notifUrl' => $this->notifUrl,
        ];
    }
    
}