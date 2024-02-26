<?php

class Person
{

   // Eigenschappen
   public $name;
   public $age;
   public $gender;

   // Constructor
   public function __construct($name, $age, $gender)
   {
      $this->name = $name;
      if ($age < 0) {
         throw new Exception("Leeftijd mag niet negatief zijn.");
      }
      $this->age = $age;
      $this->gender = $gender;
   }
}

$person = new Person("John Doe", "30", "shemale");
