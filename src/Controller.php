<?php

session_start();

require_once 'Database.php';
require_once 'Form.php';
require_once 'Validator.php';
require_once 'Model/Customer.php';

class Controller
{
    public function render($file,$array)
    {
        $html = file_get_contents(__DIR__."/../template/".$file.".html");
        foreach ($array as $key => $value) {
            $html = str_replace('{{'.$key.'}}',$value,$html);
        }
        return $html;
    }

    public function addCustomer()
    {
        $errors = Validator::validateFormAddCustomer();
        if ($errors){
            $renderParams = Form::getPost();
            $renderParams['errors']=$errors;
            echo($this->render("newcustomer",$renderParams));
            die;
        }

        $errors = Validator::usernameExists($_POST['username']);
        if ($errors){
            $renderParams = Form::getPost();
            $renderParams['errors']=$errors;
            echo($this->render("newcustomer",$renderParams));
            die;
        }

        $customer = Form::populate(new Customer());
        $customer->setCreated(date('Y-m-d H-i-s'));
        $customer->setBalance(0);
        Database::connect();
        Database::save($customer);

        return "";
    }

    public function customerArea(){
        $renderParams['id']=$_SESSION['customerId'];
        return($this->render("customerarea",$renderParams));
    }

    public function buyCredit(){
        $renderParams['id']=$_SESSION['customerId'];
        return($this->render("buycredit",$renderParams));
    }

    public function orderList(){
        $renderParams['id']=$_SESSION['customerId'];
        return($this->render("orderlist",$renderParams));
    }

    public function editPayer(){
        $renderParams['id']=$_SESSION['customerId'];
        return($this->render("editpayer",$renderParams));
    }

    public function checkBalance(){
        $renderParams['id']=$_SESSION['customerId'];
        return($this->render("checkbalance",$renderParams));
    }

    public function editUserData(){
        $renderParams['id']=$_SESSION['customerId'];
        return($this->render("edituserdata",$renderParams));
    }

    public function loginToPanel()
    {
        $errors = Validator::validateFormLoginToPanel();
        if ($errors){
           $renderParams = Form::getPost();
           $renderParams['errors']=$errors;
           return($this->render("login",$renderParams));
           die;
        }

        $result = Validator::passwordCorrect($_POST['username'],$_POST['password']);
        $errors = $result[0];
        if ($errors){
            $renderParams = Form::getPost();
            $renderParams['errors']=$errors;
            return($this->render("login",$renderParams));
            die;
        }

        if ($result[1]) {
            $_SESSION['customerId'] = $result[1]['id'];
            return $this->customerArea();
        }

    }

    public function logout(){
        unset($_SESSION['customerId']);
        $startForm=array('errors'=>'','username'=>'','password'=>'');
        echo($this->render("login",$startForm));
    }



//
//    public function showProduct()
//    {
//        return file_get_contents(__DIR__."/../template/product.html");
//    }
//
//    public function addProduct()
//    {
//        $product = Form::populate(new Product());
//        Database::connect();
//        Database::save($product);
//
//        return $this->showProduct();
//    }
//
//    public function showGroup()
//    {
//        Database::connect(); // can be in constructor
//        $groups = Database::selectAll(Group::class);// 1 - as array
//        $html = '';
//        foreach ($groups as $element) {
//            $html .= $this->render('group_element',$element);
//        }
//        $html = $this->render('group',['list'=>$html]);
//
//        return $html;
//    }
//
//    public function addGroup()
//    {
//        $group = Form::populate(new Group());
//        Database::connect();
//        Database::save($group);
//
//        return $this->showGroup();
//    }
//
//    public function deleteGroup($id)
//    {
//        Database::connect();
//        Database::delete(Group::class, $id);
//        return $this->showGroup();
//    }


    //    public function showGroup()
//    {
//        Database::connect(); // can be in constructor
//        $groups = Database::selectAll(Group::class);// 1 - as array
//        $html = '';
//        foreach ($groups as $element) {
//            $html .= $this->render('group_element',$element);
//        }
//        $html = $this->render('group',['list'=>$html]);
//
//        return $html;
//    }
}