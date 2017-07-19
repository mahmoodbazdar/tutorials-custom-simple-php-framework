<?php


namespace Bugloos\CustomFramework\Validator;


class Email extends Validator
{
    /**
     * @var string
     */
    private $message = "Email is not valid";

    /**
     * Email constructor.
     * @param $message
     */
    function __construct($message = null)
    {
        if (!is_null($message)) {
            $this->message = $message;
        }
    }

    /**
     * @param string $data
     * @return boolean
     */
    public function isValid($data)
    {
        if (filter_var($data,FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            $this->errorMessages[] = new ValidationError("email",
              $this->message);

            return false;
        }
    }


}