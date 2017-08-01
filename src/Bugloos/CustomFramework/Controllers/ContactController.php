<?php


namespace Bugloos\CustomFramework\Controllers;


use Bugloos\CustomFramework\Helper\FlashMessages;
use Bugloos\CustomFramework\Helper\View;
use Bugloos\CustomFramework\Request\Request;
use Bugloos\CustomFramework\Validator\Assert;
use Bugloos\CustomFramework\Validator\Email;
use Bugloos\CustomFramework\Validator\Length;

class ContactController
{
    public function contact()
    {
        echo View::render("contact/contact",
          ["name" => "Bugloos", "address" => "test address"]);
    }

    public function postContact(Request $request)
    {
        /*$email=new Email("Email is invalid");
        $email->isValid($request->post->get("email"));*/
        $validators = [
          "email" => [
            new Email("Email is wrong"),
            new Length(10, 255)
          ],
          "name" => [
            new Length(10,20)
          ]
        ];

        $messages=Assert::isValid($request->post->all(),$validators);
        if(sizeof($messages)>0){
            FlashMessages::set($messages);
            header("Location: /contact");
            die;
        }
        print_r($messages);
    }
}

// $request->get("description")
// $request->get->get("description")
// $request->post->get("description")

