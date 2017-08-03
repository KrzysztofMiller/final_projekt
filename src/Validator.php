<?php

class Validator
{

    public static function checkValidUsername($username)
    {
        // login musi miec od 3 do 10 malych liter
        if (!preg_match('/[a-z]{3,10}/', $username) || preg_match('/[^a-z]/', $username)) {
            return "Login powinien składać się od 3 do 10 wyłącznie małych liter<br>";
        } else {
            return "";
        }
    }

    public static function checkValidPassword($password)
    {
        // haslo musi miec od 6 do 20 znakow

        if (!preg_match('/\S{6,20}/', $password) ||
            preg_match('/\s/', $password)) {
            return "Hasło powinno się składać od 6 do 20 znaków.<br>";
        } else {
            return "";
        }
    }

    public static function checkPasswords($password, $password2)
    {
        // sprawdzamy czy wpisane hasło i ponownie wpisane hasło są takie same

        if ($password !== $password2) {
            return "Wpisane hasło i ponownie wpisane hasło muszą być takie same.<br>";
        } else {
            return "";
        }
    }

    public static function checkValidEmail($email)
    {

        //sprawdzamy czy email zostal wpisany we wlasciwym formacie

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            return "Nieprawidłowy adres email<br>";
        } else {
            return "";
        }
    }

    public static function usernameExists($username)
    {
        Database::connect();
        $result = Database::selectByParameter("Customer","username",$username);

        if (count($result)) {
            return "Niestety wybrany login już istnieje. Wybierz inny.<br>";
        } else {
            return "";
        }
    }



}