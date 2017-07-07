<?php


namespace Bugloos\CustomFramework\Controllers;


use Bugloos\CustomFramework\Helper\View;

class ContactController
{
    public function contact(){
        echo View::render("contact/contact",["company"=>"Bugloos"]);
    }
}

