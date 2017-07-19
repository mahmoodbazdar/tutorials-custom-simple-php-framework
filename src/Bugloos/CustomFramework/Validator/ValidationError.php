<?php
/**
 * Created by PhpStorm.
 * User: mahmood
 * Date: 7/18/17
 * Time: 2:27 PM
 */

namespace Bugloos\CustomFramework\Validator;


class ValidationError
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $message;

    /**
     * ValidationError constructor.
     * @param string $name
     * @param string $message
     */
    public function __construct($name, $message)
    {
        $this->name = $name;
        $this->message = $message;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

}