<?php

require_once ('./src/Controller.php');

$controller = new Controller();

$baseUri="/voip/";

$uri = $_SERVER['REQUEST_URI'];

if ($uri == $baseUri){

    include ("template/index.html");
}

if ($uri == $baseUri."newcustomer"){

    if($_SERVER["REQUEST_METHOD"] === "GET"){
        $startForm=array('errors'=>'','username'=>'','password'=>'','password2'=>'','email'=>'');
        echo($controller->render("newcustomer",$startForm));

    } elseif($_SERVER["REQUEST_METHOD"] === "POST") {

        // dodajemy klienta do bazy

        $controller->addCustomer();

        //automatycznie logujemy klienta do panelu
    }
}

if ($uri == $baseUri."login"){

    if($_SERVER["REQUEST_METHOD"] === "GET"){
        include ("template/login.html");
    } elseif($_SERVER["REQUEST_METHOD"] === "POST") {
        //sprawdzamy poprawnosc danych

        $errors = "";
        echo("post");
    }

}