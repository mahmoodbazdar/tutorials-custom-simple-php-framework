<?php


namespace Bugloos\CustomFramework\Controllers;


use Bugloos\CustomFramework\Helper\View;
use Bugloos\CustomFramework\Request\Request;

class ContactController
{
    public function contact(){
        echo View::render("contact/contact",["name"=>"Bugloos","address"=>"test address"]);
    }

    public function postContact(Request $request){
        print_r($request->post->get("name","hossein"));

    }
}

// $request->get("description")
// $request->get->get("description")
// $request->post->get("description")

