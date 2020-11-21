<?php

namespace Patrickmaken\OcmAPI\Models;

class PaymentResponse extends Model {

    public $createTime;
    public $subscriberMsisdn;
    public $amount;
    public $payToken;
    public $txnId;
    public $txnMode;
    public $initTxnMessage;
    public $initTxnStatus;
    public $confirmTxnStatus;
    public $confirmTxnMessage;
    public $status;
    public $notifUrl;
    public $description;
    public $channelUserMsisdn;

    public function __construct($value = array())
    {
        if(!empty($value))
            $this->hydrate($value);
    }

    public function hydrate($data)
    {
        foreach ($data as $attribut => $value) {
            $method = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));
            if (is_callable(array($this, $method))) {
                $this->$method($value);
            }
        }
    }

    /**
     * Get the value of createTime
     */ 
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * Set the value of createTime
     *
     * @return  self
     */ 
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * Get the value of subscriberMsisdn
     */ 
    public function getSubscriberMsisdn()
    {
        return $this->subscriberMsisdn;
    }

    /**
     * Set the value of subscriberMsisdn
     *
     * @return  self
     */ 
    public function setSubscriberMsisdn($subscriberMsisdn)
    {
        $this->subscriberMsisdn = $subscriberMsisdn;

        return $this;
    }

    /**
     * Get the value of amount
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */ 
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of payToken
     */ 
    public function getPayToken()
    {
        return $this->payToken;
    }

    /**
     * Set the value of payToken
     *
     * @return  self
     */ 
    public function setPayToken($payToken)
    {
        $this->payToken = $payToken;

        return $this;
    }

    /**
     * Get the value of txnId
     */ 
    public function getTxnId()
    {
        return $this->txnId;
    }

    /**
     * Set the value of txnId
     *
     * @return  self
     */ 
    public function setTxnId($txnId)
    {
        $this->txnId = $txnId;

        return $this;
    }

    /**
     * Get the value of txnMode
     */ 
    public function getTxnMode()
    {
        return $this->txnMode;
    }

    /**
     * Set the value of txnMode
     *
     * @return  self
     */ 
    public function setTxnMode($txnMode)
    {
        $this->txnMode = $txnMode;

        return $this;
    }

    /**
     * Get the value of initTxnMessage
     */ 
    public function getInitTxnMessage()
    {
        return $this->initTxnMessage;
    }

    /**
     * Set the value of initTxnMessage
     *
     * @return  self
     */ 
    public function setInitTxnMessage($initTxnMessage)
    {
        $this->initTxnMessage = $initTxnMessage;

        return $this;
    }

    /**
     * Get the value of initTxnStatus
     */ 
    public function getInitTxnStatus()
    {
        return $this->initTxnStatus;
    }

    /**
     * Set the value of initTxnStatus
     *
     * @return  self
     */ 
    public function setInitTxnStatus($initTxnStatus)
    {
        $this->initTxnStatus = $initTxnStatus;

        return $this;
    }

    /**
     * Get the value of confirmTxnStatus
     */ 
    public function getConfirmTxnStatus()
    {
        return $this->confirmTxnStatus;
    }

    /**
     * Set the value of confirmTxnStatus
     *
     * @return  self
     */ 
    public function setConfirmTxnStatus($confirmTxnStatus)
    {
        $this->confirmTxnStatus = $confirmTxnStatus;

        return $this;
    }

    /**
     * Get the value of confirmTxnMessage
     */ 
    public function getConfirmTxnMessage()
    {
        return $this->confirmTxnMessage;
    }

    /**
     * Set the value of confirmTxnMessage
     *
     * @return  self
     */ 
    public function setConfirmTxnMessage($confirmTxnMessage)
    {
        $this->confirmTxnMessage = $confirmTxnMessage;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of notifUrl
     */ 
    public function getNotifUrl()
    {
        return $this->notifUrl;
    }

    /**
     * Set the value of notifUrl
     *
     * @return  self
     */ 
    public function setNotifUrl($notifUrl)
    {
        $this->notifUrl = $notifUrl;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of channelUserMsisdn
     */ 
    public function getChannelUserMsisdn()
    {
        return $this->channelUserMsisdn;
    }

    /**
     * Set the value of channelUserMsisdn
     *
     * @return  self
     */ 
    public function setChannelUserMsisdn($channelUserMsisdn)
    {
        $this->channelUserMsisdn = $channelUserMsisdn;

        return $this;
    }
}