<?php
/**
 * Created by PhpStorm.
 * User: mahmood
 * Date: 7/14/17
 * Time: 3:21 PM
 */

namespace Bugloos\CustomFramework\Validator;


class Length implements Validator
{
    /**
     * @var integer
     */
    private $min;
    /**
     * @var integer
     */
    private $max;
    /**
     * @var string
     */
    private $minMessage="Min length for this {{field}} is {{min}}";
    /**
     * @var string
     */
    private $maxMessage="Max length for this {{field}} is {{max}}";

    /**
     * Length constructor.
     * @param int $min
     * @param int $max
     * @param string $minMessage
     * @param string $maxMessage
     */
    public function __construct($min=null, $max=null, $minMessage=null, $maxMessage=null)
    {
        $this->min = is_null($min)?-1:$min;
        $this->max = is_null($max)?-1:$max;
        if(!is_null($minMessage)){
            $this->minMessage = $minMessage;
        }
        if(!is_null($maxMessage)){
            $this->maxMessage = $maxMessage;
        }
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