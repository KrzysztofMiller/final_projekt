<?php

$uri = $_SERVER['REQUEST_URI'];

echo($uri);
echo("<br>");

if ($uri == "/voip/"){
    echo ("strona główna");
}

if ($uri == "/voip/newcustomer/"){
    echo ("newcustomer");
}

if ($uri == "/voip/login/"){
    echo ("login");
}