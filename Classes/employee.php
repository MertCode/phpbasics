<?php

class Employee
{
   // Eigenschappen
   public $name;
   public $age;
   public $position;
   public $salary;
   public $department;

   // Constructor
   public function __construct($name, $age, $position, $salary, $department)
   {
      $this->name = $name;
      $this->age = $age;
      $this->position = $position;
      $this->salary = $salary;
      $this->department = $department;
   }

   // Methode om dynamisch eigenschappen op te halen
   public function getProperty($propertyName)
   {
      if (property_exists($this, $propertyName)) {
         return $this->{$propertyName};
      } else {
         return "Eigenschap '$propertyName' bestaat niet.";
      }
   }

   // Methode om naam in te stellen
   public function setName($name)
   {
      $this->name = $name;
   }

   // Methode om leeftijd in te stellen
   public function setAge($age)
   {
      $this->age = $age;
   }

   // Methode om positie in te stellen
   public function setPosition($position)
   {
      $this->position = $position;
   }

   // Methode om salaris in te stellen
   public function setSalary($salary)
   {
      $this->salary = $salary;
   }

   // Methode om afdeling in te stellen
   public function setDepartment($department)
   {
      $this->department = $department;
   }

   // Methode voor te introduceren
   public function introduce()
   {
      return "Hallo, mijn naam is $this->name. Ik ben $this->age jaar oud, werk als een $this->position op de afdeling $this->department, en verdien $this->salary.";
   }
}

// Een instantie van de klasse maken
$employee1 = new Employee("Mert", 25, "Full Stack Web Developer", "$60,000", "IT");

// Gebruik van de universele getter
echo $employee1->getProperty('name') . "\n"; // Output: Mert
echo $employee1->getProperty('salary') . "\n"; // Output: $60,000
echo $employee1->getProperty('department') . "\n"; // Output: IT
// echo $employee1->getProperty('address') . "\n"; // Output: Eigenschap 'address' bestaat niet.

// Roep de methode aan
echo $employee1->introduce(); // Output: Hallo, mijn naam is Mert. Ik ben 26 jaar oud, werk als een Full Stack Web Developer op de afdeling IT, en verdien $60,000.
