<?php

namespace FjordApp\Controllers\Crud;

use Fjord\User\Models\FjordUser;

use FjordApp\Exports\EmployeeExport;
use Maatwebsite\Excel\Facades\Excel;
use Fjord\Crud\Requests\CrudReadRequest;
use Illuminate\Database\Eloquent\Builder;
use Fjord\Crud\Controllers\CrudController;

class EmployeeController extends CrudController
{
    /**
     * Crud model class name.
     *
     * @var string
     */
    protected $model = \App\Models\Employee::class;

    /**
     * Authorize request for permission operation and authenticated fjord-user.
     * Operations: create, read, update, delete
     *
     * @param FjordUser $user
     * @param string $operation
     * @return boolean
     */
    public function authorize(FjordUser $user, string $operation): bool
    {
        return $user->can("{$operation} employees");
    }

    /**
     * Initial query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(): Builder
    {
        return $this->model::query();
    }

    public function exportEmployees(CrudReadRequest $request)
    {
        return Excel::download(new EmployeeExport, now() . '_employees.xlsx');
    }
}
