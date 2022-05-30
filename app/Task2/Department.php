<?php


namespace App\Task2;


/**
 * 
 * Class Department
 * @package App\Task2
 * 
 * @method int getSumEmployeesSalary()
 * @method int getCountEmployees()
 *
 * @property Employee[] $employees
 * @property string $name
 */
class Department
{

    public function __construct(public array $employees, private string $name)
    {
    }

    public function getSumEmployeesSalary(): int
    {
        $sumSalary = 0;

        foreach($this->employees as $employee) {
            $sumSalary += $employee->getSalary();
        }

        return $sumSalary;
    }

    public function getCountEmployees(): int
    {
        return count($this->employees);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}