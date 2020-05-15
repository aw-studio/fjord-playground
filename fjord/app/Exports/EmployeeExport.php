<?php

namespace FjordApp\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeeExport implements FromCollection
{
    public function collection()
    {
        return Employee::all();
    }
}
