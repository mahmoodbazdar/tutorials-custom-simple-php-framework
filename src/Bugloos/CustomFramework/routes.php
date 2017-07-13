<?php

use Bugloos\CustomFramework\Routing\Router;

Router::get("/contact","contact@ContactController");
Router::post("/contact","postContact@ContactController");
//Router::get("/news","new@NewsController");
//Router::get("/","index@DefaultController");