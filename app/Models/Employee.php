<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class Employee extends Model
{
    use HasFactory;

    public function getEmployees()
    {
        $employee1 = new stdClass;
        $employee1->id = 112;
        $employee1->name = 'hafiz haziq';
        $employee1->position = 'software engineer';
        $employee1->salary = 2000;

        $employee2 = new stdClass;
        $employee2->id = 113;
        $employee2->name = 'hashim zakaria';
        $employee2->position = 'system maintainer';
        $employee2->salary = 3000;

        $employee3 = new stdClass;
        $employee3->id = 115;
        $employee3->name = 'ainul husna';
        $employee3->position = 'web designer';
        $employee3->salary = 1500;

        $employee4 = new stdClass;
        $employee4->id = 116;
        $employee4->name = 'shahrul nizam';
        $employee4->position = 'technician';
        $employee4->salary = 2100;

        $employee5 = new stdClass;
        $employee5->id = 117;
        $employee5->name = 'hanis ikmal';
        $employee5->position = 'web developer';
        $employee5->salary = 3500;

        $employee6 = new stdClass;
        $employee6->id = 118;
        $employee6->name = 'farhan solihin';
        $employee6->position = 'business analyst';
        $employee6->salary = 5000;

        $employees = array(
            $employee1, $employee2, $employee3, $employee4, $employee5, $employee6
        );

        return $employees;
    }
}
