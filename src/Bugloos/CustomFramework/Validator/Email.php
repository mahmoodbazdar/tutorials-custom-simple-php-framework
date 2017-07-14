<?php
/**
 * Created by PhpStorm.
 * User: mahmood
 * Date: 7/14/17
 * Time: 3:16 PM
 */

namespace Bugloos\CustomFramework\Validator;


class Email implements Validator
{
    /**
     * @var string
     */
    private $message;

    /**
     * Email constructor.
     * @param $message
     */
    function __construct($message)
    {
        $this->message=$message;
    }

    /**
     * @param mixed $data
     * @return boolean
     */
    public function isValid($data)
    {
        // TODO: Implement isValid() method.
    }
}