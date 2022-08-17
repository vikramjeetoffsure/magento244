<?php

namespace Learning\Js\Model;

class Cars
{
   public $cars;
   public function __construct(array $cars = [])
   {
       $this->cars = $cars;
   }

   public function get_values(){
       return "hellooo bhai";
   }

}