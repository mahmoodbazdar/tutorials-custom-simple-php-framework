<?php

namespace Bugloos\CustomFramework\Validator;


interface Validator
{
    /**
     * @param mixed $data
     * @return boolean
     */
    public function isValid($data);
}