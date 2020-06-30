<?php

namespace FjordApp\Controllers\Form\Charts;

use Fjord\Crud\Controllers\FormController;
use Fjord\User\Models\FjordUser;

class NumberController extends FormController
{
    /**
     * Authorize request for authenticated fjord-user and permission operation.
     * Operations: read, update
     *
     * @param FjordUser $user
     * @param string $operation
     * @return boolean
     */
    public function authorize(FjordUser $user, string $operation): bool
    {
        return true;
    }
}
