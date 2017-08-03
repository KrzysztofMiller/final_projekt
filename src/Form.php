<?php

class Form
{
   public static function populate($object)
   {
       $keys = array_intersect(
           array_keys($_POST),
           array_keys(get_object_vars($object))
       );

       foreach ($keys as $key) {
           $object->{$key} = $_POST[$key];
       }

       return $object;
   }


}