<?php

namespace App\Http\Controllers\Fjord\Actions;

use AwStudio\Fjord\Support\Facades\FjordRoute;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeeExport;

trait EmployeeActions
{
    public function addEmployeeActionsExtension()
    {
        return [
            'index.globalActions' => ['export-employees'],
            'index.recordActions' => ['employee-record-actions']
        ];
    }

    public function makeEmployeeActionsRoute()
    {
        FjordRoute::get("/export-employees", self::class . "@exportEmployees");
    }

    protected function exportEmployees()
    {
        return Excel::download(new EmployeeExport, now().'_employees.xlsx');
    }
}
