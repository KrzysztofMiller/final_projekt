<?php

require_once ('./src/Database.php');
require_once ('./src/Model/Customer.php');

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

        $errors="";

        // login musi miec od 3 do 10 malych liter

        if (!preg_match('/[a-z]{3,10}/',$_POST['customer']) ||
            preg_match('/[^a-z]/',$_POST['customer']))
        {
            $errors .= "Login powinien składać się od 3 do 10 wyłącznie małych liter<br>";
        }

        // haslo musi miec od 6 do 20 znakow

        if (!preg_match('/\S{6,20}/',$_POST['password']) ||
            preg_match('/\s/',$_POST['password']))
        {
            $errors .= "Hasło powinno się składać od 6 do 20 znaków.<br>";
        }

        // sprawdzamy czy wpisane hasło i ponownie wpisane hasło są takie same

        if ($_POST['password'] !== $_POST['password2'])
        {
            $errors .= "Wpisane hasło i ponownie wpisane hasło muszą być takie same.<br>";
        }

        //sprawdzamy czy email zostal wpisany we wlasciwym formacie

        if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            $errors .= "Nieprawidłowy adres email<br>";
        }

        if ($errors!=""){
            echo($errors);

            include ("template/newcustomer.html");

            die;
        }

        //sprawdzamy czy login juz istnieje

        Database::connect();

        $sql = "SELECT * FROM customer WHERE email = :email";
        $stmt = Database::$conn->prepare($sql);
        $stmt->execute(['email' => $_POST['email']]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result)) {
            $errors .= "Niestety wybrany login już istnieje. Wybierz inny.<br>";
        }

        if ($errors!=""){
            echo($errors);

            include ("template/newcustomer.html");

            die;
        } else {
            echo"wolny";
        }

        $customer = new Customer($_POST['customer'],$_POST['password'],$_POST['email']);

        //dodajemy klienta do bazy

        Database::save($customer);








        //automatycznie logujemy klienta do panelu



    }



}

if ($uri == $baseUri."login"){
    include ("template/login.html");
}