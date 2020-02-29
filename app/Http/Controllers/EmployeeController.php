<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('pages.employees.index')->with([
            'employees' => $employees
        ]);
    }

    public function show($employee)
    {
        $employee = Employee::with(['department', 'projects'])->find($employee);

        return view('pages.employees.show')->with([
            'employee' => $employee
        ]);
    }
}
