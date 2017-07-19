<?php

namespace Bugloos\CustomFramework\Validator;


use Bugloos\CustomFramework\Validator\ValidationError;

abstract class Validator
{
    /**
     * @var ValidationError[]
     */
    protected $errorMessages=[];

    /**
     * @var string
     */
    protected $field;

    /**
     * @param mixed $data
     * @return boolean
     */
    public abstract function isValid($data);

    /**
     * @return ValidationError[]
     */
    public function getMessages(){
        return $this->errorMessages;
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param string $field
     */
    public function setField($field)
    {
        $this->field = $field;
    }
}