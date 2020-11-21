<?php

namespace Patrickmaken\OcmAPI\Models;

class Token extends Model {

    /**
     * @property string $access_token
     */
    protected $access_token;

    public function get_access_token()
    {
        return $this->access_token;
    }

    public function set_access_token($access_token)
    {
        $this->access_token = $access_token;
        return $this;
    }
}