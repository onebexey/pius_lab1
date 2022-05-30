<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Symfony\Component\Validator\Validation;
use App\Task2\Employee;


function isValidatedEmployee(Employee $employee): bool
{
    $validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();
    $errors = $validator->validate($employee);

    if (count($errors) > 0) {
        foreach($errors as $error) {
            echo $error->getMessage() . '<br>';
        }
        return false;
    }

    return true;
}


$employee1 = new Employee(1, 'Jack', 100, '2020-01-15');
$employee2 = new Employee(2, 'Ja', 1000, '');

echo 'Стаж работника 1:' . '<br>';
if (isValidatedEmployee($employee1)) {
    echo $employee1->getWorkExperience() . '<br>';
}

echo 'Стаж работника 2:' . '<br>';
if (isValidatedEmployee($employee2)) {
    echo $employee2->getWorkExperience() . '<br>';
}