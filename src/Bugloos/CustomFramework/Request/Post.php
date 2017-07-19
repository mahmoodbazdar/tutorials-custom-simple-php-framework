<?php


namespace Bugloos\CustomFramework\Request;


class Post
{
    private $post;

    /**
     * Post constructor.
     * @param $post
     */
    public function __construct($post)
    {
        $this->post = $post;
    }


    public function get($key,$default=null){
        if(isset($this->post[$key])){
            return $this->post[$key];
        }
        return $default;
    }

    public function all(){
        return $this->post;
    }
}