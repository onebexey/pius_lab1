<?php

namespace App\Task2;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;


/**
 * 
 * Class Employee
 * @package App\Task2
 * 
 * @method string getWorkExperience()
 *
 * @property int $id
 * @property string $name
 * @property int $salary
 * @property string $dateBeginWork // Y:m:d
 */
class Employee
{
    public function __construct(public int $id, public string $name, private int $salary, public string $dateBeginWork)
    {
    }

    public function getSalary(): int
    {
        return $this->salary ;
    }

    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }

    public function getWorkExperience(): string
    {
        $currentDate = new \DateTime();
        $dateBeginWork = \DateTime::createFromFormat('Y-m-d', $this->dateBeginWork);
        $interval = $dateBeginWork->diff($currentDate);
        
        return $interval->format('%Y');
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraints('id', [
            new Assert\NotBlank(),
            new Assert\Positive(),
        ]);
        $metadata->addPropertyConstraints('name', [
            new Assert\NotBlank(),
            new Assert\Length(['min' => 3]),
        ]);
        $metadata->addPropertyConstraint('salary', new Assert\Positive());
        $metadata->addPropertyConstraints('dateBeginWork', [
            new Assert\NotBlank([
                'message' => 'Date should not be blank',
            ]),
            new Assert\Date([
                'message' => 'Date should be given like format `2022-01-14`',
            ]),
        ]);
    }
}