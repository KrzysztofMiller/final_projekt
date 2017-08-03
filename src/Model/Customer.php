<?php

class Customer
{
    const table = "customer";

    public $id;
    public $username;
    public $password;
    public $email;
    public $created;
    public $balance;
    public $lastsynchro;
    public $payer_id;

    /**
     * Customer constructor.
     * @param $id
     * @param $username;
     * @param $password
     * @param $email
     * @param $created
     * @param $balance
     */
//    public function __construct($username, $password, $email)
//    {
//        $this->setUsername($username);
//        $this->setPassword($password);
//        $this->setEmail($email);
//        $this->setCreated(date('Y-m-d H-i-s'));
//        $this->setBalance(0);
//    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return mixed
     */
    public function getLastsynchro()
    {
        return $this->lastsynchro;
    }

    /**
     * @param mixed $lastsynchro
     */
    public function setLastsynchro($lastsynchro)
    {
        $this->lastsynchro = $lastsynchro;
    }

    /**
     * @return mixed
     */
    public function getPayerId()
    {
        return $this->payerId;
    }

    /**
     * @param mixed $payerId
     */
    public function setPayerId($payerId)
    {
        $this->payerId = $payerId;
    }




}