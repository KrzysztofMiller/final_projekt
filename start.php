<?php

require_once ('./src/Controller.php');

$controller = new Controller();

$baseUri="/voip/";

$uri = $_SERVER['REQUEST_URI'];

if ($uri == $baseUri){

    include ("template/index.html");
}

if ($uri == $baseUri."newcustomer"){

    if($_SERVER["REQUEST_METHOD"] === "GET")
    {
        $startForm=array('errors'=>'','username'=>'','password'=>'','password2'=>'','email'=>'');
        echo($controller->render("newcustomer",$startForm));

    } elseif($_SERVER["REQUEST_METHOD"] === "POST") {

        // dodajemy klienta do bazy

        echo($controller->addCustomer());

        //automatycznie logujemy klienta do panelu

        echo($controller->loginToPanel());

        header('Location: ./login');
    }
}

if ($uri == $baseUri."login"){

    if (isset($_SESSION['customerId'])){

        echo($controller->customerArea());

    } else {

        if($_SERVER["REQUEST_METHOD"] === "GET"){

            $startForm=array('errors'=>'','username'=>'','password'=>'');
            echo($controller->render("login",$startForm));

        } elseif($_SERVER["REQUEST_METHOD"] === "POST") {
            //sprawdzamy poprawnosc danych

            echo($controller->loginToPanel());
        }

    }
}

if ($uri == $baseUri."buycredit") {

    if (isset($_SESSION['customerId'])) {

        echo($controller->buycredit());

    } else {

        header('Location: ./login');

    }
}

if ($uri == $baseUri."orderlist") {

    if (isset($_SESSION['customerId'])) {

        echo($controller->orderList());

    } else {

        header('Location: ./login');

    }
}

if ($uri == $baseUri."checkbalance") {

    if (isset($_SESSION['customerId'])) {

        echo($controller->checkBalance());

    } else {

        header('Location: ./login');

    }
}

if ($uri == $baseUri."edituserdata") {

    if (isset($_SESSION['customerId'])) {

        echo($controller->editUserData());

    } else {

        header('Location: ./login');

    }
}

if ($uri == $baseUri."editpayer") {

    if (isset($_SESSION['customerId'])) {

        echo($controller->editPayer());

    } else {

        header('Location: ./login');

    }
}



if ($uri == $baseUri."logout"){

    $controller->logout();

}