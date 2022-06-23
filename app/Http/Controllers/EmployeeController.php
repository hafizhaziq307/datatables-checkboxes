<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $Employee = new Employee();
        $employees = $Employee->getEmployees();

        $employeesId = array_column($employees, 'id');
        $totalSalary = array_sum(array_column($employees, 'salary'));

        return view('employees.index', compact('employees', 'totalSalary', 'employeesId'));
    }
}
