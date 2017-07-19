<?php
/**
 * Created by PhpStorm.
 * User: mahmood
 * Date: 7/14/17
 * Time: 3:21 PM
 */

namespace Bugloos\CustomFramework\Validator;


use Bugloos\CustomFramework\Helper\Helper;

class Length extends Validator
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
    private $minMessage = "Min length for this {{field}} is {{min}}";
    /**
     * @var string
     */
    private $maxMessage = "Max length for this {{field}} is {{max}}";

    /**
     * Length constructor.
     * @param int $min
     * @param int $max
     * @param string $minMessage
     * @param string $maxMessage
     */
    public function __construct(
      $min = null,
      $max = null,
      $minMessage = null,
      $maxMessage = null
    ) {
        $this->min = is_null($min) ? -1 : $min;
        $this->max = is_null($max) ? -1 : $max;
        if (!is_null($minMessage)) {
            $this->minMessage = $minMessage;
        }
        if (!is_null($maxMessage)) {
            $this->maxMessage = $maxMessage;
        }
    }


    /**
     * @param string $data
     * @return boolean
     */
    public function isValid($data)
    {
        if ($this->min != -1 && $this->max != -1) {
            if (strlen($data) > $this->min && strlen($data) < $this->max) {
                return true;
            } else {
                if (strlen($data) < $this->min) {

                    $this->errorMessages[] = new ValidationError("Length",
                      Helper::compileMessage($this->minMessage,
                        ["field" => $this->field, "min" => $this->min]));
                } else {
                    $this->errorMessages[] = new ValidationError("Length",
                      Helper::compileMessage($this->maxMessage,
                        ["field" => $this->field, "max" => $this->max]));
                }

                return false;
            }
        } elseif ($this->min != -1) {
            if (strlen($data) > $this->min) {
                return true;
            } else {
                $this->errorMessages[] = new ValidationError("Length",
                  Helper::compileMessage($this->minMessage,
                    ["field" => $this->field, "min" => $this->min]));

                return false;
            }
        } elseif ($this->max != -1) {
            if (strlen($data) < $this->max) {
                return true;
            } else {
                $this->errorMessages[] = new ValidationError("Length",
                  Helper::compileMessage($this->maxMessage,
                    ["field" => $this->field, "max" => $this->max]));

                return false;
            }
        } else {
            return true;
        }
    }

}