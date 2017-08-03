<?php

require_once 'Database.php';
require_once 'Form.php';
require_once 'Validator.php';
require_once 'Model/Customer.php';

class Controller
{

    public function addCustomer()
    {
        $customer = Form::populate(new Customer());
        var_dump($customer);
        $customer->setCreated(date('Y-m-d H-i-s'));
        $customer->setBalance(0);
        var_dump($customer);
        Database::connect();
        Database::save($customer);

//        return $this->showProduct();
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
//    private function render($file,$array)
//    {
//        $html = file_get_contents("./../template/".$file.".html");
//        foreach ($array as $key => $value) {
//            $html = str_replace('{{'.$key.'}}',$value,$html);
//        }
//        return $html;
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