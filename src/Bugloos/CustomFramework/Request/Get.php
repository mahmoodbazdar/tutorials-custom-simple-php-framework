<?php


namespace Bugloos\CustomFramework\Request;


class Get
{
    private $get;

    /**
     * Get constructor.
     * @param $get
     */
    public function __construct($get)
    {
        $this->get = $get;
    }


    public function get($key,$default){
        if(isset($this->get[$key])){
            return $this->get[$key];
        }
        return $default;
    }
}