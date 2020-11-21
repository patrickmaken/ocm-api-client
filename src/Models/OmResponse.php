<?php

namespace Patrickmaken\OcmAPI\Models;

class OmResponse extends Model {

    /**
     * @property string $message
     */
    protected $message = '';

    public function get_message()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function set_message($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @property array $data
     */
    protected $data = [];

    /**
     * @return array
     */
    public function get_data()
    {
        return $this->data;
    }

    public function set_data($data)
    {
        $this->data = $data;
        return $this;
    }
}