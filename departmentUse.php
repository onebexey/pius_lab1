<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use App\Task2\Employee;
use App\Task2\Department;

$departments = [];

$employee1 = new Employee(1, 'Jack', 100, '2020-01-15');
$employee2 = new Employee(2, 'Bob', 1000, '2015-02-01');
$departments[] = new Department([$employee1, $employee2], 'Microsoft');

$employee1 = new Employee(1, 'Jack', 10, '2000-01-15');
$employee2 = new Employee(2, 'Bob', 1000, '2015-02-01');
$departments[] = new Department([$employee1, $employee2], 'Google');

$employee1 = new Employee(1, 'Jack', 100120, '2000-01-15');
$employee2 = new Employee(2, 'Bob', 100110, '2015-02-01');
$departments[] = new Department([$employee1, $employee2], 'Miet');

$employee1 = new Employee(1, 'Jack', 10, '2020-01-15');
$employee2 = new Employee(2, 'Bob', 999, '2015-02-01');
$employee3 = new Employee(3, 'Bob', 1, '2015-02-01');
$departments[] = new Department([$employee1, $employee2, $employee3], 'Astor');

$employee1 = new Employee(1, 'Jack', 100120, '2000-01-15');
$employee2 = new Employee(2, 'Bob', 100110, '2015-02-01');
$departments[] = new Department([$employee1, $employee2], 'Adidas');


$minSalaryDepartment = null;
$maxSalaryDepartment = null;
$minDepartmentKeys = [];
$maxDepartmentKeys = [];

foreach($departments as $key => $department) {
    if (($department->getSumEmployeesSalary() < $minSalaryDepartment) || !$minSalaryDepartment) {
        $minSalaryDepartment = $department->getSumEmployeesSalary();
        $minDepartmentKeys[0] = $key;
    } elseif ($department->getSumEmployeesSalary() == $minSalaryDepartment) {
        if ($department->getCountEmployees() > $departments[$minDepartmentKeys[0]]->getCountEmployees()) {
            $minDepartmentKeys[0] = $key;
        } elseif ($department->getCountEmployees() == $departments[$minDepartmentKeys[0]]->getCountEmployees()) {
            $minDepartmentKeys[] = $key;
        }
    }

    if (($department->getSumEmployeesSalary() > $maxSalaryDepartment) || !$maxSalaryDepartment) {
        $maxSalaryDepartment = $department->getSumEmployeesSalary();
        $maxDepartmentKeys[0] = $key;
    } elseif ($department->getSumEmployeesSalary() == $maxSalaryDepartment) {
        if ($department->getCountEmployees() > $departments[$maxDepartmentKeys[0]]->getCountEmployees()) {
            $maxDepartmentKeys[0] = $key;
        } elseif ($department->getCountEmployees() == $departments[$maxDepartmentKeys[0]]->getCountEmployees()) {
            $maxDepartmentKeys[] = $key;
        }
    }

}


echo 'Department with min salary: ' . '<br>';
foreach($minDepartmentKeys as $minDepartmentKey) {
    echo $departments[$minDepartmentKey]->getName() . '<br>';
}

echo 'Department with max salary: ' . '<br>';
foreach($maxDepartmentKeys as $maxDepartmentKey) {
    echo $departments[$maxDepartmentKey]->getName() . '<br>';
}