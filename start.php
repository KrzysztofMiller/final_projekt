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

        include ("template/newcustomer.html");

    } elseif($_SERVER["REQUEST_METHOD"] === "POST") {

        // sprawdzamy poprawnosc danych

        $errors="";
        $errors.= Validator::checkValidUsername($_POST['username']);
        $errors.= Validator::checkValidPassword($_POST['password']);
        $errors.= Validator::checkPasswords($_POST['password'],$_POST['password2']);
        $errors.= Validator::checkValidEmail($_POST['email']);

        if ($errors!=""){
            echo($errors);
            include ("template/newcustomer.html");
            die;
        }

        // sprawdzamy czy login juz istnieje

        $errors.= Validator::usernameExists($_POST['username']);

        if ($errors!=""){
            echo($errors);
            include ("template/newcustomer.html");
            die;
        }

        // dodajemy klienta do bazy

        echo $controller->addCustomer();

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