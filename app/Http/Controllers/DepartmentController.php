<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        return view('pages.departments.index')->with([
            'departments' => $departments
        ]);
    }

    public function show($department)
    {
        $department = Department::with(['employees'])->find($department);

        return view('pages.departments.show')->with([
            'department' => $department
        ]);
    }
}
