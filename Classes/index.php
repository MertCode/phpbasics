<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Information</title>
</head>

<body>
    <h1>Employee Information</h1>

    <?php
    // Include the Employee class definition
    require_once 'employee.php';

    // Define employee information
    $name = "Mert";
    $age = 25;
    $position = "Full Stack Web Developer";
    $salary = "$60,000";
    $department = "Frontend Development";

    // Create an instance of the Employee class with the defined information
    $employee1 = new Employee($name, $age, $position, $salary, $department);

    // Display employee information
    echo "<p>Name: " . $employee1->getProperty('name') . "</p>";
    echo "<p>Age: " . $employee1->getProperty('age') . "</p>";
    echo "<p>Position: " . $employee1->getProperty('position') . "</p>";
    echo "<p>Department: " . $employee1->getProperty('department') . "</p>";
    echo "<p>Salary: " . $employee1->getProperty('salary') . "</p>";
    echo "<p>Introduction: " . $employee1->introduce() . "</p>";
    ?>
</body>

</html>