<?php

$baseUri="/voip/";

$uri = $_SERVER['REQUEST_URI'];

if ($uri == $baseUri){

    include ("template/index.html");


}

if ($uri == $baseUri."newcustomer"){

    if($_SERVER["REQUEST_METHOD"] === "GET"){
        include ("template/newcustomer.html");
    } elseif($_SERVER["REQUEST_METHOD"] === "POST") {
        //sprawdzamy poprawnosc danych

        //sprawdzamy czy login juz istnieje

        //sprawdzamy
        echo "dodajemy klienta";
    }



}

if ($uri == $baseUri."login"){
    include ("template/login.html");
}