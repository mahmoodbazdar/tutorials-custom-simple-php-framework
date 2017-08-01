<?php
/**
 * Created by PhpStorm.
 * User: mahmood
 * Date: 7/18/17
 * Time: 2:27 PM
 */

namespace Bugloos\CustomFramework\Validator;


class ValidationError implements \JsonSerializable
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

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}