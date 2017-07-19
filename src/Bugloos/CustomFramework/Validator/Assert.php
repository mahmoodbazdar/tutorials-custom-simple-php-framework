<?php


namespace Bugloos\CustomFramework\Validator;


use Bugloos\CustomFramework\Validator\ValidationError;
use Bugloos\CustomFramework\Validator\Validator;

class Assert
{
    /**
     * @param $data
     * @param $rules
     * @return ValidationError[]
     */
    public static function isValid($data,$rules){
        $messages=[];
        foreach ($data as $key => $value){
            if(isset($rules[$key])){
                /** @var Validator $validation */
                foreach ($rules[$key] as $validation){
                    $validation->setField($key);
                    if(!$validation->isValid($value)){
                        if(!(isset($messages[$key]) && is_array($messages[$key]))){
                            $messages[$key]=[];
                        }
                       $messages[$key][]=$validation->getMessages();
                    }
                }
            }
        }
        return $messages;
    }
}