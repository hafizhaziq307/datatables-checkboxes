<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $Employee = new Employee();
        $employees = $Employee->getEmployees();

        $totalSalary = 0;

        $employeesId = [];

        foreach ($employees as $employee) {
            $totalSalary += $employee->salary;

            array_push($employeesId, $employee->id);
        }

        return view('employees.index', compact('employees', 'totalSalary', 'employeesId'));
    }
}
