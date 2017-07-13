<?php


namespace Bugloos\CustomFramework\Request;


class Request
{
    private $request;
    private $postData;
    private $getData;
    /**
     * @var \Bugloos\CustomFramework\Request\Post
     */
    public $post;
    /**
     * @var \Bugloos\CustomFramework\Request\Get
     */
    public $get;

    public function __construct($get,$post)
    {
        $this->request=array_merge($get,$post);
        $this->getData=$get;
        $this->postData=$post;
        $this->get=new Get($get);
        $this->post=new Post($post);
    }

    public function get($key,$default){
        if(isset($this->request[$key])){
            return $this->request[$key];
        }
        return $default;
    }


}

// $request->get->get("")
// $request->post->get("")