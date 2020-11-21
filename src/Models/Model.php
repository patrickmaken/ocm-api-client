<?php

namespace Patrickmaken\OcmAPI\Models;

class Model {

    public function __construct($value = array())
    {
        if(!empty($value))
            $this->hydrate($value);
    }

    public function hydrate($data)
    {
        foreach ($data as $attribut => $value) {
            $method = 'set_'.$attribut;
            if (is_callable(array($this, $method))) {
                $this->$method($value);
            }
        }
    }
}